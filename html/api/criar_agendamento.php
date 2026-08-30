<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../conexao.php';
require_once __DIR__ . '/../classes/Agenda.php';

if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Você precisa estar logado.']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

$idEmpresario = (int)($dados['idempresario'] ?? 0);
$idServico    = (int)($dados['idservico'] ?? 0);
$dataHora     = $dados['data_hora'] ?? '';
$idUsuario    = (int)$_SESSION['id'];

if (!$idEmpresario || !$idServico || !$dataHora) {
    http_response_code(400);
    echo json_encode(['erro' => 'Preencha profissional, serviço, data e horário.']);
    exit;
}

try {
    $conn = conexao();
    $agenda = new Agenda($conn);
    $id = $agenda->criarAgendamento($idUsuario, $idEmpresario, $idServico, $dataHora);

    echo json_encode(['sucesso' => true, 'idagenda' => $id]);
} catch (Exception $e) {
    http_response_code(409); // conflito: horário não está mais livre
    echo json_encode(['erro' => $e->getMessage()]);
}