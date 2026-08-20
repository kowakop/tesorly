<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

echo "<h3>Deletar Usuário</h3>";
$deletado = deletaruser($conexao, 1);
if($deletado){
    echo "Usuário deletado com sucesso.";
}else{
    echo "Erro ao deletar usuário. Verifique se o usuário está cadastrado.";
}
    
?>