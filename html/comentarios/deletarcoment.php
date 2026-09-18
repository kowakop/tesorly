<?php

session_start();
require_once '../conexao.php';
require_once '../funcoes.php';
verificarLogin();

echo "<h3>Deletar Comentário</h3>";
$deletado = deletarcomentarios($conexao, 1);
if($deletado){
    echo "Comentário deletado com sucesso.";
}else{
    echo "Erro ao deletar comentário.";
}
    
?>