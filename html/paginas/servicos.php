<?php
    require_once ("../conexao.php");
    require_once ("../funcoes.php");

$produtos = listarprodutos($conexao);

foreach ($produtos as $produto) {
    print_r($produto);
    echo "<br>";
}

?>


<!-- ===== Catálogo de serviços ===== -->
            <main class="catalogo_pagprod">

                <div class="grid-servicos_pagprod">

                    <article class="card-servico_pagprod">
                        <img src="hidratacao1.jpg" alt="Hidratação capilar">
                        <span class="tag_pagprod">Hidratação</span>
                        <p class="descricao_pagprod">Hidratação Wella feita com a maior qualidade para vocês clientes.</p>
                        <div class="info_pagprod">
                            <span class="label_pagprod">Duração</span>
                            <span class="valor_pagprod">15 min.</span>
                        </div>
                        <div class="info info-preco_pagprod">
                            <span class="label_pagprod">Produtos<br><strong>Wella</strong></span>
                            <span class="preco_pagprod">R$ 100,00</span>
                        </div>
                    </article>

                </div>
                <button class="btn-add"><a href="../servicos/cad_serv.php">Adicionar novo serviço</a><span>+</span></button>

            </main>

        </div>

    </div>