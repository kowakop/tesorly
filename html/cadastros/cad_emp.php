<?php
session_start();

require_once("../conexao.php");
require_once("../funcoes.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: cadastro.php");
    exit;
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_usuario = $_SESSION['id_usuario'];
    $tipo = $_POST['empre_tipo'] ?? '';
    $dias_trab = $_POST['empre_dias_trab'] ?? '';
    $cidade = $_POST['empre_cidade'] ?? '';

    $resultado = salvarempresario($conexao, $id_usuario, $tipo, $dias_trab, $cidade);

    if ($resultado) {
        unset($_SESSION['id_usuario']);
        $mensagem = "Empresário cadastrado com sucesso!";
    } else if (mysqli_errno($conexao) == 1062) {
        // 1062 = violação de UNIQUE (esse usuário já tem cadastro de empresário)
        $mensagem = "Este usuário já possui um cadastro de empresário.";
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

    <button><a href="cadastro.php">◀️</a></button>

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