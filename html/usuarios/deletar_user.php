<?php

session_start();
require_once '../conexao.php';
require_once '../funcoes.php';
verificarLogin();

echo "<h3>Deletar Usuário</h3>";
$deletado = deletaruser($conexao, 1);
if($deletado){
    echo "Usuário deletado com sucesso.";
}else{
    echo "Erro ao deletar usuário. Verifique se o usuário está cadastrado.";
}
    
?>