<?php
session_start();
require_once '../conexao.php';
require_once '../funcoes.php';
verificarLogin();


$mensagem = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $coment_text = $_POST['coment_text'] ?? '';
    $idusuario = $_SESSION['id_usuario'] ?? null;

    if (!$idusuario) {
        $mensagem = "Usuário não autenticado.";
    } else {
        $resultado = salvarcomentarios($conexao, $coment_text, $idusuario);

        if ($resultado) {
            $mensagem = "Comentário enviado com sucesso!";
        } else {
            $mensagem = "Erro ao comentar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
</head>
<body>
    <form action="/comentarios/save_comentario.php" method="POST" enctype="multipart/form-data">
    <p>
        <label>comentario: </label><br>
        <input type="text" name="coment_text" required>
    </p>
    <button type="submit" name="enviar">Enviar Comentário</button>
</form>
</body>
</html>