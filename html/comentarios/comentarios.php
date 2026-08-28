<?php
session_start();
require_once '../funcoes.php';
verficarLogin();

$mensagem = "";

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../usuarios/cadastrosuser.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $coment_text = $_POST['coment_text'] ?? '';
    $coment_idusuario = $_SESSION['coment_idusuario'];
    $coment_estrela = $_POST['coment_estrela'] ?? '';
    

    $resultado = salvarcomentarios($conexao, $coment_text, $coment_idusuario, $coment_estrela, $cidade);

    if ($resultado) {
        unset($_SESSION['id_usuario']);
        $mensagem = "Comentário enviado com sucesso!";
    } else {
        $mensagem = "Erro ao comentar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <p>
        <label>comentario: </label><br>
        <input type="text" name="coment_text" required>
    </p>
    <button type="submit" name="enviar">Enviar Comentário</button>
</form>
</body>
</html>