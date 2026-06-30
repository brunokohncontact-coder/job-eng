<?php

/* ═══════════════════════════════════════════════════════
   SEO BASELINE (no próprio tema, sem plugin)
   Emite no <head>: meta description, canonical, Open Graph
   e Twitter Card — pra que o preview no WhatsApp/LinkedIn/
   Facebook apareça com título, descrição e imagem.

   O <title> já é tratado pelo add_theme_support('title-tag').
   O sitemap.xml é gerado nativamente pelo WordPress em
   /wp-sitemap.xml (WP 5.5+); aqui só apontamos ele no robots.txt.

   Campos ACF opcionais (se existirem, são usados; se não, há fallback):
     - 'meta_description'  (por página)
     - 'site_descricao'    (Opções) — descrição padrão do site
     - 'site_og_imagem'    (Opções) — imagem de compartilhamento padrão
═══════════════════════════════════════════════════════ */

if ( ! defined( 'ABSPATH' ) ) exit;

/* Descrição da página (com fallback seguro e corte em ~160 caracteres). */
function job_seo_description() {
    $d = '';

    if ( is_front_page() ) {
        $d = jf( 'site_descricao', get_bloginfo( 'description' ), 'option' );
    } elseif ( is_singular() ) {
        $d = jf( 'meta_description', '' );
        if ( ! $d && has_excerpt() ) $d = get_the_excerpt();
    }
    if ( ! $d ) $d = get_bloginfo( 'description' );

    $d = trim( wp_strip_all_tags( (string) $d ) );
    if ( mb_strlen( $d ) > 160 ) $d = rtrim( mb_substr( $d, 0, 157 ) ) . '…';
    return $d;
}

/* URL canônica da página atual. */
function job_seo_canonical() {
    if ( is_front_page() ) return home_url( '/' );
    if ( is_singular() )   return get_permalink();
    global $wp;
    return home_url( user_trailingslashit( $wp->request ?? '' ) );
}

/* Imagem de compartilhamento (Open Graph). Ordem de prioridade:
   imagem destacada da página → campo ACF de Opções → banner padrão do tema. */
function job_seo_image() {
    if ( is_singular() && has_post_thumbnail() ) {
        $t = get_the_post_thumbnail_url( null, 'large' );
        if ( $t ) return $t;
    }
    $opt = jf( 'site_og_imagem', '', 'option' );
    if ( $opt ) return is_array( $opt ) ? ( $opt['url'] ?? '' ) : $opt;

    // Imagem de compartilhamento padrão (1200×630, marca JOB sobre foto).
    return ju() . '/img/og-default.jpg';
}

/* Saída no <head> (prioridade 1, logo após o charset/viewport). */
function job_seo_head() {
    $desc  = job_seo_description();
    $url   = job_seo_canonical();
    $img   = job_seo_image();
    $title = wp_get_document_title();
    $name  = get_bloginfo( 'name' );
    $type  = is_singular() && ! is_front_page() ? 'article' : 'website';

    echo "\n<!-- SEO baseline (tema) -->\n";
    if ( $desc ) {
        printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $desc ) );
    }
    printf( '<link rel="canonical" href="%s" />' . "\n", esc_url( $url ) );

    // Open Graph
    printf( '<meta property="og:locale" content="%s" />' . "\n", esc_attr( get_locale() ) );
    printf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $type ) );
    printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( $name ) );
    printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
    if ( $desc ) printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $desc ) );
    printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
    if ( $img ) printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $img ) );

    // Twitter
    printf( '<meta name="twitter:card" content="%s" />' . "\n", $img ? 'summary_large_image' : 'summary' );
    printf( '<meta name="twitter:title" content="%s" />' . "\n", esc_attr( $title ) );
    if ( $desc ) printf( '<meta name="twitter:description" content="%s" />' . "\n", esc_attr( $desc ) );
    if ( $img )  printf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $img ) );
    echo "<!-- /SEO baseline -->\n";
}
add_action( 'wp_head', 'job_seo_head', 1 );

/* Aponta o sitemap nativo do WordPress no robots.txt virtual. */
add_filter( 'robots_txt', function ( $output ) {
    $output .= "\nSitemap: " . home_url( '/wp-sitemap.xml' ) . "\n";
    return $output;
}, 10, 1 );
