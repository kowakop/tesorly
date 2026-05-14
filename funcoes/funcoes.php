<?php

function deletarusuarios($conexao, $idusuarios) {
    $sql = "DELETE FROM usuarios WHERE idusuarios = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuarios);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false
}

function listarusuarios($conexao) {
    $sql = "SELECT * FROM usuarios";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_usuarios = [];
    while ($usuarios = mysqli_fetch_assoc($resultado)) {
        $lista_usuarios[] = $usuarios;
    }

    mysqli_stmt_close($comando);
    return $lista_usuarios;
}
//string s numero i
function salvarusuarios($conexao, $nome, $email, $senha, $telefone, $fotos) {
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, fotos) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $email, $senha, $telefone, $fotos);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};

function editarusuarios($conexao, $nome, $email, $senha, $telefone, $fotos, $idusuarios) {
    $sql = "UPDATE usuarios SET nome=?, email=?, senha=?, telefone=?, fotos=? WHERE idusuarios=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $email, $senha, $telefone, $fotos, $idusuarios);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarprodutos($conexao, $idprodutos) {
    $sql = "DELETE FROM produtos WHERE idprodutos = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false
};

function listarprodutos($conexao) {
    $sql = "SELECT * FROM produtos";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $lista_produtos[] = $produto;
    }

    mysqli_stmt_close($comando);
    return $lista_produtos;
};

function listarVenda($conexao) {
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_vendas = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
        $lista_vendas[] = $venda;
    }

    mysqli_stmt_close($comando);
    return $lista_vendas;
};
function salvarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade) {
    $sql = "INSERT INTO tb_produto (nome, tipo, preco_compra, preco_venda, margem_lucro, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando,'ssdddi', $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};

function editarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade, $idproduto) {
    $sql = "UPDATE tb_produto SET nome=?, tipo=?, preco_compra=?, preco_venda=?, margem_lucro=?, quantidade=? WHERE idproduto=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando,'ssddddi', $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade, $idproduto);
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};

function salvarUsuario($conexao, $nome, $email, $senha){
    $sql= "INSERT INTO tb_usuario (nome, email, senha) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function salvarVenda($conexao, $idcliente, $idproduto, $valor_total, $data ){
    $sql= "INSERT INTO tb_venda (idcliente, idproduto,valor_total, data) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iids',$idcliente, $idproduto, $valor_total, $data);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function pesquisarClienteId($conexao, $idcliente){
$sql = "SELECT * FROM tb_cliente WHERE idcliente =?";
$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, 'i', $idcliente);

mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);

$cliente = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($comando);
return $cliente;

};

function pesquisarProdutoId($conexao,$idproduto) {
$sql = "SELECT * FROM tb_produto WHERE idproduto =?";
$comando = mysqli_prepare($conexao, $sql);
    
mysqli_stmt_bind_param($comando, 'i', $idproduto);
    
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);
    
$produto = mysqli_fetch_assoc($resultado);
    
mysqli_stmt_close($comando);
return $produto;
};


?>
