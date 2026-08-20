<?php
session_start();
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Serviços Cadastrados </h2>";
$servico = listarservico($conexao);
while($servicos = $servicos->fetch_assoc()){
    print_r($servicos);
    echo "<br>";
}

?>