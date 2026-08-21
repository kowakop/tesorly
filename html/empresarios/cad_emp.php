<?php

require_once("../conexao.php");
require_once("../funcoes.php");

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tipo = $_POST['empre_tipo'] ?? '';
    $dias_trab = $_POST['empre_dias_trab'] ?? '';
    $cidade = $_POST['empre_cidade'] ?? '';

    $resultado = salvarempresario($conexao, $tipo, $dias_trab, $cidade);

    if ($resultado) {
        $mensagem = "Empresário cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar.";
    }
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

    <?php if ($mensagem): ?>
        <p class="mensagem"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form action="" method="post">

        <div class="form-content">
            <label for="empre_tipo">Tipo de Salão</label>
            <input type="text" id="empre_tipo" name="empre_tipo" required>
        </div>

        <div class="form-content">
            <label for="empre_cidade">Cidade</label>
            <input type="text" id="empre_cidade" name="empre_cidade" required>
        </div>

        <div class="form-content">
            <label for="empre_dias_trab">Dias de Trabalho</label>
            <input type="text" id="empre_dias_trab" name="empre_dias_trab" required>
        </div>

        <input type="submit" value="Finalizar Cadastro" id="cadastro">
    </form>
</body>
</html>