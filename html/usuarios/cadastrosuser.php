<!-- 
⊹
⢠⡏⠉⠑⢄⠀ ⠀  ⡠⠋⠉⢱⡀
⡇⠙⠒⠒⠬⡗⢒⢮⠄⠒⠒⠁⢣
⠇⠀⠈⠁⢁⡷⠤⢮⠈⠁⠀⠀⡌
⠘⢄⣀⡰⢻⠁⠀⠘⡕⢄⣀⡰⠁⠀⊹   CADASTRO FUNCIONANDO (ARRUMAR O ADM) - SÓ FALTA O CSS
⠀⡎⠘⢀⠇⠀⠀⠀⢱⠈⠂⠡⠀
⠀⠑⢄⡜⠢⡀⠀⢀⠔⠇⡴⠃⠀
⠀⠀⠀⠑⠠⠚⠀⠓⠔⠋⠀⠀
⊹
-->

<?php

?>

<!DOCTYPE html>
<html lang="en" class="html-cadastro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro - Tesorly</title>
</head>
<body class="body-cadastro">
        <h1 class="h1_cadastro">Cadastro</h1>

        <button class="butao_cadastro"><a href="../index.php">◀️</a></button>

        <img src="logo_tesorly.png" alt="Logo Tesorly" class="logotesorly_cadastro">

        <img src="../imagens/cabelo.png" alt="foto mulher" class="foto_cadastro">

    <form action="../saves/save_user.php" method="post" id="form" class="form_cadastro">

        <div class="form-content-cadastro">
            <label for="name" class="label-cadastro">Nome Completo:</label>
            <input type="text" id="name" name="nome" class="input-cadastro">
        </div>

        <div class="form-content-cadastro">
            <label for="email" class="label-cadastro">Email:</label>
            <input type="email" id="email" name="email" class="input-cadastro">
        </div>

        <div class="form-content-cadastro">
            <label for="telefone" class="label-cadastro">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" class="input-cadastro">
        </div>

        <div class="form-content-cadastro">
            <label for="senha" class="label-cadastro">Senha:</label>
            <input type="password" id="senha" name="senha" class="input-cadastro">
        </div>
        
        <div class="form-content-cadastro">
            <div class="mostrarSenha">
                <input type="checkbox" id="mostrar-senha" name="mostrar-senha" class="input-cadastro">
                <label for="mostrar-senha" class="label-cadastro">Mostrar Senha</label>
            </div>
        </div>

        <div>
            <input type="checkbox" id="sou_emp" name="sou_emp" class="input-cadastro">
            <label for="sou_emp" class="label-cadastro">Sou empresário</label>
        </div>

        <div class="registro-cadastro">
            <p class="login-cadastro">Já tem uma conta? <a href="../php/login.php">Faça login</a></p>
        </div>

        <input type="submit" value="Cadastrar" id="cadastro" class="submit-cadastro">
    </form>


    <!-- Script para redirecionar ao clicar no checkbox (TEM QUE TROCAR ISSO DAQUI)-->
    <script>
        document.getElementById('sou_emp').onclick = function() {
        const senha = document.getElementById('senha');
    const mostrarSenha = document.getElementById('mostrar-senha');

    mostrarSenha.addEventListener('click', function() {
        senha.type = mostrarSenha.checked ? 'text' : 'password';
    });
}
    </script>

</body>
</html>