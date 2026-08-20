<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

echo "<h3>Deletar Produto</h3>";
$deletado = deletarprodutos($conexao, 1);
if($deletado){
    echo "Produto deletado com sucesso.";
}else{
    echo "Erro ao deletar produto. Verifique se o produto está cadastrado.";
}
    
?>