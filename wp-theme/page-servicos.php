<?php /* page-servicos.php */ get_header(); ?>

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

  /* ── Swiss service-row (indexed list) ── */
  .svc-row {
    display: grid;
    grid-template-columns: 72px 1fr 2fr;
    gap: 28px;
    align-items: start;
    padding: 28px 0;
    border-bottom: 1px solid rgba(29,29,27,0.10);
    transition: padding 0.3s ease;
  }
  .svc-row:first-of-type { border-top: 1px solid rgba(29,29,27,0.18); }
  .svc-row:hover { padding-left: 12px; }
  .svc-num {
    display: flex; flex-direction: column; align-items: flex-start; gap: 8px;
    padding-top: 4px;
  }
  .svc-tile {
    width: 48px; height: 48px; background: #00662f;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s;
  }
  .svc-tile img {
    width: 26px; height: 26px; object-fit: contain;
    filter: brightness(0) invert(1);
  }
  .svc-tile-num {
    font-family: monospace; font-size: 11px; letter-spacing: 0.16em;
    color: #00662f; transition: color 0.2s;
  }
  .svc-row:hover .svc-tile { background: #199738; }
  .svc-row:hover .svc-tile-num { color: #199738; }
  .svc-row.dark .svc-tile { background: #199738; }
  .svc-row.dark:hover .svc-tile { background: #fff; }
  .svc-row.dark:hover .svc-tile img { filter: brightness(0); }
  .svc-row.dark .svc-tile-num { color: #199738; }
  .svc-title {
    font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif;
    font-size: clamp(20px, 2.0vw, 26px);
    line-height: 1.05; color: #1d1d1b; letter-spacing: -0.005em;
  }
  .svc-meta {
    font-family: monospace; font-size: 10px; letter-spacing: 0.16em;
    text-transform: uppercase; color: #5b6b62; margin-top: 8px;
  }
  .svc-list { color: #4a5550; font-size: 13.5px; line-height: 1.5; }
  .svc-list li { display: flex; align-items: baseline; gap: 8px; padding: 2px 0; }
  .svc-list li::before { content: "—"; color: #199738; flex-shrink: 0; }
  .svc-cta {
    align-self: start; font-family: monospace; font-size: 11px;
    letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62;
    border: 1px solid rgba(29,29,27,0.20); padding: 9px 14px;
    transition: color 0.2s, border-color 0.2s; white-space: nowrap;
  }
  .svc-row.dark { border-bottom-color: rgba(255,255,255,0.10); }
  .svc-row.dark:first-of-type { border-top-color: rgba(255,255,255,0.18); }
  .svc-row.dark .svc-title { color: #fff; }
  .svc-row.dark .svc-list { color: #8a9a90; }
  .svc-row.dark .svc-meta { color: #8a9a90; }
  .svc-row.dark .svc-cta { color: #c8d3cc; border-color: rgba(255,255,255,0.20); }
  .svc-row.dark:hover .svc-cta { color: #fff; border-color: #fff; }

  /* Linha compacta (sem descrição) + rótulo de subcategoria */
  .svc-row.compact { grid-template-columns: 72px 1fr; }
  .svc-subcat { display: flex; align-items: center; gap: 16px; margin: 4px 0 6px; }
  .svc-subcat .lbl { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; text-transform: uppercase; color: #00662f; white-space: nowrap; }
  .svc-subcat .rule { height: 1px; flex: 1; background: rgba(29,29,27,0.12); }

  @media (max-width: 900px) {
    .svc-row { grid-template-columns: 56px 1fr; gap: 14px 18px; padding: 22px 0; }
    .svc-row > .svc-list-cell { grid-column: 2 / -1; }
    .svc-row > .svc-cta { grid-column: 2 / -1; justify-self: start; }
    .svc-tile { width: 40px; height: 40px; }
    .svc-tile img { width: 22px; height: 22px; }
  }

  /* ── Image plate ── */
  .img-plate { position: relative; overflow: hidden; background: #1d1d1b; }
  .img-plate::after {
    content: ""; position: absolute; inset: 0; pointer-events: none;
    box-shadow: inset 0 0 0 1px rgba(255,255,255,0.06);
  }

  /* ── Tab bar (sticky chapter index) ── */
  .tab-btn {
    display: inline-flex; align-items: center; gap: 10px;
    padding: 18px 18px;
    font-family: monospace; font-size: 11px;
    letter-spacing: 0.20em; text-transform: uppercase;
    color: #5b6b62; white-space: nowrap;
    border-right: 1px solid rgba(29,29,27,0.10);
    transition: color 0.2s, background 0.2s;
  }
  .tab-btn:last-child { border-right: none; }
  .tab-btn .tab-num { color: #00662f; font-weight: bold; }
  .tab-btn:hover { color: #1d1d1b; background: rgba(29,29,27,0.03); }
  .tab-btn.active { color: #1d1d1b; background: #fff; }
  .tab-btn.active .tab-num { color: #199738; }
  .tab-btn.active::after {
    content: ""; display: block; width: 100%; height: 2px;
    background: #00662f; position: absolute; left: 0; bottom: -1px;
  }
  .tab-btn { position: relative; }

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

  #tab-bar .flex.overflow-x-auto { scrollbar-width: none; -ms-overflow-style: none; }
  #tab-bar .flex.overflow-x-auto::-webkit-scrollbar { display: none; }
</style>

<!-- ═══════════════════════════════════════════════════
     PAGE HERO — split editorial Swiss
═══════════════════════════════════════════════════ -->
<section id="page-hero" class="bg-white">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 py-14 lg:py-20">

    <!-- Texto (8 cols) -->
    <div class="col-span-12 lg:col-span-8">
      <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-10">
        <a href="<?= home_url('/') ?>" class="hover:text-job-green2 transition-colors">Home</a>
        <span class="text-gray-300">/</span>
        <span class="text-job-green">Serviços</span>
      </nav>


      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'servicos_hero_l1', 'Diversas frentes,' ) ) ?><br>
        <?= esc_html( jf( 'servicos_hero_l2a', 'uma ' ) ) ?><span class="text-job-green"><?= esc_html( jf( 'servicos_hero_l2b', 'engenharia' ) ) ?></span><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'servicos_hero_l3', 'que entrega soluções.' ) ) ?></span>
      </h1>
    </div>
  </div>
</section>

<!-- TAB BAR (chapter index) -->
<div id="tab-bar" class="sticky z-40 bg-[#fafaf7] border-y border-gray-200" style="top:80px;">
  <div class="relative max-w-grid mx-auto">
    <div class="flex overflow-x-auto">
      <a href="#infraestrutura" data-tab="infraestrutura" class="tab-btn active">
        <?= esc_html( jf( 'servicos_tab_infra', 'Infraestrutura' ) ) ?>
      </a>
      <a href="#zeladoria" data-tab="zeladoria" class="tab-btn">
        <?= esc_html( jf( 'servicos_tab_zeladoria', 'Zeladoria e Manutenção de Ativos' ) ) ?>
      </a>
      <a href="#predial" data-tab="predial" class="tab-btn">
        <?= esc_html( jf( 'servicos_tab_predial', 'Engenharia Predial' ) ) ?>
      </a>
      <a href="#ambiental" data-tab="ambiental" class="tab-btn">
        <?= esc_html( jf( 'servicos_tab_ambiental', 'Tecnologia Ambiental' ) ) ?>
      </a>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════
     01 · INFRAESTRUTURA
═══════════════════════════════════════════════════ -->


<section id="infraestrutura" class="bg-white py-20 lg:py-28">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-14 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-job-black font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'servicos_infra_t1', 'Infraestrutura de mobilidade,' ) ) ?><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'servicos_infra_t2', 'recursos hídricos e saneamento.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:46ch;">
          <?= esc_html( jf( 'servicos_infra_intro', 'Atuamos no desenvolvimento e aprimoramento de sistemas e ativos de infraestrutura, contribuindo para a mobilidade, a gestão dos recursos hídricos e a universalização do saneamento por meio de soluções sustentáveis e de alto desempenho.' ) ) ?>
        </p>
      </div>
    </div>

    <figure style="margin:0 0 14px;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/areas/infra-pontes-real.png" alt="Recuperação estrutural de pontes e obras de infraestrutura" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(180px,26vw,300px);display:block;">
    </figure>

    <div class="reveal">
      <!-- Subcategoria · Mobilidade -->
      <div class="svc-subcat"><span class="lbl"><?= esc_html( jf( 'servicos_infra_sub_mobilidade', 'Mobilidade' ) ) ?></span><span class="rule"></span></div>

      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/road.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_infra_rodovias_titulo', 'Rodovias' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_infra_rodovias_meta', 'Mobilidade · Segurança' ) ) ?></p>
        </div>
      </div>

      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/road-2.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_infra_vicinais_titulo', 'Vias vicinais' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_infra_vicinais_meta', 'Estradas rurais · Acesso municipal' ) ) ?></p>
        </div>
      </div>

      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/bridge.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_infra_pontes_titulo', 'Pontes e viadutos' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_infra_pontes_meta', 'Construção · Recuperação e reforço estrutural · Revitalização' ) ) ?></p>
        </div>
      </div>

      <!-- Subcategoria · Pavimentação -->
      <div class="svc-subcat" style="margin-top:20px;"><span class="lbl"><?= esc_html( jf( 'servicos_infra_sub_pavimentacao', 'Pavimentação' ) ) ?></span><span class="rule"></span></div>

      <!-- Linha em destaque (RAP) — preenche a coluna inteira -->
      <div class="grid grid-cols-12 gap-0 mt-2 mb-2 border-y-2 border-job-green">
        <div class="col-span-12 lg:col-span-7 bg-job-black text-white p-8 lg:p-10">

          <h3 class="font-sans mb-4" style="font-size:clamp(28px,3vw,40px);line-height:0.98;letter-spacing:-0.02em;">
<?= esc_html( jf( 'servicos_rap_titulo_a', 'Usina Móvel ' ) ) ?><span style="color:#199738;"><?= esc_html( jf( 'servicos_rap_titulo_b', 'RAP' ) ) ?></span>
          </h3>
          <p class="text-gray-400 font-body mb-6" style="font-size:14px;line-height:1.55;max-width:48ch;">
            <?= esc_html( jf( 'servicos_rap_texto', 'Nosso grande diferencial é a utilização de usina móvel de RAP (Reclaimed Asphalt Pavement), que permite a reutilização de materiais, reduz custos e reforça nosso compromisso com a sustentabilidade.' ) ) ?>
          </p>
          <a href="<?= home_url('/contato/') ?>" class="group inline-flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-white border-b border-white/40 pb-1 hover:border-job-green2 transition-colors">
            <span><?= esc_html( jf( 'servicos_rap_cta', 'Solicitar viabilidade' ) ) ?></span>
            <span style="color:#199738;" class="transition-transform group-hover:translate-x-1">→</span>
          </a>
        </div>
        <div class="col-span-12 lg:col-span-5 bg-[#f0efe9] p-8 lg:p-10 grid grid-cols-2 gap-6 content-center">
          <div class="col-span-2">
            <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-2"><?= esc_html( jf( 'servicos_rap_stat1_label', 'Reaproveitamento de materiais' ) ) ?></p>
            <p class="font-sans text-job-black" style="font-size:32px;line-height:1;letter-spacing:-0.02em;"><?= esc_html( jf( 'servicos_rap_stat1_num', '100' ) ) ?><span class="text-base font-mono ml-1">%</span></p>
          </div>
          <div class="col-span-2 border-t border-gray-300 pt-4">
            <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-2"><?= esc_html( jf( 'servicos_rap_stat2_label', 'Operação' ) ) ?></p>
            <p class="font-sans text-job-black" style="font-size:18px;line-height:1.2;"><?= esc_html( jf( 'servicos_rap_stat2_valor', 'Reciclagem in situ — sem transporte de fresado.' ) ) ?></p>
          </div>
        </div>
      </div>

      <!-- Subcategoria · Saneamento -->
      <div class="svc-subcat" style="margin-top:20px;"><span class="lbl"><?= esc_html( jf( 'servicos_infra_sub_saneamento', 'Saneamento' ) ) ?></span><span class="rule"></span></div>

      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/water-system.svg" alt=""></span>
        </span>
        <div>
          <p class="svc-meta" style="margin-top:0;"><?= esc_html( jf( 'servicos_saneamento_meta', 'Redes de água · Esgoto' ) ) ?></p>
          <p class="svc-list font-body" style="margin-top:8px;max-width:62ch;"><?= esc_html( jf( 'servicos_saneamento_texto', 'Desenvolvemos soluções de saneamento voltadas à implantação e aprimoramento de redes de água e esgoto, combinando engenharia, tecnologia e expertise operacional para fortalecer a infraestrutura e ampliar a eficiência dos sistemas.' ) ) ?></p>
        </div>
      </div>

      <!-- Subcategoria · Drenagem -->
      <div class="svc-subcat" style="margin-top:20px;"><span class="lbl"><?= esc_html( jf( 'servicos_infra_sub_drenagem', 'Drenagem' ) ) ?></span><span class="rule"></span></div>

      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/hydroelectric.svg" alt=""></span>
        </span>
        <div>
          <p class="svc-meta" style="margin-top:0;"><?= esc_html( jf( 'servicos_drenagem_meta', 'Águas pluviais · Prevenção de alagamentos' ) ) ?></p>
          <p class="svc-list font-body" style="margin-top:8px;max-width:62ch;"><?= esc_html( jf( 'servicos_drenagem_texto', 'Atuamos na implantação e modernização de sistemas de drenagem, promovendo o adequado escoamento das águas pluviais e o desempenho da infraestrutura urbana.' ) ) ?></p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     02 · ZELADORIA URBANA
═══════════════════════════════════════════════════ -->


<section id="zeladoria" class="bg-[#fafaf7] py-20 lg:py-28">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-14 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-job-black font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'servicos_zeladoria_t1', 'Zeladoria e' ) ) ?><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'servicos_zeladoria_t2', 'manutenção de ativos.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:46ch;">
          <?= esc_html( jf( 'servicos_zeladoria_intro', 'Atuamos na conservação e manutenção contínua dos ambientes atendidos, promovendo qualidade, funcionalidade e bem-estar no dia a dia.' ) ) ?>
        </p>
      </div>
    </div>

    <figure style="margin:0 0 14px;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/caminhao.png" alt="Zeladoria urbana e manutenção de ativos públicos" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(180px,26vw,300px);display:block;">
    </figure>

    <div class="reveal">
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/clean-city.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_zel_c1_titulo', 'Varrição e limpeza urbana' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_zel_c1_meta', 'Alto padrão de eficiência' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/sewer.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_zel_c2_titulo', 'Manutenção preventiva e corretiva em redes de esgoto' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_zel_c2_meta', 'Prevenção de entupimentos e extravasamentos · Tecnologia de ponta' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/desobstrucao.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_zel_c3_titulo', 'Manutenção preventiva e corretiva em galerias de águas pluviais' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_zel_c3_meta', 'Escoamento correto das águas da chuva · Prevenção de alagamentos' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/road-roller.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_zel_c4_titulo', 'Manutenção de vias públicas' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_zel_c4_meta', 'Mobilidade · Segurança' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/green-space.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_zel_c5_titulo', 'Áreas verdes' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_zel_c5_meta', 'Conservação · Preservação ambiental' ) ) ?></p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     03 · MANUTENÇÃO DE PRÉDIOS PÚBLICOS E PRIVADOS
═══════════════════════════════════════════════════ -->


<section id="predial" class="bg-white py-20 lg:py-28">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-14 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-job-black font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'servicos_predial_t1', 'Engenharia' ) ) ?><br>
          <span class="text-job-green"><?= esc_html( jf( 'servicos_predial_t2', 'predial.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:46ch;">
          <?= esc_html( jf( 'servicos_predial_intro', 'Atuamos na execução de serviços de engenharia predial que promovem a adequação, modernização e valorização das edificações, combinando qualidade técnica, segurança e eficiência operacional.' ) ) ?>
        </p>
      </div>
    </div>

    <figure style="margin:0 0 14px;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/areas/predial.webp" alt="Equipe da JOB em acesso por corda na fachada de edifício — engenharia predial" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(180px,26vw,300px);display:block;object-position:center bottom;">
    </figure>

    <div class="reveal">
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/maintenance.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_pred_c1_titulo', 'Reformas e ampliações' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_pred_c1_meta', 'Adaptação · Eficiência · Qualidade' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/maintenance-2.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_pred_c2_titulo', 'Manutenção predial geral' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_pred_c2_meta', 'Preventiva · Corretiva' ) ) ?></p>
        </div>
      </div>
      <div class="svc-row compact">
        <span class="svc-num">
          <span class="svc-tile"><img src="<?= ju() ?>/icones/setting.svg" alt=""></span>
        </span>
        <div>
          <h3 class="svc-title"><?= esc_html( jf( 'servicos_pred_c3_titulo', 'Modernização de sistemas elétricos e hidráulicos' ) ) ?></h3>
          <p class="svc-meta"><?= esc_html( jf( 'servicos_pred_c3_meta', 'Segurança · Economia · Normas técnicas' ) ) ?></p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     04 · TECNOLOGIA AMBIENTAL — Ecojob (resumo + CTA)
═══════════════════════════════════════════════════ -->


<section id="ambiental" class="bg-job-green py-20 lg:py-28 relative">
  <div class="max-w-grid mx-auto px-8 relative">

    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-start mb-14 lg:mb-16">
      <!-- Logo + título Ecojob -->
      <div class="col-span-12 lg:col-span-5">
        <div class="inline-flex items-center mb-8">
          <img src="<?= ju() ?>/img/ecojob_logo_positivo-03.svg" alt="Ecojob — Tecnologia Ambiental JOB" style="height:48px;width:auto;display:block;">
        </div>

        <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.4rem);line-height:0.98;letter-spacing:-0.025em;font-weight:500;">
          <span style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:400;"><?= esc_html( jf( 'servicos_ambiental_t1', 'Tecnologia' ) ) ?></span><br>
          <span style="font-weight:800;letter-spacing:-0.03em;"><?= esc_html( jf( 'servicos_ambiental_t2', 'ambiental.' ) ) ?></span>
        </h2>
      </div>

      <!-- Texto institucional -->
      <div class="col-span-12 lg:col-span-7 lg:pt-2">
        <div class="font-body" style="color:#fff;font-size:17px;line-height:1.6;max-width:60ch;">
          <?= jf( 'servicos_ambiental_intro', 'A <strong style="font-weight:700;">Ecojob</strong> é especializada em engenharia de alta performance para a gestão de infraestrutura urbana e saneamento. Nosso diferencial é a entrega de uma solução de ciclo completo: unimos o diagnóstico técnico, o monitoramento tecnológico de última geração e a zeladoria operacional para garantir máxima eficiência, resiliência urbana e conformidade legal.' ) ?>
        </div>
      </div>
    </div>

    <!-- Grid das 5 frentes -->
    <div class="reveal grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-px" style="background:rgba(255,255,255,0.18);border:1px solid rgba(255,255,255,0.18);">
      <a href="<?= home_url('/ecojob/') ?>#cursos-dagua" class="block p-6 lg:p-7 transition-colors" style="background:#00662f;">

        <h3 class="text-white font-sans mb-2" style="font-size:17px;line-height:1.15;letter-spacing:-0.01em;"><?= esc_html( jf( 'servicos_eco_c1_titulo', 'Monitoramento de córregos, rios, canais e balneabilidade' ) ) ?></h3>
        <p class="font-body text-[12px]" style="color:#d8f5e3;line-height:1.45;"><?= esc_html( jf( 'servicos_eco_c1_meta', 'CONAMA 357/05 · Sondas multiparamétricas' ) ) ?></p>
      </a>
      <a href="<?= home_url('/ecojob/') ?>#drenagem" class="block p-6 lg:p-7 transition-colors" style="background:#00662f;">

        <h3 class="text-white font-sans mb-2" style="font-size:17px;line-height:1.15;letter-spacing:-0.01em;"><?= esc_html( jf( 'servicos_eco_c2_titulo', 'Monitoramento de sistemas de drenagem' ) ) ?></h3>
        <p class="font-body text-[12px]" style="color:#d8f5e3;line-height:1.45;"><?= esc_html( jf( 'servicos_eco_c2_meta', 'Sensores IoT · CCTV · Engenharia investigativa' ) ) ?></p>
      </a>
      <a href="<?= home_url('/ecojob/') ?>#esgoto" class="block p-6 lg:p-7 transition-colors" style="background:#00662f;">

        <h3 class="text-white font-sans mb-2" style="font-size:17px;line-height:1.15;letter-spacing:-0.01em;"><?= esc_html( jf( 'servicos_eco_c3_titulo', 'Sistemas de esgotamento sanitário' ) ) ?></h3>
        <p class="font-body text-[12px]" style="color:#d8f5e3;line-height:1.45;"><?= esc_html( jf( 'servicos_eco_c3_meta', 'CONAMA 430/11 · Separação absoluta' ) ) ?></p>
      </a>
      <a href="<?= home_url('/ecojob/') ?>#etas-etes" class="block p-6 lg:p-7 transition-colors" style="background:#00662f;">

        <h3 class="text-white font-sans mb-2" style="font-size:17px;line-height:1.15;letter-spacing:-0.01em;"><?= esc_html( jf( 'servicos_eco_c4_titulo', 'Operação assistida de ETAs e ETEs' ) ) ?></h3>
        <p class="font-body text-[12px]" style="color:#d8f5e3;line-height:1.45;"><?= esc_html( jf( 'servicos_eco_c4_meta', 'Operação · Conservação · Otimização' ) ) ?></p>
      </a>
      <a href="<?= home_url('/ecojob/') ?>#gestao" class="block p-6 lg:p-7 transition-colors" style="background:#00662f;">

        <h3 class="text-white font-sans mb-2" style="font-size:17px;line-height:1.15;letter-spacing:-0.01em;"><?= esc_html( jf( 'servicos_eco_c5_titulo', 'Gestão, Diagnóstico e Prognóstico' ) ) ?></h3>
        <p class="font-body text-[12px]" style="color:#d8f5e3;line-height:1.45;"><?= esc_html( jf( 'servicos_eco_c5_meta', 'Novo Marco do Saneamento · CID · CCTV robotizado' ) ) ?></p>
      </a>
    </div>

    <!-- CTA principal -->
    <div class="mt-12 lg:mt-16 grid grid-cols-12 gap-6 lg:gap-10 items-center">
      <div class="col-span-12 lg:col-span-7">
        <div class="font-sans text-white" style="font-size:clamp(20px,2.2vw,26px);line-height:1.2;letter-spacing:-0.01em;max-width:42ch;">
          <?= jf( 'servicos_ambiental_cta', 'Conheça a plataforma completa de engenharia ambiental Ecojob — <span style="color:#a8f0c4;font-weight:500;">sensoriamento, diagnóstico e operação</span> em ciclo único.' ) ?>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-5 flex flex-col lg:flex-row gap-3 lg:justify-end">
        <a href="<?= home_url('/ecojob/') ?>" class="group inline-flex items-center justify-between bg-white text-job-green hover:bg-job-black hover:text-white px-6 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors" style="min-width:240px;">
          <span><?= esc_html( jf( 'servicos_eco_btn', 'Conhecer Ecojob' ) ) ?></span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     CTA FINAL — split poster verde
═══════════════════════════════════════════════════ -->


<section id="cta-final" class="bg-job-green py-20 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 items-end">
    <div class="col-span-12 lg:col-span-8">

      <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'servicos_cta_t1', 'Solicite proposta' ) ) ?><br>
        <?= esc_html( jf( 'servicos_cta_t2', 'ou fale com um' ) ) ?><br>
        <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#7fd99e;"><?= esc_html( jf( 'servicos_cta_t3', 'especialista.' ) ) ?></span>
      </h2>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-3">
      <a href="<?= home_url('/contato/') ?>" class="group inline-flex items-center justify-between bg-white text-job-green hover:bg-job-black hover:text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'servicos_cta_btn', 'Solicitar proposta' ) ) ?></span>
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

  /* Tab bar active state */
  const sections = ['infraestrutura','zeladoria','predial','ambiental'];
  const tabBtns = document.querySelectorAll('[data-tab]');
  function setActiveTab(id) {
    tabBtns.forEach(function(btn){
      if (btn.dataset.tab === id) btn.classList.add('active');
      else btn.classList.remove('active');
    });
  }
  const observer = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting) setActiveTab(entry.target.id);
    });
  }, { root: null, rootMargin: '-140px 0px -60% 0px', threshold: 0 });
  sections.forEach(function(id){ var el = document.getElementById(id); if (el) observer.observe(el); });

  /* Smooth scroll com offset */
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor){
    anchor.addEventListener('click', function(e){
      var targetId = this.getAttribute('href').slice(1);
      var target = document.getElementById(targetId);
      if (!target) return;
      e.preventDefault();
      var offset = 80 + 56;
      var top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  });
</script>

<?php get_footer(); ?>
