<?php

    require_once("./conexao.php");

    function deletarusuarios($conexao, $idusuarios) {
        $sql = "DELETE FROM usuarios WHERE idusuarios = ?";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, 'i', $idusuarios);
        $funcionou = mysqli_stmt_execute($comando);
        mysqli_stmt_close($comando);
        return $funcionou; //true ou false
    };

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
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, fotos) VALUES (?, ?, ?, ?, ?)";
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

function pesquisarusuariosId($conexao, $idusuarios){
$sql = "SELECT * FROM usuarios WHERE idusuarios =?";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, 'i', $idusuarios);
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);
$usuarios = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($comando);
return $usuarios;
};


function deletarprodutos($conexao, $idprodutos) {
    $sql = "DELETE FROM produtos WHERE idprodutos = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idprodutos);
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
    while ($produtos = mysqli_fetch_assoc($resultado)) {
        $lista_produtos[] = $produtos;
    }
    mysqli_stmt_close($comando);
    return $lista_produtos;
};


function salvarprodutos($conexao, $nome, $marca, $fotos, $empresario_idempresario) {
    $sql = "INSERT INTO produtos (nome, marca, fotos, empresario_idempresario) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sssi', $nome, $marca, $fotos, $empresario_idempresario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function editarprodutos($conexao, $nome, $marca, $fotos, $empresario_idempresario, $idprodutos) {
    $sql = "UPDATE produtos SET nome=?, marca=?, fotos=?, empresario_idempresario=? WHERE idprodutos=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sssi', $nome, $marca, $fotos, $empresario_idempresario, $idprodutos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function pesquisarprodutosId($conexao,$idprodutos) {
$sql = "SELECT * FROM produtos WHERE idprodutos =?";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, 'i', $idprodutos);
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);
$produtos = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($comando);
return $produtos;
};

function salvarServico( $conexao,$servico,$valor,$descricao,$tempo,$foto,$agenda_idagenda, ){
    $sql = "INSERT INTO servicos
    (servico, valor, descricao, tempo_servico, foto, produto_utilizado)
    VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
 mysqli_stmt_bind_param( $comando,'sdssss',$servico,$valor,$descricao,$tempo,$foto,$produto
    );
$funcionou = mysqli_stmt_execute($comando);
mysqli_stmt_close($comando);
return $funcionou;
}


function deletarservicos($conexao, $idservicos) {
    $sql = "DELETE FROM servicos WHERE idservicos = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou; //true ou false
};

function listarservicos($conexao) {
    $sql = "SELECT * FROM servicos";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_servicos = [];
    while ($servicos = mysqli_fetch_assoc($resultado)) {
        $lista_servicos[] = $servicos;
    }
    mysqli_stmt_close($comando);
    return $lista_servicos;
};

function editarservicos($conexao, $nome, $valor, $descricao, $tempo, $fotos, $agenda_idagenda, $idservicos) {
    $sql = "UPDATE servicos SET nome=?, valor=?, descricao=?, tempo=?, fotos=?, agenda_idagenda=? WHERE idservicos=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sssi', $nome, $valor, $descricao, $tempo, $fotos, $agenda_idagenda, $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function deletarempresario($conexao, $idempresario) {
    $sql = "DELETE FROM empresario WHERE idempresario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou; //true ou false
};

function listarempresario($conexao) {
    $sql = "SELECT * FROM empresario ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_empresario = [];
    while ($servicos = mysqli_fetch_assoc($resultado)) {
        $lista_empresario[] = $empresario;
    }
    mysqli_stmt_close($comando);
    return $lista_empresario;
};

function editarempresario($conexao, $tipo, $diastrabalho, $cidade, $idempresario) {
    $sql = "UPDATE empresario SET tipo=?, diastrabalho=?, cidade=? WHERE idempresario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sss', $tipo, $diastrabalho, $cidade, $idempresario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};


function salvarempresario( $conexao,$servico,$valor,$descricao,$tempo,$foto,$agenda_idagenda, ){
    $sql = "INSERT INTO servicos
    (servico, valor, descricao, tempo_servico, foto, produto_utilizado)
    VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
 mysqli_stmt_bind_param( $comando,'sdssss',$servico,$valor,$descricao,$tempo,$foto,$produto
    );
$funcionou = mysqli_stmt_execute($comando);
mysqli_stmt_close($comando);
return $funcionou;
}

function deletaragenda($conexao, $idagenda) {
    $sql = "DELETE FROM agenda WHERE idagenda = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idagenda);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou; //true ou false
};

function listaragenda($conexao) {
    $sql = "SELECT * FROM agenda ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_agenda = [];
    while ($agenda = mysqli_fetch_assoc($resultado)) {
        $lista_agenda[] = $agenda;
    }
    mysqli_stmt_close($comando);
    return $lista_agenda;
};

function editaragenda($conexao, $horario, $dia, $agenda_idusuario, $idagenda) {
    $sql = "UPDATE agenda SET horario=?, dia=?, agenda_idusuario=? WHERE idempresario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sss', $tipo, $diastrabalho, $cidade, $idempresario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};


function salvarempresario( $conexao,$servico,$valor,$descricao,$tempo,$foto,$agenda_idagenda, ){
    $sql = "INSERT INTO servicos
    (servico, valor, descricao, tempo_servico, foto, produto_utilizado)
    VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
 mysqli_stmt_bind_param( $comando,'sdssss',$servico,$valor,$descricao,$tempo,$foto,$produto
    );
$funcionou = mysqli_stmt_execute($comando);
mysqli_stmt_close($comando);
return $funcionou;
}


//---------------------------------------------//


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

function salvarVenda($conexao, $idcliente, $idproduto, $valor_total, $data ){
    $sql= "INSERT INTO tb_venda (idcliente, idproduto, valor_total, data) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iids',$idcliente, $idproduto, $valor_total, $data);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};
?>



