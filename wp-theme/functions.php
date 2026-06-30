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

/* Helper: URI base do tema para assets (img / icones).
   Uso nos templates: <?= ju() ?>/img/arquivo.jpg */
function ju() { return get_template_directory_uri(); }

/* Helper: texto de campo ACF com fallback seguro.
   Retorna o valor editado pelo cliente; se vazio, mostra o texto original.
   Uso: <?= esc_html( jf( 'nome_campo', 'Texto padrão' ) ) ?> */
function jf( $name, $fallback = '', $post_id = false ) {
    if ( ! function_exists( 'get_field' ) ) return $fallback;
    $v = get_field( $name, $post_id );
    return ( $v !== '' && $v !== null && $v !== false ) ? $v : $fallback;
}


/* ═══════════════════════════════════════════════════════
   2. ENQUEUE — CSS compilado + JS (cache-bust por data)
═══════════════════════════════════════════════════════ */
function job_enqueue_assets() {
    $dir = get_template_directory();
    $uri = get_template_directory_uri();
    $css = $dir . '/assets/css/app.css';
    $js  = $dir . '/assets/js/main.js';

    wp_enqueue_style(
        'job-app',
        $uri . '/assets/css/app.css',
        [],
        file_exists( $css ) ? filemtime( $css ) : '1.0.0'
    );

    wp_enqueue_script(
        'job-main',
        $uri . '/assets/js/main.js',
        [],
        file_exists( $js ) ? filemtime( $js ) : '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'job_enqueue_assets' );


/* ═══════════════════════════════════════════════════════
   3. ACF — grupos de campos por página
   Cada página tem seu arquivo em inc/acf/{slug}.php
   (registrados via PHP = versionados, sem depender do banco).
═══════════════════════════════════════════════════════ */
foreach ( glob( get_template_directory() . '/inc/acf/*.php' ) as $job_acf_file ) {
    require_once $job_acf_file;
}


/* ═══════════════════════════════════════════════════════
   4. PAINEL AMIGÁVEL PARA O CLIENTE
   (branding do login, rodapé do admin e widget de boas-vindas
    ficam em inc/admin-cliente.php)
═══════════════════════════════════════════════════════ */
require_once get_template_directory() . '/inc/admin-cliente.php';

/* 4a. Esconde o editor de blocos nas Páginas — o conteúdo vem dos campos
   (o cliente vê só os campos rotulados, sem o editor vazio confundindo). */
function job_remove_page_editor() {
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'job_remove_page_editor' );

/* 4b. Enxuga o menu do admin para quem NÃO é administrador (o cliente = Editor).
   O administrador (você) continua vendo tudo. */
function job_clean_admin_menu() {
    if ( current_user_can( 'manage_options' ) ) return;
    remove_menu_page( 'edit.php' );          // Posts (não há blog)
    remove_menu_page( 'edit-comments.php' );  // Comentários
    remove_menu_page( 'tools.php' );          // Ferramentas
}
add_action( 'admin_menu', 'job_clean_admin_menu', 999 );

/* 4c. Mensagem de boas-vindas curta no topo da lista de Páginas. */
function job_admin_dica() {
    $screen = get_current_screen();
    if ( $screen && $screen->id === 'edit-page' ) {
        echo '<div class="notice notice-info" style="border-left-color:#00662f;"><p>'
           . '<strong>JOB Engenharia.</strong> Para editar os textos do site, clique numa página e altere os campos. As alterações aparecem no site ao salvar.'
           . '</p></div>';
    }
}
add_action( 'admin_notices', 'job_admin_dica' );


/* ═══════════════════════════════════════════════════════
   5. DADOS DE CONTATO GLOBAIS
   Editáveis em DOIS lugares que gravam o MESMO dado (theme_mods):
   • Admin: Personalizar → "JOB — Contato e Redes"
   • Cliente (Editor): menu "Contato e Redes" (ver inc/admin-cliente.php)
   chave => [ rótulo, valor padrão (atual), sanitização ]
═══════════════════════════════════════════════════════ */
function job_contato_campos() {
    return [
        'job_telefone'  => [ 'Telefone (como aparece)', '(11) 2207-9212', 'sanitize_text_field' ],
        'job_whatsapp'  => [ 'Telefone — só dígitos com DDI (para o link tel:)', '551122079212', 'sanitize_text_field' ],
        'job_email'     => [ 'E-mail comercial', 'contato@jobeng.com.br', 'sanitize_email' ],
        'job_horario'   => [ 'Horário de atendimento', 'Segunda a sexta · 9h às 18h', 'sanitize_text_field' ],
        'job_endereco'  => [ 'Endereço (opcional)', '', 'sanitize_text_field' ],
        'job_linkedin'  => [ 'LinkedIn (URL)', 'https://www.linkedin.com/company/ecojob/', 'esc_url_raw' ],
        'job_instagram' => [ 'Instagram (URL)', 'https://www.instagram.com/jobengenhariabr/', 'esc_url_raw' ],
        'job_facebook'  => [ 'Facebook (URL)', 'https://www.facebook.com/p/Job-Engenharia-Br-61554832118557/', 'esc_url_raw' ],
    ];
}

function job_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'job_contato', [
        'title'       => 'JOB — Contato e Redes',
        'priority'    => 30,
        'description' => 'Telefone, e-mail, horário e redes sociais que aparecem no rodapé e nas seções de contato.',
    ] );

    $campos = job_contato_campos();
    foreach ( $campos as $chave => $c ) {
        $wp_customize->add_setting( $chave, [
            'default'           => $c[1],
            'sanitize_callback' => $c[2],
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( $chave, [
            'label'   => $c[0],
            'section' => 'job_contato',
            'type'    => 'text',
        ] );
    }
}
add_action( 'customize_register', 'job_customize_register' );

/* Helper: dado global de contato (Customizer) com fallback.
   Uso: <?= esc_html( jg('job_telefone','(11) ...') ) ?> */
function jg( $key, $fallback = '' ) {
    $v = get_theme_mod( $key, $fallback );
    return ( $v !== '' && $v !== null ) ? $v : $fallback;
}
