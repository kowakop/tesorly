<?php
ob_start();
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Empresários Cadastrados </h2>";
$empresario = listarempresario($conexao);
foreach($empresario as $empresario){
    print_r($empresario);
    echo "<br>";
}

