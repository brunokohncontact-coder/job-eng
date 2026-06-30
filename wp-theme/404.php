<?php /* 404.php */ get_header(); ?>

  <style>
    html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
    body { background: #1d1d1b; overflow-x: hidden; overflow-x: clip; min-height: 100vh; display: flex; flex-direction: column; color: #fff; }
    main { flex: 1; }

    .ghost-404 {
      position: absolute; right: -2vw; top: 0; bottom: 0;
      display: flex; align-items: center; justify-content: flex-end;
      font-family: '"Franklin Gothic Medium"', 'Arial Narrow', sans-serif;
      font-weight: 600;
      color: rgba(255,255,255,0.04);
      font-size: clamp(280px, 42vw, 620px);
      line-height: 0.85; letter-spacing: -0.06em;
      pointer-events: none; user-select: none;
      font-variant-numeric: tabular-nums;
    }

    .menu-mobile-btn { display: none; }
    @media (max-width: 900px) {
      .nav-desktop { display: none !important; }
      .menu-mobile-btn { display: inline-flex; }
      .ghost-404 { font-size: 60vw; right: -10vw; opacity: 0.6; }
    }
    .mobile-drawer { position: fixed; inset: 0; z-index: 60; background: rgba(29,29,27,0.97); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); display: flex; flex-direction: column; padding: 96px 32px 32px; transform: translateX(100%); transition: transform 0.35s cubic-bezier(0.2,0.8,0.2,1); overflow-y: auto; }
    .mobile-drawer.open { transform: translateX(0); }
    .mobile-drawer a { color: #fff; font-family: '"Franklin Gothic Medium"', sans-serif; letter-spacing: 0.08em; font-size: 18px; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.08); display: block; transition: color 0.2s, padding-left 0.2s; }
    .mobile-drawer a:hover { color: #199738; padding-left: 8px; }
    .mobile-drawer a[href$="contato.html"], .nav-desktop a[href$="contato.html"] { text-transform: uppercase; }
    .mobile-close { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; transition: border-color 0.2s; }
    .mobile-close:hover { border-color: #199738; }

    /* 404 redirect row (Swiss list) */
    .redir-row {
      display: grid; grid-template-columns: 64px 1fr auto;
      gap: 24px; align-items: center;
      padding: 18px 0;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      transition: padding 0.25s ease;
    }
    .redir-row:first-of-type { border-top: 1px solid rgba(255,255,255,0.18); }
    .redir-row:hover { padding-left: 8px; }
    .redir-row:hover .redir-cta { color: #fff; }
    .redir-num { font-family: monospace; font-size: 11px; letter-spacing: 0.18em; color: #199738; }
    .redir-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 17px; color: #fff; letter-spacing: -0.005em; }
    .redir-cta { font-family: monospace; font-size: 12px; letter-spacing: 0.18em; color: #8a9a90; transition: color 0.2s, transform 0.2s; }
    .redir-row:hover .redir-cta { transform: translateX(4px); }
    @media (max-width: 700px) {
      .redir-row { grid-template-columns: 48px 1fr auto; gap: 16px; padding: 14px 0; }
    }

    @media (max-width: 900px) { .max-w-grid { padding-left: 20px; padding-right: 20px; } }
    @media (max-width: 640px) { .max-w-grid { padding-left: 16px; padding-right: 16px; } }
  </style>

<!-- CONTEÚDO -->
<main class="relative overflow-hidden flex items-center" style="min-height:calc(100vh - 80px - 80px);">
  <span class="ghost-404">404</span>

  <div class="relative z-10 max-w-grid mx-auto px-8 w-full grid grid-cols-12 gap-6 lg:gap-10 py-16 lg:py-24">

    <!-- Coluna texto (7 cols) -->
    <div class="col-span-12 lg:col-span-7">
      <p class="text-[11px] font-mono uppercase tracking-[0.22em] inline-flex items-center gap-3 mb-6" style="color:#199738;">
        <span style="display:inline-block;width:28px;height:1px;background:#199738;"></span>
        Status · 404 Not Found
      </p>
      <h1 class="text-white font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        Página não<br>
        <span style="color:#199738;">encontrada.</span><br>
        <span class="italic font-light text-gray-500" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;">Vamos voltar.</span>
      </h1>

      <p class="text-gray-400 font-body mt-10 mb-10" style="font-size:16px;line-height:1.6;max-width:54ch;">
        A página que você tentou acessar pode ter sido movida ou não existe.
        Use os atalhos ao lado para retomar a navegação.
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-md">
        <a href="<?= home_url('/') ?>" class="group inline-flex items-center justify-between bg-job-green2 hover:bg-job-green text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
          <span>Voltar à home</span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
        <a href="<?= home_url('/contato/') ?>" class="group inline-flex items-center justify-between border border-white/40 text-white hover:bg-white hover:text-job-black px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
          <span>Falar com a JOB</span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
      </div>
    </div>

    <!-- Coluna lateral (5 cols) — Swiss redirect list -->
    <div class="col-span-12 lg:col-span-5 lg:pt-2">
      <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-6">/ Talvez você procurasse</p>
      <div>
        <a href="<?= home_url('/servicos/') ?>#infraestrutura" class="redir-row">
          <span class="redir-title">Infraestrutura</span>
          <span class="redir-cta">→</span>
        </a>
        <a href="<?= home_url('/servicos/') ?>#zeladoria" class="redir-row">
          <span class="redir-title">Zeladoria e Manutenção de Ativos</span>
          <span class="redir-cta">→</span>
        </a>
        <a href="<?= home_url('/servicos/') ?>#predial" class="redir-row">
          <span class="redir-title">Engenharia Predial</span>
          <span class="redir-cta">→</span>
        </a>
        <a href="<?= home_url('/servicos/') ?>#ambiental" class="redir-row">
          <span class="redir-title">Tecnologia Ambiental</span>
          <span class="redir-cta">→</span>
        </a>
        <a href="<?= home_url('/ecojob/') ?>" class="redir-row">
          <span class="redir-title">Ecojob · Tecnologia Ambiental</span>
          <span class="redir-cta">→</span>
        </a>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
