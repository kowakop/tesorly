<?php

include 'conexao.php';

$coment_texto = $_POST['coment_texto'];
$coment_idusuarios = $_POST['coment_idusuarios'];
$comentarios_estrela = $_POST['comentarios_estrela'];

$sql = "INSERT INTO comentarios
(coment_texto, coment_usuarios, coementarios_estrela)
VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sii",
    $coment_texto,
    $coment_idusuarios,
    $comentarios_estrela
);

if (mysqli_stmt_execute($comando)) {
    echo "Comentários publicado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_stmt_close($comando);
mysqli_close($conexao);

?>