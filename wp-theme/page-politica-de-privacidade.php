<?php /* page-politica-de-privacidade.php */ get_header();

/* Helper local: campo wysiwyg/HTML usado dentro de <li> ou <p>.
   Remove o <p> que o editor adiciona automaticamente, para não
   aninhar parágrafos e manter o visual idêntico. */
if ( ! function_exists( 'pdp_inline' ) ) {
    function pdp_inline( $name, $fallback = '' ) {
        $html = jf( $name, $fallback );
        $html = preg_replace( '#^\s*<p>#', '', $html );
        $html = preg_replace( '#</p>\s*$#', '', $html );
        return $html;
    }
}
?>

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
        <span class="text-job-green">Política de Privacidade</span>
      </nav>
      <p class="text-[11px] font-mono uppercase tracking-[0.22em] text-job-green inline-flex items-center gap-3 mb-5">
        <span style="display:inline-block;width:28px;height:1px;background:#00662f;"></span>
        <?= esc_html( jf( 'politica-de-privacidade_kicker', 'Documento legal · LGPD' ) ) ?>
      </p>
      <h1 class="text-job-black font-sans" style="font-size:clamp(2rem,4.4vw,3.5rem);line-height:0.98;letter-spacing:-0.02em;">
        <?= esc_html( jf( 'politica-de-privacidade_titulo_l1', 'Política de' ) ) ?><br>
        <span class="text-job-green"><?= esc_html( jf( 'politica-de-privacidade_titulo_l2', 'Privacidade.' ) ) ?></span>
      </h1>
    </div>
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-end pt-4 lg:pt-0">
      <dl class="border-t border-gray-300 pt-4 grid grid-cols-2 gap-y-3 text-sm">
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'politica-de-privacidade_meta_atualizacao_rotulo', 'Atualização' ) ) ?></dt>
        <dd class="font-sans text-job-black"><span id="last-update">a confirmar</span></dd>
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'politica-de-privacidade_meta_conformidade_rotulo', 'Conformidade' ) ) ?></dt>
        <dd class="font-sans text-job-black"><?= esc_html( jf( 'politica-de-privacidade_meta_conformidade_valor', 'LGPD · Lei 13.709/18' ) ) ?></dd>
        <dt class="text-[10px] font-mono uppercase tracking-[0.22em] text-gray-500"><?= esc_html( jf( 'politica-de-privacidade_meta_secoes_rotulo', 'Seções' ) ) ?></dt>
        <dd class="font-sans text-job-black tabular-nums"><?= esc_html( jf( 'politica-de-privacidade_meta_secoes_valor', '11' ) ) ?></dd>
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
        <p class="text-[10px] font-mono uppercase tracking-widest text-gray-500 mb-6"><?= esc_html( jf( 'politica-de-privacidade_indice_titulo', '// índice' ) ) ?></p>
        <ul id="side-index" class="space-y-3 text-sm">
          <li><a href="#s1" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_1', '1. Apresentação' ) ) ?></a></li>
          <li><a href="#s2" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_2', '2. Dados coletados' ) ) ?></a></li>
          <li><a href="#s3" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_3', '3. Finalidade' ) ) ?></a></li>
          <li><a href="#s4" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_4', '4. Base legal' ) ) ?></a></li>
          <li><a href="#s5" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_5', '5. Compartilhamento' ) ) ?></a></li>
          <li><a href="#s6" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_6', '6. Cookies' ) ) ?></a></li>
          <li><a href="#s7" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_7', '7. Direitos do titular' ) ) ?></a></li>
          <li><a href="#s8" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_8', '8. Segurança' ) ) ?></a></li>
          <li><a href="#s9" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_9', '9. Retenção' ) ) ?></a></li>
          <li><a href="#s10" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_10', '10. Encarregado (DPO)' ) ) ?></a></li>
          <li><a href="#s11" class="nav-link text-gray-500 hover:text-job-green"><?= esc_html( jf( 'politica-de-privacidade_indice_11', '11. Alterações' ) ) ?></a></li>
        </ul>
      </aside>

      <!-- Conteúdo -->
      <article class="col-span-12 md:col-span-9 legal-content space-y-10" style="max-width:760px;">

        <div id="s1">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s1_titulo', '1. Apresentação' ) ) ?></h2>
          <p>
            <?= pdp_inline( 'politica-de-privacidade_s1_p1', 'A <strong>JOB Engenharia</strong>, inscrita no CNPJ sob nº [a ser confirmado], com sede na
            Av. Marcos Penteado de Ulhoa Rodrigues, 1119 — Sala 812, Tamboré, Santana de Parnaíba — SP,
            CEP 06460-040, é responsável pelo tratamento dos dados pessoais coletados por meio deste site,
            atuando em conformidade com a <strong>Lei Geral de Proteção de Dados Pessoais (LGPD — Lei nº 13.709/2018)</strong>.' ) ?>
          </p>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s1_p2', 'Esta Política descreve como coletamos, usamos, compartilhamos e protegemos os dados pessoais de visitantes, clientes, fornecedores e candidatos a vagas. Ao utilizar nosso site, você declara estar ciente desta Política.' ) ) ?>
          </p>
        </div>

        <div id="s2">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s2_titulo', '2. Dados que coletamos' ) ) ?></h2>
          <p><?= esc_html( jf( 'politica-de-privacidade_s2_intro', 'Coletamos apenas os dados estritamente necessários para as finalidades descritas:' ) ) ?></p>
          <ul>
            <li><?= pdp_inline( 'politica-de-privacidade_s2_item1', '<strong>Dados de identificação:</strong> nome completo, e-mail, telefone, município ou empresa.' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s2_item2', '<strong>Dados de comunicação:</strong> mensagem enviada nos formulários de contato e proposta.' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s2_item3', '<strong>Dados de navegação:</strong> endereço IP, tipo de navegador, sistema operacional, páginas visitadas e tempo de permanência (coletados via cookies e ferramentas de análise).' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s2_item4', '<strong>Dados profissionais:</strong> currículo e informações fornecidas voluntariamente em candidaturas para vagas.' ) ?></li>
          </ul>
        </div>

        <div id="s3">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s3_titulo', '3. Finalidade do tratamento' ) ) ?></h2>
          <p><?= esc_html( jf( 'politica-de-privacidade_s3_intro', 'Utilizamos seus dados pessoais para:' ) ) ?></p>
          <ul>
            <li><?= esc_html( jf( 'politica-de-privacidade_s3_item1', 'Responder a solicitações de proposta, dúvidas e contatos comerciais;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s3_item2', 'Avaliar candidaturas para vagas de emprego;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s3_item3', 'Melhorar a navegação e a experiência do site;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s3_item4', 'Cumprir obrigações legais e regulatórias;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s3_item5', 'Prevenir fraudes e proteger nossa segurança e a de nossos visitantes.' ) ) ?></li>
          </ul>
        </div>

        <div id="s4">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s4_titulo', '4. Base legal' ) ) ?></h2>
          <p><?= esc_html( jf( 'politica-de-privacidade_s4_intro', 'O tratamento de dados pessoais pela JOB Engenharia ocorre sob as seguintes bases legais previstas na LGPD:' ) ) ?></p>
          <ul>
            <li><?= pdp_inline( 'politica-de-privacidade_s4_item1', '<strong>Consentimento</strong> do titular (art. 7º, I);' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s4_item2', '<strong>Execução de contrato</strong> ou procedimentos preliminares relacionados (art. 7º, V);' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s4_item3', '<strong>Legítimo interesse</strong> da empresa, respeitados os direitos e liberdades do titular (art. 7º, IX);' ) ?></li>
            <li><?= pdp_inline( 'politica-de-privacidade_s4_item4', '<strong>Cumprimento de obrigação legal ou regulatória</strong> (art. 7º, II).' ) ?></li>
          </ul>
        </div>

        <div id="s5">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s5_titulo', '5. Compartilhamento de dados' ) ) ?></h2>
          <p>
            <?= pdp_inline( 'politica-de-privacidade_s5_intro', 'A JOB Engenharia <strong>não comercializa</strong> dados pessoais. Eventual compartilhamento
            ocorre apenas com:' ) ?>
          </p>
          <ul>
            <li><?= esc_html( jf( 'politica-de-privacidade_s5_item1', 'Fornecedores de tecnologia que operam sob contrato de confidencialidade (hospedagem, e-mail, análise de site);' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s5_item2', 'Autoridades públicas, mediante requisição legal;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s5_item3', 'Empresas parceiras envolvidas na execução de serviços, quando estritamente necessário.' ) ) ?></li>
          </ul>
        </div>

        <div id="s6">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s6_titulo', '6. Cookies e tecnologias similares' ) ) ?></h2>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s6_p1', 'Utilizamos cookies para garantir o funcionamento adequado do site, lembrar preferências e coletar estatísticas anônimas de uso. Você pode gerenciar ou desativar cookies nas configurações do seu navegador, ciente de que algumas funcionalidades poderão ficar limitadas.' ) ) ?>
          </p>
        </div>

        <div id="s7">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s7_titulo', '7. Direitos do titular' ) ) ?></h2>
          <p><?= esc_html( jf( 'politica-de-privacidade_s7_intro', 'De acordo com o art. 18 da LGPD, você tem direito a:' ) ) ?></p>
          <ul>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item1', 'Confirmar a existência de tratamento dos seus dados;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item2', 'Acessar, corrigir, atualizar ou complementar seus dados;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item3', 'Solicitar anonimização, bloqueio ou eliminação de dados desnecessários ou tratados em desconformidade;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item4', 'Solicitar portabilidade a outro fornecedor de serviço;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item5', 'Revogar consentimento a qualquer tempo;' ) ) ?></li>
            <li><?= esc_html( jf( 'politica-de-privacidade_s7_item6', 'Apresentar reclamação à Autoridade Nacional de Proteção de Dados (ANPD).' ) ) ?></li>
          </ul>
          <p>
            <?= pdp_inline( 'politica-de-privacidade_s7_fecho', 'Para exercer qualquer desses direitos, entre em contato pelo e-mail
            <a href="mailto:contato@jobeng.com.br">contato@jobeng.com.br</a>.' ) ?>
          </p>
        </div>

        <div id="s8">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s8_titulo', '8. Segurança da informação' ) ) ?></h2>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s8_p1', 'Adotamos medidas técnicas e organizacionais para proteger os dados pessoais contra acesso não autorizado, alteração, divulgação ou destruição. Apesar dos esforços, nenhum sistema é totalmente imune a falhas; em caso de incidente, comunicaremos os titulares afetados e a ANPD nos termos da legislação.' ) ) ?>
          </p>
        </div>

        <div id="s9">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s9_titulo', '9. Retenção dos dados' ) ) ?></h2>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s9_p1', 'Os dados pessoais são mantidos pelo tempo estritamente necessário ao cumprimento das finalidades para as quais foram coletados ou pelo prazo determinado por obrigação legal. Após esse período, os dados são eliminados ou anonimizados de forma segura.' ) ) ?>
          </p>
        </div>

        <div id="s10">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s10_titulo', '10. Encarregado pelo Tratamento de Dados (DPO)' ) ) ?></h2>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s10_intro', 'Em conformidade com o art. 41 da LGPD, a JOB Engenharia disponibiliza canal direto para comunicação com o Encarregado pelo Tratamento de Dados Pessoais:' ) ) ?>
          </p>
          <ul>
            <li><strong>E-mail:</strong> <a href="mailto:contato@jobeng.com.br">contato@jobeng.com.br</a></li>
            <li><strong>Endereço:</strong> Av. Marcos Penteado de Ulhoa Rodrigues, 1119 — Sala 812, Tamboré, Santana de Parnaíba — SP, 06460-040</li>
            <li><strong>Telefone:</strong> (11) 2207-9212</li>
          </ul>
          <p style="font-size:12px;color:#9aada4;"><?= esc_html( jf( 'politica-de-privacidade_s10_nota', '/ nome e contato direto do DPO a definir com a empresa' ) ) ?></p>
        </div>

        <div id="s11">
          <h2><?= esc_html( jf( 'politica-de-privacidade_s11_titulo', '11. Alterações desta Política' ) ) ?></h2>
          <p>
            <?= esc_html( jf( 'politica-de-privacidade_s11_p1', 'Esta Política de Privacidade pode ser atualizada periodicamente. Recomendamos a consulta regular a esta página. A data da última atualização está indicada no topo. Alterações relevantes serão comunicadas pelos canais oficiais da empresa.' ) ) ?>
          </p>
          <p style="margin-top:24px;padding-top:16px;border-top:1px solid #e5e7eb;font-size:13px;">
            <strong><?= esc_html( jf( 'politica-de-privacidade_s11_relacionados_rotulo', 'Termos relacionados:' ) ) ?></strong>
            <a href="<?= home_url( '/termos-de-uso/' ) ?>"><?= esc_html( jf( 'politica-de-privacidade_s11_relacionados_link', 'Termos de Uso' ) ) ?></a>.
          </p>
        </div>

      </article>
    </div>
  </div>
</section>

<script>
  // Active section highlight
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
