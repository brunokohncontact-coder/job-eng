<?php /* page-obrigado.php */ get_header(); ?>

<style>
  html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
  body { background: #fafaf7; overflow-x: hidden; overflow-x: clip; min-height: 100vh; display: flex; flex-direction: column; }
  main { flex: 1; }
  .nav-item:hover .dropdown { display: block; }
  .dropdown { display: none; }

  @keyframes drawTick {
    from { stroke-dashoffset: 36; }
    to { stroke-dashoffset: 0; }
  }
  .tick-svg path {
    stroke-dasharray: 36;
    stroke-dashoffset: 36;
    animation: drawTick 0.9s cubic-bezier(0.2,0.8,0.2,1) 0.3s forwards;
  }

  .menu-mobile-btn { display: none; }
  @media (max-width: 900px) { .nav-desktop { display: none !important; } .menu-mobile-btn { display: inline-flex; } }
  .mobile-drawer { position: fixed; inset: 0; z-index: 60; background: rgba(29,29,27,0.97); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); display: flex; flex-direction: column; padding: 96px 32px 32px; transform: translateX(100%); transition: transform 0.35s cubic-bezier(0.2,0.8,0.2,1); overflow-y: auto; }
  .mobile-drawer.open { transform: translateX(0); }
  .mobile-drawer a { color: #fff; font-family: '"Franklin Gothic Medium"', sans-serif; letter-spacing: 0.08em; font-size: 18px; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.08); display: block; transition: color 0.2s, padding-left 0.2s; }
  .mobile-drawer a:hover { color: #199738; padding-left: 8px; }
  .mobile-drawer a[href$="contato.html"], .nav-desktop a[href$="contato.html"] { text-transform: uppercase; }
  .mobile-close { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; transition: border-color 0.2s; }
  .mobile-close:hover { border-color: #199738; }

  @media (max-width: 900px) { .max-w-grid { padding-left: 20px; padding-right: 20px; } }
  @media (max-width: 640px) { .max-w-grid { padding-left: 16px; padding-right: 16px; } }
</style>

<!-- CONFIRMAÇÃO -->
<main class="flex items-center" style="min-height:calc(100vh - 80px - 120px);">
  <div class="max-w-grid mx-auto px-8 w-full grid grid-cols-12 gap-6 lg:gap-10 py-16 lg:py-24">

    <!-- Coluna texto (8 cols) -->
    <div class="col-span-12 lg:col-span-8">
      <p class="text-[11px] font-mono uppercase tracking-[0.22em] text-job-green inline-flex items-center gap-3 mb-6">
        <span style="display:inline-block;width:28px;height:1px;background:#00662f;"></span>
        <?= esc_html( jf( 'obrigado_status', 'Status · 200 OK' ) ) ?>
      </p>
      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'obrigado_titulo1', 'Mensagem' ) ) ?><br>
        <span class="text-job-green"><?= esc_html( jf( 'obrigado_titulo2', 'recebida.' ) ) ?></span><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'obrigado_titulo3', 'Obrigado.' ) ) ?></span>
      </h1>

      <p class="text-gray-600 font-body mt-10 mb-12" style="font-size:16px;line-height:1.6;max-width:54ch;">
        <?= esc_html( jf( 'obrigado_texto', 'Sua solicitação foi recebida pela nossa equipe técnica. Entraremos em contato pelo telefone ou e-mail informado.' ) ) ?>
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-md">
        <a href="<?= home_url('/') ?>" class="group inline-flex items-center justify-between bg-job-black hover:bg-job-green text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
          <span><?= esc_html( jf( 'obrigado_cta1', 'Voltar à home' ) ) ?></span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
        <a href="<?= home_url('/servicos/') ?>" class="group inline-flex items-center justify-between border border-job-black text-job-black hover:bg-job-black hover:text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
          <span><?= esc_html( jf( 'obrigado_cta2', 'Conhecer serviços' ) ) ?></span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
      </div>
    </div>

    <!-- Coluna lateral (4 cols) -->
    <div class="col-span-12 lg:col-span-4 lg:pt-2 flex flex-col justify-end">
      <!-- Tick mark Swiss -->
      <div class="mb-10 lg:mb-12">
        <svg class="tick-svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#199738" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M3 12 l6 6 l12 -12"></path>
        </svg>
      </div>

      <dl class="border-t border-gray-300 pt-4 grid grid-cols-2 gap-y-3 text-sm mb-10">
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'obrigado_dt_atendimento', 'Atendimento' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'obrigado_dd_atendimento', 'Seg–Sex · 9–18h' ) ) ?></dd>
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'obrigado_dt_protocolo', 'Protocolo' ) ) ?></dt>
        <dd class="font-mono text-job-black tabular-nums" id="proto">—</dd>
      </dl>

      <div class="border-t border-gray-300 pt-6">
        <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-3"><?= esc_html( jf( 'obrigado_imediato', 'Atendimento imediato' ) ) ?></p>
        <a href="tel:+551122079212" class="block text-job-black font-sans hover:text-job-green transition-colors" style="font-size:20px;letter-spacing:-0.005em;">
          (11) 2207-9212
        </a>
      </div>
    </div>

  </div>
</main>

<script>
  /* Pseudo-protocolo */
  (function(){
    var p = document.getElementById('proto');
    if (!p) return;
    var d = new Date();
    var pad = function(n){ return String(n).padStart(2,'0'); };
    p.textContent = '#' + d.getFullYear() + pad(d.getMonth()+1) + pad(d.getDate()) + '-' + pad(d.getHours()) + pad(d.getMinutes());
  })();
</script>

<?php get_footer(); ?>
