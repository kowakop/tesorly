<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$resultado = salvarusuarios($conexao, $nome, $email, $senha, $telefone);

if($resultado){
    echo "Usuário cadastrado";
}else{
    echo "Erro ao cadastrar";
}