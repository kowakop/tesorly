<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../conexao.php';
    include '../funcoes.php';

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha_pura = $_POST['senha'] ?? '';
    $sou_emp = isset($_POST['sou_emp']);

    $fotos = "";

    if (empty($nome) || empty($email) || empty($telefone) || empty($senha_pura)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios!'); window.history.back();</script>";
        exit;
    }

    $senha_criptografada = password_hash($senha_pura, PASSWORD_DEFAULT);

    $funcionou = salvaruser($conexao, $nome, $email, $senha_criptografada, $telefone, $fotos);

    if ($funcionou) {
        $id_usuario = mysqli_insert_id($conexao);
        $_SESSION['id_usuario'] = $id_usuario;

        if ($sou_emp) {
            echo "<script>window.location.href='../empresarios/cad_emp.php';</script>";
        } else {
            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='../agendamento/agendaprincipal.php';</script>";
        }
    } else if (mysqli_errno($conexao) == 1062) {
        echo "<script>alert('Este email já está cadastrado.'); window.history.back();</script>";
    } else {
        echo "Erro ao salvar no banco: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>