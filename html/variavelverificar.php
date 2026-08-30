<?php
session_start();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_SESSION['tipo'])) {
        if ($_SESSION['tipo'] == "admin" || $_SESSION['id'] == $id) {
            require_once "../conexao.php";

            $sql = "SELECT * FROM usuarios WHERE idusuarios = ?";
            $comando = mysqli_prepare($conexao, $sql);
    
            mysqli_stmt_bind_param($comando, 'i', $id);
            mysqli_stmt_execute($comando);
    
            $resultados = mysqli_stmt_get_result($comando);
    
            $usuario = mysqli_fetch_assoc($resultados);
    
            $nome = $usuario['user_nome'];
            $email = $usuario['user_email'];
            $senha = $usuario['user_senha'];
            $telefone = $usuario['user_telefone'];
            $fotos = $usuario['user_fotos'];
            $editar_tipo = $usuario['usuario_tipo'];

        }

    }
}
else {
    
    $id = 0;
    $nome = "";
    $email = "";
    $senha = "";
    $telefone = "";
    $fotos = "";
}

// (eu acho) Isso daí é pra diferenciar empresário de cliente na hora do cadastro-->

?>