<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fio Estúdio — Agendar horário</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Work+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
<style>
  :root {
    --cor-fundo: #1F3A34;
    --cor-fundo-alt: #17302B;
    --cor-superficie: #2A4A42;
    --cor-superficie-2: #23413A;
    --cor-texto: #F3ECE2;
    --cor-texto-suave: #B9A78F;
    --cor-acento: #D89B4A;
    --cor-acento-hover: #E8B15F;
    --cor-acento-texto: #3A2A0F;
    --cor-linha: rgba(243, 236, 226, 0.14);
    --cor-selecionado-bg: rgba(216, 155, 74, 0.16);
    --cor-erro: #E8927A;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    background: var(--cor-fundo);
    color: var(--cor-texto);
    font-family: 'Work Sans', sans-serif;
    -webkit-font-smoothing: antialiased;
  }

  .pagina {
    max-width: 640px;
    margin: 0 auto;
    padding: 48px 20px 80px;
  }

  .cabecalho {
    text-align: center;
    margin-bottom: 40px;
  }

  .cabecalho .marca {
    font-family: 'Fraunces', serif;
    font-weight: 600;
    font-size: 34px;
    letter-spacing: -0.01em;
    margin: 0;
  }

  .cabecalho .marca span {
    color: var(--cor-acento);
    font-style: italic;
  }

  .cabecalho p {
    color: var(--cor-texto-suave);
    font-size: 15px;
    margin: 8px 0 0;
  }

  .ficha {
    background: var(--cor-superficie);
    border-radius: 18px;
    position: relative;
    box-shadow: 0 24px 60px -24px rgba(0,0,0,0.5);
  }

  .etapa {
    padding: 26px 28px;
    position: relative;
  }

  .perfuracao {
    height: 0;
    border-top: 2px dashed var(--cor-linha);
    margin: 0 28px;
    position: relative;
  }

  .perfuracao::before,
  .perfuracao::after {
    content: '';
    position: absolute;
    top: -11px;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--cor-fundo);
  }

  .perfuracao::before { left: -39px; }
  .perfuracao::after { right: -39px; }

  .rotulo-etapa {
    display: flex;
    align-items: baseline;
    gap: 10px;
    margin: 0 0 14px;
  }

  .rotulo-etapa .numero {
    font-family: 'IBM Plex Mono', monospace;
    font-size: 12px;
    color: var(--cor-acento);
    border: 1px solid var(--cor-acento);
    border-radius: 20px;
    padding: 2px 9px;
  }

  .rotulo-etapa .titulo {
    font-size: 15px;
    font-weight: 500;
    margin: 0;
  }

  .faixa-scroll {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding-bottom: 4px;
    scrollbar-width: none;
  }
  .faixa-scroll::-webkit-scrollbar { display: none; }

  .chip-profissional {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--cor-superficie-2);
    border: 1px solid transparent;
    border-radius: 30px;
    padding: 7px 16px 7px 7px;
    cursor: pointer;
    color: var(--cor-texto);
    font-size: 14px;
    font-family: inherit;
  }

  .chip-profissional .avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--cor-acento);
    color: var(--cor-acento-texto);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
  }

  .chip-profissional.selecionado {
    background: var(--cor-selecionado-bg);
    border-color: var(--cor-acento);
  }

  .grade-servicos {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }

  .cartao-servico {
    text-align: left;
    background: var(--cor-superficie-2);
    border: 1px solid transparent;
    border-radius: 12px;
    padding: 14px;
    cursor: pointer;
    color: var(--cor-texto);
    font-family: inherit;
  }

  .cartao-servico.selecionado {
    background: var(--cor-selecionado-bg);
    border-color: var(--cor-acento);
  }

  .cartao-servico .nome-servico {
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 6px;
  }

  .cartao-servico .detalhes-servico {
    display: flex;
    justify-content: space-between;
    font-family: 'IBM Plex Mono', monospace;
    font-size: 12px;
    color: var(--cor-texto-suave);
  }

  .chip-data {
    flex: 0 0 auto;
    width: 54px;
    text-align: center;
    background: var(--cor-superficie-2);
    border: 1px solid transparent;
    border-radius: 12px;
    padding: 10px 0;
    cursor: pointer;
    color: var(--cor-texto);
    font-family: inherit;
  }

  .chip-data .dia-semana {
    display: block;
    font-size: 11px;
    color: var(--cor-texto-suave);
    text-transform: uppercase;
  }

  .chip-data .dia-numero {
    display: block;
    font-family: 'IBM Plex Mono', monospace;
    font-size: 17px;
    margin-top: 4px;
  }

  .chip-data.selecionado {
    background: var(--cor-selecionado-bg);
    border-color: var(--cor-acento);
  }

  .grade-horarios {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
  }

  .chip-horario {
    background: var(--cor-superficie-2);
    border: 1px solid transparent;
    border-radius: 8px;
    padding: 9px 0;
    font-family: 'IBM Plex Mono', monospace;
    font-size: 13px;
    color: var(--cor-texto);
    cursor: pointer;
  }

  .chip-horario.selecionado {
    background: var(--cor-acento);
    border-color: var(--cor-acento);
    color: var(--cor-acento-texto);
    font-weight: 500;
  }

  .aviso-vazio {
    color: var(--cor-texto-suave);
    font-size: 13px;
    grid-column: 1 / -1;
    padding: 6px 0;
  }

  .canhoto {
    background: var(--cor-fundo-alt);
    border-radius: 0 0 18px 18px;
    padding: 22px 28px 26px;
  }

  .linha-resumo {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: var(--cor-texto-suave);
    margin-bottom: 6px;
  }

  .linha-resumo span:last-child {
    color: var(--cor-texto);
    font-family: 'IBM Plex Mono', monospace;
  }

  .linha-total {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin: 14px 0 18px;
    padding-top: 14px;
    border-top: 1px dashed var(--cor-linha);
  }

  .linha-total .rotulo {
    font-size: 13px;
    color: var(--cor-texto-suave);
  }

  .linha-total .valor {
    font-family: 'Fraunces', serif;
    font-size: 26px;
    color: var(--cor-acento);
  }

  .botao-confirmar {
    width: 100%;
    background: var(--cor-acento);
    color: var(--cor-acento-texto);
    border: none;
    border-radius: 10px;
    padding: 15px;
    font-size: 15px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
  }

  .botao-confirmar:hover { background: var(--cor-acento-hover); }

  .mensagem-erro {
    color: var(--cor-erro);
    font-size: 13px;
    margin: 10px 0 0;
    text-align: center;
    display: none;
  }

  .estado-confirmado {
    display: none;
    text-align: center;
    padding: 46px 28px;
  }

  .estado-confirmado .selo {
    display: inline-block;
    border: 2px solid var(--cor-acento);
    color: var(--cor-acento);
    font-family: 'IBM Plex Mono', monospace;
    font-size: 12px;
    letter-spacing: 0.14em;
    padding: 6px 14px;
    border-radius: 30px;
    transform: rotate(-4deg);
    margin-bottom: 18px;
  }

  .estado-confirmado h2 {
    font-family: 'Fraunces', serif;
    font-weight: 500;
    font-size: 22px;
    margin: 0 0 8px;
  }

  .estado-confirmado p {
    color: var(--cor-texto-suave);
    font-size: 14px;
    margin: 0;
  }

  @media (max-width: 420px) {
    .grade-servicos { grid-template-columns: 1fr; }
    .grade-horarios { grid-template-columns: repeat(3, 1fr); }
  }
</style>
</head>
<body>

<div class="pagina">

  <div class="cabecalho">
    <p class="marca">Fio <span>Estúdio</span></p>
    <p>Escolha o profissional, o serviço e o horário — sem ligação, sem espera.</p>
  </div>

  <div class="ficha" id="ficha">

    <div class="etapa">
      <div class="rotulo-etapa"><span class="numero">01</span><p class="titulo">Escolha o profissional</p></div>
      <div class="faixa-scroll" id="lista-profissionais"></div>
    </div>

    <div class="perfuracao"></div>

    <div class="etapa">
      <div class="rotulo-etapa"><span class="numero">02</span><p class="titulo">Escolha o serviço</p></div>
      <div class="grade-servicos" id="lista-servicos"></div>
    </div>

    <div class="perfuracao"></div>

    <div class="etapa">
      <div class="rotulo-etapa"><span class="numero">03</span><p class="titulo">Escolha a data</p></div>
      <div class="faixa-scroll" id="lista-datas"></div>
    </div>

    <div class="perfuracao"></div>

    <div class="etapa">
      <div class="rotulo-etapa"><span class="numero">04</span><p class="titulo">Escolha o horário</p></div>
      <div class="grade-horarios" id="lista-horarios">
        <p class="aviso-vazio">Selecione profissional, serviço e data primeiro.</p>
      </div>
    </div>

    <div class="canhoto">
      <div class="linha-resumo"><span>Profissional</span><span id="resumo-profissional">—</span></div>
      <div class="linha-resumo"><span>Serviço</span><span id="resumo-servico">—</span></div>
      <div class="linha-resumo"><span>Data e hora</span><span id="resumo-data-hora">—</span></div>
      <div class="linha-total">
        <span class="rotulo">Total</span>
        <span class="valor" id="resumo-valor">R$ 0</span>
      </div>
      <button class="botao-confirmar" id="botao-confirmar">Confirmar agendamento</button>
      <p class="mensagem-erro" id="mensagem-erro">Escolha profissional, serviço, data e horário antes de confirmar.</p>
    </div>

    <div class="estado-confirmado" id="estado-confirmado">
      <span class="selo">Confirmado</span>
      <h2>Agendamento marcado.</h2>
      <p id="texto-confirmado"></p>
    </div>

  </div>

</div>

<script>
  const profissionais = [
    { id: 1, nome: 'Marina' },
    { id: 2, nome: 'Diego' },
    { id: 3, nome: 'Paula' },
  ];

  const servicos = [
    { id: 1, nome: 'Corte', duracaoMin: 45, valor: 60 },
    { id: 2, nome: 'Escova', duracaoMin: 40, valor: 55 },
    { id: 3, nome: 'Coloração', duracaoMin: 120, valor: 180 },
    { id: 4, nome: 'Hidratação', duracaoMin: 50, valor: 70 },
  ];

  const diasSemana = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb'];

  const estado = { profissional: null, servico: null, data: null, hora: null };

  function gerarProximosDias(qtd) {
    const dias = [];
    const hoje = new Date();
    for (let i = 0; i < qtd; i++) {
      const d = new Date(hoje);
      d.setDate(hoje.getDate() + i);
      dias.push(d);
    }
    return dias;
  }

  function renderProfissionais() {
    const container = document.getElementById('lista-profissionais');
    container.innerHTML = '';
    profissionais.forEach(p => {
      const btn = document.createElement('button');
      btn.className = 'chip-profissional' + (estado.profissional === p.id ? ' selecionado' : '');
      btn.innerHTML = `<span class="avatar">${p.nome[0]}</span>${p.nome}`;
      btn.addEventListener('click', () => {
        estado.profissional = p.id;
        estado.hora = null;
        renderTudo();
      });
      container.appendChild(btn);
    });
  }

  function renderServicos() {
    const container = document.getElementById('lista-servicos');
    container.innerHTML = '';
    servicos.forEach(s => {
      const btn = document.createElement('button');
      btn.className = 'cartao-servico' + (estado.servico === s.id ? ' selecionado' : '');
      btn.innerHTML = `
        <p class="nome-servico">${s.nome}</p>
        <div class="detalhes-servico"><span>${s.duracaoMin} min</span><span>R$ ${s.valor}</span></div>
      `;
      btn.addEventListener('click', () => {
        estado.servico = s.id;
        estado.hora = null;
        renderTudo();
      });
      container.appendChild(btn);
    });
  }

  function renderDatas() {
    const container = document.getElementById('lista-datas');
    container.innerHTML = '';
    gerarProximosDias(14).forEach(d => {
      const chave = d.toISOString().slice(0, 10);
      const btn = document.createElement('button');
      btn.className = 'chip-data' + (estado.data === chave ? ' selecionado' : '');
      btn.innerHTML = `<span class="dia-semana">${diasSemana[d.getDay()]}</span><span class="dia-numero">${d.getDate()}</span>`;
      btn.addEventListener('click', () => {
        estado.data = chave;
        estado.hora = null;
        renderTudo();
      });
      container.appendChild(btn);
    });
  }

  // Em produção, isso vira um fetch para api/horarios_disponiveis.php
  function buscarHorariosDisponiveis(idProfissional, idServico, data) {
    if (!idProfissional || !idServico || !data) return [];
    const servico = servicos.find(s => s.id === idServico);
    const passos = [];
    let minutos = 9 * 60;
    const fimExpediente = 18 * 60;
    const almocoInicio = 12 * 60, almocoFim = 13 * 60;
    while (minutos + servico.duracaoMin <= fimExpediente) {
      if (!(minutos >= almocoInicio && minutos < almocoFim)) {
        passos.push(minutos);
      }
      minutos += servico.duracaoMin;
    }
    // remove alguns horários simulando agendamentos já feitos
    const ocupadosFalsos = new Set([passos[1], passos[4]]);
    return passos.filter(m => !ocupadosFalsos.has(m)).map(m => {
      const h = String(Math.floor(m / 60)).padStart(2, '0');
      const min = String(m % 60).padStart(2, '0');
      return `${h}:${min}`;
    });
  }

  function renderHorarios() {
    const container = document.getElementById('lista-horarios');
    container.innerHTML = '';
    const disponiveis = buscarHorariosDisponiveis(estado.profissional, estado.servico, estado.data);

    if (!estado.profissional || !estado.servico || !estado.data) {
      container.innerHTML = '<p class="aviso-vazio">Selecione profissional, serviço e data primeiro.</p>';
      return;
    }
    if (disponiveis.length === 0) {
      container.innerHTML = '<p class="aviso-vazio">Sem horários livres nesse dia.</p>';
      return;
    }
    disponiveis.forEach(h => {
      const btn = document.createElement('button');
      btn.className = 'chip-horario' + (estado.hora === h ? ' selecionado' : '');
      btn.textContent = h;
      btn.addEventListener('click', () => {
        estado.hora = h;
        renderTudo();
      });
      container.appendChild(btn);
    });
  }

  function renderResumo() {
    const prof = profissionais.find(p => p.id === estado.profissional);
    const serv = servicos.find(s => s.id === estado.servico);

    document.getElementById('resumo-profissional').textContent = prof ? prof.nome : '—';
    document.getElementById('resumo-servico').textContent = serv ? serv.nome : '—';

    let dataHoraTexto = '—';
    if (estado.data && estado.hora) {
      const [ano, mes, dia] = estado.data.split('-');
      dataHoraTexto = `${dia}/${mes} às ${estado.hora}`;
    } else if (estado.data) {
      const [ano, mes, dia] = estado.data.split('-');
      dataHoraTexto = `${dia}/${mes} — escolha o horário`;
    }
    document.getElementById('resumo-data-hora').textContent = dataHoraTexto;
    document.getElementById('resumo-valor').textContent = serv ? `R$ ${serv.valor}` : 'R$ 0';
  }

  function renderTudo() {
    renderProfissionais();
    renderServicos();
    renderDatas();
    renderHorarios();
    renderResumo();
  }

  document.getElementById('botao-confirmar').addEventListener('click', () => {
    const erro = document.getElementById('mensagem-erro');
    if (!estado.profissional || !estado.servico || !estado.data || !estado.hora) {
      erro.style.display = 'block';
      return;
    }
    erro.style.display = 'none';

    // Em produção: fetch POST para api/criar_agendamento.php
    const prof = profissionais.find(p => p.id === estado.profissional);
    const serv = servicos.find(s => s.id === estado.servico);
    const [ano, mes, dia] = estado.data.split('-');

    document.querySelectorAll('.etapa, .perfuracao, .canhoto').forEach(el => el.style.display = 'none');
    document.getElementById('estado-confirmado').style.display = 'block';
    document.getElementById('texto-confirmado').textContent =
      `${serv.nome} com ${prof.nome}, dia ${dia}/${mes} às ${estado.hora}.`;
  });

  renderTudo();
</script>

</body>
</html>