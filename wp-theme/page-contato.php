<?php /* page-contato.php */ get_header(); ?>

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

    /* Contact info row (hairline) */
    .info-row {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 24px; align-items: center;
      padding: 22px 0;
      border-bottom: 1px solid rgba(29,29,27,0.10);
    }
    .info-row:first-of-type { border-top: 1px solid rgba(29,29,27,0.18); }
    .info-row .info-num { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; color: #00662f; }
    .info-row .info-label { font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62; margin-bottom: 4px; }
    .info-row .info-value { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 17px; color: #1d1d1b; letter-spacing: -0.005em; }
    .info-row .info-value small { display: block; font-size: 13px; color: #4a5550; font-weight: normal; line-height: 1.45; margin-top: 4px; }
    .info-row .info-cta { font-family: monospace; font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: #5b6b62; transition: color 0.2s, transform 0.2s; }
    .info-row a:hover .info-cta, a.info-row:hover .info-cta { color: #199738; transform: translateX(4px); }
    @media (max-width: 700px) {
      .info-row { grid-template-columns: 1fr; gap: 8px; padding: 18px 0; }
      .info-row .info-cta { grid-column: 1 / -1; justify-self: start; padding-top: 6px; }
    }

    /* Form */
    .form-input, .form-select, .form-textarea {
      width: 100%; padding: 0 14px; border: 1px solid #d6dcd8; background: #fff;
      font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 14px; color: #1d1d1b;
      outline: none; transition: border-color 0.2s, box-shadow 0.2s;
      appearance: none; -webkit-appearance: none; border-radius: 0;
    }
    .form-input, .form-select { height: 46px; }
    .form-select { padding: 0 36px 0 14px; cursor: pointer;
      background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23199738' d='M1 1l5 5 5-5'/%3E%3C/svg%3E") no-repeat right 14px center;
    }
    .form-textarea { padding: 12px 14px; resize: none; }
    .form-input::placeholder, .form-textarea::placeholder { color: #aab5ae; }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
      border-color: #1d1d1b; box-shadow: 0 0 0 3px rgba(29,29,27,0.06);
    }
    .form-label {
      display: flex; justify-content: space-between; align-items: baseline;
      font-family: monospace; font-size: 10px; letter-spacing: 0.22em; text-transform: uppercase;
      color: #5b6b62; margin-bottom: 8px;
    }
    .form-label .req { color: #199738; }
    .form-label .num { color: #00662f; }
    .btn-enviar {
      width: 100%;
      display: inline-flex; align-items: center; justify-content: space-between;
      background: #1d1d1b; color: #fff; border: none;
      padding: 16px 20px;
      font-family: '"Franklin Gothic Medium"', sans-serif;
      font-size: 12px; letter-spacing: 0.22em; text-transform: uppercase;
      cursor: pointer; transition: background 0.2s; margin-top: 8px;
    }
    .btn-enviar:hover { background: #00662f; }
    .btn-enviar .arrow { font-family: monospace; transition: transform 0.2s; }
    .btn-enviar:hover .arrow { transform: translateX(4px); }
    .checkbox-row { display: flex; align-items: flex-start; gap: 10px; font-size: 12px; color: #4a5550; line-height: 1.5; font-family: 'Franklin Gothic Book', sans-serif; }
    .checkbox-row input { margin-top: 3px; accent-color: #199738; }

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

    @media (max-width: 900px) {
      .max-w-grid { padding-left: 20px; padding-right: 20px; }
      section.py-24 { padding-top: 64px; padding-bottom: 64px; }
      footer.py-16 { padding-top: 48px; padding-bottom: 48px; }
    }
    @media (max-width: 640px) {
      .max-w-grid { padding-left: 16px; padding-right: 16px; }
      .contato-form-grid { grid-template-columns: 1fr !important; }
    }
  </style>

<!-- ═══════════════════════════════════════════════════
     PAGE HERO
═══════════════════════════════════════════════════ -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 py-14 lg:py-20">
    <div class="col-span-12 lg:col-span-8">
      <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-10">
        <a href="<?= home_url('/') ?>" class="hover:text-job-green2 transition-colors">Home</a>
        <span class="text-gray-300">/</span>
        <span class="text-job-green">Contato</span>
      </nav>

      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'contato_titulo_l1', 'Fale com' ) ) ?><br>
        <?= esc_html( jf( 'contato_titulo_l2a', 'a equipe ' ) ) ?><span class="text-job-green"><?= esc_html( jf( 'contato_titulo_l2b', 'técnica' ) ) ?></span><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'contato_titulo_l3', 'da JOB.' ) ) ?></span>
      </h1>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-end pt-6 lg:pt-0">
      <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:38ch;">
        <?= esc_html( jf( 'contato_hero_sub', 'Solicite proposta, tire dúvidas técnicas ou agende uma visita.' ) ) ?>
      </p>
      <dl class="border-t border-gray-300 mt-8 pt-4 grid grid-cols-2 gap-y-3 text-sm">
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'contato_topo_dt1', 'Atendimento' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'contato_topo_dd1', 'Seg–Sex · 9–18h' ) ) ?></dd>
<dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'contato_topo_dt2', 'Sede' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'contato_topo_dd2', 'Tamboré · SP' ) ) ?></dd>
      </dl>
    </div>
  </div>
</section>

<!-- Foto — edifício / atendimento -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 pb-2 lg:pb-6">
    <figure style="margin:0;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/contato-edificio.webp" alt="Edifício corporativo — sede e atendimento técnico da JOB Engenharia" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(190px,28vw,360px);display:block;">
      <figcaption style="position:absolute;left:0;bottom:0;font-family:monospace;font-size:10px;letter-spacing:0.16em;text-transform:uppercase;color:#fff;background:rgba(0,102,47,0.92);padding:6px 12px;"><?= esc_html( jf( 'contato_figcaption', 'Atendimento técnico · Tamboré · SP' ) ) ?></figcaption>
    </figure>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     01 · CANAIS DIRETOS — lista hairline
═══════════════════════════════════════════════════ -->


<section class="bg-white py-16 lg:py-20">
  <div class="max-w-grid mx-auto px-8">
    <div>
      <a href="tel:+551122079212" class="info-row">
        <div>
          <p class="info-label"><?= esc_html( jf( 'contato_canal1_label', 'Telefone' ) ) ?></p>
          <p class="info-value">(11) 2207-9212</p>
        </div>
        <span class="info-cta"><?= esc_html( jf( 'contato_canal1_cta', 'Ligar →' ) ) ?></span>
      </a>
      <a href="mailto:comercial@jobeng.com.br" class="info-row">
        <div>
          <p class="info-label"><?= esc_html( jf( 'contato_canal2_label', 'E-mail comercial · Proposta técnica' ) ) ?></p>
          <p class="info-value">comercial@jobeng.com.br</p>
        </div>
        <span class="info-cta"><?= esc_html( jf( 'contato_canal2_cta', 'Enviar e-mail →' ) ) ?></span>
      </a>
      <div class="info-row">
        <div>
          <p class="info-label"><?= esc_html( jf( 'contato_canal3_label', 'Horário de atendimento' ) ) ?></p>
          <p class="info-value"><?= esc_html( jf( 'contato_canal3_dias', 'Seg. a Sex.' ) ) ?> <small><?= esc_html( jf( 'contato_canal3_horas', '9h às 18h · horário de Brasília' ) ) ?></small></p>
        </div>
        <span class="info-cta" style="opacity:0;">—</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     02 · FORMULÁRIO — split editorial
═══════════════════════════════════════════════════ -->


<section class="bg-[#fafaf7] py-20 lg:py-24">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-12 items-start">

    <div class="col-span-12 lg:col-span-5 lg:sticky lg:top-28 self-start">

      <h2 class="text-job-black font-sans mb-6" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'contato_form_titulo_l1', 'Fale com' ) ) ?><br>
        <?= esc_html( jf( 'contato_form_titulo_l2_pre', 'nossa ' ) ) ?><span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'contato_form_titulo_l2', 'equipe técnica.' ) ) ?></span>
      </h2>
      <p class="text-gray-600 font-body mb-4" style="font-size:15px;line-height:1.6;max-width:40ch;">
        <?= esc_html( jf( 'contato_form_intro1', 'Preencha com o máximo de informações possíveis. Nosso time técnico retorna com a melhor solução para o seu negócio.' ) ) ?>
      </p>
      <p class="text-gray-600 font-body mb-10" style="font-size:15px;line-height:1.6;max-width:40ch;">
        <?= esc_html( jf( 'contato_form_intro2', 'Prefere atendimento direto? Use os canais ao lado.' ) ) ?>
      </p>

      <div class="border-t border-gray-300 pt-6">
        <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-4"><?= esc_html( jf( 'contato_social_label', 'Acompanhe a JOB' ) ) ?></p>
        <div class="flex gap-3">
          <a href="https://www.linkedin.com/company/ecojob/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="flex items-center justify-center w-11 h-11 border border-gray-300 text-gray-500 hover:text-white hover:bg-job-black hover:border-job-black transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.77 0 5-2.24 5-5v-14c0-2.76-2.23-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.27c-.97 0-1.75-.79-1.75-1.76s.78-1.76 1.75-1.76 1.75.79 1.75 1.76-.78 1.76-1.75 1.76zm13.5 12.27h-3v-5.6c0-3.37-4-3.11-4 0v5.6h-3v-11h3v1.77c1.4-2.59 7-2.78 7 2.48v6.75z"/></svg>
          </a>
          <a href="https://www.instagram.com/jobengenhariabr/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="flex items-center justify-center w-11 h-11 border border-gray-300 text-gray-500 hover:text-white hover:bg-job-black hover:border-job-black transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="https://www.facebook.com/p/Job-Engenharia-Br-61554832118557/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="flex items-center justify-center w-11 h-11 border border-gray-300 text-gray-500 hover:text-white hover:bg-job-black hover:border-job-black transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
        </div>
      </div>
    </div>

    <form action="<?= home_url('/obrigado/') ?>" method="POST" class="col-span-12 lg:col-span-7 bg-white p-8 sm:p-10 border-t-2 border-job-black">
      <div class="flex items-baseline justify-between mb-8 pb-4 border-b border-gray-200">
        <p class="font-sans text-job-black" style="font-size:14px;letter-spacing:0.02em;"><?= esc_html( jf( 'contato_form_titulo', 'Formulário de proposta' ) ) ?></p>

      </div>

      <div style="display:flex;flex-direction:column;gap:20px;">
        <div>
          <label class="form-label" for="nome"><span>Nome completo</span><span class="req">obrigatório</span></label>
          <input id="nome" name="nome" type="text" class="form-input" placeholder="Seu nome completo" required />
        </div>
        <div>
          <label class="form-label" for="empresa"><span>Município / Empresa</span><span class="req">obrigatório</span></label>
          <input id="empresa" name="empresa" type="text" class="form-input" placeholder="Nome do município ou empresa" required />
        </div>
        <div class="contato-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
          <div>
            <label class="form-label" for="telefone"><span>Telefone</span><span class="req">obrigatório</span></label>
            <input id="telefone" name="telefone" type="tel" class="form-input" placeholder="(00) 00000-0000" required />
          </div>
          <div>
            <label class="form-label" for="email"><span>E-mail</span><span class="req">obrigatório</span></label>
            <input id="email" name="email" type="email" class="form-input" placeholder="seu@email.com.br" required />
          </div>
        </div>
        <div>
          <label class="form-label" for="area"><span>Área de interesse</span><span style="color:#9aa6a0;">opcional</span></label>
          <select id="area" name="area" class="form-select">
            <option value="">Selecione uma área</option>
            <option value="infraestrutura">Infraestrutura Urbana</option>
            <option value="zeladoria">Zeladoria e Manutenção de Ativos</option>
            <option value="predial">Engenharia Predial</option>
            <option value="ambiental">Tecnologia Ambiental</option>
            <option value="ecojob">Ecojob — Tecnologia Ambiental</option>
          </select>
        </div>
        <div>
          <label class="form-label" for="mensagem"><span>Mensagem</span><span style="color:#9aa6a0;">opcional</span></label>
          <textarea id="mensagem" name="mensagem" class="form-textarea" rows="4" placeholder="Descreva brevemente sua necessidade ou projeto"></textarea>
        </div>

        <label class="checkbox-row mt-2">
          <input type="checkbox" required>
          <span>Li e concordo com a <a href="<?= home_url('/politica-de-privacidade/') ?>" class="text-job-green2 hover:underline">Política de Privacidade</a> e autorizo o tratamento dos meus dados para retorno desta solicitação.</span>
        </label>

        <button type="submit" class="btn-enviar">
          <span><?= esc_html( jf( 'contato_btn', 'Enviar mensagem' ) ) ?></span>
          <span class="arrow">→</span>
        </button>

      </div>
    </form>

  </div>
</section>

<?php get_footer(); ?>
