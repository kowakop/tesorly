<?php

function salvarcomentarios($conexao, $text, $coment_idusuario, $coment_estrela) {
    $sql = "INSERT INTO comentarios (coment_text, coment_idusuario, coment_estrela) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'ssii', $text, $coment_idusuario, $coment_estrela);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

?>