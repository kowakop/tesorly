<?php
session_start();

require("../conexao.php");
require("../funcoes.php");

if (isset($_POST['enviar'])) {

    $servico   = $_POST['servico'] ?? '';
    $valor     = $_POST['valor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $tempo     = $_POST['tempo'] ?? '';

    $nomeArquivo = uploadImg($_FILES['fotos'] ?? null);

    if ($nomeArquivo === false) {
        echo "Erro no upload da imagem. Verifique o formato (jpg, png, webp) e o tamanho (até 5MB).";
        exit;
    }

    $sucesso = salvarservico($conexao, $servico, $valor, $descricao, $tempo, $nomeArquivo);

    if ($sucesso) {
        echo "Serviço cadastrado com sucesso!";
    } else {
        echo "Erro no cadastro do serviço.";
    }
}
?>