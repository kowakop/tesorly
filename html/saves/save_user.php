<!-- 
 ⊹
⢠⡏⠉⠑⢄⠀ ⠀  ⡠⠋⠉⢱⡀
⡇⠙⠒⠒⠬⡗⢒⢮⠄⠒⠒⠁⢣
⠇⠀⠈⠁⢁⡷⠤⢮⠈⠁⠀⠀⡌
⠘⢄⣀⡰⢻⠁⠀⠘⡕⢄⣀⡰⠁⠀⊹   tá ok + (VER SE CONSEGUE ESTILIZAR ESSES ALERTAS OU ENTÃO MUDAR ELES)
⠀⡎⠘⢀⠇⠀⠀⠀⢱⠈⠂⠡⠀
⠀⠑⢄⡜⠢⡀⠀⢀⠔⠇⡴⠃⠀
⠀⠀⠀⠑⠠⠚⠀⠓⠔⠋⠀⠀
⊹
-->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../conexao.php'; 

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha_pura = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar-senha'] ?? '';
    
    $fotos = ""; 

    // isso daqui vê se está vazio
    if (empty($nome) || empty($email) || empty($telefone) || empty($senha_pura)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios!'); window.history.back();</script>";
        exit;
    }

    $senha_criptografada = password_hash($senha_pura, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (user_nome, user_email, user_senha, user_telefone, user_fotos) VALUES (?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    if ($comando) {
        mysqli_stmt_bind_param(
            $comando,
            "sssss",
            $nome,
            $email,
            $senha_criptografada,
            $telefone,
            $fotos
        );

        if (mysqli_stmt_execute($comando)) {
            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='../agendamento/agendaprincipal.php';</script>";
        } else {
            echo "Erro ao salvar no banco: " . mysqli_stmt_error($comando);
        }

        mysqli_stmt_close($comando);
    } else {
        echo "Erro ao preparar o banco: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>