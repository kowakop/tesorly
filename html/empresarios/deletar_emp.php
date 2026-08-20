<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

echo "<h3>Deletar Empresários</h3>";
$deletado = deletarempresario($conexao, 1);
if($deletado){
    echo "Empresário deletado com sucesso.";
}else{
    echo "Erro ao deletar empresário. Verifique se o empresário está cadastrado.";
}
    
?>