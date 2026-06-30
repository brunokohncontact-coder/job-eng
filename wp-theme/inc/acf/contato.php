<?php
/**
 * Campos editáveis da página CONTATO (page-contato.php).
 * Mesmo padrão da Home: cada campo já vem com o texto atual (default_value),
 * então o cliente vê o conteúdo de hoje e só edita o que quiser.
 *
 * Ficam FIXOS no template (não editáveis aqui): navegação/breadcrumb;
 * dados de contato (telefone, e-mail, redes — viram globais depois);
 * campos/labels/placeholders/options do formulário (viram Fluent Forms depois);
 * ícones/SVG; classes e estilos.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

acf_add_local_field_group( [
    'key'    => 'group_contato',
    'title'  => 'Conteúdo: Contato',
    'fields' => [

        /* ===== ABA: TOPO ===== */
        [ 'key' => 'tab_contato_topo', 'label' => 'Topo', 'type' => 'tab' ],

        [
            'key'           => 'field_contato_titulo_l1',
            'label'         => 'Título — linha 1',
            'name'          => 'contato_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título grande do topo.',
            'default_value' => 'Fale com',
        ],
        [
            'key'           => 'field_contato_titulo_l2a',
            'label'         => 'Título — linha 2 (início)',
            'name'          => 'contato_titulo_l2a',
            'type'          => 'text',
            'instructions'  => 'Início da segunda linha, antes da palavra em verde. Mantenha o espaço final.',
            'default_value' => 'a equipe ',
        ],
        [
            'key'           => 'field_contato_titulo_l2b',
            'label'         => 'Título — linha 2 (palavra em verde)',
            'name'          => 'contato_titulo_l2b',
            'type'          => 'text',
            'instructions'  => 'Palavra destacada em verde na segunda linha.',
            'default_value' => 'técnica',
        ],
        [
            'key'           => 'field_contato_titulo_l3',
            'label'         => 'Título — linha 3 (itálico)',
            'name'          => 'contato_titulo_l3',
            'type'          => 'text',
            'instructions'  => 'Terceira linha, em itálico cinza.',
            'default_value' => 'da JOB.',
        ],
        [
            'key'           => 'field_contato_hero_sub',
            'label'         => 'Texto do topo',
            'name'          => 'contato_hero_sub',
            'type'          => 'textarea',
            'rows'          => 2,
            'instructions'  => 'Frase curta abaixo do título “Fale com a equipe técnica da JOB.”',
            'default_value' => 'Solicite proposta, tire dúvidas técnicas ou agende uma visita.',
        ],
        [
            'key'           => 'field_contato_topo_dt1',
            'label'         => 'Topo — rótulo 1',
            'name'          => 'contato_topo_dt1',
            'type'          => 'text',
            'instructions'  => 'Rótulo do primeiro item da lista no canto superior direito.',
            'default_value' => 'Atendimento',
        ],
        [
            'key'           => 'field_contato_topo_dd1',
            'label'         => 'Topo — valor 1',
            'name'          => 'contato_topo_dd1',
            'type'          => 'text',
            'instructions'  => 'Valor do primeiro item (ex.: dias e horário).',
            'default_value' => 'Seg–Sex · 9–18h',
        ],
        [
            'key'           => 'field_contato_topo_dt2',
            'label'         => 'Topo — rótulo 2',
            'name'          => 'contato_topo_dt2',
            'type'          => 'text',
            'instructions'  => 'Rótulo do segundo item da lista no canto superior direito.',
            'default_value' => 'Sede',
        ],
        [
            'key'           => 'field_contato_topo_dd2',
            'label'         => 'Topo — valor 2',
            'name'          => 'contato_topo_dd2',
            'type'          => 'text',
            'instructions'  => 'Valor do segundo item (ex.: cidade / estado).',
            'default_value' => 'Tamboré · SP',
        ],
        [
            'key'           => 'field_contato_figcaption',
            'label'         => 'Legenda da foto',
            'name'          => 'contato_figcaption',
            'type'          => 'text',
            'instructions'  => 'Legenda sobre a foto do edifício.',
            'default_value' => 'Atendimento técnico · Tamboré · SP',
        ],

        /* ===== ABA: CANAIS DIRETOS ===== */
        [ 'key' => 'tab_contato_canais', 'label' => 'Canais diretos', 'type' => 'tab' ],

        [
            'key'           => 'field_contato_canal1_label',
            'label'         => 'Canal 1 — rótulo',
            'name'          => 'contato_canal1_label',
            'type'          => 'text',
            'instructions'  => 'Rótulo do telefone (o número fica fixo no template).',
            'default_value' => 'Telefone',
        ],
        [
            'key'           => 'field_contato_canal1_cta',
            'label'         => 'Canal 1 — botão',
            'name'          => 'contato_canal1_cta',
            'type'          => 'text',
            'instructions'  => 'Texto do link à direita do telefone.',
            'default_value' => 'Ligar →',
        ],
        [
            'key'           => 'field_contato_canal2_label',
            'label'         => 'Canal 2 — rótulo',
            'name'          => 'contato_canal2_label',
            'type'          => 'text',
            'instructions'  => 'Rótulo do e-mail (o endereço fica fixo no template).',
            'default_value' => 'E-mail comercial · Proposta técnica',
        ],
        [
            'key'           => 'field_contato_canal2_cta',
            'label'         => 'Canal 2 — botão',
            'name'          => 'contato_canal2_cta',
            'type'          => 'text',
            'instructions'  => 'Texto do link à direita do e-mail.',
            'default_value' => 'Enviar e-mail →',
        ],
        [
            'key'           => 'field_contato_canal3_label',
            'label'         => 'Canal 3 — rótulo',
            'name'          => 'contato_canal3_label',
            'type'          => 'text',
            'instructions'  => 'Rótulo do horário de atendimento.',
            'default_value' => 'Horário de atendimento',
        ],
        [
            'key'           => 'field_contato_canal3_dias',
            'label'         => 'Canal 3 — dias',
            'name'          => 'contato_canal3_dias',
            'type'          => 'text',
            'instructions'  => 'Dias de atendimento (ex.: Seg. a Sex.).',
            'default_value' => 'Seg. a Sex.',
        ],
        [
            'key'           => 'field_contato_canal3_horas',
            'label'         => 'Canal 3 — horário',
            'name'          => 'contato_canal3_horas',
            'type'          => 'text',
            'instructions'  => 'Texto do horário (linha menor).',
            'default_value' => '9h às 18h · horário de Brasília',
        ],

        /* ===== ABA: FORMULÁRIO ===== */
        [ 'key' => 'tab_contato_form', 'label' => 'Formulário', 'type' => 'tab' ],

        [
            'key'           => 'field_contato_form_titulo_l1',
            'label'         => 'Título do bloco — linha 1',
            'name'          => 'contato_form_titulo_l1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título acima do formulário.',
            'default_value' => 'Fale com',
        ],
        [
            'key'           => 'field_contato_form_titulo_l2',
            'label'         => 'Título do bloco — linha 2 (itálico)',
            'name'          => 'contato_form_titulo_l2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha do título, em itálico cinza.',
            'default_value' => 'equipe técnica.',
        ],
        [
            'key'           => 'field_contato_form_titulo_l2_pre',
            'label'         => 'Título do bloco — palavra antes do itálico',
            'name'          => 'contato_form_titulo_l2_pre',
            'type'          => 'text',
            'instructions'  => 'Palavra antes da parte em itálico na segunda linha. Mantenha o espaço final.',
            'default_value' => 'nossa ',
        ],
        [
            'key'           => 'field_contato_form_intro1',
            'label'         => 'Texto de apresentação do formulário',
            'name'          => 'contato_form_intro1',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Parágrafo principal ao lado do formulário.',
            'default_value' => 'Preencha com o máximo de informações possíveis. Nosso time técnico retorna com a melhor solução para o seu negócio.',
        ],
        [
            'key'           => 'field_contato_form_intro2',
            'label'         => 'Texto secundário (canais diretos)',
            'name'          => 'contato_form_intro2',
            'type'          => 'textarea',
            'rows'          => 2,
            'instructions'  => 'Frase que aponta para os canais de atendimento direto.',
            'default_value' => 'Prefere atendimento direto? Use os canais ao lado.',
        ],
        [
            'key'           => 'field_contato_social_label',
            'label'         => 'Rótulo das redes sociais',
            'name'          => 'contato_social_label',
            'type'          => 'text',
            'instructions'  => 'Texto acima dos ícones de redes sociais.',
            'default_value' => 'Acompanhe a JOB',
        ],
        [
            'key'           => 'field_contato_form_titulo',
            'label'         => 'Rótulo do formulário',
            'name'          => 'contato_form_titulo',
            'type'          => 'text',
            'instructions'  => 'Título pequeno no topo do bloco do formulário.',
            'default_value' => 'Formulário de proposta',
        ],
        [
            'key'           => 'field_contato_btn',
            'label'         => 'Texto do botão de envio',
            'name'          => 'contato_btn',
            'type'          => 'text',
            'instructions'  => 'Rótulo do botão que envia o formulário.',
            'default_value' => 'Enviar mensagem',
        ],

    ],
    'location' => [ [ [
        'param'    => 'page',
        'operator' => '==',
        'value'    => 9,
    ] ] ],
    'menu_order'            => 0,
    'position'              => 'normal',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
] );
