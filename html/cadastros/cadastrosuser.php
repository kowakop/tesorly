<?php

//include("../conexao.php");
// include("../func/funcoes.php");

<<<<<<< HEAD:html/cadastros/cadastros.php
//$nome = $_POST['nome'];
//$email = $_POST['email'];
//$telefone = $_POST['telefone'];
//$senha = $_POST['senha'];
//
//$resultado = salvarusuarios($conexao, $nome, $email, $senha, $telefone);
//
//if($resultado){
//    echo "Usuário cadastrado";
//}else{
//    echo "Erro ao cadastrar";
//}
//
//session_start();
//
//if (isset($_GET['id'])) {
//
//    $id = $_GET['id'];
//
//    if (isset($_SESSION['tipo'])) {
//        if ($_SESSION['tipo'] == "admin" || $_SESSION['id'] == $id) {
//            require_once "../conexao.php";
//
//            $sql = "SELECT * FROM usuario WHERE usuario_id = ?";
//            $comando = mysqli_prepare($conexao, $sql);
//    
//            mysqli_stmt_bind_param($comando, 'i', $id);
//            mysqli_stmt_execute($comando);
//    
//            $resultados = mysqli_stmt_get_result($comando);
//    
//            $usuario = mysqli_fetch_assoc($resultados);
//    
//            $nick = $usuario['usuario_nick'];
//            $nome = $usuario['usuario_nome'];
//            $nascimento = $usuario['usuario_data_nasc'];
//            $email = $usuario['usuario_email'];
//            $senha = $usuario['usuario_senha'];
//            $editar_tipo = $usuario['usuario_tipo'];
//
//        }
//
//    }
//}
//else {
//    
//    $id = 0;
//    $nick = "";
//    $nome = "";
//    $email = "";
//    $nascimento = "";
//    $senha = "";
//}
//
////editar as variaveis dps que fizer o banco. Isso daí é pra diferenciar empresário de cliente na hora do cadastro
=======
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$fotos = $_POST['fotos'];



$resultado = salvarusuarios($conexao, $nome, $email, $senha, $telefone, $fotos);

if($resultado){
    echo "Usuário cadastrado";
}else{
    echo "Erro ao cadastrar";
}

session_start();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_SESSION['tipo'])) {
        if ($_SESSION['tipo'] == "admin" || $_SESSION['id'] == $id) {
            require_once "../conexao.php";

            $sql = "SELECT * FROM usuario WHERE usuario_id = ?";
            $comando = mysqli_prepare($conexao, $sql);
    
            mysqli_stmt_bind_param($comando, 'i', $id);
            mysqli_stmt_execute($comando);
    
            $resultados = mysqli_stmt_get_result($comando);
    
            $usuario = mysqli_fetch_assoc($resultados);
    
            $nick = $usuario['usuario_nick'];
            $nome = $usuario['usuario_nome'];
            $nascimento = $usuario['usuario_data_nasc'];
            $email = $usuario['usuario_email'];
            $senha = $usuario['usuario_senha'];
            $editar_tipo = $usuario['usuario_tipo'];

        }

    }
}
else {
    
    $id = 0;
    $nick = "";
    $nome = "";
    $email = "";
    $nascimento = "";
    $senha = "";
};

//editar as variaveis dps que fizer o banco. Isso daí é pra diferenciar empresário de cliente na hora do cadastro
>>>>>>> 93908c6c967f8a57318604bcc2f208aa9141064a:html/cadastros/cadastrosuser.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="../script.js" defer></script>
    <title>Cadastro - Tesorly</title>
    <style>/* ==========================================================
   Tesorly - style.css (página de Cadastro)
   Baseado no protótipo Figma (tema roxo/lavanda)
   ========================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
}

body {
    min-height: 100vh;
    background: #ECE7F6; /* lavanda claro de fundo */
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 16px 60px;
}

h1 {
    color: #4A2D5C;
    font-size: 2rem;
    margin-bottom: 12px;
    text-align: center;
}

/* botão de voltar (seta) */
body > button {
    align-self: flex-start;
    background: transparent;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    margin-bottom: 8px;
}

body > button a {
    text-decoration: none;
}

/* logo Tesorly */
img[alt="Logo Tesorly"] {
    width: 180px;
    margin-bottom: 8px;
}

/* imagem decorativa (mulher) */
img[alt="foto mulher"] {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
}

/* card do formulário */
#form {
    background: #FFFFFF;
    width: 100%;
    max-width: 420px;
    padding: 40px 36px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(74, 45, 92, 0.15);
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.form-content {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-content label {
    font-size: 0.85rem;
    color: #6b6b7a;
    font-weight: 600;
}

.form-content input[type="text"],
.form-content input[type="email"],
.form-content input[type="tel"],
.form-content input[type="password"] {
    padding: 12px 16px;
    border: 1px solid #E1DCEF;
    border-radius: 10px;
    background: #F7F5FC;
    font-size: 0.95rem;
    color: #333;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-content input:focus {
    border-color: #6B2F5C;
    box-shadow: 0 0 0 3px rgba(107, 47, 92, 0.15);
    background: #fff;
}

/* checkboxes (mostrar senha / sou empresário) */
.mostrarSenha,
#form > div:not(.form-content) {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    color: #555;
}

.mostrarSenha input[type="checkbox"],
#form > div:not(.form-content) input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: #6B2F5C;
    cursor: pointer;
}

/* link para login */
.registro {
    text-align: center;
    font-size: 0.85rem;
    color: #555;
}

.registro a {
    color: #6B2F5C;
    font-weight: 600;
    text-decoration: none;
}

.registro a:hover {
    text-decoration: underline;
}

/* botão de cadastro */
#cadastro {
    margin-top: 6px;
    background: #5A2751;
    color: #fff;
    border: none;
    padding: 14px;
    border-radius: 999px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.1s ease;
}

#cadastro:hover {
    background: #4A2043;
}

#cadastro:active {
    transform: scale(0.98);
}

/* responsivo */
@media (max-width: 480px) {
    #form {
        padding: 28px 20px;
    }

    h1 {
        font-size: 1.6rem;
    }
}
</style>
</head>
<body>
        <h1>Cadastro</h1>

        <button><a href="../index.php">◀️</a></button>

        <img src="logo_tesorly.png" alt="Logo Tesorly">

        <img src="cabelo.png" alt="foto mulher">

    <form action="../saves/save_user.php" method="post" id="form">

        <div class="form-content">
            <label for="name">Nome Completo:</label>
            <input type="text" id="name" name="nome">
        </div>

        <div class="form-content">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>

        <div class="form-content">
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone">
        </div>

        <div class="form-content">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
        </div>

        <div class="form-content">
                <label for="senha">Confirmar Senha:</label>
                <input type="password" id="senha" name="senha">
        </div>
        
        <div class="form-content">
            <div class="mostrarSenha">
                <input type="checkbox" id="mostrar-senha" name="mostrar-senha">
                <label for="mostrar-senha">Mostrar Senha</label>
            </div>
        </div>

        <div>
            <input type="checkbox" id="sou_emp" name="sou_emp">
            <label for="sou_emp">Sou empresário</label>
        </div>

        <div class="registro">
            <p>Já tem uma conta? <a href="../php/login.php">Faça login</a></p>
        </div>

        <input type="submit" value="Cadastrar" id="cadastro">
    </form>

    <!-- Script para redirecionar ao clicar no checkbox -->
    <script>
        document.getElementById('sou_emp').onclick = function() {
        if (this.checked) {
        window.location.href = 'cad_emp.html';
        }
    };

    const senha = document.getElementById('senha');
    const mostrarSenha = document.getElementById('mostrar-senha');

    mostrarSenha.addEventListener('click', function() {
        if (mostrarSenha.checked) {
            senha.type = 'text';
        } 
        
        else {
            senha.type = 'password';
        }
    });
    </script>

</body>
</html>