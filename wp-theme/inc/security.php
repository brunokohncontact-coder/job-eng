<?php

/* ═══════════════════════════════════════════════════════
   SEGURANÇA / HARDENING (versionado no tema)
   Endurecimentos seguros para um site institucional.
   Nada aqui quebra Fluent Forms, ACF ou o admin-ajax/REST
   que esses plugins usam — só fecha portas que o site não usa.
═══════════════════════════════════════════════════════ */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ── Esconde a versão do WordPress no <head> (meta generator) ──
   Obs.: não removemos o ?ver= dos assets de propósito — o tema usa
   filemtime() como versão, que é o cache-bust correto. */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/* ── Remove links inúteis do <head> (RSD, WLW, shortlink, REST p/ scraping) ── */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links_extra', 3 );

/* ── Emojis: remove o script/css de emoji (perf + menos superfície) ── */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* ── Desativa XML-RPC (vetor clássico de brute-force; o site não usa) ── */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', function ( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );

/* ── Bloqueia enumeração de usuários (?author=1 e endpoint REST /users) ──
   Mantém o resto do REST funcionando (Fluent Forms/ACF dependem dele). */
add_action( 'template_redirect', function () {
    if ( ! is_admin() && isset( $_GET['author'] ) && is_numeric( $_GET['author'] ) ) {
        wp_safe_redirect( home_url( '/' ), 301 );
        exit;
    }
} );
add_filter( 'rest_endpoints', function ( $endpoints ) {
    if ( ! is_user_logged_in() ) {
        unset( $endpoints['/wp/v2/users'] );
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
} );

/* ── Desativa o editor de arquivos do painel (defesa em profundidade;
   o ideal é também ter DISALLOW_FILE_EDIT no wp-config — ver producao/). ── */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
    define( 'DISALLOW_FILE_EDIT', true );
}

/* ── Cabeçalhos de segurança (via PHP = funciona em Apache e Nginx).
   Só no front-end, pra não interferir no admin. ── */
add_action( 'send_headers', function () {
    if ( is_admin() ) return;
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    header( 'Permissions-Policy: geolocation=(), microphone=(), camera=()' );
    // Content-Security-Policy fica de fora de propósito: o site usa muito
    // style inline; uma CSP estrita quebraria o layout. Tratar depois, se quiser.
} );
