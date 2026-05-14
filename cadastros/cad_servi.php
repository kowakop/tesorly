<?php

include("../conexao.php");
include("../funcoes/funcoes.php");
$servico = $_POST['service'];
$valor = $_POST['valor'];
$descricao = $_POST['desc'];
$tempo = $_POST['time'];
$produto = $_POST['prod'];
$foto = $_FILES['pic']['name'];
$resultado = salvarServico($conexao,$servico,$valor,$descricao,$tempo,$foto,$produto);

if($resultado){
    echo "Serviço cadastrado";
}else{
    echo "Erro ao cadastrar";
}