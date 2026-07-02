<?php
/**
 * front-page.php — Home da JOB Engenharia.
 * Portado de index.html (estático). Textos serão ligados a campos ACF numa fase seguinte.
 */
get_header();

/**
 * Quebra um texto (vindo de textarea ACF) em linhas não vazias.
 * Usado para gerar listas <li> a partir de um campo "um item por linha".
 */
if ( ! function_exists( 'job_lines' ) ) {
    function job_lines( $text ) {
        $out = [];
        foreach ( preg_split( '/\r\n|\r|\n/', (string) $text ) as $line ) {
            $line = trim( $line );
            if ( $line !== '' ) $out[] = $line;
        }
        return $out;
    }
}
?>

<style>
  /* ── Base ── */
  html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
  body { background: #fafaf7; overflow-x: hidden; overflow-x: clip; }

  /* ── Icon box ── */
  .icon-box { width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .icon-box img { width: 100%; height: 100%; object-fit: contain; }
  .icon-box-lg { width: 72px; height: 72px; }

  /* ── Section rule (Swiss hairline) ── */
  .section-rule { max-width: 1200px; margin: 0 auto; padding: 0 32px; display: grid; grid-template-columns: auto 1fr auto; gap: 16px; align-items: center; font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62; padding-top: 16px; padding-bottom: 16px; border-top: 1px solid rgba(29,29,27,0.12); border-bottom: 1px solid rgba(29,29,27,0.06); background: #fafaf7; }
  .section-rule .accent { color: #00662f; }
  .section-rule .bar { height: 1px; background: rgba(29,29,27,0.18); width: 100%; }

  /* ── Stats rail ── */
  .stat-cell { display: flex; flex-direction: column; gap: 8px; padding: 28px 16px; min-width: 0; border-right: 1px solid rgba(29,29,27,0.10); }
  .stat-cell:last-child { border-right: none; }
  .stat-cell .num { font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif; font-size: clamp(26px, 2.8vw, 40px); line-height: 1; color: #1d1d1b; letter-spacing: -0.02em; font-variant-numeric: tabular-nums; white-space: nowrap; }
  .stat-cell .num em { color: #00662f; font-style: normal; }
  .stat-cell .num sup { font-size: 0.5em; vertical-align: super; color: #199738; font-weight: normal; margin-left: 2px; letter-spacing: 0; }
  .stat-cell .num > span { font-size: 0.34em; letter-spacing: 0.02em; margin-left: 5px; }
  .stat-cell .label { font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62; }
  @media (max-width: 900px) { .stat-cell { padding: 20px 16px; border-right: none; border-bottom: 1px solid rgba(29,29,27,0.10); } .stat-cell:last-child { border-bottom: none; } }

  /* ── Service row (Swiss indexed list) ── */
  .svc-row { display: grid; grid-template-columns: 64px 1fr 2fr auto; gap: 28px; align-items: start; padding: 32px 0; border-bottom: 1px solid rgba(29,29,27,0.10); transition: padding 0.3s ease; }
  .svc-row:first-of-type { border-top: 1px solid rgba(29,29,27,0.18); }
  .svc-row:hover { padding-left: 12px; }
  .svc-row:hover .svc-cta { color: #1d1d1b; border-color: #1d1d1b; }
  .svc-num { display: flex; flex-direction: column; align-items: flex-start; gap: 8px; padding-top: 4px; }
  .svc-tile { width: 48px; height: 48px; background: #00662f; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
  .svc-tile img { width: 26px; height: 26px; object-fit: contain; filter: brightness(0) invert(1); }
  .svc-tile-num { font-family: monospace; font-size: 11px; letter-spacing: 0.16em; color: #00662f; transition: color 0.2s; }
  .svc-row:hover .svc-tile { background: #199738; }
  .svc-row:hover .svc-tile-num { color: #199738; }
  .svc-title { font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif; font-size: clamp(22px, 2.4vw, 32px); line-height: 1.05; color: #1d1d1b; letter-spacing: -0.01em; }
  .svc-meta { font-family: monospace; font-size: 10px; letter-spacing: 0.16em; text-transform: uppercase; color: #5b6b62; margin-top: 8px; }
  .svc-list { color: #4a5550; font-size: 14px; line-height: 1.55; }
  .svc-list li { display: flex; align-items: baseline; gap: 8px; padding: 3px 0; }
  .svc-list li::before { content: "—"; color: #199738; flex-shrink: 0; }
  .svc-cta { align-self: start; font-family: monospace; font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62; border: 1px solid rgba(29,29,27,0.20); padding: 10px 16px; transition: color 0.2s, border-color 0.2s; white-space: nowrap; }
  @media (max-width: 900px) { .svc-row { grid-template-columns: 48px 1fr; gap: 16px 20px; padding: 24px 0; } .svc-row > .svc-list-cell { grid-column: 2 / -1; } .svc-row > .svc-cta { grid-column: 2 / -1; justify-self: start; } }

  /* Image plate */
  .img-plate { position: relative; overflow: hidden; background: #1d1d1b; }
  .img-plate::after { content: ""; position: absolute; inset: 0; pointer-events: none; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.06); }

  /* ── Reveal (GSAP anima) ── */
  .reveal { opacity: 0; transform: translateY(24px); }

  /* ── Container global ── */
  .max-w-grid { max-width: 1200px; margin-left: auto; margin-right: auto; }
  @media (max-width: 900px) {
    .max-w-grid { padding-left: 20px; padding-right: 20px; }
    section.py-24 { padding-top: 64px; padding-bottom: 64px; }
    section.py-20 { padding-top: 56px; padding-bottom: 56px; }
    footer.py-16 { padding-top: 48px; padding-bottom: 48px; }
  }
  @media (max-width: 640px) {
    .max-w-grid { padding-left: 16px; padding-right: 16px; }
    h2.section-title { font-size: 28px !important; line-height: 1.15; }
  }
  @media (max-width: 480px) { .hero-cta a { width: 100%; text-align: center; } }

  /* ── Mosaico · Áreas de atuação ── */
  .mosaic-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 4px; }
  @media (min-width: 768px) { .mosaic-grid { grid-template-columns: repeat(3, 1fr); } }
  .mosaic-tile { position: relative; display: block; overflow: hidden; background: #0e0e0d; aspect-ratio: 4 / 3; }
  .mosaic-tile img { width: 100%; height: 100%; object-fit: cover; display: block; filter: grayscale(100%); transition: transform 0.6s cubic-bezier(0.2,0.8,0.2,1), filter 0.6s ease; }
  .mosaic-tile:hover img { transform: scale(1.05); filter: grayscale(0%); }
  .mosaic-tile::after { content: ""; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0) 38%, rgba(0,0,0,0.74) 100%); pointer-events: none; }
  .mosaic-cap { position: absolute; left: 0; right: 0; bottom: 0; z-index: 2; padding: 16px 18px; display: flex; flex-direction: column; gap: 2px; }
  .mosaic-cap b { font-family: '"Franklin Gothic Medium"', 'Arial Narrow', Arial, sans-serif; font-weight: 500; color: #fff; font-size: 16px; letter-spacing: -0.005em; line-height: 1.12; }
  .mosaic-cap i { font-family: monospace; font-style: normal; font-size: 10px; letter-spacing: 0.16em; text-transform: uppercase; color: #a8f0c4; }
  .mosaic-arrow { position: absolute; top: 14px; right: 16px; z-index: 2; color: #fff; opacity: 0; transform: translateX(-4px); transition: opacity 0.25s, transform 0.25s; font-family: monospace; font-size: 16px; }
  .mosaic-tile:hover .mosaic-arrow { opacity: 1; transform: translateX(0); }

  /* ── Mosaico · Hero (P&B) ── */
  .hero-mosaic { display: grid; grid-template-columns: repeat(2, 1fr); gap: 6px; background: #1d1d1b; width: 100%; min-height: 0; }
  @media (min-width: 640px) { .hero-mosaic { grid-template-columns: repeat(3, 1fr); } }
  @media (min-width: 1024px) { .hero-mosaic { grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(3, 1fr); height: 100%; } }
  .hero-tile { position: relative; overflow: hidden; display: block; background: #0e0e0d; aspect-ratio: 3 / 4; min-height: 0; }
  @media (min-width: 1024px) { .hero-tile { aspect-ratio: auto; } }
  .hero-tile img { width: 100%; height: 100%; object-fit: cover; display: block; filter: grayscale(100%) contrast(1.04); transition: transform 0.8s cubic-bezier(0.2,0.8,0.2,1), filter 0.8s ease; }
  .hero-tile:hover img { transform: scale(1.06); filter: grayscale(0%) contrast(1); }
  .hero-tile::after { content: ""; position: absolute; inset: 0; background: rgba(0,40,18,0.10); pointer-events: none; transition: opacity 0.6s ease; }
  .hero-tile:hover::after { opacity: 0; }
  @media (min-width: 1024px) { #hero-grid { height: calc(100dvh - 80px); grid-template-rows: minmax(0, 1fr); } }

  /* ── Formulário (contato home) ── */
  .form-input { width: 100%; height: 44px; padding: 0 14px; border: 1.5px solid #e2e8e4; background: #fff; font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 14px; color: #1d1d1b; outline: none; transition: border-color 0.2s, box-shadow 0.2s; appearance: none; -webkit-appearance: none; }
  .form-input::placeholder { color: #aab5ae; }
  .form-input:focus { border-color: #199738; box-shadow: 0 0 0 3px rgba(25,151,56,0.12); }
  .form-select { width: 100%; height: 44px; padding: 0 36px 0 14px; border: 1.5px solid #e2e8e4; background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23199738' d='M1 1l5 5 5-5'/%3E%3C/svg%3E") no-repeat right 14px center; font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 14px; color: #1d1d1b; outline: none; transition: border-color 0.2s, box-shadow 0.2s; appearance: none; -webkit-appearance: none; cursor: pointer; }
  .form-select:focus { border-color: #199738; box-shadow: 0 0 0 3px rgba(25,151,56,0.12); }
  .form-select option[value=""] { color: #aab5ae; }
  .form-textarea { width: 100%; padding: 12px 14px; border: 1.5px solid #e2e8e4; background: #fff; font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 14px; color: #1d1d1b; outline: none; resize: none; transition: border-color 0.2s, box-shadow 0.2s; }
  .form-textarea::placeholder { color: #aab5ae; }
  .form-textarea:focus { border-color: #199738; box-shadow: 0 0 0 3px rgba(25,151,56,0.12); }
  .form-label { display: block; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 11px; letter-spacing: 0.08em; text-transform: uppercase; color: #4a5550; margin-bottom: 6px; }
  .form-label span { color: #199738; }
  .btn-enviar { width: 100%; background: #199738; color: #fff; border: none; padding: 14px 24px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 13px; letter-spacing: 0.12em; text-transform: uppercase; cursor: pointer; transition: background 0.2s, transform 0.1s; margin-top: 4px; }
  .btn-enviar:hover { background: #00662f; }
  .btn-enviar:active { transform: scale(0.99); }
  .contato-item { display: flex; align-items: flex-start; gap: 14px; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.18); }
  .contato-item:last-child { border-bottom: none; }
  .contato-icon { width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 4px; }
  .contato-icon img { width: 20px; height: 20px; object-fit: contain; filter: brightness(0) invert(1); }
  .contato-form { padding: 36px 40px 40px; }
  @media (max-width: 640px) { .contato-form { padding: 24px 20px 28px; } .contato-form-grid { grid-template-columns: 1fr !important; } }
</style>


<!-- ═══ HERO ═══ -->
<section id="hero" class="relative bg-white" style="min-height:calc(100dvh - 80px);">
  <div id="hero-grid" class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10" style="min-height:calc(100dvh - 80px);">

    <div class="col-span-12 lg:col-span-7 flex flex-col justify-between py-8 lg:py-12 relative">
      <div class="py-8 lg:py-10">
        <h1 id="hero-h1" class="text-job-black font-sans" style="font-size:clamp(2.4rem,5vw,4.6rem);line-height:0.96;letter-spacing:-0.025em;font-weight:500;">
          <span style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:400;"><?= esc_html( jf( 'home_hero_l1', 'Engenharia' ) ) ?></span><br>
          <span style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:400;"><?= esc_html( jf( 'home_hero_l2', 'que move' ) ) ?></span><br>
          <span class="text-job-green" style="font-weight:800;letter-spacing:-0.03em;"><?= esc_html( jf( 'home_hero_l3', 'o futuro.' ) ) ?></span>
        </h1>
      </div>

      <div id="hero-sub-block" class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8 border-t border-gray-200">
        <p id="hero-sub" class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:42ch;">
          <?= esc_html( jf( 'home_hero_sub', 'Soluções de engenharia que transformam desafios operacionais em resultados duradouros.' ) ) ?>
        </p>
        <div id="hero-ctas" class="hero-cta flex flex-col gap-3">
          <a href="<?= home_url( '/servicos/' ) ?>" class="group inline-flex items-center justify-between bg-job-green2 hover:bg-job-green text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
            <span><?= esc_html( jf( 'home_hero_cta1', 'Conheça os serviços' ) ) ?></span>
            <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
          </a>
          <a href="<?= home_url( '/contato/' ) ?>" class="group inline-flex items-center justify-between border border-job-green text-job-green hover:bg-job-green hover:text-white px-5 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
            <span><?= esc_html( jf( 'home_hero_cta2', 'Solicitar proposta' ) ) ?></span>
            <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-span-12 lg:col-span-5 relative">
      <div class="img-plate w-full relative lg:h-full">
        <div id="hero-mosaic" class="hero-mosaic">
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#infraestrutura" aria-label="Pavimentação e recuperação de vias"><img src="<?= ju() ?>/img/previa/hero-pavimentacao.jpg" alt="Reperfilamento e pavimentação asfáltica de via urbana" loading="eager"></a>
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#infraestrutura" aria-label="Recuperação estrutural de pontes"><img src="<?= ju() ?>/img/hero/h2-pilar-noite.jpg" alt="Recuperação de pilar de ponte em obra noturna" loading="eager"></a>
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#saneamento" aria-label="Saneamento — obra em espaço confinado"><img src="<?= ju() ?>/img/hero/h3-poco.jpg" alt="Engenheiro descendo em poço de inspeção" loading="eager"></a>
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#infraestrutura" aria-label="Limpeza e tratamento de estrutura de ponte"><img src="<?= ju() ?>/img/hero/h4-hidrojato.jpg" alt="Hidrojateamento de estrutura de ponte" loading="eager"></a>
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#infraestrutura" aria-label="Equipe em recuperação de passarela"><img src="<?= ju() ?>/img/hero/h5-equipe.jpg" alt="Equipe JOB em recuperação de passarela" loading="eager"></a>
          <a class="hero-tile" href="<?= home_url( '/servicos/' ) ?>#saneamento" aria-label="Manutenção de redes urbanas"><img src="<?= ju() ?>/img/previa/hero-saneamento.jpg" alt="Substituição de tampa em rede de saneamento urbano" loading="eager"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="hidden lg:flex absolute right-6 bottom-8 flex-col items-center gap-2 text-gray-400" style="z-index:4;">
    <span class="text-[10px] font-mono uppercase tracking-[0.22em]" style="writing-mode:vertical-rl;transform:rotate(180deg);">scroll</span>
    <span class="w-px h-12 bg-gray-300 block animate-pulse"></span>
  </div>
  <div aria-hidden="true" style="position:absolute;left:0;right:0;bottom:0;height:6px;background:#00662f;z-index:5;"></div>
</section>


<!-- ═══ STATS ═══ -->
<section id="stats" class="bg-white border-t border-b border-gray-200">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-2 lg:grid-cols-5">
      <div class="stat-cell reveal"><span class="num"><?= esc_html( jf( 'home_stat1_num', '15.000' ) ) ?><sup>+</sup><span class="text-gray-400 text-base font-mono ml-2"><?= esc_html( jf( 'home_stat1_unit', 'm²' ) ) ?></span></span><span class="label"><?= esc_html( jf( 'home_stat1_label', 'Vias pavimentadas' ) ) ?></span></div>
      <div class="stat-cell reveal"><span class="num"><?= esc_html( jf( 'home_stat2_num', '4.000' ) ) ?><sup>+</sup><span class="text-gray-400 text-base font-mono ml-2"><?= esc_html( jf( 'home_stat2_unit', 'km' ) ) ?></span></span><span class="label"><?= esc_html( jf( 'home_stat2_label', 'Redes desobstruídas' ) ) ?></span></div>
      <div class="stat-cell reveal"><span class="num"><?= esc_html( jf( 'home_stat3_num', 'xx' ) ) ?><span class="text-gray-400 text-base font-mono ml-2"><?= esc_html( jf( 'home_stat3_unit', 'pontos' ) ) ?></span></span><span class="label"><?= esc_html( jf( 'home_stat3_label', 'Monitoramento em operação' ) ) ?></span></div>
      <div class="stat-cell reveal"><span class="num"><?= esc_html( jf( 'home_stat4_num', '160.000' ) ) ?><sup>+</sup><span class="text-gray-400 text-base font-mono ml-2"><?= esc_html( jf( 'home_stat4_unit', 'm' ) ) ?></span></span><span class="label"><?= esc_html( jf( 'home_stat4_label', 'Redes inspecionadas por CFTV' ) ) ?></span></div>
      <div class="stat-cell reveal"><span class="num"><?= esc_html( jf( 'home_stat5_num', '720.000' ) ) ?><sup>+</sup><span class="text-gray-400 text-base font-mono ml-2"><?= esc_html( jf( 'home_stat5_unit', 'm' ) ) ?></span></span><span class="label"><?= esc_html( jf( 'home_stat5_label', 'Redes avaliadas por teste de fumaça' ) ) ?></span></div>
    </div>
  </div>
</section>


<!-- ═══ SERVIÇOS ═══ -->
<section id="servicos" class="bg-white py-16 lg:py-20 relative">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-16 lg:mb-20">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="section-title text-job-black font-sans" style="font-size:clamp(2rem,4.4vw,3.75rem);line-height:1;letter-spacing:-0.02em;">
          <?php
            // "Diversas frentes," — a palavra "frentes" fica em verde no meio da frase.
            // Mantemos o estilo: tudo antes da última palavra fica preto, a última palavra fica verde.
            $serv_l1 = jf( 'home_serv_tit_l1', 'Diversas frentes,' );
            if ( preg_match( '/^(.*?)(\S+?)([\s.,;:!?]*)$/u', trim( $serv_l1 ), $m ) ) {
                echo esc_html( $m[1] ) . '<span class="text-job-green">' . esc_html( $m[2] ) . '</span>' . esc_html( $m[3] );
            } else {
                echo esc_html( $serv_l1 );
            }
          ?><br>
          <?= esc_html( jf( 'home_serv_tit_l2', 'uma engenharia' ) ) ?><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'home_serv_tit_l3', 'que entrega soluções.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-12 flex flex-col justify-end">
        <p class="text-gray-600 font-body mb-6" style="font-size:15px;line-height:1.55;max-width:48ch;">
          <?= esc_html( jf( 'home_serv_intro', 'Combinamos expertise técnica, equipamentos especializados e processos de engenharia auditáveis para garantir qualidade, eficiência e resultados consistentes.' ) ) ?>
        </p>
        <a href="<?= home_url( '/servicos/' ) ?>" class="self-start inline-flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-job-black border-b border-job-black pb-1 hover:text-job-green hover:border-job-green transition-colors">
          <?= esc_html( jf( 'home_serv_link', 'Índice completo de serviços' ) ) ?> <span class="text-job-green">→</span>
        </a>
      </div>
    </div>

    <div>
      <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" id="infraestrutura" class="svc-row group">
        <span class="svc-num"><span class="svc-tile"><img src="<?= ju() ?>/icones/road.svg" alt=""></span></span>
        <div><h3 class="svc-title"><?= esc_html( jf( 'home_serv1_titulo', 'Infraestrutura' ) ) ?></h3><p class="svc-meta"><?= esc_html( jf( 'home_serv1_meta', 'Obra · Recuperação · Pavimentação' ) ) ?></p></div>
        <ul class="svc-list svc-list-cell font-body">
          <?php foreach ( job_lines( jf( 'home_serv1_itens', "Obras e recuperação estrutural\nRodovias, vias vicinais e pontes\nPavimentação — Usina Móvel RAP\nSaneamento e drenagem" ) ) as $li ) : ?>
          <li><?= esc_html( $li ) ?></li>
          <?php endforeach; ?>
        </ul>
        <span class="svc-cta"><?= esc_html( jf( 'home_serv_cta', 'Ver área' ) ) ?> →</span>
      </a>

      <a href="<?= home_url( '/servicos/' ) ?>#zeladoria" id="zeladoria" class="svc-row group">
        <span class="svc-num"><span class="svc-tile"><img src="<?= ju() ?>/icones/clean-city.svg" alt=""></span></span>
        <div><h3 class="svc-title"><?= esc_html( jf( 'home_serv2_titulo', 'Zeladoria e Manutenção de Ativos' ) ) ?></h3><p class="svc-meta"><?= esc_html( jf( 'home_serv2_meta', 'Limpeza · Redes · Áreas verdes' ) ) ?></p></div>
        <ul class="svc-list svc-list-cell font-body">
          <?php foreach ( job_lines( jf( 'home_serv2_itens', "Varrição e limpeza urbana\nManutenção de redes de esgoto\nManutenção de galerias de águas pluviais\nManutenção de vias públicas\nConservação de áreas verdes" ) ) as $li ) : ?>
          <li><?= esc_html( $li ) ?></li>
          <?php endforeach; ?>
        </ul>
        <span class="svc-cta"><?= esc_html( jf( 'home_serv_cta', 'Ver área' ) ) ?> →</span>
      </a>

      <a href="<?= home_url( '/servicos/' ) ?>#predial" id="predial" class="svc-row group">
        <span class="svc-num"><span class="svc-tile"><img src="<?= ju() ?>/icones/maintenance.svg" alt=""></span></span>
        <div><h3 class="svc-title"><?= esc_html( jf( 'home_serv3_titulo', 'Engenharia Predial' ) ) ?></h3><p class="svc-meta"><?= esc_html( jf( 'home_serv3_meta', 'Reforma · Sistemas · Manutenção' ) ) ?></p></div>
        <ul class="svc-list svc-list-cell font-body">
          <?php foreach ( job_lines( jf( 'home_serv3_itens', "Reformas e ampliações\nSistemas elétricos e hidráulicos\nManutenção geral programada" ) ) as $li ) : ?>
          <li><?= esc_html( $li ) ?></li>
          <?php endforeach; ?>
        </ul>
        <span class="svc-cta"><?= esc_html( jf( 'home_serv_cta', 'Ver área' ) ) ?> →</span>
      </a>

      <a href="<?= home_url( '/servicos/' ) ?>#ambiental" id="ambiental" class="svc-row group">
        <span class="svc-num"><span class="svc-tile"><img src="<?= ju() ?>/icones/water-system.svg" alt=""></span></span>
        <div><h3 class="svc-title"><?= esc_html( jf( 'home_serv4_titulo', 'Tecnologia Ambiental' ) ) ?> <span style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:400;color:#199738;font-size:0.6em;letter-spacing:0;margin-left:8px;vertical-align:middle;">/ Ecojob</span></h3><p class="svc-meta"><?= esc_html( jf( 'home_serv4_meta', 'Monitoramento · ETA / ETE · Diagnóstico' ) ) ?></p></div>
        <ul class="svc-list svc-list-cell font-body">
          <?php foreach ( job_lines( jf( 'home_serv4_itens', "Monitoramento de córregos, rios, canais e balneabilidade\nMonitoramento de sistemas de drenagem\nSistemas de esgotamento sanitário\nOperação assistida de ETAs e ETEs" ) ) as $li ) : ?>
          <li><?= esc_html( $li ) ?></li>
          <?php endforeach; ?>
        </ul>
        <span class="svc-cta"><?= esc_html( jf( 'home_serv_cta', 'Ver área' ) ) ?> →</span>
      </a>
    </div>
  </div>
</section>


<!-- ═══ ÁREAS DE ATUAÇÃO — mosaico ═══ -->
<section id="atuacao" class="bg-job-black py-16 lg:py-20">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-12 lg:mb-16">
      <div class="col-span-12 lg:col-span-7">
        <h2 class="text-white font-sans" style="font-size:clamp(2rem,4.4vw,3.75rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'home_areas_tit_l1', 'Áreas de' ) ) ?><br>
          <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#7fd99e;"><?= esc_html( jf( 'home_areas_tit_l2', 'atuação.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:pt-12 flex items-end">
        <p class="font-body" style="color:#c8d3cc;font-size:15px;line-height:1.6;max-width:46ch;">
          <?= esc_html( jf( 'home_areas_intro', 'Da recuperação de pontes ao saneamento, da drenagem à tecnologia ambiental — engenharia aplicada em campo, em diferentes frentes.' ) ) ?>
        </p>
      </div>
    </div>

    <div class="mosaic-grid">
      <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="mosaic-tile"><img src="<?= ju() ?>/img/previa/previa-pontes.jpg" alt="Recuperação estrutural de pontes e viadutos" loading="lazy"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos1_titulo', 'Pontes e viadutos' ) ) ?></b><i><?= esc_html( jf( 'home_mos1_legenda', 'Mobilidade · Recuperação' ) ) ?></i></span></a>
      <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="mosaic-tile"><img src="<?= ju() ?>/img/previa/previa-pavimentacao.jpg" alt="Pavimentação asfáltica de vias urbanas" loading="lazy"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos2_titulo', 'Pavimentação' ) ) ?></b><i><?= esc_html( jf( 'home_mos2_legenda', 'Usina Móvel RAP' ) ) ?></i></span></a>
      <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="mosaic-tile"><img src="<?= ju() ?>/img/previa/previa-saneamento.jpg" alt="Obras de saneamento — redes de água e esgoto" loading="lazy"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos3_titulo', 'Saneamento' ) ) ?></b><i><?= esc_html( jf( 'home_mos3_legenda', 'Redes de água e esgoto' ) ) ?></i></span></a>
      <a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="mosaic-tile"><img src="<?= ju() ?>/img/previa/previa-drenagem.jpg" alt="Drenagem urbana e recursos hídricos" loading="lazy"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos4_titulo', 'Drenagem' ) ) ?></b><i><?= esc_html( jf( 'home_mos4_legenda', 'Águas pluviais' ) ) ?></i></span></a>
      <a href="<?= home_url( '/servicos/' ) ?>#zeladoria" class="mosaic-tile"><img src="<?= ju() ?>/img/caminhao.png" alt="Zeladoria e manutenção de redes urbanas" loading="lazy"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos5_titulo', 'Zeladoria e manutenção' ) ) ?></b><i><?= esc_html( jf( 'home_mos5_legenda', 'Redes e ativos urbanos' ) ) ?></i></span></a>
      <a href="<?= home_url( '/ecojob/' ) ?>" class="mosaic-tile"><img src="<?= ju() ?>/img/previa/previa-ambiental.jpg" alt="Tecnologia ambiental — plataforma Ecojob" loading="lazy" style="object-position:left center"><span class="mosaic-arrow">→</span><span class="mosaic-cap"><b><?= esc_html( jf( 'home_mos6_titulo', 'Tecnologia ambiental' ) ) ?></b><i><?= esc_html( jf( 'home_mos6_legenda', 'Plataforma Ecojob' ) ) ?></i></span></a>
    </div>
  </div>
</section>


<!-- ═══ SOBRE ═══ -->
<section id="sobre" class="bg-[#fafaf7] py-16 lg:py-20 relative">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-12 items-start">

      <div id="sobre-foto" class="col-span-12 lg:col-span-5">
        <div class="img-plate img-duotone relative overflow-hidden">
          <img src="<?= ju() ?>/img/home-banner-2.webp" alt="JOB Engenharia em campo" class="w-full object-cover h-72 lg:h-[520px] relative" style="object-position:top;z-index:0;">
        </div>
        <div class="grid grid-cols-3 mt-px">
          <div class="bg-job-black text-white px-4 py-5 border-r border-white/10"><p id="badge-ano" class="font-sans text-3xl lg:text-4xl" style="letter-spacing:-0.02em;font-variant-numeric:tabular-nums;"><?= esc_html( jf( 'home_sobre_b1_num', '1981' ) ) ?></p><p class="text-[10px] font-mono uppercase tracking-[0.18em] text-gray-400 mt-1"><?= esc_html( jf( 'home_sobre_b1_label', 'Fundação' ) ) ?></p></div>
          <div class="bg-job-black text-white px-4 py-5 border-r border-white/10"><p class="font-sans text-3xl lg:text-4xl" style="letter-spacing:-0.02em;"><?= esc_html( jf( 'home_sobre_b2_num', 'SP' ) ) ?></p><p class="text-[10px] font-mono uppercase tracking-[0.18em] text-gray-400 mt-1"><?= esc_html( jf( 'home_sobre_b2_label', 'Sede · Tamboré' ) ) ?></p></div>
          <div class="bg-job-green text-white px-4 py-5"><p class="font-sans text-3xl lg:text-4xl" style="letter-spacing:-0.02em;"><?= esc_html( jf( 'home_sobre_b3_num', 'PNQS' ) ) ?></p><p class="text-[10px] font-mono uppercase tracking-[0.18em] text-white/70 mt-1"><?= esc_html( jf( 'home_sobre_b3_label', 'Reconhecimento 2024' ) ) ?></p></div>
        </div>
      </div>

      <div id="sobre-texto" class="col-span-12 lg:col-span-7 lg:pl-8">
        <h2 class="section-title text-job-black font-sans mb-10" style="font-size:clamp(2rem,4.4vw,3.75rem);line-height:1;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'home_sobre_tit_l1', 'História, técnica' ) ) ?><br>
          <?php
            // "e compromisso" — a última palavra ("compromisso") fica em verde.
            $sobre_l2 = jf( 'home_sobre_tit_l2', 'e compromisso' );
            if ( preg_match( '/^(.*?)(\S+?)([\s.,;:!?]*)$/u', trim( $sobre_l2 ), $m ) ) {
                echo esc_html( $m[1] ) . '<span class="text-job-green">' . esc_html( $m[2] ) . '</span>' . esc_html( $m[3] );
            } else {
                echo esc_html( $sobre_l2 );
            }
          ?><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'home_sobre_tit_l3', 'com o futuro.' ) ) ?></span>
        </h2>
        <div class="mb-10">
          <p class="text-job-black font-sans text-lg leading-snug" style="max-width:52ch;">
            <?= esc_html( jf( 'home_sobre_intro', 'Nossa missão é entregar obras e serviços de alta qualidade, com tecnologia própria e metodologias exclusivas desenvolvidas ao longo de décadas de operação direta em campo.' ) ) ?>
          </p>
        </div>
                <a href="<?= home_url( '/sobre/' ) ?>" class="group inline-flex items-center justify-between bg-job-green2 hover:bg-job-green text-white px-6 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors" style="min-width:280px;">
          <span><?= esc_html( jf( 'home_sobre_cta', 'Conheça nossa história' ) ) ?></span>
          <span class="font-mono ml-4 transition-transform group-hover:translate-x-1">→</span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- ═══ CONTATO ═══ -->
<section id="contato" class="bg-job-green py-16 relative">
  <div class="max-w-grid mx-auto px-8 relative">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-start">

      <div class="lg:pt-6">
        <h2 class="text-white font-sans mb-6" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'home_contato_tit_l1', 'Solicite' ) ) ?><br><?= esc_html( jf( 'home_contato_tit_l2', 'sua proposta' ) ) ?><br>
          <span class="italic font-light" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;color:#7fd99e;"><?= esc_html( jf( 'home_contato_tit_l3', 'técnica.' ) ) ?></span>
        </h2>
        <p class="font-body mb-10" style="color:#c8e8d3;font-size:15px;line-height:1.65;max-width:380px;">
          <?= esc_html( jf( 'home_contato_intro', 'Nossa equipe está pronta para apresentar a solução ideal para o seu negócio.' ) ) ?>
        </p>

        <div>
          <div class="contato-item">
            <div class="contato-icon"><img src="<?= ju() ?>/icones/phone-call.svg" alt="Telefone"></div>
            <div>
              <div style="color:#a8f0c4;font-size:10px;font-family:monospace;letter-spacing:0.16em;text-transform:uppercase;margin-bottom:2px;"><?= esc_html( jf( 'home_contato_lbl_tel', 'Telefone' ) ) ?></div>
              <a href="tel:+551122079212" class="text-white font-body hover:underline transition-colors" style="font-size:14px;">(11) 2207-9212</a>
            </div>
          </div>
          <div class="contato-item">
            <div class="contato-icon"><img src="<?= ju() ?>/icones/email.svg" alt="E-mail"></div>
            <div>
              <div style="color:#a8f0c4;font-size:10px;font-family:monospace;letter-spacing:0.16em;text-transform:uppercase;margin-bottom:2px;"><?= esc_html( jf( 'home_contato_lbl_email', 'E-mail comercial · Proposta técnica' ) ) ?></div>
              <a href="mailto:comercial@jobeng.com.br" class="text-white font-body hover:underline transition-colors" style="font-size:14px;">comercial@jobeng.com.br</a>
            </div>
          </div>
          <div class="contato-item">
            <div class="contato-icon"><img src="<?= ju() ?>/icones/clock.svg" alt="Horário de atendimento"></div>
            <div>
              <div style="color:#a8f0c4;font-size:10px;font-family:monospace;letter-spacing:0.16em;text-transform:uppercase;margin-bottom:2px;"><?= esc_html( jf( 'home_contato_lbl_horario', 'Horário de atendimento' ) ) ?></div>
              <span class="text-white font-body" style="font-size:14px;"><?= esc_html( jf( 'home_contato_horario', 'Segunda a sexta · 9h às 18h' ) ) ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Formulário (será substituído por Fluent Forms numa fase seguinte) -->
      <form action="<?= home_url( '/contato/' ) ?>" method="POST" class="contato-form" style="background:#fff;box-shadow:0 24px 64px rgba(0,0,0,0.18);">
        <h3 class="font-sans" style="font-size:17px;color:#1d1d1b;margin-bottom:24px;padding-bottom:16px;border-bottom:2px solid #00662f;">Formulário de proposta</h3>
        <div style="display:flex;flex-direction:column;gap:16px;">
          <div><label class="form-label" for="home-nome">Nome completo <span>*</span></label><input id="home-nome" name="nome" type="text" class="form-input" placeholder="Seu nome completo" required /></div>
          <div><label class="form-label" for="home-empresa">Município / Empresa <span>*</span></label><input id="home-empresa" name="empresa" type="text" class="form-input" placeholder="Nome do município ou empresa" required /></div>
          <div class="contato-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div><label class="form-label" for="home-telefone">Telefone <span>*</span></label><input id="home-telefone" name="telefone" type="tel" class="form-input" placeholder="(00) 00000-0000" required /></div>
            <div><label class="form-label" for="home-email">E-mail <span>*</span></label><input id="home-email" name="email" type="email" class="form-input" placeholder="seu@email.com.br" required /></div>
          </div>
          <div>
            <label class="form-label" for="home-area">Área de interesse</label>
            <select id="home-area" name="area" class="form-select">
              <option value="">Selecione uma área</option>
              <option value="infraestrutura">Infraestrutura Urbana</option>
              <option value="zeladoria">Zeladoria e Manutenção de Ativos</option>
              <option value="predial">Engenharia Predial</option>
              <option value="ambiental">Serviços Ambientais</option>
            </select>
          </div>
          <div><label class="form-label" for="home-mensagem">Mensagem</label><textarea id="home-mensagem" name="mensagem" class="form-textarea" rows="3" placeholder="Descreva brevemente sua necessidade ou projeto"></textarea></div>
          <label style="display:flex;align-items:flex-start;gap:10px;font-size:12px;color:#4a5550;line-height:1.5;">
            <input type="checkbox" required style="margin-top:3px;accent-color:#199738;">
            <span>Li e concordo com a <a href="<?= home_url( '/politica-de-privacidade/' ) ?>" class="text-job-green2 hover:underline">Política de Privacidade</a> e autorizo o tratamento dos meus dados para retorno desta solicitação.</span>
          </label>
          <button type="submit" class="btn-enviar">Enviar mensagem</button>
          <p style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-size:11px;color:#9aada4;text-align:center;margin-top:-4px;">Campos com <span style="color:#199738;">*</span> são obrigatórios.</p>
        </div>
      </form>

    </div>
  </div>
</section>


<!-- ── GSAP + ScrollTrigger ── -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
  if (typeof gsap === 'undefined') {
    document.querySelectorAll('.reveal').forEach(function (el) { el.style.opacity = '1'; el.style.transform = 'none'; });
    return;
  }
  gsap.registerPlugin(ScrollTrigger);

  gsap.timeline({ delay: 0.2 })
    .from('#hero-h1',   { y: 44, opacity: 0, duration: 0.9, ease: 'power3.out' })
    .from('#hero-sub',  { y: 28, opacity: 0, duration: 0.8, ease: 'power3.out' }, '-=0.5')
    .from('#hero-ctas', { y: 20, opacity: 0, duration: 0.6, ease: 'power3.out' }, '-=0.4')
    .from('#hero-mosaic .hero-tile', { opacity: 0, scale: 1.04, duration: 0.7, stagger: 0.08, ease: 'power2.out' }, '-=0.8');

  gsap.fromTo('#stats .stat-cell', { opacity: 0, y: 24 }, { opacity: 1, y: 0, stagger: 0.10, duration: 0.7, ease: 'power3.out', scrollTrigger: { trigger: '#stats', start: 'top 80%' } });

  gsap.fromTo('#servicos .svc-row', { opacity: 0, y: 24 }, { opacity: 1, y: 0, stagger: 0.08, duration: 0.7, ease: 'power3.out', scrollTrigger: { trigger: '#servicos', start: 'top 75%' } });

  gsap.fromTo('#sobre-foto', { opacity: 0, x: -72 }, { opacity: 1, x: 0, duration: 1.1, ease: 'power3.out', scrollTrigger: { trigger: '#sobre', start: 'top 68%' } });
  gsap.fromTo('#sobre-texto', { opacity: 0, x: 72 }, { opacity: 1, x: 0, duration: 1.1, ease: 'power3.out', scrollTrigger: { trigger: '#sobre', start: 'top 68%' } });

  var badgeEl = document.getElementById('badge-ano');
  if (badgeEl) {
    var counter = { val: 1971 };
    gsap.to(counter, { val: 1981, duration: 1.6, ease: 'power2.out', onUpdate: function () { badgeEl.textContent = Math.floor(counter.val); }, scrollTrigger: { trigger: '#sobre', start: 'top 68%' } });
  }

  gsap.fromTo('#tecnologias .reveal', { opacity: 0, y: 36 }, { opacity: 1, y: 0, stagger: 0.15, duration: 0.9, ease: 'power3.out', scrollTrigger: { trigger: '#tecnologias', start: 'top 78%' } });

  gsap.fromTo('#contato .grid > div', { opacity: 0, y: 44 }, { opacity: 1, y: 0, stagger: 0.18, duration: 0.9, ease: 'power3.out', scrollTrigger: { trigger: '#contato', start: 'top 75%' } });

  ScrollTrigger.refresh();
})();
</script>

<?php get_footer(); ?>
