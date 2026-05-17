<?php

/* ═══════════════════════════════════════════════════════
   1. THEME SETUP
═══════════════════════════════════════════════════════ */
function job_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ] );

    register_nav_menus( [
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Rodapé',
    ] );
}
add_action( 'after_setup_theme', 'job_theme_setup' );


/* ═══════════════════════════════════════════════════════
   2. ENQUEUE — CSS compilado + JS
═══════════════════════════════════════════════════════ */
function job_enqueue_assets() {
    wp_enqueue_style(
        'job-app',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'job-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true  // carrega no footer
    );
}
add_action( 'wp_enqueue_scripts', 'job_enqueue_assets' );


/* ═══════════════════════════════════════════════════════
   3. CUSTOM POST TYPES
═══════════════════════════════════════════════════════ */
function job_register_post_types() {

    /* ── Tecnologia (RCK 3000, EJ 01–04) ── */
    register_post_type( 'tecnologia', [
        'labels' => [
            'name'               => 'Tecnologias',
            'singular_name'      => 'Tecnologia',
            'add_new'            => 'Adicionar tecnologia',
            'add_new_item'       => 'Adicionar nova tecnologia',
            'edit_item'          => 'Editar tecnologia',
            'new_item'           => 'Nova tecnologia',
            'view_item'          => 'Ver tecnologia',
            'search_items'       => 'Buscar tecnologias',
            'not_found'          => 'Nenhuma tecnologia encontrada',
            'not_found_in_trash' => 'Nenhuma tecnologia na lixeira',
        ],
        'public'        => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-hammer',
        'menu_position' => 5,
        'supports'      => [ 'title', 'thumbnail', 'revisions' ],
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'tecnologias' ],
    ] );
}
add_action( 'init', 'job_register_post_types' );


/* ═══════════════════════════════════════════════════════
   4. ACF — OPTIONS PAGE
   Requer ACF Pro (ou ACF Free ≥ 6.1 com o add-on de options)
═══════════════════════════════════════════════════════ */
function job_register_options_page() {
    if ( ! function_exists( 'acf_add_options_page' ) ) return;

    acf_add_options_page( [
        'page_title' => 'Configurações JOB Engenharia',
        'menu_title' => 'Config. JOB',
        'menu_slug'  => 'job-configuracoes',
        'capability' => 'manage_options',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-site-alt3',
        'position'   => 3,
    ] );
}
add_action( 'acf/init', 'job_register_options_page' );


/* ═══════════════════════════════════════════════════════
   5. ACF — FIELD GROUP: CONFIGURAÇÕES GLOBAIS
   Campos registrados via PHP (versionados, sem depender do banco)
   Uso nos templates: get_field('nome_do_campo', 'option')
═══════════════════════════════════════════════════════ */
function job_acf_opcoes_globais() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'   => 'group_job_opcoes_globais',
        'title' => 'Dados Globais de Contato',
        'fields' => [

            [
                'key'          => 'field_job_telefone',
                'label'        => 'Telefone',
                'name'         => 'telefone',
                'type'         => 'text',
                'instructions' => 'Formato: (11) 3333-3333',
                'placeholder'  => '(00) 0000-0000',
            ],

            [
                'key'          => 'field_job_whatsapp',
                'label'        => 'WhatsApp',
                'name'         => 'whatsapp',
                'type'         => 'text',
                'instructions' => 'Apenas dígitos com DDD, sem formatação: 11999999999',
                'placeholder'  => '11999999999',
            ],

            [
                'key'         => 'field_job_email',
                'label'       => 'E-mail comercial',
                'name'        => 'email_comercial',
                'type'        => 'email',
                'placeholder' => 'contato@job.eng.br',
            ],

            [
                'key'         => 'field_job_endereco',
                'label'       => 'Endereço',
                'name'        => 'endereco',
                'type'        => 'textarea',
                'rows'        => 3,
                'placeholder' => 'Rua, número — Cidade / UF',
            ],

            [
                'key'         => 'field_job_linkedin',
                'label'       => 'LinkedIn (URL)',
                'name'        => 'linkedin_url',
                'type'        => 'url',
                'placeholder' => 'https://linkedin.com/company/job-engenharia',
            ],

            [
                'key'         => 'field_job_instagram',
                'label'       => 'Instagram (URL)',
                'name'        => 'instagram_url',
                'type'        => 'url',
                'placeholder' => 'https://instagram.com/jobengenharia',
            ],

            [
                'key'           => 'field_job_ano_copyright',
                'label'         => 'Ano copyright',
                'name'          => 'ano_copyright',
                'type'          => 'number',
                'default_value' => (int) date( 'Y' ),
                'instructions'  => 'Atualizar no início de cada ano (aparece no rodapé).',
            ],

        ],
        'location' => [ [ [
            'param'    => 'options_page',
            'operator' => '==',
            'value'    => 'job-configuracoes',
        ] ] ],
        'position'        => 'normal',
        'label_placement' => 'top',
    ] );
}
add_action( 'acf/init', 'job_acf_opcoes_globais' );


/* ═══════════════════════════════════════════════════════
   6. ACF — FIELD GROUP: TECNOLOGIA (CPT)
   Campos de dados estruturais — não dependem do layout aprovado.
   Uso nos templates: get_field('nome_do_campo') dentro do loop.
═══════════════════════════════════════════════════════ */
function job_acf_tecnologia() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'   => 'group_job_tecnologia',
        'title' => 'Dados da Tecnologia',
        'fields' => [

            [
                'key'          => 'field_tec_codigo',
                'label'        => 'Código',
                'name'         => 'codigo',
                'type'         => 'text',
                'instructions' => 'Ex: EJ 01 · EJ 02 · RCK 3000',
                'required'     => 1,
            ],

            [
                'key'          => 'field_tec_categoria',
                'label'        => 'Categoria',
                'name'         => 'categoria',
                'type'         => 'text',
                'instructions' => 'Ex: Análise Quali-Quantitativa',
            ],

            [
                'key'          => 'field_tec_descricao_curta',
                'label'        => 'Descrição curta',
                'name'         => 'descricao_curta',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'Aparece nos cards e no dropdown do menu. Máx ~120 caracteres.',
            ],

            [
                'key'          => 'field_tec_descricao_longa',
                'label'        => 'Descrição completa',
                'name'         => 'descricao_longa',
                'type'         => 'wysiwyg',
                'tabs'         => 'all',
                'toolbar'      => 'full',
                'media_upload' => 0,
            ],

            [
                'key'          => 'field_tec_galeria',
                'label'        => 'Galeria de imagens',
                'name'         => 'galeria',
                'type'         => 'gallery',
                'instructions' => 'Primeira imagem = capa da tecnologia.',
                'mime_types'   => 'jpg,jpeg,webp,png',
            ],

            [
                'key'           => 'field_tec_destaque',
                'label'         => 'Exibir na home?',
                'name'          => 'destaque_home',
                'type'          => 'true_false',
                'message'       => 'Sim, mostrar esta tecnologia na seção da página inicial',
                'default_value' => 0,
                'ui'            => 1,
            ],

            [
                'key'          => 'field_tec_ordem',
                'label'        => 'Ordem de exibição',
                'name'         => 'ordem',
                'type'         => 'number',
                'instructions' => '1 = RCK 3000 · 2 = EJ 01 · 3 = EJ 02 · 4 = EJ 03 · 5 = EJ 04',
                'min'          => 1,
            ],

        ],
        'location' => [ [ [
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'tecnologia',
        ] ] ],
        'position'        => 'normal',
        'label_placement' => 'top',
    ] );
}
add_action( 'acf/init', 'job_acf_tecnologia' );
