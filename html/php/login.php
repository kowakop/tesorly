<?php
    //require_once "funcoes.php";
    //require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Login - Tesorly</title>
    <style>
    /* ==========================================================
   Tesorly - style.css (página de Login)
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

/* ---------- cabeçalho (logo Sarolau + título + voltar) ---------- */
header {
    width: 100%;
    max-width: 420px;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 32px;
}

header img[alt="Logo Sarolau"] {
    width: 32px;
    height: 32px;
}

header h1 {
    font-size: 1.1rem;
    color: #4A2D5C;
    font-weight: 600;
}

header button {
    margin-left: auto;
    background: transparent;
    border: none;
    font-size: 1rem;
    cursor: pointer;
}

header button a {
    text-decoration: none;
}

/* ---------- avatar do usuário ---------- */
#user-logo {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    object-fit: cover;
    background: #D9D3EA;
    padding: 14px;
    margin-bottom: 16px;
}

/* título de boas-vindas (segundo h1 da página) */
body > h1 {
    color: #2E2340;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 28px;
    text-align: center;
}

/* ---------- card do formulário ---------- */
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

.form-content input[type="email"],
.form-content input[type="password"],
.form-content input[type="text"] {
    padding: 12px 16px;
    border: 1px solid #E1DCEF;
    border-radius: 10px;
    background: #F7F5FC;
    font-size: 0.95rem;
    color: #333;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-content input::placeholder {
    color: #A9A3BB;
}

.form-content input:focus {
    border-color: #6B2F5C;
    box-shadow: 0 0 0 3px rgba(107, 47, 92, 0.15);
    background: #fff;
}

/* ---------- linha "mostrar senha" / "lembrar senha" ---------- */
.form-content:has(.mostrarSenha) {
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.mostrarSenha,
.form-content > div:not(.mostrarSenha) {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    color: #555;
}

.mostrarSenha input[type="checkbox"],
.form-content > div:not(.mostrarSenha) input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: #6B2F5C;
    cursor: pointer;
}

/* toggle estilo "switch" para lembrar senha (visual do print) */
#lembrar-senha {
    appearance: none;
    width: 36px;
    height: 20px;
    border-radius: 999px;
    background: #D9D3EA;
    position: relative;
    cursor: pointer;
    transition: background 0.2s ease;
}

#lembrar-senha::before {
    content: "";
    position: absolute;
    top: 2px;
    left: 2px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #fff;
    transition: transform 0.2s ease;
}

#lembrar-senha:checked {
    background: #6B2F5C;
}

#lembrar-senha:checked::before {
    transform: translateX(16px);
}

/* ---------- esqueci a senha ---------- */
.password {
    text-align: right;
    font-size: 0.8rem;
    margin-top: -8px;
}

.password a {
    color: #6B2F5C;
    text-decoration: none;
    font-weight: 600;
}

.password a:hover {
    text-decoration: underline;
}

/* ---------- botão entrar ---------- */
#form button[type="submit"] {
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

#form button[type="submit"]:hover {
    background: #4A2043;
}

#form button[type="submit"]:active {
    transform: scale(0.98);
}

/* ---------- link para cadastro ---------- */
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

/* ---------- responsivo ---------- */
@media (max-width: 480px) {
    #form {
        padding: 28px 20px;
    }

    body > h1 {
        font-size: 1.3rem;
    }
} 
</style>
</head>
<body>

    <!-- html de login pronto -->

    <?php
session_start();
require_once "funcoes.php";

if (isset($_POST['enviar'])){

    $cpf = $_POST['email']??'';
    $senha = $_POST['senha']??'';

    $sucesso = login($conexao, $email, $senha);

    if ($sucesso === true){
        header("Location: index.php");
        exit;
    } elseif($sucesso === false){
        echo "Email ou senha incorretos.";
    } elseif($sucesso === "erro"){
        echo "Ocorreu um erro ao realizar o login.";
    }

}
?>

<body>
    <form method="POST">
        <h3>Login</h3>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>
        <button type="submit" name="enviar">Login</button>
    </form>
    
</body>
</html>

<!--tutorial como fazer mensagem de erro: https://youtu.be/k7iMlH5YyK8?si=ZiaDmL6m7rjyIRq3-->