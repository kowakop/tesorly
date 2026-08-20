<?php



//include("../conexao.php");
// include("../func/funcoes.php");

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


    <!-- NÃO ESTÁ FUNCIONANDO (TENHO QUE VER O QUE É) -->

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