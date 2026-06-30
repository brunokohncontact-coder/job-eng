<?php /* page-termos-de-uso.php */ get_header(); ?>

<style>
  html { scroll-behavior: smooth; overflow-x: hidden; overflow-x: clip; }
  body { background: #fafafa; overflow-x: hidden; overflow-x: clip; }
  .nav-item:hover .dropdown { display: block; }
  .dropdown { display: none; }

  .nav-link { transition: color .3s ease, padding .3s ease; position: relative; display: block; }
  .nav-link.active { color: #00662f; padding-left: 14px; }
  .nav-link.active::before { content:''; position:absolute; left:0; top:50%; width:8px; height:1px; background:#00662f; }

  .legal-content h2 { font-family: '"Franklin Gothic Medium"', sans-serif; color: #1d1d1b; font-size: clamp(22px,2.6vw,30px); letter-spacing: -0.01em; margin-bottom: 16px; }
  .legal-content p, .legal-content li { font-family: 'Franklin Gothic Book', Arial, sans-serif; color: #4a5550; font-size: 15px; line-height: 1.7; }
  .legal-content p { margin-bottom: 16px; }
  .legal-content ul { margin: 0 0 18px 22px; }
  .legal-content li { margin-bottom: 8px; list-style: disc; }
  .legal-content strong { color: #1d1d1b; }
  .legal-content a { color: #199738; }
  .legal-content a:hover { color: #00662f; text-decoration: underline; }

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
  .mobile-close { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; transition: border-color 0.2s; }
  .mobile-close:hover { border-color: #199738; }

  @media (max-width: 900px) { .max-w-grid { padding-left: 20px; padding-right: 20px; } }
  @media (max-width: 640px) { .max-w-grid { padding-left: 16px; padding-right: 16px; } }
</style>

<!-- PAGE HERO -->
<section class="bg-white border-b border-gray-200">
  <div class="max-w-grid mx-auto px-8 grid grid-cols-12 gap-6 lg:gap-10 py-12 lg:py-16">
    <div class="col-span-12 lg:col-span-8">
      <nav class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.22em] text-gray-500 mb-8">
        <a href="<?= home_url('/') ?>" class="hover:text-job-green2 transition-colors">Home</a>
        <span class="text-gray-300">/</span>
        <span class="text-job-green">Termos de Uso</span>
      </nav>
      <p class="text-[11px] font-mono uppercase tracking-[0.22em] text-job-green inline-flex items-center gap-3 mb-5">
        <span style="display:inline-block;width:28px;height:1px;background:#00662f;"></span>
        <?= esc_html( jf( 'termos-de-uso_eyebrow', 'Documento legal' ) ) ?>
      </p>
      <h1 class="text-job-black font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'termos-de-uso_titulo_l1', 'Termos' ) ) ?><br>
        <?= esc_html( jf( 'termos-de-uso_titulo_l2', 'de' ) ) ?> <span class="text-job-green"><?= esc_html( jf( 'termos-de-uso_titulo_l3', 'Uso.' ) ) ?></span>
      </h1>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-end pt-4 lg:pt-0">
      <dl class="border-t border-gray-300 pt-4 grid grid-cols-2 gap-y-3 text-sm">
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'termos-de-uso_meta1_rotulo', 'Atualização' ) ) ?></dt>
        <dd class="font-sans text-job-black"><span id="last-update"><?= esc_html( jf( 'termos-de-uso_meta1_valor', 'a confirmar' ) ) ?></span></dd>
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'termos-de-uso_meta2_rotulo', 'Aplicação' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'termos-de-uso_meta2_valor', 'job.eng.br' ) ) ?></dd>
      </dl>
    </div>
  </div>
</section>

<!-- CONTEÚDO LEGAL -->
<section class="bg-white py-20">
  <div class="max-w-grid mx-auto px-8">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">

      <!-- Sticky side index -->
      <aside class="hidden md:block col-span-3 sticky top-32 self-start">
        <p class="text-[10px] font-mono uppercase tracking-widest text-gray-500 mb-6"><?= esc_html( jf( 'termos-de-uso_indice_titulo', '// índice' ) ) ?></p>
        <ul id="side-index" class="space-y-3 text-sm">
          <li><a href="#s1" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_1', '1. Aceitação' ) ) ?></a></li>
          <li><a href="#s2" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_2', '2. Uso permitido' ) ) ?></a></li>
          <li><a href="#s3" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_3', '3. Conteúdo do site' ) ) ?></a></li>
          <li><a href="#s4" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_4', '4. Propriedade intelectual' ) ) ?></a></li>
          <li><a href="#s5" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_5', '5. Limitação de responsabilidade' ) ) ?></a></li>
          <li><a href="#s6" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_6', '6. Links externos' ) ) ?></a></li>
          <li><a href="#s7" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_7', '7. Privacidade' ) ) ?></a></li>
          <li><a href="#s8" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_8', '8. Modificações' ) ) ?></a></li>
          <li><a href="#s9" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_9', '9. Lei aplicável' ) ) ?></a></li>
          <li><a href="#s10" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'termos-de-uso_indice_10', '10. Contato' ) ) ?></a></li>
        </ul>
      </aside>

      <!-- Conteúdo -->
      <article class="col-span-12 md:col-span-9 legal-content space-y-10" style="max-width:760px;">

        <?= jf( 'termos-de-uso_corpo', '<div id="s1">
          <h2>1. Aceitação dos termos</h2>
          <p>
            Ao acessar e utilizar o site <strong>job.eng.br</strong>, mantido pela
            <strong>JOB Engenharia</strong> (CNPJ [a ser confirmado]), você declara ter
            lido, compreendido e aceito integralmente estes Termos de Uso, bem como nossa
            <a href="/politica-de-privacidade/">Política de Privacidade</a>. Caso não
            concorde com qualquer das condições aqui descritas, solicitamos que não utilize o site.
          </p>
        </div>

        <div id="s2">
          <h2>2. Uso permitido</h2>
          <p>O site é disponibilizado para fins informativos e comerciais lícitos. O usuário compromete-se a:</p>
          <ul>
            <li>Utilizar o site apenas para finalidades legais e em conformidade com a legislação brasileira;</li>
            <li>Não realizar qualquer ato que comprometa a segurança, integridade ou disponibilidade do site;</li>
            <li>Não reproduzir, distribuir ou modificar conteúdos sem autorização prévia;</li>
            <li>Fornecer informações verdadeiras, atuais e precisas em formulários ou candidaturas;</li>
            <li>Não utilizar o site para envio de mensagens não solicitadas, conteúdo ofensivo ou ilegal.</li>
          </ul>
        </div>

        <div id="s3">
          <h2>3. Conteúdo do site</h2>
          <p>
            Os textos, dados técnicos, especificações de equipamentos, fotografias e demais materiais
            disponibilizados têm caráter informativo. A JOB Engenharia esforça-se para manter as
            informações atualizadas, mas não garante ausência de imprecisões e reserva-se o direito de
            corrigir, alterar ou remover qualquer conteúdo a qualquer tempo, sem aviso prévio.
          </p>
          <p>
            As informações sobre serviços e tecnologias não constituem proposta comercial vinculante.
            Propostas formais são emitidas mediante contato direto com nossa equipe.
          </p>
        </div>

        <div id="s4">
          <h2>4. Propriedade intelectual</h2>
          <p>
            Todo o conteúdo deste site — incluindo textos, marcas, logotipos, imagens, ícones, fotografias,
            ilustrações, projetos gráficos, vídeos e código-fonte — é de propriedade da JOB Engenharia ou
            licenciado a ela, sendo protegido pelas leis brasileiras de propriedade intelectual e pelas
            convenções internacionais aplicáveis.
          </p>
          <p>
            É vedada a reprodução, distribuição, modificação, transmissão, exibição pública ou qualquer
            outro uso de tais conteúdos sem autorização prévia, expressa e por escrito da JOB Engenharia.
            O uso indevido sujeita o infrator às sanções civis e criminais cabíveis.
          </p>
        </div>

        <div id="s5">
          <h2>5. Limitação de responsabilidade</h2>
          <p>A JOB Engenharia não se responsabiliza por:</p>
          <ul>
            <li>Indisponibilidade temporária do site decorrente de manutenção, falhas de provedor, força maior ou caso fortuito;</li>
            <li>Vírus, malware ou qualquer dano ao equipamento do usuário decorrente do acesso ao site, recomendando-se manter ferramentas de segurança ativas;</li>
            <li>Decisões tomadas pelo usuário com base em conteúdos meramente informativos, sem consulta prévia à equipe técnica;</li>
            <li>Conteúdo de sites de terceiros eventualmente acessados a partir de links no site.</li>
          </ul>
        </div>

        <div id="s6">
          <h2>6. Links externos</h2>
          <p>
            O site pode conter links para sites de terceiros, oferecidos exclusivamente para conveniência
            do usuário. A JOB Engenharia não controla nem se responsabiliza por conteúdo, políticas de
            privacidade ou práticas de tais sites externos. O acesso ocorre por conta e risco do usuário.
          </p>
        </div>

        <div id="s7">
          <h2>7. Privacidade e proteção de dados</h2>
          <p>
            O tratamento de dados pessoais coletados por meio do site é regulado por nossa
            <a href="/politica-de-privacidade/">Política de Privacidade</a>, parte integrante destes
            Termos. Recomenda-se sua leitura atenta antes do envio de qualquer informação.
          </p>
        </div>

        <div id="s8">
          <h2>8. Modificações dos termos</h2>
          <p>
            A JOB Engenharia poderá alterar estes Termos de Uso a qualquer momento, com efeito imediato
            a partir da publicação no site. Alterações relevantes serão sinalizadas pela atualização da
            data indicada no topo desta página. O uso continuado do site após qualquer modificação
            implica aceitação dos novos termos.
          </p>
        </div>

        <div id="s9">
          <h2>9. Lei aplicável e foro</h2>
          <p>
            Estes Termos são regidos pelas leis da <strong>República Federativa do Brasil</strong>.
            Fica eleito o foro da Comarca de <strong>Santana de Parnaíba — SP</strong> para dirimir
            quaisquer controvérsias decorrentes da interpretação ou aplicação destes Termos, com
            renúncia a qualquer outro, por mais privilegiado que seja.
          </p>
        </div>

        <div id="s10">
          <h2>10. Contato</h2>
          <p>Em caso de dúvidas sobre estes Termos de Uso, entre em contato:</p>
          <ul>
            <li><strong>E-mail:</strong> <a href="mailto:contato@jobeng.com.br">contato@jobeng.com.br</a></li>
            <li><strong>Telefone:</strong> (11) 2207-9212</li>
            <li><strong>Endereço:</strong> Av. Marcos Penteado de Ulhoa Rodrigues, 1119 — Sala 812, Tamboré, Santana de Parnaíba — SP, 06460-040</li>
            <li><strong>Atendimento:</strong> Segunda a sexta, das 9h às 18h</li>
          </ul>
          <p style="margin-top:24px;padding-top:16px;border-top:1px solid #e5e7eb;font-size:13px;">
            <strong>Veja também:</strong>
            <a href="/politica-de-privacidade/">Política de Privacidade</a>.
          </p>
        </div>' ) ?>

      </article>
    </div>
  </div>
</section>

<script>
  (function(){
    var links = document.querySelectorAll('#side-index .nav-link');
    var sections = document.querySelectorAll('article > div[id]');
    if (!links.length || !sections.length || !('IntersectionObserver' in window)) return;
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting) {
          links.forEach(function(l){ l.classList.remove('active'); });
          var link = document.querySelector('#side-index a[href="#' + e.target.id + '"]');
          if (link) link.classList.add('active');
        }
      });
    }, { rootMargin: '-30% 0px -60% 0px' });
    sections.forEach(function(s){ obs.observe(s); });
  })();
</script>

<?php get_footer(); ?>
