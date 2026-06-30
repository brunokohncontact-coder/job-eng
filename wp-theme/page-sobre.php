<?php /* page-sobre.php */ get_header(); ?>

<style>
  html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
  body { background: #fafaf7; overflow-x: hidden; overflow-x: clip; }

  .swiss-index {
    font-family: monospace; font-size: 11px; letter-spacing: 0.22em;
    text-transform: uppercase; color: #00662f;
    display: inline-flex; align-items: center; gap: 12px;
  }
  .swiss-index::before {
    content: ""; display: inline-block; width: 28px; height: 1px; background: #00662f;
  }

  .section-rule {
    max-width: 1200px; margin: 0 auto; padding: 16px 32px;
    display: grid; grid-template-columns: auto 1fr auto; gap: 16px; align-items: center;
    font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase;
    color: #5b6b62;
    border-top: 1px solid rgba(29,29,27,0.12);
    border-bottom: 1px solid rgba(29,29,27,0.06);
    background: #fafaf7;
  }
  .section-rule .accent { color: #00662f; }
  .section-rule .bar { height: 1px; background: rgba(29,29,27,0.18); width: 100%; }
  .section-rule.dark { background: #1d1d1b; border-top-color: rgba(255,255,255,0.10); border-bottom-color: rgba(255,255,255,0.04); color: #8a9a90; }
  .section-rule.dark .accent { color: #199738; }
  .section-rule.dark .bar { background: rgba(255,255,255,0.18); }

  /* Timeline rail (Swiss) */
  .tl-row {
    display: grid; grid-template-columns: 120px 1fr;
    gap: 32px; align-items: start;
    padding: 28px 0; border-top: 1px solid rgba(29,29,27,0.12);
  }
  .tl-row:last-of-type { border-bottom: 1px solid rgba(29,29,27,0.12); }
  .tl-year {
    font-family: '"Franklin Gothic Medium"', sans-serif;
    font-size: clamp(20px, 2vw, 28px);
    letter-spacing: -0.01em; color: #00662f;
    font-variant-numeric: tabular-nums;
  }
  .tl-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 20px; color: #1d1d1b; margin-bottom: 8px; letter-spacing: -0.005em; }
  .tl-desc { color: #4a5550; font-size: 14.5px; line-height: 1.55; max-width: 56ch; }

  @media (max-width: 700px) {
    .tl-row { grid-template-columns: 1fr; gap: 8px; padding: 22px 0; }
  }

  /* Pillar (missão / visão / valores) */
  .pillar {
    display: block;
    padding: 32px 0; border-top: 1px solid rgba(29,29,27,0.12);
  }
  .pillar:last-of-type { border-bottom: 1px solid rgba(29,29,27,0.12); }
  .pillar-num { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; color: #00662f; padding-top: 6px; }
  .pillar h3 { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: clamp(22px, 2.4vw, 30px); letter-spacing: -0.01em; color: #1d1d1b; margin-bottom: 14px; }
  .pillar p, .pillar li { color: #4a5550; font-size: 15px; line-height: 1.6; }
  .pillar ul { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 6px 24px; }
  .pillar ul li { display: flex; align-items: baseline; gap: 8px; }
  .pillar ul li::before { content: "—"; color: #199738; flex-shrink: 0; }
  @media (max-width: 700px) {
    .pillar { grid-template-columns: 1fr; gap: 8px; padding: 24px 0; }
  }

  /* Stat cell */
  .stat-cell {
    display: flex; flex-direction: column; gap: 8px;
    padding: 36px 28px;
    border-right: 1px solid rgba(255,255,255,0.10);
  }
  .stat-cell:last-child { border-right: none; }
  .stat-cell .num {
    font-family: '"Franklin Gothic Medium"', sans-serif;
    font-size: clamp(44px, 5vw, 72px); line-height: 1;
    letter-spacing: -0.02em; color: #fff;
    font-variant-numeric: tabular-nums;
  }
  .stat-cell .num em { color: #199738; font-style: normal; }
  .stat-cell .num sup { font-size: 0.5em; vertical-align: super; color: #199738; margin-left: 4px; letter-spacing: 0; }
  .stat-cell .label { font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #8a9a90; }
  @media (max-width: 900px) {
    .stat-cell { padding: 24px 20px; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.10); }
    .stat-cell:last-child { border-bottom: none; }
  }

  .img-plate { position: relative; overflow: hidden; background: #1d1d1b; }
  .img-plate::after { content:""; position:absolute; inset:0; pointer-events:none; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.06); }

  /* Mobile menu */
  .nav-item:hover .dropdown { display: block; }
  .dropdown { display: none; }
  .menu-mobile-btn { display: none; }
  @media (max-width: 900px) {
    .nav-desktop { display: none !important; }
    .menu-mobile-btn { display: inline-flex; }
  }
  .mobile-drawer { position: fixed; inset: 0; z-index: 60; background: rgba(29,29,27,0.97); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); display: flex; flex-direction: column; padding: 96px 32px 32px; transform: translateX(100%); transition: transform 0.35s cubic-bezier(0.2,0.8,0.2,1); overflow-y: auto; }
  .mobile-drawer.open { transform: translateX(0); }
  .mobile-drawer a { color: #fff; font-family: '"Franklin Gothic Medium"', sans-serif; letter-spacing: 0.08em; font-size: 18px; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.08); display: block; transition: color 0.2s, padding-left 0.2s; }
  .mobile-drawer a:hover { color: #199738; padding-left: 8px; }
  .mobile-drawer a[href$="contato.html"], .nav-desktop a[href$="contato.html"] { text-transform: uppercase; }
  .mobile-drawer .group-label { color: #199738; font-family: monospace; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; margin-top: 18px; margin-bottom: 4px; }
  .mobile-drawer .sublink { font-size: 13px; color: #c0c0c0; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
  .mobile-close { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; transition: border-color 0.2s; }
  .mobile-close:hover { border-color: #199738; }

  .reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.2,0.8,0.2,1), transform 0.7s cubic-bezier(0.2,0.8,0.2,1); }
  .reveal.is-visible { opacity: 1; transform: translateY(0); }

  @media (max-width: 900px) {
    .max-w-grid { padding-left: 20px; padding-right: 20px; }
    section.py-24 { padding-top: 64px; padding-bottom: 64px; }
    footer.py-16 { padding-top: 48px; padding-bottom: 48px; }
  }
  @media (max-width: 640px) { .max-w-grid { padding-left: 16px; padding-right: 16px; } }
</style>

<!-- ═══════════════════════════════════════════════════
     PAGE HERO — split editorial
═══════════════════════════════════════════════════ -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 py-14 lg:py-20">
    <div class="col-span-12 lg:col-span-8">
      <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-10">
        <a href="<?= home_url('/') ?>" class="hover:text-job-green2 transition-colors">Home</a>
        <span class="text-gray-300">/</span>
        <span class="text-job-green">Sobre a Empresa</span>
      </nav>

      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'sobre_titulo_l1', 'Quem é a' ) ) ?><br>
        <span class="text-job-green"><?= esc_html( jf( 'sobre_titulo_l2', 'JOB Engenharia' ) ) ?></span><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'sobre_titulo_l3', 'desde 1981.' ) ) ?></span>
      </h1>
    </div>
  </div>
</section>

<!-- Foto real do cliente — recuperação estrutural (poço de inspeção, Global Oeste) -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 pb-6 lg:pb-12 grid grid-cols-12 gap-6 lg:gap-10 items-stretch">
    <div class="col-span-12 lg:col-span-7 flex flex-col justify-center order-2 lg:order-1">
      <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-job-green mb-5"><?= esc_html( jf( 'sobre_campo_rotulo', 'Engenharia em campo' ) ) ?></p>
      <p class="text-job-black font-sans" style="font-size:clamp(1.6rem,2.6vw,2.4rem);line-height:1.12;letter-spacing:-0.02em;max-width:26ch;">
        <?= esc_html( jf( 'sobre_campo_frase', 'Mais de quatro décadas construindo uma trajetória de evolução, inovação e compromisso com a engenharia.' ) ) ?>
      </p>
    </div>
    <div class="col-span-12 lg:col-span-5 order-1 lg:order-2">
      <figure style="margin:0;position:relative;overflow:hidden;background:#1d1d1b;">
        <img src="<?= ju() ?>/img/hero/h3-poco.jpg" alt="Profissional da JOB em inspeção de poço de aço — recuperação estrutural" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(360px,52vw,560px);display:block;object-position:center;">
      </figure>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     01 · TRAJETÓRIA
═══════════════════════════════════════════════════ -->


<section class="bg-white py-20 lg:py-28 relative">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10">

    <div class="col-span-12 lg:col-span-5 lg:sticky lg:top-28 self-start">

      <h2 class="text-job-black font-sans mb-6" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'sobre_traj_titulo_l1', 'Trajetória,' ) ) ?><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'sobre_traj_titulo_l2', 'passo a passo.' ) ) ?></span>
      </h2>
      <p class="text-gray-600 font-body mb-4" style="font-size:15px;line-height:1.6;max-width:42ch;">
        <?= esc_html( jf( 'sobre_traj_p1', 'Há mais de quatro décadas, a JOB Engenharia constrói uma trajetória marcada pela evolução contínua, pela capacidade de adaptação e pelo compromisso com a excelência técnica.' ) ) ?>
      </p>
      <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:42ch;">
        <?= esc_html( jf( 'sobre_traj_p2', 'Ao longo dos anos, ampliamos nossa atuação, incorporamos novas tecnologias e aperfeiçoamos nossos processos para acompanhar as transformações do setor e entregar soluções cada vez mais completas, eficientes e sustentáveis aos nossos clientes.' ) ) ?>
      </p>
    </div>

    <div class="col-span-12 lg:col-span-7 reveal">
      <div class="tl-row">
        <p class="tl-year"><?= esc_html( jf( 'sobre_tl1_ano', '1981' ) ) ?></p>
        <div>
          <h3 class="tl-title"><?= esc_html( jf( 'sobre_tl1_titulo', 'Fundação' ) ) ?></h3>
          <p class="tl-desc"><?= esc_html( jf( 'sobre_tl1_desc', 'Início das operações com foco em obras, reformas e serviços de manutenção, com forte presença nas áreas hidráulica e elétrica.' ) ) ?></p>
        </div>
      </div>
      <div class="tl-row">
        <p class="tl-year"><?= esc_html( jf( 'sobre_tl2_ano', 'Anos 90' ) ) ?></p>
        <div>
          <h3 class="tl-title"><?= esc_html( jf( 'sobre_tl2_titulo', 'Expansão de portfólio' ) ) ?></h3>
          <p class="tl-desc"><?= esc_html( jf( 'sobre_tl2_desc', 'Incorporação dos serviços de zeladoria urbana e expansão da atuação para a área de saneamento.' ) ) ?></p>
        </div>
      </div>
      <div class="tl-row">
        <p class="tl-year"><?= esc_html( jf( 'sobre_tl3_ano', 'Anos 2000' ) ) ?></p>
        <div>
          <h3 class="tl-title"><?= esc_html( jf( 'sobre_tl3_titulo', 'Tecnologia ambiental' ) ) ?></h3>
          <p class="tl-desc"><?= esc_html( jf( 'sobre_tl3_desc', 'Desenvolvimento das primeiras metodologias próprias para análise de sistemas hídricos e início do programa de monitoramento ambiental — base do que se tornaria a plataforma Ecojob.' ) ) ?></p>
        </div>
      </div>
      <div class="tl-row">
        <p class="tl-year"><?= esc_html( jf( 'sobre_tl4_ano', 'Anos 2010' ) ) ?></p>
        <div>
          <h3 class="tl-title"><?= esc_html( jf( 'sobre_tl4_titulo', 'Tecnologia própria' ) ) ?></h3>
          <p class="tl-desc"><?= esc_html( jf( 'sobre_tl4_desc', 'Desenvolvimento de tecnologias próprias, como sondas multiparamétricas para análise quali-quantitativa da água, reforçando nosso compromisso com a inovação, a precisão no monitoramento ambiental e a evolução tecnológica.' ) ) ?></p>
        </div>
      </div>
      <div class="tl-row">
        <p class="tl-year"><?= esc_html( jf( 'sobre_tl5_ano', 'Hoje' ) ) ?></p>
        <div>
          <h3 class="tl-title"><?= esc_html( jf( 'sobre_tl5_titulo', 'Quatro áreas integradas' ) ) ?></h3>
          <p class="tl-desc"><?= esc_html( jf( 'sobre_tl5_desc', 'Atuação integrada: Com mais de quatro décadas de experiência, a JOB Engenharia reúne engenharia, tecnologia e gestão em uma atuação integrada, preparada para atender aos desafios atuais e futuros de seus clientes.' ) ) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     02 · PRINCÍPIOS
═══════════════════════════════════════════════════ -->


<section class="bg-[#fafaf7] py-20 lg:py-28 relative">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-14">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-job-black font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'sobre_princ_titulo_l1', 'Missão, visão' ) ) ?><br>
          <?= esc_html( jf( 'sobre_princ_titulo_l2', 'e' ) ) ?> <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'sobre_princ_titulo_hl', 'valores.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:42ch;">
          <?= esc_html( jf( 'sobre_princ_intro', 'Os princípios que orientam nossas escolhas técnicas, aplicação de tecnologias e a condução de nossas relações com clientes, equipes e parceiros.' ) ) ?>
        </p>
      </div>
    </div>

    <div class="reveal">
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'sobre_missao_titulo', 'Por que existimos' ) ) ?></h3>
          <p style="max-width:60ch;">
            <?= esc_html( jf( 'sobre_missao_texto', 'Transformar engenharia em soluções eficientes e sustentáveis, atuando com excelência técnica, inovação e compromisso socioambiental.' ) ) ?>
          </p>
        </div>
      </div>
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'sobre_visao_titulo', 'Onde queremos chegar' ) ) ?></h3>
          <p style="max-width:60ch;">
            <?= esc_html( jf( 'sobre_visao_texto', 'Ser uma referência nacional em engenharia e soluções ambientais, destacando-se pela capacidade técnica, inovação contínua e excelência na entrega de resultados.' ) ) ?>
          </p>
        </div>
      </div>
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'sobre_valores_titulo', 'O que praticamos' ) ) ?></h3>
          <ul>
            <li><?= esc_html( jf( 'sobre_valores_item1', 'Responsabilidade técnica' ) ) ?></li>
            <li><?= esc_html( jf( 'sobre_valores_item2', 'Sustentabilidade ambiental' ) ) ?></li>
            <li><?= esc_html( jf( 'sobre_valores_item3', 'Inovação aplicada' ) ) ?></li>
            <li><?= esc_html( jf( 'sobre_valores_item4', 'Compromisso com prazo e qualidade' ) ) ?></li>
            <li><?= esc_html( jf( 'sobre_valores_item5', 'Respeito às pessoas e ao meio ambiente' ) ) ?></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     03 · NÚMEROS
═══════════════════════════════════════════════════ -->


<section class="bg-job-black py-20 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-white font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'sobre_num_titulo_l1', 'Quatro décadas' ) ) ?><br>
          de <span style="color:#199738;"><?= esc_html( jf( 'sobre_num_titulo_l2', 'resultados' ) ) ?></span><br>
          <span class="italic font-light text-gray-500" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'sobre_num_titulo_l3', 'em campo.' ) ) ?></span>
        </h2>
      </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-5 border-y border-white/15">
      <div class="stat-cell reveal">
        <span class="num"><?= esc_html( jf( 'sobre_stat1_num', '15.000' ) ) ?><sup>+</sup><span class="text-base font-mono ml-1" style="color:#8a9a90;"><?= esc_html( jf( 'sobre_stat1_unit', 'm²' ) ) ?></span></span>
        <span class="label"><?= esc_html( jf( 'sobre_stat1_label', 'Vias pavimentadas' ) ) ?></span>
      </div>
      <div class="stat-cell reveal">
        <span class="num"><?= esc_html( jf( 'sobre_stat2_num', '4.000' ) ) ?><sup>+</sup><span class="text-base font-mono ml-1" style="color:#8a9a90;"><?= esc_html( jf( 'sobre_stat2_unit', 'km' ) ) ?></span></span>
        <span class="label"><?= esc_html( jf( 'sobre_stat2_label', 'Redes desobstruídas' ) ) ?></span>
      </div>
      <div class="stat-cell reveal">
        <span class="num"><?= esc_html( jf( 'sobre_stat3_num', 'xx' ) ) ?><span class="text-base font-mono ml-1" style="color:#8a9a90;"><?= esc_html( jf( 'sobre_stat3_unit', 'pontos' ) ) ?></span></span>
        <span class="label"><?= esc_html( jf( 'sobre_stat3_label', 'Monitoramento em operação' ) ) ?></span>
      </div>
      <div class="stat-cell reveal">
        <span class="num"><?= esc_html( jf( 'sobre_stat4_num', '160.000' ) ) ?><sup>+</sup><span class="text-base font-mono ml-1" style="color:#8a9a90;"><?= esc_html( jf( 'sobre_stat4_unit', 'm' ) ) ?></span></span>
        <span class="label"><?= esc_html( jf( 'sobre_stat4_label', 'Redes inspecionadas por CFTV' ) ) ?></span>
      </div>
      <div class="stat-cell reveal">
        <span class="num"><?= esc_html( jf( 'sobre_stat5_num', '720.000' ) ) ?><sup>+</sup><span class="text-base font-mono ml-1" style="color:#8a9a90;"><?= esc_html( jf( 'sobre_stat5_unit', 'm' ) ) ?></span></span>
        <span class="label"><?= esc_html( jf( 'sobre_stat5_label', 'Redes avaliadas por teste de fumaça' ) ) ?></span>
      </div>
    </div>

    <p class="text-gray-500 text-[10px] font-mono uppercase tracking-[0.22em] mt-10">
      <?= esc_html( jf( 'sobre_num_nota', '/ nº de pontos de monitoramento (xx) a confirmar com a empresa' ) ) ?>
    </p>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     CTA — split poster verde
═══════════════════════════════════════════════════ -->


<section class="bg-job-green py-20 lg:py-24 relative">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 items-end">
    <div class="col-span-12 lg:col-span-8">

      <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'sobre_cta_titulo_l1', 'Construa' ) ) ?><br>
        <?= esc_html( jf( 'sobre_cta_titulo_l2', 'com a' ) ) ?> <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#7fd99e;"><?= esc_html( jf( 'sobre_cta_titulo_hl', 'JOB.' ) ) ?></span>
      </h2>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-3">
      <a href="<?= home_url('/contato/') ?>" class="group inline-flex items-center justify-between bg-white text-job-green hover:bg-job-black hover:text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'sobre_cta_btn1', 'Solicitar proposta' ) ) ?></span>
        <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
      </a>
      <a href="<?= home_url('/servicos/') ?>" class="group inline-flex items-center justify-between border border-white/60 text-white hover:bg-white hover:text-job-green px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'sobre_cta_btn2', 'Conhecer serviços' ) ) ?></span>
        <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
      </a>
    </div>
  </div>
</section>

<script>
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
