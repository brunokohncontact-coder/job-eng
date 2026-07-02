<?php
/**
 * Campos editáveis da página "Sobre a Empresa" (page-sobre.php).
 * Mesmo padrão da Home: abas por seção, cada campo já vem com o texto
 * atual (default_value), então o cliente vê o conteúdo de hoje e só edita
 * o que quiser. Tudo prefixado com sobre_ para não colidir com outras páginas.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

acf_add_local_field_group( [
    'key'    => 'group_sobre',
    'title'  => 'Conteúdo: Sobre a Empresa',
    'fields' => [

        /* ───────── TOPO ───────── */
        [ 'key' => 'tab_sobre_topo', 'label' => 'Topo', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_titulo_l1',
            'label'         => 'Título principal — linha 1',
            'name'          => 'sobre_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título do topo (preta).',
            'default_value' => 'Quem é a',
        ],
        [
            'key'           => 'field_sobre_titulo_l2',
            'label'         => 'Título principal — linha 2 (verde)',
            'name'          => 'sobre_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha do título (destaque verde).',
            'default_value' => 'JOB Engenharia',
        ],
        [
            'key'           => 'field_sobre_titulo_l3',
            'label'         => 'Título principal — linha 3 (itálico)',
            'name'          => 'sobre_titulo_l3',
            'type'          => 'text',
            'instructions'  => 'Terceira linha do título (itálico cinza).',
            'default_value' => 'desde 1981.',
        ],
        [
            'key'           => 'field_sobre_hero_intro',
            'label'         => 'Texto de apresentação (topo)',
            'name'          => 'sobre_hero_intro',
            'type'          => 'textarea',
            'rows'          => 4,
            'instructions'  => 'Parágrafo ao lado do título principal do topo da página.',
            'default_value' => 'Há mais de quatro décadas, a JOB Engenharia desenvolve e executa serviços de engenharia voltados à infraestrutura, conservação de ativos, engenharia predial e tecnologia ambiental. Atuamos desde o planejamento até a implantação, operação e modernização dos serviços, combinando experiência técnica, inovação e eficiência operacional para gerar valor e resultados duradouros para nossos clientes.',
        ],

        /* ───────── ENGENHARIA EM CAMPO ───────── */
        [ 'key' => 'tab_sobre_campo', 'label' => 'Engenharia em campo', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_campo_rotulo',
            'label'         => 'Rótulo da seção',
            'name'          => 'sobre_campo_rotulo',
            'type'          => 'text',
            'instructions'  => 'Rótulo curto acima da frase (faixa da foto).',
            'default_value' => 'Engenharia em campo',
        ],
        [
            'key'           => 'field_sobre_campo_frase',
            'label'         => 'Frase de destaque',
            'name'          => 'sobre_campo_frase',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Frase em destaque ao lado da foto.',
            'default_value' => 'Mais de quatro décadas construindo uma trajetória de evolução, inovação e compromisso com a engenharia.',
        ],

        /* ───────── TRAJETÓRIA ───────── */
        [ 'key' => 'tab_sobre_traj', 'label' => 'Trajetória', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_traj_titulo_l1',
            'label'         => 'Título da seção — linha 1',
            'name'          => 'sobre_traj_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título "Trajetória".',
            'default_value' => 'Trajetória,',
        ],
        [
            'key'           => 'field_sobre_traj_titulo_l2',
            'label'         => 'Título da seção — linha 2 (itálico)',
            'name'          => 'sobre_traj_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha do título (itálico cinza).',
            'default_value' => 'passo a passo.',
        ],
        [
            'key'           => 'field_sobre_traj_p1',
            'label'         => 'Trajetória — parágrafo 1',
            'name'          => 'sobre_traj_p1',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Primeiro parágrafo introdutório da seção Trajetória.',
            'default_value' => 'Há mais de quatro décadas, a JOB Engenharia constrói uma trajetória marcada pela evolução contínua, pela capacidade de adaptação e pelo compromisso com a excelência técnica.',
        ],
        [
            'key'           => 'field_sobre_traj_p2',
            'label'         => 'Trajetória — parágrafo 2',
            'name'          => 'sobre_traj_p2',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Segundo parágrafo introdutório da seção Trajetória.',
            'default_value' => 'Ao longo dos anos, ampliamos nossa atuação, incorporamos novas tecnologias e aperfeiçoamos nossos processos para acompanhar as transformações do setor e entregar soluções cada vez mais completas, eficientes e sustentáveis aos nossos clientes.',
        ],

        /* Linha do tempo — item 1 */
        [
            'key'           => 'field_sobre_tl1_ano',
            'label'         => 'Linha do tempo 1 — ano',
            'name'          => 'sobre_tl1_ano',
            'type'          => 'text',
            'default_value' => '1981',
        ],
        [
            'key'           => 'field_sobre_tl1_titulo',
            'label'         => 'Linha do tempo 1 — título',
            'name'          => 'sobre_tl1_titulo',
            'type'          => 'text',
            'default_value' => 'Fundação',
        ],
        [
            'key'           => 'field_sobre_tl1_desc',
            'label'         => 'Linha do tempo 1 — descrição',
            'name'          => 'sobre_tl1_desc',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Início das operações com foco em obras, reformas e serviços de manutenção, com forte presença nas áreas hidráulica e elétrica.',
        ],

        /* Linha do tempo — item 2 */
        [
            'key'           => 'field_sobre_tl2_ano',
            'label'         => 'Linha do tempo 2 — ano',
            'name'          => 'sobre_tl2_ano',
            'type'          => 'text',
            'default_value' => 'Anos 90',
        ],
        [
            'key'           => 'field_sobre_tl2_titulo',
            'label'         => 'Linha do tempo 2 — título',
            'name'          => 'sobre_tl2_titulo',
            'type'          => 'text',
            'default_value' => 'Expansão de portfólio',
        ],
        [
            'key'           => 'field_sobre_tl2_desc',
            'label'         => 'Linha do tempo 2 — descrição',
            'name'          => 'sobre_tl2_desc',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Incorporação dos serviços de zeladoria urbana e expansão da atuação para a área de saneamento.',
        ],

        /* Linha do tempo — item 3 */
        [
            'key'           => 'field_sobre_tl3_ano',
            'label'         => 'Linha do tempo 3 — ano',
            'name'          => 'sobre_tl3_ano',
            'type'          => 'text',
            'default_value' => 'Anos 2000',
        ],
        [
            'key'           => 'field_sobre_tl3_titulo',
            'label'         => 'Linha do tempo 3 — título',
            'name'          => 'sobre_tl3_titulo',
            'type'          => 'text',
            'default_value' => 'Tecnologia ambiental',
        ],
        [
            'key'           => 'field_sobre_tl3_desc',
            'label'         => 'Linha do tempo 3 — descrição',
            'name'          => 'sobre_tl3_desc',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Desenvolvimento das primeiras metodologias próprias para análise de sistemas hídricos e início do programa de monitoramento ambiental — base do que se tornaria a plataforma Ecojob.',
        ],

        /* Linha do tempo — item 4 */
        [
            'key'           => 'field_sobre_tl4_ano',
            'label'         => 'Linha do tempo 4 — ano',
            'name'          => 'sobre_tl4_ano',
            'type'          => 'text',
            'default_value' => 'Anos 2010',
        ],
        [
            'key'           => 'field_sobre_tl4_titulo',
            'label'         => 'Linha do tempo 4 — título',
            'name'          => 'sobre_tl4_titulo',
            'type'          => 'text',
            'default_value' => 'Tecnologia própria',
        ],
        [
            'key'           => 'field_sobre_tl4_desc',
            'label'         => 'Linha do tempo 4 — descrição',
            'name'          => 'sobre_tl4_desc',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Desenvolvimento de tecnologias próprias, como sondas multiparamétricas para análise quali-quantitativa da água, reforçando nosso compromisso com a inovação, a precisão no monitoramento ambiental e a evolução tecnológica.',
        ],

        /* Linha do tempo — item 5 */
        [
            'key'           => 'field_sobre_tl5_ano',
            'label'         => 'Linha do tempo 5 — ano',
            'name'          => 'sobre_tl5_ano',
            'type'          => 'text',
            'default_value' => 'Hoje',
        ],
        [
            'key'           => 'field_sobre_tl5_titulo',
            'label'         => 'Linha do tempo 5 — título',
            'name'          => 'sobre_tl5_titulo',
            'type'          => 'text',
            'default_value' => 'Atuação integrada',
        ],
        [
            'key'           => 'field_sobre_tl5_desc',
            'label'         => 'Linha do tempo 5 — descrição',
            'name'          => 'sobre_tl5_desc',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Com mais de quatro décadas de experiência, a JOB Engenharia reúne engenharia, tecnologia e gestão em uma atuação integrada, preparada para atender aos desafios atuais e futuros de seus clientes.',
        ],

        /* ───────── PRINCÍPIOS ───────── */
        [ 'key' => 'tab_sobre_princ', 'label' => 'Princípios', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_princ_titulo_l1',
            'label'         => 'Título da seção — linha 1',
            'name'          => 'sobre_princ_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título "Missão, visão".',
            'default_value' => 'Missão, visão',
        ],
        [
            'key'           => 'field_sobre_princ_titulo_l2',
            'label'         => 'Título da seção — linha 2 (início)',
            'name'          => 'sobre_princ_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Início da segunda linha (antes da palavra em itálico).',
            'default_value' => 'e',
        ],
        [
            'key'           => 'field_sobre_princ_titulo_hl',
            'label'         => 'Título da seção — palavra em itálico',
            'name'          => 'sobre_princ_titulo_hl',
            'type'          => 'text',
            'instructions'  => 'Palavra final em itálico cinza ("valores").',
            'default_value' => 'valores.',
        ],
        [
            'key'           => 'field_sobre_princ_intro',
            'label'         => 'Princípios — texto de apresentação',
            'name'          => 'sobre_princ_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Parágrafo introdutório da seção Missão, visão e valores.',
            'default_value' => 'Os princípios que orientam nossas escolhas técnicas, aplicação de tecnologias e a condução de nossas relações com clientes, equipes e parceiros.',
        ],
        [
            'key'           => 'field_sobre_missao_titulo',
            'label'         => 'Missão — subtítulo',
            'name'          => 'sobre_missao_titulo',
            'type'          => 'text',
            'default_value' => 'Por que existimos',
        ],
        [
            'key'           => 'field_sobre_missao_texto',
            'label'         => 'Missão — texto',
            'name'          => 'sobre_missao_texto',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Transformar engenharia em soluções eficientes e sustentáveis, atuando com excelência técnica, inovação e compromisso socioambiental.',
        ],
        [
            'key'           => 'field_sobre_visao_titulo',
            'label'         => 'Visão — subtítulo',
            'name'          => 'sobre_visao_titulo',
            'type'          => 'text',
            'default_value' => 'Onde queremos chegar',
        ],
        [
            'key'           => 'field_sobre_visao_texto',
            'label'         => 'Visão — texto',
            'name'          => 'sobre_visao_texto',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Ser uma referência nacional em engenharia e soluções ambientais, destacando-se pela capacidade técnica, inovação contínua e excelência na entrega de resultados.',
        ],
        [
            'key'           => 'field_sobre_valores_titulo',
            'label'         => 'Valores — subtítulo',
            'name'          => 'sobre_valores_titulo',
            'type'          => 'text',
            'instructions'  => 'Subtítulo da lista de valores.',
            'default_value' => 'O que praticamos',
        ],
        [
            'key'           => 'field_sobre_valores_item1',
            'label'         => 'Valores — item 1',
            'name'          => 'sobre_valores_item1',
            'type'          => 'text',
            'default_value' => 'Responsabilidade técnica',
        ],
        [
            'key'           => 'field_sobre_valores_item2',
            'label'         => 'Valores — item 2',
            'name'          => 'sobre_valores_item2',
            'type'          => 'text',
            'default_value' => 'Sustentabilidade ambiental',
        ],
        [
            'key'           => 'field_sobre_valores_item3',
            'label'         => 'Valores — item 3',
            'name'          => 'sobre_valores_item3',
            'type'          => 'text',
            'default_value' => 'Inovação aplicada',
        ],
        [
            'key'           => 'field_sobre_valores_item4',
            'label'         => 'Valores — item 4',
            'name'          => 'sobre_valores_item4',
            'type'          => 'text',
            'default_value' => 'Compromisso com prazo e qualidade',
        ],
        [
            'key'           => 'field_sobre_valores_item5',
            'label'         => 'Valores — item 5',
            'name'          => 'sobre_valores_item5',
            'type'          => 'text',
            'default_value' => 'Respeito às pessoas e ao meio ambiente',
        ],

        /* ───────── NÚMEROS ───────── */
        [ 'key' => 'tab_sobre_num', 'label' => 'Números', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_num_titulo_l1',
            'label'         => 'Título da seção — linha 1',
            'name'          => 'sobre_num_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título.',
            'default_value' => 'Quatro décadas',
        ],
        [
            'key'           => 'field_sobre_num_titulo_l2',
            'label'         => 'Título da seção — linha 2 (verde)',
            'name'          => 'sobre_num_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha — a palavra "resultados" fica em verde.',
            'default_value' => 'resultados',
        ],
        [
            'key'           => 'field_sobre_num_titulo_l3',
            'label'         => 'Título da seção — linha 3 (itálico)',
            'name'          => 'sobre_num_titulo_l3',
            'type'          => 'text',
            'instructions'  => 'Terceira linha do título (itálico cinza).',
            'default_value' => 'em campo.',
        ],
        [
            'key'           => 'field_sobre_num_intro',
            'label'         => 'Números — texto de apresentação',
            'name'          => 'sobre_num_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Parágrafo introdutório da seção de números.',
            'default_value' => 'Operação contínua, equipe própria e desenvolvimento de tecnologia interna — dados consolidados ao longo da trajetória da empresa.',
        ],

        /* Estatística 1 */
        [
            'key'           => 'field_sobre_stat1_num',
            'label'         => 'Estatística 1 — número',
            'name'          => 'sobre_stat1_num',
            'type'          => 'text',
            'instructions'  => 'Apenas o número (o sinal "+" é fixo no layout).',
            'default_value' => '15.000',
        ],
        [
            'key'           => 'field_sobre_stat1_label',
            'label'         => 'Estatística 1 — rótulo',
            'name'          => 'sobre_stat1_label',
            'type'          => 'text',
            'default_value' => 'Vias pavimentadas',
        ],

        /* Estatística 2 */
        [
            'key'           => 'field_sobre_stat2_num',
            'label'         => 'Estatística 2 — número',
            'name'          => 'sobre_stat2_num',
            'type'          => 'text',
            'default_value' => '4.000',
        ],
        [
            'key'           => 'field_sobre_stat2_label',
            'label'         => 'Estatística 2 — rótulo',
            'name'          => 'sobre_stat2_label',
            'type'          => 'text',
            'default_value' => 'Redes desobstruídas',
        ],

        /* Estatística 3 */
        [
            'key'           => 'field_sobre_stat3_num',
            'label'         => 'Estatística 3 — número',
            'name'          => 'sobre_stat3_num',
            'type'          => 'text',
            'default_value' => 'xx',
        ],
        [
            'key'           => 'field_sobre_stat3_label',
            'label'         => 'Estatística 3 — rótulo (parte 1)',
            'name'          => 'sobre_stat3_label',
            'type'          => 'text',
            'instructions'  => 'Texto principal do rótulo (antes do destaque verde).',
            'default_value' => 'Monitoramento em operação',
        ],
        [
            'key'           => 'field_sobre_stat3_label_hl',
            'label'         => 'Estatística 3 — rótulo (destaque verde)',
            'name'          => 'sobre_stat3_label_hl',
            'type'          => 'text',
            'instructions'  => 'Trecho em verde-claro ao final do rótulo.',
            'default_value' => '— Plataforma Ecojob',
        ],

        /* Estatística 4 */
        [
            'key'           => 'field_sobre_stat4_num',
            'label'         => 'Estatística 4 — número',
            'name'          => 'sobre_stat4_num',
            'type'          => 'text',
            'instructions'  => 'Apenas o número (o sinal "%" é fixo no layout).',
            'default_value' => '160.000',
        ],
        [
            'key'           => 'field_sobre_stat4_label',
            'label'         => 'Estatística 4 — rótulo',
            'name'          => 'sobre_stat4_label',
            'type'          => 'text',
            'default_value' => 'Redes inspecionadas por CFTV',
        ],
        [
            'key'           => 'field_sobre_num_nota',
            'label'         => 'Números — nota de rodapé',
            'name'          => 'sobre_num_nota',
            'type'          => 'text',
            'instructions'  => 'Nota em letra pequena abaixo dos números.',
            'default_value' => '/ nº de pontos de monitoramento (xx) a confirmar com a empresa',
        ],

        /* ───────── CTA ───────── */
        [ 'key' => 'tab_sobre_cta', 'label' => 'Chamada final (CTA)', 'type' => 'tab' ],
        [
            'key'           => 'field_sobre_cta_titulo_l1',
            'label'         => 'CTA — título linha 1',
            'name'          => 'sobre_cta_titulo_l1',
            'type'          => 'text',
            'default_value' => 'Construa',
        ],
        [
            'key'           => 'field_sobre_cta_titulo_l2',
            'label'         => 'CTA — título linha 2 (antes do destaque)',
            'name'          => 'sobre_cta_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Início da segunda linha (antes da palavra em destaque).',
            'default_value' => 'com a',
        ],
        [
            'key'           => 'field_sobre_cta_titulo_hl',
            'label'         => 'CTA — palavra em destaque',
            'name'          => 'sobre_cta_titulo_hl',
            'type'          => 'text',
            'instructions'  => 'Palavra final em itálico verde-claro.',
            'default_value' => 'JOB.',
        ],
        [
            'key'           => 'field_sobre_cta_btn1',
            'label'         => 'CTA — botão 1 (texto)',
            'name'          => 'sobre_cta_btn1',
            'type'          => 'text',
            'instructions'  => 'Texto do botão principal (leva ao formulário de contato).',
            'default_value' => 'Solicitar proposta',
        ],
        [
            'key'           => 'field_sobre_cta_btn2',
            'label'         => 'CTA — botão 2 (texto)',
            'name'          => 'sobre_cta_btn2',
            'type'          => 'text',
            'instructions'  => 'Texto do botão secundário (leva aos serviços).',
            'default_value' => 'Conhecer serviços',
        ],

    ],
    'location' => [ [ [
        'param'    => 'page',
        'operator' => '==',
        'value'    => 7,
    ] ] ],
    'menu_order'            => 0,
    'position'              => 'normal',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
] );
