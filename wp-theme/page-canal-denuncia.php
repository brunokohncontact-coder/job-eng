<?php /* page-canal-denuncia.php */ get_header(); ?>

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

  /* Garantias / pilares de confiança */
  .pledge-row {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 16px; align-items: start;
    padding: 22px 0;
    border-bottom: 1px solid rgba(29,29,27,0.10);
  }
  .pledge-row:first-of-type { border-top: 1px solid rgba(29,29,27,0.18); }
  .pledge-row .pledge-num { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; color: #00662f; padding-top: 3px; }
  .pledge-row .pledge-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 16px; color: #1d1d1b; letter-spacing: -0.005em; margin-bottom: 4px; }
  .pledge-row .pledge-desc { font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 13px; color: #4a5550; line-height: 1.5; }

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
  .form-textarea { padding: 12px 14px; resize: vertical; }
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
  .form-file { font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 13px; color: #4a5550; }
  .form-file::file-selector-button {
    margin-right: 14px; border: 1px solid #d6dcd8; background: #f4f5f2; color: #1d1d1b;
    font-family: monospace; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase;
    padding: 10px 14px; cursor: pointer; transition: background 0.2s, border-color 0.2s;
  }
  .form-file::file-selector-button:hover { background: #1d1d1b; color: #fff; border-color: #1d1d1b; }

  /* Identificação — opções de rádio */
  .id-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  @media (max-width: 520px) { .id-grid { grid-template-columns: 1fr; } }
  .id-option {
    display: flex; align-items: flex-start; gap: 10px; cursor: pointer;
    border: 1px solid #d6dcd8; background: #fff; padding: 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .id-option:hover { border-color: #199738; }
  .id-option input { margin-top: 2px; accent-color: #199738; }
  .id-option .id-opt-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 14px; color: #1d1d1b; }
  .id-option .id-opt-desc { font-family: 'Franklin Gothic Book', sans-serif; font-size: 12px; color: #5b6b62; line-height: 1.4; margin-top: 2px; }
  .id-option input:checked ~ div .id-opt-title { color: #00662f; }
  /* Campos condicionais (revelados conforme a escolha) */
  .cond { display: none; }
  .cond.show { display: block; }

  /* Seções do formulário */
  .fsec { border-top: 1px solid #e3e7e4; margin-top: 30px; padding-top: 26px; }
  .fsec:first-of-type { border-top: none; margin-top: 0; padding-top: 0; }
  .fsec-head { display: flex; align-items: baseline; gap: 12px; margin-bottom: 18px; }
  .fsec-num { font-family: monospace; font-size: 11px; letter-spacing: 0.22em; color: #00662f; }
  .fsec-title { font-family: '"Franklin Gothic Medium"', sans-serif; font-size: 15px; color: #1d1d1b; letter-spacing: 0.01em; }
  .fsec-stack { display: flex; flex-direction: column; gap: 20px; }
  .form-hint { font-family: 'Franklin Gothic Book', Arial, sans-serif; font-size: 12px; line-height: 1.5; color: #7a857e; }

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
    .denuncia-form-grid { grid-template-columns: 1fr !important; }
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
        <span class="text-job-green">Canal de Denúncia</span>
      </nav>

      <h1 class="text-job-black font-sans" style="font-size:clamp(2.4rem,5.6vw,4.8rem);line-height:0.96;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'canal-denuncia_hero_titulo1', 'Canal de' ) ) ?><br>
        <span class="text-job-green"><?= esc_html( jf( 'canal-denuncia_hero_titulo2', 'denúncia' ) ) ?></span><br>
        <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'canal-denuncia_hero_titulo3', 'e ética.' ) ) ?></span>
      </h1>
      <a href="#formulario" class="group inline-flex items-center gap-3 mt-10 bg-job-green2 hover:bg-job-green text-white px-6 py-4 text-[11px] uppercase tracking-[0.22em] font-sans transition-colors">
        <span><?= esc_html( jf( 'canal-denuncia_hero_cta', 'Registrar uma denúncia' ) ) ?></span>
        <span class="font-mono transition-transform group-hover:translate-x-1">→</span>
      </a>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-end pt-6 lg:pt-0">
      <p class="text-gray-600 font-body" style="font-size:15px;line-height:1.55;max-width:38ch;">
        <?= esc_html( jf( 'canal-denuncia_hero_intro', 'Um espaço seguro para relatar, de forma confidencial e anônima, condutas que violem nosso código de ética, valores ou a legislação.' ) ) ?>
      </p>
      <dl class="border-t border-gray-300 mt-8 pt-4 grid grid-cols-2 gap-y-3 text-sm">
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'canal-denuncia_hero_dl1_rotulo', 'Sigilo' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'canal-denuncia_hero_dl1_valor', '100% confidencial' ) ) ?></dd>
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'canal-denuncia_hero_dl2_rotulo', 'Identificação' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'canal-denuncia_hero_dl2_valor', 'Anônima (opcional)' ) ) ?></dd>
      </dl>
    </div>
  </div>
</section>

<!-- Foto — conduta ética (tom contido, P&B) -->
<section class="bg-white">
  <div class="max-w-grid mx-auto px-8 pb-2 lg:pb-6">
    <figure style="margin:0;position:relative;overflow:hidden;background:#1d1d1b;">
      <img src="<?= ju() ?>/img/canal-integridade.webp" alt="<?= esc_attr( jf( 'canal-denuncia_foto_alt', 'Conduta ética e relações de boa-fé na JOB Engenharia' ) ) ?>" loading="lazy" decoding="async" class="w-full object-cover" style="height:clamp(180px,26vw,320px);display:block;filter:grayscale(100%);opacity:0.95;">
    </figure>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     01 · COMO FUNCIONA — garantias
═══════════════════════════════════════════════════ -->


<section class="bg-white py-16 lg:py-20">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-12 gap-6 lg:gap-10 mb-10">
      <div class="col-span-12 lg:col-span-5">
        <span class="swiss-index mb-5"><?= esc_html( jf( 'canal-denuncia_funciona_chip', 'Como funciona' ) ) ?></span>
        <h2 class="text-job-black font-sans mt-4" style="font-size:clamp(1.8rem,3.4vw,2.8rem);line-height:1.02;letter-spacing:-0.02em;">
          <?= esc_html( jf( 'canal-denuncia_funciona_titulo1', 'Sua manifestação é' ) ) ?><br>
          <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'canal-denuncia_funciona_titulo2', 'levada a sério.' ) ) ?></span>
        </h2>
      </div>
      <div class="col-span-12 lg:col-span-7 lg:pt-2">
        <div>
          <div class="pledge-row">
            <span class="pledge-num">01</span>
            <div>
              <p class="pledge-title"><?= esc_html( jf( 'canal-denuncia_pledge1_titulo', 'Confidencialidade garantida' ) ) ?></p>
              <p class="pledge-desc"><?= esc_html( jf( 'canal-denuncia_pledge1_desc', 'Todas as informações são tratadas com sigilo e analisadas por um comitê responsável, conforme nossa Política de Privacidade e a LGPD.' ) ) ?></p>
            </div>
          </div>
          <div class="pledge-row">
            <span class="pledge-num">02</span>
            <div>
              <p class="pledge-title"><?= esc_html( jf( 'canal-denuncia_pledge2_titulo', 'Anonimato, se você preferir' ) ) ?></p>
              <p class="pledge-desc"><?= esc_html( jf( 'canal-denuncia_pledge2_desc', 'Você decide se quer se identificar. O relato anônimo é aceito e apurado da mesma forma — a identificação apenas facilita o retorno e o esclarecimento de dúvidas.' ) ) ?></p>
            </div>
          </div>
          <div class="pledge-row">
            <span class="pledge-num">03</span>
            <div>
              <p class="pledge-title"><?= esc_html( jf( 'canal-denuncia_pledge3_titulo', 'Não retaliação' ) ) ?></p>
              <p class="pledge-desc"><?= esc_html( jf( 'canal-denuncia_pledge3_desc', 'É proibida qualquer forma de retaliação contra quem relata de boa-fé. Use este canal de maneira responsável e verdadeira.' ) ) ?></p>
            </div>
          </div>
          <div class="pledge-row">
            <span class="pledge-num">04</span>
            <div>
              <p class="pledge-title"><?= esc_html( jf( 'canal-denuncia_pledge4_titulo', 'O que pode ser relatado' ) ) ?></p>
              <p class="pledge-desc"><?= esc_html( jf( 'canal-denuncia_pledge4_desc', 'Assédio, discriminação, fraude, corrupção, conflito de interesses, desvios de conduta, questões ambientais, de saúde e segurança, entre outras violações.' ) ) ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     02 · FORMULÁRIO — split editorial
═══════════════════════════════════════════════════ -->


<section id="formulario" class="bg-[#fafaf7] py-20 lg:py-24">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-12 items-start">

    <div class="col-span-12 lg:col-span-5 lg:sticky lg:top-28 self-start">

      <h2 class="text-job-black font-sans mb-6" style="font-size:clamp(2rem,4vw,3.4rem);line-height:1;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'canal-denuncia_form_titulo1', 'Registrar' ) ) ?><br>
        <?= esc_html( jf( 'canal-denuncia_form_titulo2', 'uma' ) ) ?> <span class="italic font-light text-gray-400" style="font-family:'Franklin Gothic Book',Arial,sans-serif;font-weight:300;"><?= esc_html( jf( 'canal-denuncia_form_titulo3', 'denúncia.' ) ) ?></span>
      </h2>
      <p class="text-gray-600 font-body mb-4" style="font-size:15px;line-height:1.6;max-width:40ch;">
        <?= esc_html( jf( 'canal-denuncia_form_intro', 'Descreva o ocorrido com o máximo de detalhes possível: o que aconteceu, quem esteve envolvido, quando e onde. Quanto mais informações, melhor a apuração.' ) ) ?>
      </p>
      <p class="text-gray-600 font-body mb-10" style="font-size:15px;line-height:1.6;max-width:40ch;">
        Em caso de dúvida sobre o canal, fale com a gente pelos
        <a href="<?= home_url('/contato/') ?>" class="text-job-green2 hover:underline">canais de contato</a>.
      </p>

      <div class="border-t border-gray-300 pt-6">
        <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-3"><?= esc_html( jf( 'canal-denuncia_form_importante_rotulo', 'Importante' ) ) ?></p>
        <p class="text-gray-600 font-body" style="font-size:13px;line-height:1.6;max-width:42ch;">
          <?= esc_html( jf( 'canal-denuncia_form_importante', 'Este canal destina-se a relatos de conduta. Para emergências, risco iminente à vida ou crimes em andamento, acione imediatamente as autoridades competentes (190 / 193).' ) ) ?>
        </p>
      </div>

      <div class="border-t border-gray-300 pt-6 mt-6">
        <p class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-3"><?= esc_html( jf( 'canal-denuncia_canal_direto_rotulo', 'Canal direto' ) ) ?></p>
        <p class="text-gray-600 font-body mb-2" style="font-size:13px;line-height:1.6;max-width:42ch;">
          Prefere e-mail? Você pode registrar sua denúncia diretamente em
          <a href="mailto:<?= esc_attr( jf( 'canal-denuncia_email', 'daphne@jobeng.com.br' ) ) ?>" class="text-job-green2 hover:underline"><?= esc_html( jf( 'canal-denuncia_email', 'daphne@jobeng.com.br' ) ) ?></a>.
        </p>
        <p class="text-gray-500 font-body" style="font-size:12px;line-height:1.6;max-width:42ch;">
          Telefone do canal de denúncia: <span class="font-mono"><?= esc_html( jf( 'canal-denuncia_telefone', 'em breve' ) ) ?></span>.
        </p>
      </div>
    </div>

    <form action="<?= home_url('/obrigado/') ?>" method="POST" class="col-span-12 lg:col-span-7 bg-white p-8 sm:p-10 border-t-2 border-job-black">
      <!-- As denúncias devem ser encaminhadas para daphne@jobeng.com.br (configurar no backend/serviço de envio do formulário). -->
      <input type="hidden" name="_destinatario" value="<?= esc_attr( jf( 'canal-denuncia_email', 'daphne@jobeng.com.br' ) ) ?>">
      <div class="mb-8 pb-4 border-b border-gray-200">
        <p class="font-sans text-job-black" style="font-size:14px;letter-spacing:0.02em;"><?= esc_html( jf( 'canal-denuncia_form_cabecalho_titulo', 'Formulário de denúncia' ) ) ?></p>
        <p class="form-hint" style="margin-top:8px;">Campos marcados com <span class="req">*</span> são obrigatórios.</p>
      </div>

      <!-- 01 · IDENTIFICAÇÃO -->
      <div class="fsec">
        <div class="fsec-head"><span class="fsec-num">01</span><span class="fsec-title">Identificação</span></div>
        <label class="form-label"><span>Deseja se identificar?&nbsp;<span class="req">*</span></span></label>
        <div class="id-grid">
          <label class="id-option">
            <input type="radio" name="identificacao" value="anonima" checked />
            <div>
              <span class="id-opt-title">Não, prefiro o anonimato</span>
              <span class="id-opt-desc">Seu relato será apurado sem identificação.</span>
            </div>
          </label>
          <label class="id-option">
            <input type="radio" name="identificacao" value="identificada" />
            <div>
              <span class="id-opt-title">Sim, quero me identificar</span>
              <span class="id-opt-desc">Seus dados são mantidos em sigilo.</span>
            </div>
          </label>
        </div>

        <!-- Anônimo: contato opcional para acompanhamento -->
        <div id="anon-fields" class="cond show" style="margin-top:16px;">
          <p class="form-hint" style="margin-bottom:12px;">Se quiser acompanhar a apuração sem revelar quem é você, deixe um contato abaixo. Ele serve apenas para retorno e não identifica você perante a empresa.</p>
          <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
            <div>
              <label class="form-label" for="anon-email"><span>E-mail para acompanhamento</span></label>
              <input id="anon-email" name="anon_email" type="email" class="form-input" placeholder="Para receber atualizações" />
            </div>
            <div>
              <label class="form-label" for="anon-tel"><span>Celular para acompanhamento</span></label>
              <input id="anon-tel" name="anon_telefone" type="tel" class="form-input" placeholder="(00) 00000-0000" />
            </div>
          </div>
        </div>

        <!-- Identificado: dados pessoais -->
        <div id="identity-fields" class="cond" style="margin-top:16px;">
          <div class="fsec-stack">
            <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
              <div>
                <label class="form-label" for="nome"><span>Nome completo</span></label>
                <input id="nome" name="nome" type="text" class="form-input" placeholder="Seu nome" />
              </div>
              <div>
                <label class="form-label" for="cpf"><span>CPF</span></label>
                <input id="cpf" name="cpf" type="text" class="form-input" placeholder="000.000.000-00" />
              </div>
            </div>
            <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
              <div>
                <label class="form-label" for="email"><span>E-mail</span></label>
                <input id="email" name="email" type="email" class="form-input" placeholder="seu@email.com" />
              </div>
              <div>
                <label class="form-label" for="nascimento"><span>Data de nascimento</span></label>
                <input id="nascimento" name="nascimento" type="text" class="form-input" placeholder="dd/mm/aaaa" />
              </div>
            </div>
            <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
              <div>
                <label class="form-label" for="telefone"><span>Telefone</span></label>
                <input id="telefone" name="telefone" type="tel" class="form-input" placeholder="(00) 0000-0000" />
              </div>
              <div>
                <label class="form-label" for="celular"><span>Celular</span></label>
                <input id="celular" name="celular" type="tel" class="form-input" placeholder="(00) 00000-0000" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 02 · SOBRE O RELATO -->
      <div class="fsec">
        <div class="fsec-head"><span class="fsec-num">02</span><span class="fsec-title">Sobre o relato</span></div>
        <div class="fsec-stack">
          <div>
            <label class="form-label" for="relacao"><span>Sua relação com a JOB&nbsp;<span class="req">*</span></span></label>
            <select id="relacao" name="relacao" class="form-select" required>
              <option value="">Selecione</option>
              <option value="colaborador">Sou colaborador(a)</option>
              <option value="ex-colaborador">Sou ex-colaborador(a)</option>
              <option value="fornecedor">Sou fornecedor</option>
              <option value="parceiro">Sou parceiro</option>
              <option value="prestador">Sou prestador de serviço</option>
              <option value="cliente">Sou cliente</option>
              <option value="terceiro">Terceiro / Comunidade</option>
              <option value="outros">Outros</option>
            </select>
            <div id="relacao-outro" class="cond" style="margin-top:12px;">
              <input name="relacao_outro" type="text" class="form-input" placeholder="Especifique sua relação com a JOB" />
            </div>
          </div>
          <div>
            <label class="form-label" for="tipo"><span>Tipo de denúncia&nbsp;<span class="req">*</span></span></label>
            <select id="tipo" name="tipo" class="form-select" required>
              <option value="">Selecione o tipo de ocorrência</option>
              <option value="assedio-moral">Assédio moral</option>
              <option value="assedio-sexual">Assédio sexual</option>
              <option value="agressao">Agressão física</option>
              <option value="discriminacao">Discriminação ou preconceito</option>
              <option value="comportamento">Comportamento inadequado</option>
              <option value="descumprimento">Descumprimento de políticas, normas e procedimentos</option>
              <option value="conflito-interesses">Conflito de interesses</option>
              <option value="fraude-corrupcao">Fraude ou corrupção</option>
              <option value="uso-indevido">Uso indevido de recursos ou patrimônio</option>
              <option value="furto">Furto, roubo ou desvio de bens</option>
              <option value="leis-trabalhistas">Violação de leis trabalhistas</option>
              <option value="meio-ambiente">Questões ambientais</option>
              <option value="seguranca-trabalho">Saúde e segurança no trabalho</option>
              <option value="outros">Outros</option>
            </select>
            <div id="tipo-outro" class="cond" style="margin-top:12px;">
              <input name="tipo_outro" type="text" class="form-input" placeholder="Especifique o tipo de denúncia" />
            </div>
          </div>
        </div>
      </div>

      <!-- 03 · ONDE E QUANDO -->
      <div class="fsec">
        <div class="fsec-head"><span class="fsec-num">03</span><span class="fsec-title">Onde e quando</span></div>
        <div class="fsec-stack">
          <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
            <div>
              <label class="form-label" for="local"><span>Local / unidade</span></label>
              <input id="local" name="local" type="text" class="form-input" placeholder="Obra, unidade ou cidade" />
            </div>
            <div>
              <label class="form-label" for="setor"><span>Área / setor</span></label>
              <input id="setor" name="setor" type="text" class="form-input" placeholder="Setor ou departamento" />
            </div>
          </div>
          <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
            <div>
              <label class="form-label" for="data"><span>Data ou período aproximado</span></label>
              <input id="data" name="data" type="text" class="form-input" placeholder="Ex.: maio/2026 ou recorrente" />
            </div>
            <div>
              <label class="form-label" for="conhecimento"><span>Como tomou conhecimento&nbsp;<span class="req">*</span></span></label>
              <select id="conhecimento" name="conhecimento" class="form-select" required>
                <option value="">Selecione</option>
                <option value="comigo">Aconteceu comigo</option>
                <option value="presenciei">Eu presenciei</option>
                <option value="colega">Um colega me contou</option>
                <option value="denunciado">O denunciado me contou</option>
                <option value="documento">Encontrei um documento ou registro</option>
                <option value="ouvi">Ouvi falar</option>
                <option value="outro">Outro</option>
              </select>
              <div id="conhecimento-outro" class="cond" style="margin-top:12px;">
                <input name="conhecimento_outro" type="text" class="form-input" placeholder="Especifique como tomou conhecimento" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 04 · ENVOLVIMENTO DE LIDERANÇAS -->
      <div class="fsec">
        <div class="fsec-head"><span class="fsec-num">04</span><span class="fsec-title">Envolvimento de lideranças</span></div>
        <div class="fsec-stack">
          <div>
            <label class="form-label" for="ciente"><span>Algum gestor (diretor, gerente, coordenador, supervisor ou encarregado) tem conhecimento do fato?&nbsp;<span class="req">*</span></span></label>
            <select id="ciente" name="ciente" class="form-select" required>
              <option value="">Selecione</option>
              <option value="nao">Não</option>
              <option value="sim">Sim</option>
              <option value="nao-sei">Não sei</option>
            </select>
            <div id="ciente-nomes" class="cond" style="margin-top:12px;">
              <input name="ciente_nomes" type="text" class="form-input" placeholder="Quem? Nomes e/ou cargos" />
            </div>
          </div>
          <div>
            <label class="form-label" for="envolvido"><span>Algum gestor está diretamente envolvido no ocorrido?&nbsp;<span class="req">*</span></span></label>
            <select id="envolvido" name="envolvido" class="form-select" required>
              <option value="">Selecione</option>
              <option value="nao">Não</option>
              <option value="sim">Sim</option>
              <option value="nao-sei">Não sei</option>
            </select>
            <div id="envolvido-nomes" class="cond" style="margin-top:12px;">
              <input name="envolvido_nomes" type="text" class="form-input" placeholder="Quem? Nomes e/ou cargos" />
            </div>
          </div>
          <div>
            <label class="form-label" for="encobrimento"><span>Houve tentativa de ocultar ou encobrir o ocorrido?&nbsp;<span class="req">*</span></span></label>
            <select id="encobrimento" name="encobrimento" class="form-select" required>
              <option value="">Selecione</option>
              <option value="nao">Não</option>
              <option value="sim">Sim</option>
              <option value="nao-sei">Não sei</option>
            </select>
            <div id="encobrimento-nomes" class="cond" style="margin-top:12px;">
              <input name="encobrimento_nomes" type="text" class="form-input" placeholder="Quem? Nomes e/ou cargos" />
            </div>
          </div>
        </div>
      </div>

      <!-- 05 · DETALHES DO OCORRIDO -->
      <div class="fsec">
        <div class="fsec-head"><span class="fsec-num">05</span><span class="fsec-title">Detalhes do ocorrido</span></div>
        <div class="fsec-stack">
          <div>
            <label class="form-label" for="descricao"><span>Descrição detalhada&nbsp;<span class="req">*</span></span></label>
            <textarea id="descricao" name="descricao" class="form-textarea" rows="6" placeholder="Descreva o que aconteceu: o quê, quem esteve envolvido, como ocorreu, há quanto tempo e se ainda está acontecendo." required></textarea>
          </div>
          <div>
            <label class="form-label" for="testemunhas"><span>Testemunhas</span></label>
            <input id="testemunhas" name="testemunhas" type="text" class="form-input" placeholder="Pessoas que presenciaram — nomes e/ou cargos" />
          </div>
          <div>
            <label class="form-label" for="evidencias"><span>Evidências — onde podem ser encontradas</span></label>
            <textarea id="evidencias" name="evidencias" class="form-textarea" rows="3" placeholder="Descreva quais provas existem e onde estão (documentos, e-mails, fotos, mensagens). Não remova nem altere nenhuma evidência."></textarea>
          </div>
          <div>
            <label class="form-label" for="anexos"><span>Anexos</span></label>
            <input id="anexos" name="anexos" type="file" class="form-input form-file" multiple style="height:auto;padding:10px 14px;" />
          </div>
          <div class="denuncia-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
            <div>
              <label class="form-label" for="valor"><span>Valor financeiro envolvido</span></label>
              <input id="valor" name="valor" type="text" class="form-input" placeholder="Se houver, valor aproximado" />
            </div>
            <div>
              <label class="form-label" for="solucao"><span>Sugestão de solução</span></label>
              <input id="solucao" name="solucao" type="text" class="form-input" placeholder="Providência que você espera" />
            </div>
          </div>
        </div>
      </div>

      <!-- 06 · ACEITE E ENVIO -->
      <div class="fsec">
        <label class="checkbox-row">
          <input type="checkbox" required>
          <span>Declaro que as informações são verdadeiras e prestadas de boa-fé, e li e concordo com a <a href="<?= home_url('/politica-de-privacidade/') ?>" class="text-job-green2 hover:underline">Política de Privacidade</a> e o tratamento dos meus dados para apuração desta denúncia.</span>
        </label>

        <button type="submit" class="btn-enviar" style="margin-top:20px;">
          <span><?= esc_html( jf( 'canal-denuncia_btn_enviar', 'Enviar denúncia' ) ) ?></span>
          <span class="arrow">→</span>
        </button>
      </div>
    </form>

  </div>
</section>

<script>
  (function(){
    function reveal(id, show){
      var t=document.getElementById(id);
      if(!t) return;
      if(show) t.classList.add('show'); else t.classList.remove('show');
    }
    // Identificação (rádio): alterna dados pessoais x contato anônimo
    var radios=document.querySelectorAll('input[name="identificacao"]');
    function syncId(){
      var v=document.querySelector('input[name="identificacao"]:checked');
      var ident = v && v.value==='identificada';
      reveal('identity-fields', ident);
      reveal('anon-fields', !ident);
    }
    radios.forEach(function(r){ r.addEventListener('change', syncId); });
    syncId();
    // Selects com campo condicional ("Outros" / "Sim")
    function bindSelect(selectId, targetId, value){
      var s=document.getElementById(selectId);
      if(!s) return;
      function sync(){ reveal(targetId, s.value===value); }
      s.addEventListener('change', sync); sync();
    }
    bindSelect('relacao','relacao-outro','outros');
    bindSelect('tipo','tipo-outro','outros');
    bindSelect('conhecimento','conhecimento-outro','outro');
    bindSelect('ciente','ciente-nomes','sim');
    bindSelect('envolvido','envolvido-nomes','sim');
    bindSelect('encobrimento','encobrimento-nomes','sim');
  })();
</script>

<?php get_footer(); ?>
