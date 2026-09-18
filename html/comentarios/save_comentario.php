<?php
session_start();
require_once '../conexao.php';
require_once '../funcoes.php';
verificarLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /comentarios/cad_coment.php');
    exit;
}

$coment_texto = trim($_POST['coment_text'] ?? '');
$coment_idusuarios = $_SESSION['id_usuario'] ?? null;
$comentarios_estrela = $_POST['comentarios_estrela'] ?? null;

if ($coment_texto === '' || !$coment_idusuarios) {
    die('Dados inválidos ou usuário não autenticado.');
}

$sql = "INSERT INTO comentarios
(coment_text, coment_idusuarios, comentarios_estrela)
VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sii",
    $coment_texto,
    $coment_idusuarios,
    $comentarios_estrela
);

if (mysqli_stmt_execute($comando)) {
    echo "Comentário publicado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_stmt_close($comando);
mysqli_close($conexao);