<?php
session_start();
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Usuários Cadastrados </h2>";
$usuario = listaruser($conexao);
while($usuarios = $usuarios->fetch_assoc()){
    print_r($usuario);
    echo "<br>";
}

?>