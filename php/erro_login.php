
<?php

session_start();

require_once "./conexao.php";

$id = $_GET['id']  ?? 0;

$nome = trim($_POST['nome'] ?? '');
$email =  trim($_POST['email'] ?? '');
$senha =  trim($_POST['senha'] ?? '');
$telefone =  trim($_POST['telefone'] ?? '');
$fotos =  trim($_POST['fotos'] ?? '');

//--------------------VALIDAÇÕES-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------VALIDAÇÕES-----------------------//

if (isset($_GET['e']) && $_GET['e'] != NULL) {
    $erro = $_GET['e'];
    echo "<span id='erro'>";

if (
    $nome == "" ||
    $email == "" ||
    $telefone == "" ||
    ($id == 0 && $senha == "")
) {

    header("Location: index.php?e=1");
    exit();
}

if (strlen($nome) > 255) {
    header("Location: index.php?e=2");
    exit();
}

if ($senha != "" && strlen($senha) > 30) {
    header("Location: index.php?e=3");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?e=5");
    exit();
}

//--------------------EDITAR USER-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------EDITAR USER-----------------------//

if ($id != 0) {
    // verifica email duplicado
    $sql = "SELECT idusuarios
            FROM usuarios
            WHERE user_email = ?
            AND idusuarios != ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param(
        $comando,
        "si",
        $email,
        $id
    );
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    if (mysqli_fetch_assoc($resultado)) {
        header("Location: index.php?e=13");
        exit();
    }

    // verifica username duplicado
    $sql = "SELECT idusuarios
            FROM usuarios
            WHERE user_nome = ?
            AND idusuarios != ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param(
        $comando,
        "si",
        $user_nome,
        $id
    );

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    if (mysqli_fetch_assoc($resultado)) {
        header("Location: index.php?e=12");
        exit();
    }


    if ($erro == 1) {
        echo "*Você precisa preencher todos os campos";
    } 

    //pensar em uma frase melhor (qnd o bloco de confirmar a senha não confere com a senha)
    else if ($erro == 2) {
        echo "*Confirmação da senha não confere";
    }

    else if ($erro == 3) {
        echo "*Senha maior que 30 caracteres";
    } 

    else if ($erro == 4) {
        echo "*Email muito grande";
    } 

    else if ($erro == 5) {
        echo "*Email inválido";
    }

    else if ($erro == 6) {
        echo "*Telefone inválido";
    }

    else if ($erro == 7) {
        echo "*Telefone já utilizado";
    }

    else if ($erro == 9){
        echo "*Já existe um usuário com esse nome";
    }

    else if ($erro == 10){
        echo "*Usuário inexistente";
    }

    else if ($erro == 11){
        echo "*Senha Incorreta";
    }

    else if ($erro == 13){
        echo "*Email já está vinculado a uma conta";
    }

    else if ($erro == 14){
        echo "*Nome não pode ser maior que 70 caracteres abrevie algum sobrenome";
    }

    else if ($erro == 15){
        echo "*imagem não suportada";
    }

    echo "</span>";
    echo '<style>
            #div_butao {
                margin-top: 2%;
            }
        </style>';
}

?>