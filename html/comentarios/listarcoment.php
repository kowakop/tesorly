<?php
session_start();
require_once '../conexao.php';
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Comentários Cadastrados </h2>";
$comentarios = listarcomentarios($conexao);

foreach ($comentarios as $comentario) {
    print_r($comentario);
    echo "<br>";
}

?>