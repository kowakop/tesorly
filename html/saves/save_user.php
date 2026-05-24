<?php
// 1. Verifica se o formulário foi realmente enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Altere o caminho abaixo para '../conexao.php' se este arquivo estiver dentro de uma subpasta (ex: html/cadastros/)
    include '../conexao.php'; 

    // 2. Coleta os dados do HTML de forma segura
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha_pura = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar-senha'] ?? '';
    
    // Como o campo 'fotos' não existe no seu HTML atual, definimos uma string vazia temporária
    $fotos = ""; 

    // 3. Validação básica de segurança: Campos vazios
    if (empty($nome) || empty($email) || empty($telefone) || empty($senha_pura)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios!'); window.history.back();</script>";
        exit;
    }

    // 4. Validação: Verifica se as senhas batem
    if ($senha_pura !== $confirmar_senha) {
        echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
        exit;
    }

    // 5. Criptografia da senha (Perfeito, igual você fez!)
    $senha_criptografada = password_hash($senha_pura, PASSWORD_DEFAULT);

    // 6. Prepara a Query SQL (Nomes das colunas devem ser iguais aos do seu banco)
    $sql = "INSERT INTO usuarios (user_nome, user_email, user_senha, user_telefone, user_fotos) VALUES (?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    if ($comando) {
        // Vincula as variáveis ao "?" (s = string)
        mysqli_stmt_bind_param(
            $comando,
            "sssss",
            $nome,
            $email,
            $senha_criptografada,
            $telefone,
            $fotos
        );

        // Executa e verifica o resultado
        if (mysqli_stmt_execute($comando)) {
            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='index.php';</script>";
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