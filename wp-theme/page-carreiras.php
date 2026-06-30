<?php /* page-carreiras.php */ get_header(); ?>

<style>
  html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
  body { background: #fafaf7; overflow-x: hidden; overflow-x: clip; }

  .swiss-index {
    font-family: monospace; font-size: 11px; letter-spacing: 0.22em;
    text-transform: uppercase; color: #00662f;
    display: inline-flex; align-items: center; gap: 12px;
  }
  .swiss-index::before { content: ""; display: inline-block; width: 28px; height: 1px; background: #00662f; }

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

  /* Pillar (por que JOB) */
  .pillar {
    display: block;
    padding: 30px 0; border-top: 1px solid rgba(29,29,27,0.12);
  }
  .pillar:last-of-type { border-bottom: 1px solid rgba(29,29,27,0.12); }
  .pillar-num { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; color: #00662f; padding-top: 6px; }
  .pillar h3 { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: clamp(20px, 2vw, 26px); letter-spacing: -0.005em; color: #1d1d1b; margin-bottom: 10px; }
  .pillar p { color: #4a5550; font-size: 15px; line-height: 1.55; max-width: 60ch; }

  /* Vaga row */
  .vaga-row {
    display: grid; grid-template-columns: 64px 1fr auto;
    gap: 28px; align-items: center;
    padding: 26px 0; border-bottom: 1px solid rgba(29,29,27,0.10);
    transition: padding 0.25s ease;
  }
  .vaga-row:first-of-type { border-top: 1px solid rgba(29,29,27,0.18); }
  .vaga-row:hover { padding-left: 10px; }
  .vaga-row:hover .vaga-cta { color: #1d1d1b; border-color: #1d1d1b; }
  .vaga-num { font-family: monospace; font-size: 12px; letter-spacing: 0.18em; color: #00662f; padding-top: 4px; }
  .vaga-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 20px; color: #1d1d1b; letter-spacing: -0.005em; margin-bottom: 8px; }
  .vaga-tags {
    display: flex; flex-wrap: wrap; gap: 4px 16px;
    font-family: monospace; font-size: 10px; letter-spacing: 0.16em; text-transform: uppercase;
    color: #5b6b62; margin-bottom: 8px;
  }
  .vaga-tags span { display: inline-flex; align-items: center; gap: 6px; }
  .vaga-tags span::before { content: "·"; color: #199738; }
  .vaga-tags span:first-child::before { content: ""; }
  .vaga-desc { color: #4a5550; font-size: 14px; line-height: 1.5; max-width: 60ch; }
  .vaga-cta {
    align-self: center; font-family: monospace; font-size: 11px;
    letter-spacing: 0.20em; text-transform: uppercase; color: #5b6b62;
    border: 1px solid rgba(29,29,27,0.20); padding: 10px 16px;
    transition: color 0.2s, border-color 0.2s; white-space: nowrap;
  }
  @media (max-width: 700px) {
    .vaga-row { grid-template-columns: 48px 1fr; gap: 14px 18px; padding: 22px 0; }
    .vaga-cta { grid-column: 2 / -1; justify-self: start; margin-top: 4px; }
  }

  /* Mobile menu */
  .nav-item:hover .dropdown { display: block; }
  .dropdown { display: none; }
  .menu-mobile-btn { display: none; }
  @media (max-width: 900px) { .nav-desktop { display: none !important; } .menu-mobile-btn { display: inline-flex; } }
  .mobile-drawer { position: fixed; inset: 0; z-index: 60; background: rgba(29,29,27,0.97); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); display: flex; flex-direction: column; padding: 96px 32px 32px; transform: translateX(100%); transition: transform 0.35s cubic-bezier(0.2,0.8,0.2,1); overflow-y: auto; }
  .mobile-drawer.open { transform: translateX(0); }
  .mobile-drawer a { color: #fff; font-family: '"Franklin Gothic Medium"', sans-serif; letter-spacing: 0.08em; font-size: 18px; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.08); display: block; transition: color 0.2s, padding-left 0.2s; }
  .mobile-drawer a:hover { color: #199738; padding-left: 8px; }
  .mobile-drawer a[href$="contato.html"], .nav-desktop a[href$="contato.html"] { text-transform: uppercase; }
  .mobile-drawer .group-label { color: #199738; font-family: monospace; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; margin-top: 18px; margin-bottom: 4px; }
  .mobile-drawer .sublink { font-size: 13px; color: #c0c0c0; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
  .mobile-close { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; transition: border-color 0.2s; }
  .mobile-close:hover { border-color: #199738; }

  @media (max-width: 900px) { .max-w-grid { padding-left: 20px; padding-right: 20px; } section.py-24 { padding-top: 64px; padding-bottom: 64px; } footer.py-16 { padding-top: 48px; padding-bottom: 48px; } }
  @media (max-width: 640px) { .max-w-grid { padding-left: 16px; padding-right: 16px; } }
</style>

<!-- PAGE HERO -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 py-14 lg:py-20">
    <div class="col-span-12 lg:col-span-8">
      <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-10">
        <a href="<?= home_url('/') ?>" class="hover:text-job-green2 transition-colors">Home</a>
        <span class="text-gray-300">/</span>
        <span class="text-job-green">Carreiras</span>
      </nav>

      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'carreiras_hero_titulo1', 'Construa sua' ) ) ?><br>
        <?= esc_html( jf( 'carreiras_hero_titulo2', 'carreira' ) ) ?> <span class="text-job-green"><?= esc_html( jf( 'carreiras_hero_titulo3', 'na JOB' ) ) ?></span>.
      </h1>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-end pt-6 lg:pt-0">
      <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:38ch;">
        <?= esc_html( jf( 'carreiras_hero_sub', 'Buscamos profissionais que desejam fazer parte de uma empresa que gere resultados, com cultura técnica e projetos relevantes.' ) ) ?>
      </p>
    </div>
  </div>
</section>

<!-- Foto — cultura e equipe -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 pb-2 lg:pb-6">
    <figure style="margin:0;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/carreiras-cultura.webp" alt="<?= esc_attr( jf( 'carreiras_foto_alt', 'Equipe da JOB Engenharia em campo — cultura técnica e colaborativa' ) ) ?>" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(200px,32vw,400px);display:block;">
    </figure>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     01 · POR QUE JOB
═══════════════════════════════════════════════════ -->


<section class="bg-white py-20 lg:py-24">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">

        <h2 class="text-job-black font-sans" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'carreiras_porque_titulo1', 'Engenharia' ) ) ?><br>
          <?= esc_html( jf( 'carreiras_porque_titulo2a', 'e' ) ) ?> <span class="text-job-green"><?= esc_html( jf( 'carreiras_porque_titulo2b', 'cultura' ) ) ?></span><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'carreiras_porque_titulo3', 'técnica.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-10 flex items-end">
        <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.6;max-width:42ch;">
          <?= esc_html( jf( 'carreiras_porque_intro', 'Mais de quatro décadas operando em campo. Trabalho técnico relevante, com investimento contínuo no desenvolvimento das equipes.' ) ) ?>
        </p>
      </div>
    </div>

    <div>
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'carreiras_pilar1_titulo', 'Mais de 40 anos em campo' ) ) ?></h3>
          <p><?= esc_html( jf( 'carreiras_pilar1_texto', 'Empresa consolidada, com cultura técnica forte e atuação que gera impacto real e valor duradouro para a sociedade.' ) ) ?></p>
        </div>
      </div>
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'carreiras_pilar2_titulo', 'Atuação multidisciplinar' ) ) ?></h3>
          <p><?= esc_html( jf( 'carreiras_pilar2_texto', 'Ambiente dinâmico, com diversidade de serviços e tecnologias que proporcionam aprendizado contínuo e crescimento profissional.' ) ) ?></p>
        </div>
      </div>
      <div class="pillar">

        <div>
          <h3><?= esc_html( jf( 'carreiras_pilar3_titulo', 'Compromisso com pessoas' ) ) ?></h3>
          <p><?= esc_html( jf( 'carreiras_pilar3_texto', 'Valorização técnica, ambiente colaborativo e oportunidades reais de desenvolvimento profissional.' ) ) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     CTA — VAGAS
═══════════════════════════════════════════════════ -->
<section class="bg-job-black py-20 lg:py-24">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 items-center">
    <div class="col-span-12 lg:col-span-8">
      <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'carreiras_vagas_titulo1', 'Confira as vagas' ) ) ?><br>
        <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#7fd99e;"><?= esc_html( jf( 'carreiras_vagas_titulo2', 'disponíveis.' ) ) ?></span>
      </h2>
      <p class="text-white/70 font-body mt-6" style="font-size:15px;line-height:1.6;max-width:52ch;">
        <?= esc_html( jf( 'carreiras_vagas_texto', 'Acesse nossa página de oportunidades e descubra como fazer parte da nossa equipe.' ) ) ?>
      </p>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-3">
      <a href="#" class="group inline-flex items-center justify-between bg-job-green2 hover:bg-job-green text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'carreiras_vagas_botao', 'Ver vagas disponíveis' ) ) ?></span>
        <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
