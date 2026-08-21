<?php
    ob_start();
    session_start();
    require_once "funcoes.php";

    if (isset($_POST['enviar'])){

    $email = $_POST['email']??'';
    $senha = $_POST['senha']??'';
    $telefone = $_POST['telefone']??'';
    $nome = $_POST['nome']??'';

    $sucesso = login($conexao, $email, $senha, $telefone, $nome);

    if ($sucesso === true){
        header("Location: agendamento/agendaprincipal.php");
        exit;
    } elseif($sucesso === false){
        echo "Email ou senha incorretos.";
    } elseif($sucesso === "erro"){
        echo "Ocorreu um erro ao realizar o login.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="script.js" defer></script>
    <title>Login - Tesorly</title> 
</style>
</head>
<body class="login_body">
    <form method="POST" action="login.php" class="login_form">
        <h3 class="login_title">Login</h3>

        <label class="login_label">Nome:</label>
        <input type="text" name="nome" required class="login_input">

        <label class="login_label">Email:</label>
        <input type="email" name="email" required class="login_input">

        <label class="login_label">Telefone:</label>
        <input type="text" name="telefone" required class="login_input">

        <label class="login_label">Senha:</label>
        <input type="password" name="senha" required id="senha" class="login_input">

        <button type="button" class="login_button_password" onclick="const i=document.getElementById('senha'); i.type = i.type === 'password' ? 'text' : 'password';">👁</button>


        <button type="submit" name="enviar" class="login_button">Login</button>
    </form>
    
</body>
</html>

<!--tutorial como fazer mensagem de erro: https://youtu.be/k7iMlH5YyK8?si=ZiaDmL6m7rjyIRq3-->

<!-- 
⠀⠀⠀⠀⠀⠀⠀⠀⣠⣴⣶⡋⠉⠙⠒⢤⡀⠀⠀⠀⠀⠀⢠⠖⠉⠉⠙⠢⡄⠀
⠀⠀⠀⠀⠀⠀⢀⣼⣟⡒⠒⠀⠀⠀⠀⠀⠙⣆⠀⠀⠀⢠⠃⠀⠀  ⠀⠀⠹⡄
⠀⠀⠀⠀⠀⠀⣼⠷⠖⠀⠀⠀⠀⠀⠀⠀⠀⠘⡆⠀⠀⡇⠀⠀⠀⠀  ⠀⠀⢷
⠀⠀⠀⠀⠀⠀⣷⡒⠀⠀⢐⣒⣒⡒⠀⣐⣒⣒⣧⠀⠀⡇         ⢸
⠀⠀⠀⠀⠀⢰⣛⣟⣂⠀⠘⠤⠬⠃⠰⠑⠥⠊⣿⠀⢴⠃⠀Ok..⠀  ⢸
⠀⠀⠀⠀⠀⢸⣿⡿⠤⠀⠀⠀⠀⠀⢀⡆⠀⠀⣿⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⣸
⠀⠀⠀⠀⠀⠈⠿⣯⡭⠀⠀⠀⠀⢀⣀⠀⠀⠀⡟⠀⠀⢸⠀⠀⠀⠀⠀⠀⢠⠏
⠀⠀⠀⠀⠀⠀⠀⠈⢯⡥⠄⠀⠀⠀⠀⠀⠀⡼⠁⠀⠀⠀⠳⢄⣀⣀⣀⡴⠃⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⢱⡦⣄⣀⣀⣀⣠⠞⠁⠀⠀⠀⠀⠀⠀⠈⠉⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⢀⣤⣾⠛⠃⠀⠀⠀⢹⠳⡶⣤⡤⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⣠⢴⣿⣿⣿⡟⡷⢄⣀⣀⣀⡼⠳⡹⣿⣷⠞⣳⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⢰⡯⠭⠹⡟⠿⠧⠷⣄⣀⣟⠛⣦⠔⠋⠛⠛⠋⠙⡆⠀⠀⠀⠀⠀⠀⠀
⠀⠀⢸⣿⠭⠉⠀⢠⣤⠀⠀⠀⠘⡷⣵⢻⠀⠀⠀⠀⣼⠀⣇⠀⠀⠀⠀⠀⠀⠀
⠀⠀⡇⣿⠍⠁⠀⢸⣗⠂⠀⠀⠀⣧⣿⣼⠀⠀⠀⠀⣯⠀⢸⠀⠀⠀⠀⠀⠀⠀
-->