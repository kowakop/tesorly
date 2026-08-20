<!-- 
 ⣤⣾⣿⣷⣦⠀⠀⠀⠀⣴⣿⣿⣷⣄⠀⠀⠀⢠⣶⣿⣿⣶⡄
⠐⠛⠂⠀⢈⣿⠇⠀⠀⠚⠛⠀⠀⢙⣿⠀⠀⠀⠚⠃⠀⠀⣹⣟
⠀⠀⢠⣾⡿⠛⠀⠀⠀⠀⠀⢴⣾⠿⠋⠀⠀⠀⠀⠀⣴⣿⠟⠃           QUEM FEZ ESSA PÁGINA ? (tô achando que foi é eu)
⠀⠀⠘⠋⠁⠀⠀⠀⠀⠀⠀⠙⠋⠀⠀⠀⠀⠀⠀⠀⠛⠉⠀⠀
⠀⠀⢰⣷⠆⠀⠀⠀⠀⠀⠀⣾⣶⠀⠀⠀⠀⠀⠀⢀⣾⡶⠀⠀ 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Página de Produtos</title>
    <style> 
        /* ==========================================================
   Tesorly - produtos.css (catálogo de serviços / produtos)
   Baseado no protótipo Figma (tema roxo/lavanda)
   ========================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
}

body {
    background: #ECE7F6;
}

.page {
    max-width: 1100px;
    margin: 0 auto;
    padding: 24px 20px 60px;
}

/* ---------- cabeçalho ---------- */
.topo {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.topo .logo {
    font-family: 'Brush Script MT', cursive;
    font-size: 2.2rem;
    color: #FFFFFF;
    text-shadow: 0 1px 3px rgba(74, 45, 92, 0.3);
}

.chat-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: none;
    background: #2FBF6E;
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* ---------- layout principal (sidebar + catálogo) ---------- */
.conteudo {
    display: flex;
    gap: 24px;
    background: #6B2F5C;
    border-radius: 20px;
    padding: 24px;
    min-height: 640px;
}

/* ---------- menu lateral ---------- */
.sidebar {
    width: 180px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-shrink: 0;
}

.sidebar ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.sidebar a {
    display: block;
    padding: 10px 14px;
    border-radius: 8px;
    color: #F1E9F5;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: background 0.2s ease, color 0.2s ease;
}

.sidebar a:hover {
    background: rgba(255, 255, 255, 0.08);
}

.sidebar a.ativo {
    background: #D6336C;
    color: #fff;
    font-weight: 700;
}

.sidebar .logout {
    display: block;
    padding: 10px 14px;
    color: #F08A9C;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
}

.sidebar .logout:hover {
    text-decoration: underline;
}

/* ---------- catálogo ---------- */
.catalogo {
    flex: 1;
    background: #ECE7F6;
    border-radius: 16px;
    padding: 24px;
}

.grid-servicos {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.card-servico {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 6px 16px rgba(74, 45, 92, 0.12);
    display: flex;
    flex-direction: column;
}

.card-servico img {
    width: 100%;
    height: 130px;
    object-fit: cover;
}

.card-servico .tag {
    align-self: flex-start;
    margin: 10px 0 0 12px;
    padding: 3px 10px;
    border: 1px solid #6B2F5C;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 700;
    font-style: italic;
    color: #6B2F5C;
}

.card-servico .descricao {
    margin: 8px 12px 0;
    font-size: 0.72rem;
    color: #555;
    line-height: 1.3;
}

.card-servico .info {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin: 8px 12px 0;
    font-size: 0.72rem;
    color: #555;
}

.card-servico .info .label {
    color: #999;
}

.card-servico .info .valor {
    font-weight: 600;
    color: #333;
}

.card-servico .info-preco {
    margin-bottom: 12px;
}

.card-servico .info-preco .label {
    line-height: 1.3;
}

.card-servico .info-preco strong {
    color: #333;
    font-weight: 700;
}

.card-servico .preco {
    font-weight: 700;
    color: #2E2340;
    font-size: 0.8rem;
}

/* ---------- botão adicionar novo serviço ---------- */
.btn-add {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 24px 0 0 auto;
    background: transparent;
    border: none;
    color: #2E2340;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
}

.btn-add span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: #2E2340;
    color: #fff;
    font-size: 0.9rem;
}

.btn-add:hover span {
    background: #5A2751;
}

/* ---------- responsivo ---------- */
@media (max-width: 900px) {
    .conteudo {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .sidebar ul {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .grid-servicos {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 560px) {
    .grid-servicos {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <body>

    <div class="page">

        <!-- ===== Cabeçalho ===== -->
        <header class="topo">
            <span class="logo">Tesorly</span>
            <button class="chat-btn" aria-label="Chat">💬</button>
        </header>

        <div class="conteudo">

            <!-- ===== Menu lateral ===== -->
            <nav class="sidebar">
                <ul>
                    <li><a href="#">Serviços disponíveis</a></li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#" class="ativo">Produtos</a></li>
                    <li><a href="#">Avalie</a></li>
                    <li><a href="#">Meu perfil</a></li>
                    <li><a href="#">Pagamentos</a></li>
                    <li><a href="#">Profissionais</a></li>
                    <li><a href="#">Clientes</a></li>
                </ul>
                <a href="#" class="logout">Logout</a>
            </nav>

            <!-- ===== Catálogo de serviços ===== -->
            <main class="catalogo">

                <div class="grid-servicos">

                    <article class="card-servico">
                        <img src="hidratacao1.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                    <article class="card-servico">
                        <img src="hidratacao2.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                    <article class="card-servico">
                        <img src="hidratacao3.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                    <article class="card-servico">
                        <img src="hidratacao4.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                    <article class="card-servico">
                        <img src="hidratacao5.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                    <article class="card-servico">
                        <img src="hidratacao6.jpg" alt="Hidratação capilar">
                        <span class="tag">Hidratação</span>
                        <p class="descricao">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info">
                            <span class="label">Duração</span>
                            <span class="valor">15 min.</span>
                        </div>
                        <div class="info info-preco">
                            <span class="label">Produtos<br><strong>Wella</strong></span>
                            <span class="preco">R$ 100,00</span>
                        </div>
                    </article>

                </div>

                <button class="btn-add">Adicionar novo serviço <span>+</span></button>

            </main>

        </div>

    </div>



</body>
</body>
</html>