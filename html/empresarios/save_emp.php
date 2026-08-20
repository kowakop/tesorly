<?php

include 'conexao.php';

$tipo = $_POST['tipo'];
$diastrabalho = $_POST['diastrabalho'];
$cidade = $_POST['cidade'];

$sql = "INSERT INTO empresario
(tipo, diastrabalho, cidade)
VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sss",
    $tipo,
    $diastrabalho,
    $cidade
);

if (mysqli_stmt_execute($comando)) {
    echo "Empresário cadastrado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_stmt_close($comando);
mysqli_close($conexao);

?>