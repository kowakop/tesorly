<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$fotos = $_POST['fotos'];
$empresario_idempresario = $_POST['empresario'];




$resultado = salvarprodutos($conexao, $nome, $marca, $fotos, $empresario_idempresario);

if($resultado){
    echo "produto cadastrado";
}else{
    echo "Erro ao cadastrar";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>

    <p>Equipe Sarolau</p>
    
    <button><a href="index.html">◀️</a></button>

    <img src="logo_tesorly.png" alt="Logo Tesorly">

    <img src="foto.png" alt="foto produtos">

    <form action="arquivo.php" method="post" enctype="multipart/form-data">

        <div class="form-content">
            <label for="produto"> produto:</label>
            <input type="text" id="produto" name="produto">
        </div>

        <div class="form-content">
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor">
        </div>

        <div class="form-content">
            <label for="pic">Fotos:</label>
            <input type="file" id="pic" name="pic">
        </div>


        <input type="submit" value="Adicionar Produto" id="add_prod"><a href="cad_prod.html">Adicionar Produto</a>
        <input type="submit" value="Finalizar Cadastro" id="cadastro">
    </form>
</body>
</html>