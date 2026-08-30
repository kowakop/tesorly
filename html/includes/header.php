<?php
$pagina = $pagina ?? ($_GET['pagina'] ?? 'produtos');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tesorly</title>
</head>
<body>
    <div class="page_pagprod">
        <header class="topo_pagprod">
            <span class="logo_pagprod">Tesorly</span>
            <button class="chat-btn" aria-label="Chat">💬</button>
        </header>

        <div class="conteudo_pagprod">
            <nav class="sidebar_pagprod">
                <ul>
                    <li><a href="?pagina=servicos"     class="<?= $pagina === 'servicos'     ? 'ativo' : '' ?>">Serviços disponíveis</a></li>
                    <li><a href="?pagina=agenda"        class="<?= $pagina === 'agenda'        ? 'ativo' : '' ?>">Agenda</a></li>
                    <li><a href="?pagina=produtos"      class="<?= $pagina === 'produtos'      ? 'ativo' : '' ?>">Produtos</a></li>
                    <li><a href="?pagina=avalie"        class="<?= $pagina === 'avalie'        ? 'ativo' : '' ?>">Avalie</a></li>
                    <li><a href="?pagina=perfil"        class="<?= $pagina === 'perfil'        ? 'ativo' : '' ?>">Meu perfil</a></li>
                    <li><a href="?pagina=pagamentos"    class="<?= $pagina === 'pagamentos'    ? 'ativo' : '' ?>">Pagamentos</a></li>
                    <li><a href="?pagina=profissionais" class="<?= $pagina === 'profissionais' ? 'ativo' : '' ?>">Profissionais</a></li>
                    <li><a href="?pagina=clientes"      class="<?= $pagina === 'clientes'      ? 'ativo' : '' ?>">Clientes</a></li>
                </ul>
                <a href="../deslogar.php" class="logout_pagprod">Logout</a>
            </nav>

            <main class="catalogo_pagprod">