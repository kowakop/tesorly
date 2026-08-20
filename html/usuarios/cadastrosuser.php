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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro - Tesorly</title>
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


    <!-- Script para redirecionar ao clicar no checkbox (TEM QUE TROCAR ISSO DAQUI)-->
    <script>
        document.getElementById('sou_emp').onclick = function() {
        if (this.checked) {
        window.location.href = 'cad_emp.html';
        }
    };

    // NÃO ESTÁ FUNCIONANDO (TENHO QUE VER O QUE É)
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