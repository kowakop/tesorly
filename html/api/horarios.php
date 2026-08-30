<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../classes/Agenda.php';

$conn = conexao();
$acao = $_GET['acao'] ?? '';

try {
    if ($acao === 'listar_base') {
        // Lista profissionais e serviços para popular os selects
        $empresarios = $conn->query(
            "SELECT idempresario, empre_tipo AS nome FROM empresario"
        )->fetch_all(MYSQLI_ASSOC);

        $servicos = $conn->query(
            "SELECT idservicos, serv_nome AS nome, serv_valor AS valor, serv_tempo FROM servicos"
        )->fetch_all(MYSQLI_ASSOC);

        echo json_encode([
            'empresarios' => $empresarios,
            'servicos'    => $servicos,
        ]);
        exit;
    }

    if ($acao === 'horarios_disponiveis') {
        $idEmpresario = (int)($_GET['idempresario'] ?? 0);
        $idServico    = (int)($_GET['idservico'] ?? 0);
        $data         = $_GET['data'] ?? '';

        if (!$idEmpresario || !$idServico || !$data) {
            http_response_code(400);
            echo json_encode(['erro' => 'Parâmetros incompletos.']);
            exit;
        }

        $agenda = new Agenda($conn);
        $horarios = $agenda->getHorariosDisponiveis($idEmpresario, $data, $idServico);

        echo json_encode(['horarios' => $horarios]);
        exit;
    }

    http_response_code(400);
    echo json_encode(['erro' => 'Ação inválida.']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['erro' => $e->getMessage()]);
}