<?php
ob_start();
require_once '../funcoes.php';
verificarLogin();


echo "<h2> Empresários Cadastrados </h2>";
$empresario = listarEmpresarios($conexao);
while($empresarios = $empresario->fetch_assoc()){
    print_r($empresarios);
    echo "<br>";
}

?>
