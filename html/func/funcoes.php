<?php

    require_once("../conexao.php");
//--------------------USERS-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------USERS-----------------------//
function verificarLogin(){
    // return isset($_SESSION['usuario']);
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../php/login.php");
    exit;
    }
}
   

function deletaruser($conexao, $idusuarios) {
        $sql = "DELETE FROM usuarios WHERE idusuarios = ?";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, 'i', $idusuarios);
        $funcionou = mysqli_stmt_execute($comando);
        mysqli_stmt_close($comando);
        return $funcionou; //true ou false
    };

function listaruser($conexao) {
    $sql = "SELECT * FROM usuarios";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $listar_usuarios = [];

    while ($usuarios = mysqli_fetch_assoc($resultado)) {
        $listar_usuarios[] = $usuarios;
    }

    mysqli_stmt_close($comando);
    return $listar_usuarios;
}

//string s numero i
function salvaruser($conexao, $nome, $email, $senha, $telefone, $fotos) {
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, fotos) VALUES (?, ?, ?, ?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii',$nome, $email, $senha, $telefone, $fotos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
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

function editaruser($conexao, $nome, $email, $senha, $telefone, $fotos, $idusuarios){
    $sql = "UPDATE usuarios SET nome=?, email=?, senha=?, telefone=?, fotos=? WHERE idusuarios=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $email, $senha, $telefone, $fotos, $idusuarios);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

function pesquisaruserid($conexao, $idusuarios){
    $sql = "SELECT * FROM usuarios WHERE idusuarios =?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuarios);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $usuarios = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $usuarios;
};

//--------------------PRODUTOS-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------PRODUTOS-----------------------//


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

//--------------------SERVIÇOS-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------SERVIÇOS-----------------------//


function salvarservico( $conexao,$servico,$valor,$descricao,$tempo,$foto,$agenda_idagenda, ){
    $sql = "INSERT INTO servicos
    (servico, valor, descricao, tempo_servico, foto, produto_utilizado)
    VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param( $comando,'sdssss',$servico,$valor,$descricao,$tempo,$foto,$produto);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarservico($conexao, $idservicos) {
    $sql = "DELETE FROM servicos WHERE idservicos = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou; //true ou false
};

function listarservico($conexao) {
    $sql = "SELECT * FROM servicos";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $listar_servicos = [];
    while ($servicos = mysqli_fetch_assoc($resultado)) {
        $listar_servicos[] = $servicos;
    }
    mysqli_stmt_close($comando);
    return $listar_servicos;
};

function editarservicos($conexao, $nome, $valor, $descricao, $tempo, $fotos, $agenda_idagenda, $idservicos) {
    $sql = "UPDATE servicos SET nome=?, valor=?, descricao=?, tempo=?, fotos=?, agenda_idagenda=? WHERE idservicos=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sssi', $nome, $valor, $descricao, $tempo, $fotos, $agenda_idagenda, $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};


//--------------------EMPRESÁRIO-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------EMPRESÁRIO-----------------------//

function deletarempresario($conexao, $idempresario) {
    $sql = "DELETE FROM empresario WHERE idempresario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idservicos);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou; //true ou false
};

function listarempresario($conexao) {
    $sql = "SELECT * FROM empresario";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $listar_empresario = [];
    while ($empresario = mysqli_fetch_assoc($resultado)) {
        $listar_empresario[] = $empresario;
    }
    mysqli_stmt_close($comando);
    return $listar_empresario;
};

function editarempresario($conexao, $tipo, $diastrabalho, $cidade, $idempresario) {
    $sql = "UPDATE empresario SET tipo=?, diastrabalho=?, cidade=? WHERE idempresario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sss', $tipo, $diastrabalho, $cidade, $idempresario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};


function salvarempresario( $conexao, $servico, $valor, $descricao, $tempo, $foto, $agenda_idagenda, ){
    $sql = "INSERT INTO servicos
    (servico, valor, descricao, tempo_servico, foto, produto_utilizado)
    VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param( $comando,'sdssss', $servico, $valor, $descricao, $tempo, $foto, $produto
    );
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}


//--------------------AGENDA-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------AGENDA-----------------------//


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
    $listar_agenda = [];
    while ($agenda = mysqli_fetch_assoc($resultado)) {
        $listar_agenda[] = $agenda;
    }
    mysqli_stmt_close($comando);
    return $listar_agenda;
};

function editaragenda($conexao, $horario, $dia, $agenda_idusuario, $idagenda) {
    $sql = "UPDATE agenda SET horario=?, dia=?, agenda_idusuario=? WHERE idempresario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando,'sss', $tipo, $diastrabalho, $cidade, $idempresario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};


//--------------------VENDAS-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------VENDAS-----------------------//


function listarvenda($conexao) {
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $listar_venda = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
        $listar_venda[] = $venda;
    }
    mysqli_stmt_close($comando);
    return $listar_venda;
}

function salvarVenda($conexao, $idcliente, $idproduto, $valor_total, $data ){
    $sql= "INSERT INTO tb_venda (idcliente, idproduto, valor_total, data) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iids',$idcliente, $idproduto, $valor_total, $data);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
};

//--------------------LOGIN-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------LOGIN-----------------------//

function verificartlogin(){
    return isset($_SESSION['usuario']);
}

function verificaradmin(){
    return (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin');
}

function verificarusuario(){
    return (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'usuario');
}

function logout(){
    session_destroy();
}

    function login($conexao, $email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE user_email = ? AND user_senha = ?";
        $stmt = $conexao ->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();

        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['tipo'] = $usuario['tipo'];
            return true;
        } 
            return false;
        }

//--------------------IMAGEM-----------------------//
// ⡤⠒⢤⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡤⠒⢤
//⢣⡀⠀⠉⠲⢤⣀⡀⠀⠀⠀⠀⠀⠀⢀⣀⡤⠖⠉⠀⢀⡜
//⢸⡉⠒⠄⠀⠀⠀⢉⡙⢢⠀⠀⡔⢋⡉⠀⠀⠀⠠⠒⢉⡇
  //⠉⢖⠒⠀⠀⠀⣇⠀⣸⠀⠀⣇⠀⣸⠀⠀⠀⠒⡲⠉⠀
    //⠉⠙⠫⠤⠚⠉⠀⠀⠀⠀⠉⠓⠤⠝⠋⠉ 

//--------------------IMAGEM-----------------------//

        function uploadImg ($arquivo){
        $diretorio = 'imagens';
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png'];

        if(!in_array($extensao, $permitidas)){ 
            return false;
        }

        if($arquivo['size']> 1024 * 1024 * 2){ // permite até 2MB
            return false;
        }

        $nomeArquivo = uniqid() . "_" . $arquivo['name'];
        $caminho = $diretorio . $nomeArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $caminho)){
            return $caminho;
        }

        return false;
    }
?>