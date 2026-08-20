<?php
session_start();
require_once '../funcoes.php';
verificarLogin();



echo "<h2> Produtos Cadastrados </h2>";
$produto = listarprodutos($conexao);
while($produtos = $produtos->fetch_assoc()){
    print_r($produtos);
    echo "<br>";
}

?>