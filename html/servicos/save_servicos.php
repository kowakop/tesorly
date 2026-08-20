<?php

include 'conexao.php';

$servico = $_POST['servico'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$tempo = $_POST['tempo'];
$foto = $_POST['foto'];

$sql = "INSERT INTO servicos
(servicos, valor, descricao, tempo, foto)
VALUES (?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sss",
    $servico,
    $valor,
    $descricao,
    $tempo,
    $foto

);

if (mysqli_stmt_execute($comando)) {
    echo "Serviços cadastrados com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_stmt_close($comando);
mysqli_close($conexao);

?>