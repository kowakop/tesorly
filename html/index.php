<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Tesorly</title>
</head>
<body>

    <!-- Seguindo o figma, index tá pronto. só add img e css-->
    <header>
        <h1>Equipe Sarolau</h1>
    </header>

        <nav>
            <ul>
                <li><a href="#home">Sobre o Site</a></li>
                <li><a href="#sarolau">Sobre Sarolau</a></li>
                <li><a href="#suporte">Suporte</a></li>
            </ul>

            <div id="socials">
                <a href="https://www.instagram.com/tesorly/"><img src="./imagens/instagram.png" alt="Instagram"></a>
                <a href="https://www.github.com/tesorly"><img src="./imagens/github.png" alt="Github"></a>
            </div>
        </nav>

    <!-- SUBIR IMAGEM DA LOGO -->
    <img src="./imagens/tesorly.png" alt="logo tesorly" id="logo">
    <p>Pare de perder tempo! Faça parte do Tesorly e torne-se mais produtivo.</p>

    <button id="btn_entrar"> <a href="login.php">Entrar</a></button>
    <button id="btn_cad"><a href="usuarios/cadastrosuser.php">Cadastrar</a></button>

    <img src="./imagens/banner.png" alt="Banner">

    <div id="features">
        <div>
            <h2>Agendamento online</h2>
            <p>Um site de agendamento para salão de beleza que permite que clientes marquem horários de forma rápida e prática, escolhendo serviços e profissionais disponíveis sem precisar de contato direto.</p>
        </div>

        <div>
            <h2>Catálogo de Serviços e Produtos</h2>
            <p>A plataforma também oferece um catálogo de serviços e produtos, onde o profissional pode apresentar preços, descrições e opções disponíveis para seus clientes.</p>
        </div>

        <div>
            <h2>Gestão e Organização Profissional</h2>
            <p>O sistema contribui para a organização do trabalho do profissional, reunindo agenda, divulgação e vendas em um único ambiente digital.</p>
        </div>
    </div>

    <div id="comments">

        <h1>Experiências de Uso</h1>

        <h2>Veja a opinião de pessoas que testaram e usaram nossa plataforma no dia a dia.</h2>

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Poliana Silva</h3>
            <h4>Cliente</h4>
            <p class="opn">Usei o site para agendar um horário no salão e achei tudo muito prático. Consegui escolher o serviço, ver os horários disponíveis e marcar em poucos minutos, sem complicação. Com certeza usaria novamente.
            </p>
        </div>  

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Fabiano Ferraz</h3>
            <h4>Cliente</h4>
            <p class="opn">Como cliente, achei muito útil poder ver os serviços e preços antes de marcar. Isso passa mais confiança e ajuda na escolha do que realmente quero fazer.
            </p>
        </div> 

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Tereza Santes</h3>
            <h4>Cliente</h4>
            <p class="opn">O sistema de catálogo também é um ponto positivo, já que permite apresentar os serviços de maneira clara, ajudando o cliente a entender melhor o que está sendo oferecido.</p>
        </div> 

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Ricardo Tomaz</h3>
            <h4>Cliente</h4>
            <p class="opn">Gostei muito da experiência como cliente. O catálogo de serviços é bem organizado e ajuda bastante na hora de decidir o que fazer. Tudo é claro e fácil de navegar.</p>
        </div> 
        
        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Mariana Teles</h3>
            <h4>Profissional</h4>
            <p class="opn">Sou profissional da área e vejo esse tipo de sistema como algo essencial hoje em dia. Ter agenda, serviços e divulgação em um só lugar facilita muito a rotina e melhora o atendimento ao cliente.</p>
        </div> 

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Sônia Tavares</h3>
            <h4>Profissional</h4>
            <p class="opn">Do ponto de vista profissional, é uma solução que traz mais praticidade no dia a dia e melhora a forma como os serviços podem ser apresentados ao público.</p>
        </div> 

        <div>
            <img src="./imagens/fotouser.png" alt="fotouser">
            <h3>Roberto Pereira</h3>
            <h4>Profissional</h4>
            <p class="opn">O site ajudou na organização da minha agenda e facilitou o controle dos horários e serviços, deixando tudo mais prático no dia a dia.</p>
        </div> 
    </div>

    <div id="sarolau">
        <h1>Fundadores do Tesorly</h1>

        <div>
            <img src="./imagens/sarah.png" alt="sarah">
            <h2>Sarah Gabriela</h2>
            <a href="https://www.instagram.com/gabrielaa.sarah" target="_blank"><img src="./imagens/instagram.png" alt="Instagram"></a>
            <a href="https://www.linkedin.com/in/sarah-gabriela" target="_blank"><img src="./imagens/linkedin.png" alt="LinkedIn"></a>
            <a href="https://github.com/kowakop" target="_blank"><img src="./imagens/github.png" alt="GitHub"></a>
        </div>

        <div>
            <img src="./imagens/rogerio.png" alt="rogerio">
            <h2>Rogério Gonçalves</h2>
            <a href="https://www.instagram.com/rogerio.goncalves" target="_blank"><img src="./imagens/instagram.png" alt="Instagram"></a>
            <a href="https://www.linkedin.com/in/rogerio-goncalves" target="_blank"><img src="./imagens/linkedin.png" alt="LinkedIn"></a>
            <a href="https://github.com/rogeriogoncalves" target="_blank"><img src="./imagens/github.png" alt="GitHub"></a>
        </div>

        <div>
            <img src="./imagens/laura.png" alt="laura">
            <h2>Laura Gabriela</h2>
            <a href="https://www.instagram.com/laura.gabriela" target="_blank"><img src="./imagens/instagram.png" alt="Instagram"></a>
            <a href="https://www.linkedin.com/in/laura-gabriela" target="_blank"><img src="./imagens/linkedin.png" alt="LinkedIn"></a>
            <a href="https://github.com/lauragabriela" target="_blank"><img src="./imagens/github.png" alt="GitHub"></a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Tesorly. Todos os direitos reservados.</p>
        <p>Feito com ❤️ por Equipe Sarolau</p>
    </footer>

</body>
</html>

<!-- por PHP depois pq tô com preguiça de coisar docker só pra ver uma página HTML -->

<!--Não vou fazer CSS por enquanto pra não me estressar, então estou fazendo só o seco-->