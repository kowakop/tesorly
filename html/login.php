<!-- 
 ⊹
⢠⡏⠉⠑⢄⠀ ⠀  ⡠⠋⠉⢱⡀
⡇⠙⠒⠒⠬⡗⢒⢮⠄⠒⠒⠁⢣
⠇⠀⠈⠁⢁⡷⠤⢮⠈⠁⠀⠀⡌
⠘⢄⣀⡰⢻⠁⠀⠘⡕⢄⣀⡰⠁⠀⊹   LOGIN PRONTO - SÓ FALTA O CSS
⠀⡎⠘⢀⠇⠀⠀⠀⢱⠈⠂⠡⠀
⠀⠑⢄⡜⠢⡀⠀⢀⠔⠇⡴⠃⠀
⠀⠀⠀⠑⠠⠚⠀⠓⠔⠋⠀⠀
⊹
-->

<?php
    //session_start();
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
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Login - Tesorly</title> 
</style>
</head>
<body>

    

    <!-- html de login pronto -->

<body>
    <form method="POST">
        <h3>Login</h3>

        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <button type="submit" name="enviar">Login</button>
    </form>
    
</body>
</html>

<!--tutorial como fazer mensagem de erro: https://youtu.be/k7iMlH5YyK8?si=ZiaDmL6m7rjyIRq3-->