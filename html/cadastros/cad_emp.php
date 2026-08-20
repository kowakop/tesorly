<?php

include("../conexao.php");
include("../funcoes/funcoes.php");

$tipo = $_POST['tipo'];
$dias_trab = $_POST['dias_trab'];
$cidade = $_POST['cidade'];

$resultado = salvarempresario($conexao, $tipo, $dias_trab, $cidade);

if($resultado){
    echo "empresario cadastrado";
}else{
    echo "Erro ao cadastrar";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Sou Empresário Tesorly</title>
</head>
<body>
    <p>Equipe Sarolau</p>
    
    <button><a href="cadastro.html">◀️</a></button>

    <img src="logo_tesorly.png" alt="Logo Tesorly">

    <img src="foto.png" alt="foto produtos">

    <form action="" method="post">

        <div class="form-content">
            <label for="name">Nome de Usuário</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-content">
            <label for="name">Tipo de Salão</label>
            <input type="text" id="marca" name="marca">
        </div>

        <div class="form-content">
            <label for="name">Cidade</label>
            <input type="text" id="cidade" name="cidade">
        </div>
        
        <!-- IMPORTAR!!!!!! -->
        
        <div class="form-content">
            <label for="name">Dias de Trabalho</label>
            <input type="text" id="daywork" name="daywork">
        </div>

        <div class="form-content">
            <label for="name">Horários Semanais</label>
            <input type="text" id="horarios" name="horarios">
        </div>

        <input type="submit" value="Finalizar Cadastro" id="cadastro">
    </form>
</body>
</html>