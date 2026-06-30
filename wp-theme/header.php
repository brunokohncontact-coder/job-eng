<?php
/**
 * Header — chrome compartilhado (logo, navegação desktop, menu mobile).
 * Os links usam home_url() para apontar às páginas do WordPress.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="<?= ju() ?>/img/favicon.png" />
  <link rel="apple-touch-icon" href="<?= ju() ?>/img/favicon.png" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'font-sans text-job-black' ); ?>>
<?php wp_body_open(); ?>

<!-- ═══ HEADER — fixo, 80px ═══ -->
<header id="site-header" class="sticky top-0 z-50 transition-all duration-300" style="height:80px;background:#ffffff;">
  <div class="relative max-w-grid mx-auto px-8 h-full flex items-center justify-between">

    <div class="flex items-center gap-3">
      <a href="<?= home_url( '/' ) ?>">
        <img id="header-logo" src="<?= ju() ?>/img/logo-job-eng.svg" alt="JOB Engenharia" style="height:52px;width:auto;transition:opacity 0.3s;">
      </a>
    </div>

    <button id="mobile-toggle" class="menu-mobile-btn items-center justify-center" aria-label="Abrir menu" style="width:44px;height:44px;background:transparent;border:none;cursor:pointer;">
      <svg id="mobile-toggle-icon" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:#1d1d1b;">
        <line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </button>

    <nav id="header-nav" class="nav-desktop flex items-center gap-6 text-job-black text-sm font-sans tracking-wide">
      <a href="<?= home_url( '/sobre/' ) ?>" class="hover:text-job-green2 transition-colors normal-case">Sobre a Empresa</a>

      <div class="nav-item relative">
        <a href="<?= home_url( '/servicos/' ) ?>" class="hover:text-job-green2 transition-colors flex items-center gap-1 cursor-pointer">
          Serviços
          <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M5.5 8l4.5 4.5L14.5 8"/></svg>
        </a>
        <div class="dropdown absolute top-full left-0 bg-job-black border-t-2 border-job-green2 w-56 shadow-xl py-2 z-50 text-white">
          <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="block px-4 py-2 text-xs hover:bg-job-green hover:text-white transition-colors">Infraestrutura</a>
          <a href="<?= home_url( '/servicos/' ) ?>#zeladoria" class="block px-4 py-2 text-xs hover:bg-job-green hover:text-white transition-colors">Zeladoria e Manutenção de Ativos</a>
          <a href="<?= home_url( '/servicos/' ) ?>#predial" class="block px-4 py-2 text-xs hover:bg-job-green hover:text-white transition-colors">Engenharia Predial</a>
          <a href="<?= home_url( '/servicos/' ) ?>#ambiental" class="block px-4 py-2 text-xs hover:bg-job-green hover:text-white transition-colors">Tecnologia Ambiental</a>
        </div>
      </div>

      <a href="<?= home_url( '/ecojob/' ) ?>" class="hover:text-job-green2 transition-colors normal-case">Ecojob</a>
      <a href="<?= home_url( '/carreiras/' ) ?>" class="hover:text-job-green2 transition-colors normal-case">Trabalhe Conosco</a>
      <a href="<?= home_url( '/canal-denuncia/' ) ?>" class="hover:text-job-green2 transition-colors normal-case">Canal de Denúncia</a>
      <a href="<?= home_url( '/contato/' ) ?>" class="bg-job-green2 hover:bg-job-green text-white px-5 py-2 transition-colors" style="text-transform:uppercase;">Contato</a>
    </nav>
  </div>
</header>

<!-- ═══ MOBILE DRAWER ═══ -->
<div id="mobile-drawer" class="mobile-drawer" role="dialog" aria-label="Menu de navegação">
  <button id="mobile-close" class="mobile-close" aria-label="Fechar menu">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
  </button>
  <nav>
    <a href="<?= home_url( '/sobre/' ) ?>">Sobre a Empresa</a>
    <a href="<?= home_url( '/servicos/' ) ?>">Serviços</a>
    <a href="<?= home_url( '/carreiras/' ) ?>">Trabalhe Conosco</a>
    <a href="<?= home_url( '/canal-denuncia/' ) ?>">Canal de Denúncia</a>
    <p class="group-label">Áreas</p>
    <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="sublink">› Infraestrutura</a>
    <a href="<?= home_url( '/servicos/' ) ?>#zeladoria" class="sublink">› Zeladoria e Manutenção de Ativos</a>
    <a href="<?= home_url( '/servicos/' ) ?>#predial" class="sublink">› Engenharia Predial</a>
    <a href="<?= home_url( '/servicos/' ) ?>#ambiental" class="sublink">› Tecnologia Ambiental</a>
    <a href="<?= home_url( '/ecojob/' ) ?>">Ecojob</a>
    <a href="<?= home_url( '/contato/' ) ?>" style="margin-top:24px;background:#199738;text-align:center;border:none;text-transform:uppercase;">Contato</a>
  </nav>
</div>
