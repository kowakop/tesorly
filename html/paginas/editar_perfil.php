<?php
session_start();
require_once ("../conexao.php");
require_once '../funcoes.php';
verificarLogin();

echo "<h1> Editar Perfil </h1>";
editaruser($conexao, $_SESSION['id'], $_POST['user_nome'], $_POST['user_email'], $_POST['user_telefone'], $_POST['user_fotos']);
?>