<?php
/**
 * Campos editáveis da página "Obrigado" (page-obrigado.php).
 * Mesmo padrão da home: abas por seção e default_value com o texto atual,
 * então o cliente já vê o conteúdo de hoje e só edita o que quiser.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

acf_add_local_field_group( [
    'key'    => 'group_obrigado',
    'title'  => 'Conteúdo: Obrigado',
    'fields' => [

        [ 'key' => 'tab_obrigado_principal', 'label' => 'Mensagem', 'type' => 'tab' ],
        [
            'key'           => 'field_obrigado_status',
            'label'         => 'Rótulo de status (topo)',
            'name'          => 'obrigado_status',
            'type'          => 'text',
            'instructions'  => 'Pequeno rótulo monoespaçado acima do título.',
            'default_value' => 'Status · 200 OK',
        ],
        [
            'key'           => 'field_obrigado_titulo1',
            'label'         => 'Título — linha 1',
            'name'          => 'obrigado_titulo1',
            'type'          => 'text',
            'instructions'  => 'Primeira linha do título (preto).',
            'default_value' => 'Mensagem',
        ],
        [
            'key'           => 'field_obrigado_titulo2',
            'label'         => 'Título — linha 2 (verde)',
            'name'          => 'obrigado_titulo2',
            'type'          => 'text',
            'instructions'  => 'Segunda linha do título, exibida em verde.',
            'default_value' => 'recebida.',
        ],
        [
            'key'           => 'field_obrigado_titulo3',
            'label'         => 'Título — linha 3 (itálico cinza)',
            'name'          => 'obrigado_titulo3',
            'type'          => 'text',
            'instructions'  => 'Terceira linha do título, exibida em itálico cinza claro.',
            'default_value' => 'Obrigado.',
        ],
        [
            'key'           => 'field_obrigado_texto',
            'label'         => 'Texto de confirmação',
            'name'          => 'obrigado_texto',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Parágrafo abaixo do título, explicando que a mensagem foi recebida.',
            'default_value' => 'Sua solicitação foi recebida pela nossa equipe técnica. Entraremos em contato pelo telefone ou e-mail informado.',
        ],

        [ 'key' => 'tab_obrigado_botoes', 'label' => 'Botões', 'type' => 'tab' ],
        [
            'key'           => 'field_obrigado_cta1',
            'label'         => 'Botão 1 (voltar à home)',
            'name'          => 'obrigado_cta1',
            'type'          => 'text',
            'instructions'  => 'Texto do primeiro botão.',
            'default_value' => 'Voltar à home',
        ],
        [
            'key'           => 'field_obrigado_cta2',
            'label'         => 'Botão 2 (serviços)',
            'name'          => 'obrigado_cta2',
            'type'          => 'text',
            'instructions'  => 'Texto do segundo botão.',
            'default_value' => 'Conhecer serviços',
        ],

        [ 'key' => 'tab_obrigado_lateral', 'label' => 'Lateral', 'type' => 'tab' ],
        [
            'key'           => 'field_obrigado_dt_atendimento',
            'label'         => 'Rótulo "Atendimento"',
            'name'          => 'obrigado_dt_atendimento',
            'type'          => 'text',
            'instructions'  => 'Rótulo da primeira linha da lista lateral.',
            'default_value' => 'Atendimento',
        ],
        [
            'key'           => 'field_obrigado_dd_atendimento',
            'label'         => 'Valor do atendimento (horário)',
            'name'          => 'obrigado_dd_atendimento',
            'type'          => 'text',
            'instructions'  => 'Horário de atendimento exibido na lista lateral.',
            'default_value' => 'Seg–Sex · 9–18h',
        ],
        [
            'key'           => 'field_obrigado_dt_protocolo',
            'label'         => 'Rótulo "Protocolo"',
            'name'          => 'obrigado_dt_protocolo',
            'type'          => 'text',
            'instructions'  => 'Rótulo da segunda linha da lista lateral (o número é gerado automaticamente).',
            'default_value' => 'Protocolo',
        ],
        [
            'key'           => 'field_obrigado_imediato',
            'label'         => 'Rótulo "Atendimento imediato"',
            'name'          => 'obrigado_imediato',
            'type'          => 'text',
            'instructions'  => 'Rótulo acima do telefone na coluna lateral.',
            'default_value' => 'Atendimento imediato',
        ],

    ],
    'location' => [ [ [
        'param'    => 'page',
        'operator' => '==',
        'value'    => 13,
    ] ] ],
    'menu_order'            => 0,
    'position'              => 'normal',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'active'                => true,
] );
