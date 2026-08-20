<?php

include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$telefone = $_POST['telefone'];
$fotos = $_POST['fotos'];

$sql = "INSERT INTO usuarios
(user_nome, user_email, user_senha, user_telefone, user_fotos)
VALUES (?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sssss",
    $nome,
    $email,
    $senha,
    $telefone,
    $fotos
);

if (mysqli_stmt_execute($comando)) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_stmt_close($comando);
mysqli_close($conexao);

?>