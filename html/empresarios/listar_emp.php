<?php
session_start();
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Empresários Cadastrados </h2>";
$empresario = listarempresario($conexao);
while($empresarios = $empresarios->fetch_assoc()){
    print_r($empresarios);
    echo "<br>";
}

?>