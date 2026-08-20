
<?php
require_once __DIR__ . "./conexao.php";


/**
 * Classe responsável por toda a lógica de agendamento:
 * calcular horários livres, criar, cancelar e listar agendamentos.
 */
class Agenda
{
    private mysqli $conn;

    private const DIAS_SEMANA = [
        0 => 'domingo',
        1 => 'segunda',
        2 => 'terca',
        3 => 'quarta',
        4 => 'quinta',
        5 => 'sexta',
        6 => 'sabado',
    ];

    public function __construct(?mysqli $conn = null)
    {
        $this->conn = $conn ?? getConexao();
    }

    /**
     * Retorna os horários livres de um empresário, em uma data específica,
     * considerando a duração do serviço escolhido.
     *
     * @param int    $idEmpresario
     * @param string $data         formato 'Y-m-d'
     * @param int    $idServico
     * @return array lista de horários disponíveis (formato 'H:i')
     */
    public function getHorariosDisponiveis(int $idEmpresario, string $data, int $idServico): array
    {
        $diaSemana = self::DIAS_SEMANA[(int)date('w', strtotime($data))];

        // 1) Busca o expediente do empresário nesse dia da semana
        $stmt = $this->conn->prepare(
            'SELECT horarios_hora_inicio, horarios_hora_fim
             FROM horarios
             WHERE empresario_idempresario = ? AND horarios_dia_semana = ?'
        );
        $stmt->bind_param('is', $idEmpresario, $diaSemana);
        $stmt->execute();
        $expediente = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if (!$expediente) {
            return []; // empresário não trabalha nesse dia
        }

        // 2) Busca a duração do serviço escolhido
        $stmt = $this->conn->prepare('SELECT serv_tempo FROM servicos WHERE idservicos = ?');
        $stmt->bind_param('i', $idServico);
        $stmt->execute();
        $servico = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if (!$servico) {
            return []; // serviço não existe
        }

        $duracaoSegundos = $this->horaParaSegundos($servico['serv_tempo']);

        // 3) Busca agendamentos já existentes nesse dia (não cancelados)
        $stmt = $this->conn->prepare(
            "SELECT a.agend_horario, s.serv_tempo
             FROM agenda a
             JOIN servicos s ON s.idservicos = a.agend_idservicos
             WHERE a.agend_idempresario = ?
               AND DATE(a.agend_horario) = ?
               AND a.agend_status != 'cancelado'"
        );
        $stmt->bind_param('is', $idEmpresario, $data);
        $stmt->execute();
        $ocupados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        // Monta intervalos ocupados em segundos (desde 00:00)
        $intervalosOcupados = [];
        foreach ($ocupados as $ag) {
            $inicio = strtotime(date('H:i:s', strtotime($ag['agend_horario'])));
            $fim = $inicio + $this->horaParaSegundos($ag['serv_tempo']);
            $intervalosOcupados[] = [$inicio, $fim];
        }

        // 4) Gera os slots dentro do expediente, pulando os ocupados
        $inicioExpediente = strtotime($expediente['horarios_hora_inicio']);
        $fimExpediente = strtotime($expediente['horarios_hora_fim']);

        $disponiveis = [];
        for ($slot = $inicioExpediente; $slot + $duracaoSegundos <= $fimExpediente; $slot += $duracaoSegundos) {
            $slotFim = $slot + $duracaoSegundos;
            $livre = true;

            foreach ($intervalosOcupados as [$ocupInicio, $ocupFim]) {
                if ($slot < $ocupFim && $slotFim > $ocupInicio) {
                    $livre = false;
                    break;
                }
            }

            // Se a data for hoje, não mostra horário que já passou
            if ($livre && $data === date('Y-m-d') && $slot <= time() - strtotime(date('Y-m-d'))) {
                $livre = false;
            }

            if ($livre) {
                $disponiveis[] = date('H:i', $slot);
            }
        }

        return $disponiveis;
    }

    /**
     * Cria um novo agendamento, validando se o horário ainda está livre.
     * Retorna o id do agendamento criado, ou lança Exception se o horário
     * não estiver mais disponível (evita agendamento duplicado/conflito).
     */
    public function criarAgendamento(int $idUsuario, int $idEmpresario, int $idServico, string $dataHora): int
    {
        $data = date('Y-m-d', strtotime($dataHora));
        $hora = date('H:i', strtotime($dataHora));

        $livres = $this->getHorariosDisponiveis($idEmpresario, $data, $idServico);

        if (!in_array($hora, $livres, true)) {
            throw new Exception('Esse horário não está mais disponível. Escolha outro.');
        }

        $stmt = $this->conn->prepare(
            "INSERT INTO agenda (agend_horario, agend_status, agend_idusuarios, agend_idempresario, agend_idservicos)
             VALUES (?, 'pendente', ?, ?, ?)"
        );
        $dataHoraFormatada = date('Y-m-d H:i:s', strtotime($dataHora));
        $stmt->bind_param('siii', $dataHoraFormatada, $idUsuario, $idEmpresario, $idServico);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();

        return $id;
    }

    /**
     * Cancela um agendamento (soft cancel — mantém o histórico).
     */
    public function cancelarAgendamento(int $idAgenda): bool
    {
        $stmt = $this->conn->prepare("UPDATE agenda SET agend_status = 'cancelado' WHERE idagenda = ?");
        $stmt->bind_param('i', $idAgenda);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    /**
     * Confirma um agendamento pendente.
     */
    public function confirmarAgendamento(int $idAgenda): bool
    {
        $stmt = $this->conn->prepare("UPDATE agenda SET agend_status = 'confirmado' WHERE idagenda = ?");
        $stmt->bind_param('i', $idAgenda);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    /**
     * Lista os agendamentos de um empresário em uma data específica.
     */
    public function listarPorEmpresarioEData(int $idEmpresario, string $data): array
    {
        $stmt = $this->conn->prepare(
            "SELECT a.idagenda, a.agend_horario, a.agend_status,
                    u.user_nome, u.user_telefone,
                    s.serv_nome, s.serv_valor, s.serv_tempo
             FROM agenda a
             JOIN usuarios u ON u.idusuarios = a.agend_idusuarios
             JOIN servicos s ON s.idservicos = a.agend_idservicos
             WHERE a.agend_idempresario = ? AND DATE(a.agend_horario) = ?
             ORDER BY a.agend_horario ASC"
        );
        $stmt->bind_param('is', $idEmpresario, $data);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $resultado;
    }

    /**
     * Lista os agendamentos de um cliente (histórico / próximos).
     */
    public function listarPorUsuario(int $idUsuario): array
    {
        $stmt = $this->conn->prepare(
            "SELECT a.idagenda, a.agend_horario, a.agend_status,
                    e.empre_tipo, e.empre_cidade,
                    s.serv_nome, s.serv_valor
             FROM agenda a
             JOIN empresario e ON e.idempresario = a.agend_idempresario
             JOIN servicos s ON s.idservicos = a.agend_idservicos
             WHERE a.agend_idusuarios = ?
             ORDER BY a.agend_horario DESC"
        );
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $resultado;
    }

    private function horaParaSegundos(string $hora): int
    {
        [$h, $m, $s] = array_map('intval', explode(':', $hora));
        return $h * 3600 + $m * 60 + $s;
    }
}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Agenda</title>
</head>
<body>
    <!-- PÁGINA PRINCIAPL, REDIRECIONAR PRA CÁ AO FAZER LOGIN E CAD -->

    <nav>
        <ul>
            <li><a target="index.html">Início</a></li>
            <li><a target="agenda.html">Agenda</a></li>
            <li><a target="servicos.html">Serviços</a></li>
        </ul>
    </nav>

    <!-- estou pesquisando como fazer um nav bar mais eficiente e preferencialmente, sem precisar de iframe -->
</body>
</html>

?>