<?php

include("../conexao.php");
include("../funcoes.php");

echo "<h3>Deletar Serviços</h3>";
$deletado = deletarservico($conexao, 1);
if($deletado){
    echo "Serviços deletado com sucesso.";
}else{
    echo "Erro ao deletar serviço . Verifique se o serviço está cadastrado.";
}
    
?>