<?php
require_once __DIR__ . "/../includes/header.php";

$paginasPermitidas = ['produtos', 'agenda', 'servicos', 'avalie', 'perfil', 'pagamentos', 'profissionais', 'clientes'];

if (in_array($pagina, $paginasPermitidas)) {
    include __DIR__ . "/../paginas/{$pagina}.php";
} else {
    echo "<p>Página não encontrada.</p>";
}

require_once __DIR__ . "/../includes/footer.php";
?>