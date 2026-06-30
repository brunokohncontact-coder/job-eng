<?php /* page-ecojob.php */ get_header(); ?>

  <style>
    html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
    body { background: #fafaf7; overflow-x: hidden; overflow-x: clip; }

    /* ── Swiss section index ── */
    .swiss-index {
      font-family: monospace;
      font-size: 11px;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: #00662f;
      display: inline-flex;
      align-items: center;
      gap: 12px;
    }
    .swiss-index::before {
      content: ""; display: inline-block;
      width: 28px; height: 1px; background: #00662f;
    }

    /* ── Section rule ── */
    .section-rule {
      max-width: 1200px;
      margin: 0 auto;
      padding: 16px 32px;
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 16px;
      align-items: center;
      font-family: monospace;
      font-size: 10px;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: #5b6b62;
      border-top: 1px solid rgba(29,29,27,0.12);
      border-bottom: 1px solid rgba(29,29,27,0.06);
      background: #fafaf7;
    }
    .section-rule .accent { color: #00662f; }
    .section-rule .bar { height: 1px; background: rgba(29,29,27,0.18); width: 100%; }
    .section-rule.dark {
      background: #1d1d1b;
      border-top-color: rgba(255,255,255,0.10);
      border-bottom-color: rgba(255,255,255,0.04);
      color: #8a9a90;
    }
    .section-rule.dark .accent { color: #199738; }
    .section-rule.dark .bar { background: rgba(255,255,255,0.18); }
    .section-rule.green {
      background: #00662f;
      border-top-color: rgba(255,255,255,0.18);
      border-bottom-color: rgba(255,255,255,0.08);
      color: #d8f5e3;
    }
    .section-rule.green .accent { color: #ffffff; }
    .section-rule.green .bar { background: rgba(255,255,255,0.28); }

    /* Tile card for items */
    .eco-tile {
      width: 56px; height: 56px; background: #00662f;
      display: flex; align-items: center; justify-content: center;
      transition: background 0.2s;
    }
    .eco-tile img {
      width: 30px; height: 30px; object-fit: contain;
      filter: brightness(0) invert(1);
    }
    .eco-card {
      border: 1px solid rgba(29,29,27,0.10);
      padding: 28px 28px 32px;
      background: #fff;
      transition: border-color 0.2s, transform 0.2s;
      display: flex; flex-direction: column; gap: 16px;
    }
    .eco-card:hover { border-color: #00662f; }
    .eco-card h3 {
      font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif;
      font-size: 19px; line-height: 1.15; color: #1d1d1b; letter-spacing: -0.005em;
    }
    .eco-card p {
      font-family: 'Franklin Gothic Book', Arial, sans-serif;
      color: #4a5550; font-size: 14px; line-height: 1.55;
    }

    /* Dark variant for ecosystem pillars */
    .eco-card.dark { background: #0f0f0e; border-color: rgba(255,255,255,0.10); }
    .eco-card.dark:hover { border-color: #199738; }
    .eco-card.dark h3 { color: #fff; }
    .eco-card.dark p { color: #c8d3cc; }
    .eco-card.dark .eco-tile { background: #199738; }

    /* Domain block (large sub-section) */
    .domain-block {
      border-top: 1px solid rgba(29,29,27,0.18);
      padding: 36px 0;
    }
    .domain-block .dom-tag {
      font-family: monospace; font-size: 10px; letter-spacing: 0.22em;
      text-transform: uppercase; color: #00662f;
    }
    .domain-block h3 {
      font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif;
      font-size: clamp(24px, 3vw, 36px); line-height: 1.05;
      color: #1d1d1b; letter-spacing: -0.015em;
    }
    .domain-block .dom-norma {
      display: inline-block; font-family: monospace; font-size: 10px;
      letter-spacing: 0.16em; text-transform: uppercase; color: #199738;
      border: 1px solid #199738; padding: 3px 8px; margin-top: 8px;
    }
    .domain-block .dom-intro {
      font-family: 'Franklin Gothic Book', Arial, sans-serif;
      font-size: 15px; line-height: 1.55; color: #4a5550;
    }
    .domain-block dl { display: grid; gap: 20px; }
    .domain-block dl dt {
      font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif;
      font-size: 15px; color: #1d1d1b; letter-spacing: -0.005em;
      padding-bottom: 4px;
    }
    .domain-block dl dd {
      font-family: 'Franklin Gothic Book', Arial, sans-serif;
      font-size: 13.5px; line-height: 1.55; color: #4a5550;
    }
    .domain-block dl > div {
      padding-left: 18px; border-left: 2px solid #00662f;
    }

    /* Parameter chips */
    .param-chip {
      font-family: monospace; font-size: 11px; letter-spacing: 0.12em;
      text-transform: uppercase; color: #d8f5e3;
      border: 1px solid rgba(255,255,255,0.25); padding: 7px 13px;
    }
    .cap-chip {
      font-family: monospace; font-size: 11px; letter-spacing: 0.12em;
      text-transform: uppercase; color: #ffffff;
      border: 1px solid rgba(255,255,255,0.45); padding: 8px 14px;
      display: inline-block;
    }
    /* Card norm badge (works on light & dark cards) */
    .eco-norma {
      align-self: flex-start; font-family: monospace; font-size: 10px;
      letter-spacing: 0.16em; text-transform: uppercase; color: #199738;
      border: 1px solid #199738; padding: 3px 8px; margin-top: -4px;
    }
    /* Benefit list */
    .benefit-card { display: flex; flex-direction: column; gap: 14px; }
    .benefit-card h3 {
      font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif;
      font-size: 18px; line-height: 1.15; color: #1d1d1b; letter-spacing: -0.005em;
    }
    .benefit-card p {
      font-family: 'Franklin Gothic Book', Arial, sans-serif;
      color: #4a5550; font-size: 14px; line-height: 1.55;
    }

    /* ── Mobile menu (idêntico) ── */
    .nav-item:hover .dropdown { display: block; }
    .dropdown { display: none; }
    .menu-mobile-btn { display: none; }
    @media (max-width: 900px) {
      .nav-desktop { display: none !important; }
      .menu-mobile-btn { display: inline-flex; }
    }
    .mobile-drawer {
      position: fixed; inset: 0; z-index: 60;
      background: rgba(29,29,27,0.97);
      backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);
      display: flex; flex-direction: column;
      padding: 96px 32px 32px;
      transform: translateX(100%);
      transition: transform 0.35s cubic-bezier(0.2,0.8,0.2,1);
      overflow-y: auto;
    }
    .mobile-drawer.open { transform: translateX(0); }
    .mobile-drawer a {
      color: #fff; font-family: '"Franklin Gothic Medium"', sans-serif;
      letter-spacing: 0.08em; font-size: 18px;
      padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.08);
      display: block; transition: color 0.2s, padding-left 0.2s;
    }
    .mobile-drawer a:hover { color: #199738; padding-left: 8px; }
    .mobile-drawer a[href$="contato.html"], .nav-desktop a[href$="contato.html"] { text-transform: uppercase; }
    .mobile-drawer .group-label {
      color: #199738; font-family: monospace; font-size: 10px;
      letter-spacing: 0.2em; text-transform: uppercase;
      margin-top: 18px; margin-bottom: 4px;
    }
    .mobile-drawer .sublink {
      font-size: 13px; color: #c0c0c0; padding: 10px 0;
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .mobile-close {
      position: absolute; top: 24px; right: 24px;
      width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;
      color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2);
      cursor: pointer; transition: border-color 0.2s;
    }
    .mobile-close:hover { border-color: #199738; }

    /* Reveal */
    .reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.2,0.8,0.2,1), transform 0.7s cubic-bezier(0.2,0.8,0.2,1); }
    .reveal.is-visible { opacity: 1; transform: translateY(0); }

    @media (max-width: 900px) {
      .max-w-grid { padding-left: 20px; padding-right: 20px; }
      section.py-24 { padding-top: 64px; padding-bottom: 64px; }
      section.py-20 { padding-top: 56px; padding-bottom: 56px; }
      footer.py-16 { padding-top: 48px; padding-bottom: 48px; }
    }
    @media (max-width: 640px) {
      .max-w-grid { padding-left: 16px; padding-right: 16px; }
    }
  </style>

<!-- ═══════════════════════════════════════════════════
     HERO — Ecojob
═══════════════════════════════════════════════════ -->
<section id="hero" class="bg-job-green py-16 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8 relative">
    <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] mb-10" style="color:#a8f0c4;">
      <a href="<?= home_url('/') ?>" class="hover:text-white transition-colors">Home</a>
      <span style="color:rgba(255,255,255,0.4);">/</span>
      <a href="<?= home_url('/servicos/') ?>#ambiental" class="hover:text-white transition-colors">Tecnologia Ambiental</a>
      <span style="color:rgba(255,255,255,0.4);">/</span>
      <span class="text-white">Ecojob</span>
    </nav>

    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-end">
      <div class="col-span-12 lg:col-span-7">
        <div class="inline-flex items-center mb-10">
          <img src="<?= ju() ?>/img/ecojob_logo_positivo-03.svg" alt="Ecojob" style="width:280px;height:auto;display:block;">
        </div>

        <h1 class="text-white font-sans" style="font-size:clamp(2.1rem,4.8vw,4rem);line-height:1.0;letter-spacing:-0.025em;font-weight:500;">
          <span style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:400;"><?= esc_html( jf( 'ecojob_hero_titulo1', 'Tecnologia, inteligência' ) ) ?></span><br>
          <span style="font-weight:800;letter-spacing:-0.03em;"><?= esc_html( jf( 'ecojob_hero_titulo2', 'e operação para' ) ) ?><br><?= esc_html( jf( 'ecojob_hero_titulo3', 'sistemas ambientais.' ) ) ?></span>
        </h1>
      </div>
      <div class="col-span-12 lg:col-span-5">
        <p class="font-body" style="color:#fff;font-size:16px;line-height:1.65;max-width:46ch;">
          <?= jf( 'ecojob_hero_intro', 'A <strong style="font-weight:700;">Ecojob</strong> desenvolve soluções integradas e tecnológicas para sistemas ambientais, saneamento e recursos hídricos, transformando dados em inteligência operacional.' ) ?>
        </p>
      </div>
    </div>

    <!-- Stats / âncoras -->
    <div class="mt-14 lg:mt-20 grid grid-cols-2 md:grid-cols-5 gap-px" style="background:rgba(255,255,255,0.18);">
      <a href="#diagnostica" class="block p-5 text-center transition-colors hover:bg-[#004d22]" style="background:#00662f;">
        <p class="text-white text-sm font-sans"><?= esc_html( jf( 'ecojob_hero_anc1', 'Engenharia diagnóstica' ) ) ?></p>
      </a>
      <a href="#monitoramento" class="block p-5 text-center transition-colors hover:bg-[#004d22]" style="background:#00662f;">
        <p class="text-white text-sm font-sans"><?= esc_html( jf( 'ecojob_hero_anc2', 'Monitoramento inteligente' ) ) ?></p>
      </a>
      <a href="#modelagem" class="block p-5 text-center transition-colors hover:bg-[#004d22]" style="background:#00662f;">
        <p class="text-white text-sm font-sans"><?= esc_html( jf( 'ecojob_hero_anc3', 'Modelagem hidrológica' ) ) ?></p>
      </a>
      <a href="#operacao" class="block p-5 text-center transition-colors hover:bg-[#004d22]" style="background:#00662f;">
        <p class="text-white text-sm font-sans"><?= esc_html( jf( 'ecojob_hero_anc4', 'Operação e gestão' ) ) ?></p>
      </a>
      <a href="#plataforma" class="block p-5 text-center transition-colors hover:bg-[#004d22]" style="background:#00662f;">
        <p class="text-white text-sm font-sans"><?= esc_html( jf( 'ecojob_hero_anc5', 'Plataforma COI 4.0' ) ) ?></p>
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     ABERTURA — atuação integrada
═══════════════════════════════════════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 items-start">
      <div class="col-span-12 lg:col-span-7">
        <p class="text-job-black font-sans" style="font-size:clamp(1.2rem,2.1vw,1.55rem);line-height:1.38;letter-spacing:-0.01em;max-width:40ch;">
          <?= esc_html( jf( 'ecojob_abertura_destaque', 'Atuamos de forma integrada no monitoramento ambiental, modelagem hidráulica e hidrológica, supervisão operacional e gestão de infraestruturas críticas, combinando engenharia, tecnologia e inteligência de dados para apoiar a tomada de decisão e otimizar o desempenho dos sistemas.' ) ) ?>
        </p>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-2 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.65;max-width:46ch;">
          <?= esc_html( jf( 'ecojob_abertura_texto', 'Nossas soluções contribuem para operações mais eficientes, seguras e sustentáveis, atendendo aos desafios atuais e futuros da infraestrutura ambiental.' ) ) ?>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     FAIXA DE IMAGEM — monitoramento ambiental
═══════════════════════════════════════════════════ -->
<section class="relative bg-job-black">
  <div class="relative w-full overflow-hidden" style="height:clamp(300px,46vh,560px);">
    <img src="<?= ju() ?>/img/ecojob/monitoramento-agua.jpg" alt="Coleta e análise da qualidade da água em campo — monitoramento ambiental Ecojob" class="w-full h-full object-cover" loading="lazy" style="object-position:center;">
    <div class="absolute inset-0" aria-hidden="true" style="background:linear-gradient(180deg, rgba(0,0,0,0.12) 0%, rgba(0,0,0,0) 38%, rgba(0,0,0,0.58) 100%);"></div>
    <div class="absolute inset-0 flex items-end">
      <div class="max-w-grid mx-auto px-8 w-full pb-8">
        <span class="font-mono text-[10px] uppercase tracking-[0.22em]" style="color:#a8f0c4;"><?= esc_html( jf( 'ecojob_faixa_chip', 'Monitoramento ambiental' ) ) ?></span>
        <p class="text-white font-sans mt-2" style="font-size:clamp(1.1rem,2vw,1.5rem);line-height:1.2;letter-spacing:-0.01em;max-width:28ch;">
          <?= esc_html( jf( 'ecojob_faixa_legenda', 'Coleta e análise da qualidade da água em campo.' ) ) ?>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     01 · ENGENHARIA DIAGNÓSTICA
═══════════════════════════════════════════════════ -->
<section id="diagnostica" class="bg-[#fafaf7] py-16 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="text-job-black font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_diagnostica_titulo1', 'Engenharia' ) ) ?><br>
          <span class="text-job-green"><?= esc_html( jf( 'ecojob_diagnostica_titulo2', 'diagnóstica.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:46ch;">
          <?= esc_html( jf( 'ecojob_diagnostica_intro', 'Realizamos diagnósticos técnicos detalhados para identificar anomalias, avaliar o desempenho das infraestruturas e subsidiar a definição de ações corretivas e preventivas.' ) ) ?>
        </p>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px" style="background:rgba(29,29,27,0.10);">
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/magnifying-glass.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_diag_card1_titulo', 'Varredura e Rastreamento Operacional' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_diag_card1_desc', 'Inspeções e rastreamentos operacionais para avaliação das redes, identificação de gargalos, interferências, lançamentos irregulares e não conformidades.' ) ) ?></p>
      </article>
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/sewer.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_diag_card2_titulo', 'Testes de Fumaça e Corante' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_diag_card2_desc', 'Metodologias especializadas para identificação de ligações clandestinas, descartes irregulares, interconexões indevidas entre redes e falhas de vedação, permitindo rastrear o percurso e o destino dos fluxos.' ) ) ?></p>
      </article>
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/drone.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_diag_card3_titulo', 'Mapeamento complementar com drones' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_diag_card3_desc', 'Inspeções aéreas e monitoramento de áreas e estruturas de difícil acesso, com registro de anomalias e geração de informações georreferenciadas para apoio aos diagnósticos.' ) ) ?></p>
      </article>
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/facial.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_diag_card4_titulo', 'Inspeção por CFTV' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_diag_card4_desc', 'Inspeções internas por circuito fechado de televisão (CFTV), utilizando métodos não destrutivos para avaliação das condições operacionais, estruturais e hidráulicas das redes.' ) ) ?></p>
      </article>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     02 · MONITORAMENTO INTELIGENTE DE SISTEMAS
═══════════════════════════════════════════════════ -->
<section id="monitoramento" class="bg-job-black py-16 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-10 lg:mb-12">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="text-white font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_monit_titulo1', 'Monitoramento inteligente' ) ) ?><br>
          <span style="color:#199738;"><?= esc_html( jf( 'ecojob_monit_titulo2', 'de sistemas.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="font-body" style="color:#c8d3cc;font-size:15px;line-height:1.6;max-width:46ch;">
          <?= esc_html( jf( 'ecojob_monitoramento_intro', 'Por meio de sensoriamento avançado, telemetria e análise de dados, realizamos o monitoramento contínuo e em tempo real de sistemas ambientais e de saneamento, apoiando a gestão e a tomada de decisão baseada em dados.' ) ) ?>
        </p>
      </div>
    </div>

    <!-- Parâmetros monitorados -->
    <div class="mb-10 lg:mb-12">
      <p class="text-[10px] font-mono uppercase tracking-[0.22em] mb-4" style="color:#8a9a90;"><?= esc_html( jf( 'ecojob_monit_param_label', 'Parâmetros monitorados' ) ) ?></p>
      <div class="flex flex-wrap gap-2">
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip1', 'Nível' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip2', 'Vazão' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip3', 'pH' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip4', 'Condutividade' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip5', 'Temperatura' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip6', 'Carga poluidora' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip7', 'DBO' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip8', 'OD' ) ) ?></span>
        <span class="param-chip"><?= esc_html( jf( 'ecojob_monit_chip9', 'Turbidez' ) ) ?></span>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px" style="background:rgba(255,255,255,0.10);">
      <article class="eco-card dark">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/sewer.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_monit_card1_titulo', 'Efluentes e esgotamento sanitário' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_monit_card1_desc', 'Monitoramento contínuo e em tempo real de efluentes e do sistema de esgotamento sanitário, acompanhando vazão, carga poluidora e demais indicadores para apoiar a operação e a conformidade ambiental.' ) ) ?></p>
      </article>
      <article class="eco-card dark">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/water-system.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_monit_card2_titulo', 'Córregos, rios, canais e balneabilidade' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_monit_card2_desc', 'Monitoramento da qualidade da água em córregos, rios e canais, com acompanhamento de parâmetros físico-químicos e avaliação da balneabilidade para a proteção dos corpos hídricos.' ) ) ?></p>
      </article>
      <article class="eco-card dark">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/pipe.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_monit_card3_titulo', 'Sistemas de drenagem' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_monit_card3_desc', 'Monitoramento de sistemas de drenagem com sensoriamento de nível e telemetria, identificando variações anômalas de nível e vazão para apoiar a prevenção de alagamentos.' ) ) ?></p>
      </article>
      <article class="eco-card dark">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/chart.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_monit_card4_titulo', 'Medição de dados meteorológicos' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_monit_card4_desc', 'Estações meteorológicas inteligentes integradas a sistemas IoT e comunicação via satélite para monitoramento contínuo de precipitação, temperatura, umidade, pressão atmosférica e ventos, apoiando a avaliação de riscos e o planejamento operacional.' ) ) ?></p>
      </article>
      <article class="eco-card dark">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/market-share.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_monit_card5_titulo', 'Análise geoespacial e mapas de calor (Kernel)' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_monit_card5_desc', 'Estudo integrado de dados históricos, georreferenciados, topográficos e meteorológicos para a geração de mapas de calor (Kernel), identificando pontos críticos de recorrência, áreas suscetíveis a acúmulo e regiões prioritárias para atuação.' ) ) ?></p>
      </article>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     03 · MODELAGEM HIDRÁULICA E HIDROLÓGICA
═══════════════════════════════════════════════════ -->
<section id="modelagem" class="bg-white py-16 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-start">
      <div class="col-span-12 lg:col-span-6">
        <h2 class="text-job-black font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_model_titulo1', 'Modelagem hidráulica' ) ) ?><br>
          <span class="text-job-green"><?= esc_html( jf( 'ecojob_model_titulo2', 'e hidrológica.' ) ) ?></span>
        </h2>
        <p class="text-gray-600 font-body mt-6" style="font-size:15px;line-height:1.6;max-width:52ch;">
          <?= esc_html( jf( 'ecojob_modelagem_intro', 'Desenvolvemos modelos hidráulicos e hidrológicos para compreender o comportamento de redes e sistemas ambientais, avaliando sua resposta a diferentes condições de operação e eventos críticos. As simulações permitem analisar cenários, identificar vulnerabilidades e apoiar o planejamento de intervenções, ampliações e investimentos.' ) ) ?>
        </p>
      </div>
      <div class="col-span-12 lg:col-span-6 lg:pl-8">
        <dl class="border-t border-gray-300">
          <div class="border-b border-gray-300 py-5">
            <dt class="text-job-black font-sans" style="font-size:16px;letter-spacing:-0.005em;margin-bottom:6px;"><?= esc_html( jf( 'ecojob_model_item1_titulo', 'Análise de cenários' ) ) ?></dt>
            <dd class="text-gray-600 font-body" style="font-size:14px;line-height:1.55;"><?= esc_html( jf( 'ecojob_model_item1_desc', 'Simulação do comportamento das redes sob diferentes condições de operação e eventos críticos.' ) ) ?></dd>
          </div>
          <div class="border-b border-gray-300 py-5">
            <dt class="text-job-black font-sans" style="font-size:16px;letter-spacing:-0.005em;margin-bottom:6px;"><?= esc_html( jf( 'ecojob_model_item2_titulo', 'Identificação de vulnerabilidades' ) ) ?></dt>
            <dd class="text-gray-600 font-body" style="font-size:14px;line-height:1.55;"><?= esc_html( jf( 'ecojob_model_item2_desc', 'Mapeamento de gargalos e pontos frágeis que comprometem o desempenho dos sistemas.' ) ) ?></dd>
          </div>
          <div class="py-5">
            <dt class="text-job-black font-sans" style="font-size:16px;letter-spacing:-0.005em;margin-bottom:6px;"><?= esc_html( jf( 'ecojob_model_item3_titulo', 'Planejamento de investimentos' ) ) ?></dt>
            <dd class="text-gray-600 font-body" style="font-size:14px;line-height:1.55;"><?= esc_html( jf( 'ecojob_model_item3_desc', 'Suporte técnico ao planejamento de intervenções, ampliações e priorização de obras.' ) ) ?></dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     04 · OPERAÇÃO, SUPERVISÃO E GESTÃO DE SISTEMAS
═══════════════════════════════════════════════════ -->
<section id="operacao" class="bg-[#fafaf7] py-16 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="text-job-black font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_oper_titulo1', 'Operação, supervisão' ) ) ?><br>
          e <span class="text-job-green"><?= esc_html( jf( 'ecojob_oper_titulo2', 'gestão de sistemas.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:46ch;">
          <?= esc_html( jf( 'ecojob_operacao_intro', 'Atuamos na operação assistida, supervisão técnica e gestão de sistemas de saneamento e recursos hídricos, promovendo maior confiabilidade, eficiência e controle por meio do acompanhamento contínuo dos processos e indicadores de gestão.' ) ) ?>
        </p>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-2 gap-px" style="background:rgba(29,29,27,0.10);">
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/water-system.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_oper_card1_titulo', 'Estações de Tratamento de Água (ETAs) e de Esgoto (ETEs)' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_oper_card1_desc', 'Acompanhamento operacional das unidades, controle de processos, gestão de indicadores de desempenho, elaboração de relatórios técnicos e apoio às atividades de manutenção, zeladoria e conservação das instalações, contribuindo para a eficiência e a confiabilidade dos sistemas.' ) ) ?></p>
      </article>
      <article class="eco-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/hydroelectric.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_oper_card2_titulo', 'Estações Elevatórias de Água, Esgoto e Drenagem' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_oper_card2_desc', 'Supervisão operacional de estações elevatórias, acompanhando o desempenho dos equipamentos, conjuntos motobomba e sistemas auxiliares — com controle operacional, gestão de indicadores, avaliação do consumo energético e suporte à manutenção, visando aumentar a disponibilidade, a confiabilidade e a vida útil dos ativos.' ) ) ?></p>
      </article>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     PLATAFORMA DE GESTÃO INTELIGENTE ECOJOB — COI 4.0
═══════════════════════════════════════════════════ -->
<section id="plataforma" class="bg-job-green py-16 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8 relative">
    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-end mb-12">
      <div class="col-span-12 lg:col-span-8">
        <span class="font-mono text-[11px] uppercase tracking-[0.22em]" style="color:#a8f0c4;"><?= esc_html( jf( 'ecojob_plat_chip', 'Plataforma · COI 4.0' ) ) ?></span>
        <h2 class="text-white font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_plat_titulo1', 'Plataforma de Gestão' ) ) ?><br>
          <?= esc_html( jf( 'ecojob_plat_titulo2', 'Inteligente Ecojob.' ) ) ?>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-4 flex items-end">
        <p class="font-sans text-white" style="font-size:18px;line-height:1.3;letter-spacing:-0.01em;">
          <?= esc_html( jf( 'ecojob_plat_frase1', 'O futuro da infraestrutura' ) ) ?><br>é <span style="color:#bdf5d2;"><?= esc_html( jf( 'ecojob_plat_frase2', 'digital.' ) ) ?></span>
        </p>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-start">
      <div class="col-span-12 lg:col-span-7">
        <p class="font-body" style="color:#eafff2;font-size:16px;line-height:1.7;max-width:60ch;">
          <?= jf( 'ecojob_plataforma_texto1', 'Mais do que monitorar, a Tecnologia Ecojob conecta dados, sistemas e operações em um único ambiente digital. Nossa plataforma <strong style="font-weight:700;">COI 4.0</strong> integra sensores, telemetria, comunicação via satélite, modelagem computacional, análise geoespacial e inteligência artificial para transformar grandes volumes de dados em conhecimento aplicável.' ) ?>
        </p>
        <p class="font-body mt-5" style="color:#d8f5e3;font-size:15px;line-height:1.7;max-width:60ch;">
          <?= esc_html( jf( 'ecojob_plataforma_texto2', 'Com uma visão integrada e em tempo real dos sistemas, a tecnologia permite identificar padrões, antecipar situações críticas, automatizar processos e ampliar a capacidade de gestão e controle das operações.' ) ) ?>
        </p>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pl-6">
        <p class="text-[10px] font-mono uppercase tracking-[0.22em] mb-4" style="color:#a8f0c4;"><?= esc_html( jf( 'ecojob_plat_tec_label', 'Tecnologias integradas' ) ) ?></p>
        <div class="flex flex-wrap gap-2">
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec1', 'Sensores' ) ) ?></span>
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec2', 'Telemetria' ) ) ?></span>
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec3', 'Comunicação via satélite' ) ) ?></span>
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec4', 'Modelagem computacional' ) ) ?></span>
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec5', 'Análise geoespacial' ) ) ?></span>
          <span class="cap-chip"><?= esc_html( jf( 'ecojob_plat_tec6', 'Inteligência artificial' ) ) ?></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     BENEFÍCIOS DA SOLUÇÃO ECOJOB
═══════════════════════════════════════════════════ -->
<section id="beneficios" class="bg-white py-16 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="text-job-black font-sans mt-4" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'ecojob_benef_titulo1', 'Benefícios da' ) ) ?><br>
          <span class="text-job-green"><?= esc_html( jf( 'ecojob_benef_titulo2', 'solução Ecojob.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:46ch;">
          <?= esc_html( jf( 'ecojob_beneficios_intro', 'A integração entre monitoramento inteligente, modelagem, análise de dados e supervisão operacional gera ganhos concretos para a gestão de sistemas ambientais e de saneamento.' ) ) ?>
        </p>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px mb-px" style="background:rgba(29,29,27,0.10);">
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/setting.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card1_titulo', 'Maior eficiência operacional' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card1_desc', 'Redução da sobrecarga dos sistemas, otimização dos processos de tratamento e melhor utilização dos recursos disponíveis.' ) ) ?></p>
      </article>
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/market-share.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card2_titulo', 'Redução de custos' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card2_desc', 'Direcionamento mais preciso das equipes de campo, diminuição de intervenções emergenciais e otimização das atividades de operação e manutenção.' ) ) ?></p>
      </article>
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/magnifying-glass.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card3_titulo', 'Atuação preventiva' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card3_desc', 'Identificação antecipada de anomalias, obstruções, contribuições irregulares e riscos de extravasamento, permitindo ações antes que os problemas ocorram.' ) ) ?></p>
      </article>
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/green-space.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card4_titulo', 'Proteção ambiental' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card4_desc', 'Redução do lançamento de cargas poluidoras em corpos hídricos, melhoria da qualidade da água e mitigação de impactos ao meio ambiente.' ) ) ?></p>
      </article>
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/business-report.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card5_titulo', 'Planejamento baseado em dados' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card5_desc', 'Análise de tendências, identificação de áreas críticas e priorização de investimentos e intervenções com maior assertividade.' ) ) ?></p>
      </article>
      <article class="eco-card benefit-card">
        <div class="eco-tile"><img src="<?= ju() ?>/icones/contract.svg" alt=""></div>
        <h3><?= esc_html( jf( 'ecojob_benef_card6_titulo', 'Maior segurança e confiabilidade' ) ) ?></h3>
        <p><?= esc_html( jf( 'ecojob_benef_card6_desc', 'Monitoramento contínuo, geração de alertas e suporte à tomada de decisão para uma gestão mais eficiente e resiliente.' ) ) ?></p>
      </article>
    </div>

    <!-- Destaque: inteligência preditiva -->
    <div class="reveal bg-job-black p-8 sm:p-10 flex flex-col md:flex-row md:items-center gap-6 lg:gap-10">
      <div class="flex items-center gap-5 md:w-1/3">
        <div class="eco-tile" style="flex:none;"><img src="<?= ju() ?>/icones/chart.svg" alt=""></div>
        <h3 class="text-white font-sans" style="font-size:22px;line-height:1.1;letter-spacing:-0.01em;"><?= esc_html( jf( 'ecojob_preditiva_titulo', 'Inteligência preditiva' ) ) ?></h3>
      </div>
      <p class="font-body md:w-2/3" style="color:#c8d3cc;font-size:15px;line-height:1.6;">
        <?= jf( 'ecojob_preditiva_texto', 'Redes de distribuição, estações de tratamento e elevatórias passam a contar com um <strong style="color:#fff;font-weight:700;">gêmeo digital</strong>, que reproduz seu comportamento operacional e permite simular cenários, antecipar falhas e apoiar decisões de forma mais rápida e segura.' ) ?>
      </p>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     CTA FINAL
═══════════════════════════════════════════════════ -->
<section class="bg-job-black py-16 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 items-end">
    <div class="col-span-12 lg:col-span-8">
      <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'ecojob_cta_titulo1', 'Solicite um' ) ) ?><br>
        <?= esc_html( jf( 'ecojob_cta_titulo2', 'diagnóstico Ecojob' ) ) ?><br>
        <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#199738;"><?= esc_html( jf( 'ecojob_cta_titulo3', 'para sua operação.' ) ) ?></span>
      </h2>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-3">
      <a href="<?= home_url('/contato/') ?>" class="group inline-flex items-center justify-between bg-job-green2 hover:bg-job-green text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'ecojob_cta_botao', 'Solicitar proposta' ) ) ?></span>
        <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
      </a>
      <a href="tel:+551122079212" class="group inline-flex items-center justify-between border border-white/60 text-white hover:bg-white hover:text-job-green px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span>(11) 2207-9212</span>
        <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
      </a>
    </div>
  </div>
</section>

<script>
  /* Reveal */
  (function() {
    var els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || !els.length) {
      els.forEach(function(el){ el.classList.add('is-visible'); }); return;
    }
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting) { e.target.classList.add('is-visible'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.10, rootMargin: '0px 0px -8% 0px' });
    els.forEach(function(el){ obs.observe(el); });
  })();
</script>

<?php get_footer(); ?>
