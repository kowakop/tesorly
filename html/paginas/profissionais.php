<?php

    require_once ("../conexao.php");

    $sql = "SELECT user_nome, user_email, user_telefone, user_fotos FROM usuarios";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $resultados = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de Clientes (teste)</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Fotos</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultados->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['user_nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_telefone']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_fotos']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>