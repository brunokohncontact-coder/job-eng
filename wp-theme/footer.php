<!-- Faixa verde de assinatura -->
<div aria-hidden="true" style="height:6px;background:#00662f;"></div>

<!-- ═══ FOOTER ═══ -->
<footer class="bg-job-black py-16 relative">
  <div class="max-w-grid mx-auto px-8">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-10 mb-12">

      <div class="col-span-2 md:col-span-1">
        <img src="<?= ju() ?>/img/logo-job-eng-branco.svg" alt="JOB Engenharia" class="mb-4" style="width:120px;height:auto;">
        <p class="text-gray-300 text-sm font-sans leading-snug" style="letter-spacing:-0.005em;">
          Engenharia que move<br><span class="text-job-green2" style="font-weight:700;">o futuro.</span>
        </p>
      </div>

      <div>
        <p class="text-white text-xs font-sans tracking-widest mb-5">Navegação</p>
        <ul class="space-y-2 text-gray-400 text-sm font-body">
          <li><a href="<?= home_url( '/' ) ?>" class="hover:text-job-green2 transition-colors">Home</a></li>
          <li><a href="<?= home_url( '/sobre/' ) ?>" class="hover:text-job-green2 transition-colors">Sobre a Empresa</a></li>
          <li><a href="<?= home_url( '/servicos/' ) ?>" class="hover:text-job-green2 transition-colors">Serviços</a></li>
          <li><a href="<?= home_url( '/ecojob/' ) ?>" class="hover:text-job-green2 transition-colors">Ecojob</a></li>
          <li><a href="<?= home_url( '/carreiras/' ) ?>" class="hover:text-job-green2 transition-colors">Carreiras</a></li>
          <li><a href="<?= home_url( '/contato/' ) ?>" class="hover:text-job-green2 transition-colors">Contato</a></li>
        </ul>
      </div>

      <div>
        <p class="text-white text-xs font-sans tracking-widest mb-5">Serviços</p>
        <ul class="space-y-2 text-gray-400 text-sm font-body">
          <li><a href="<?= home_url( '/servicos/' ) ?>#infraestrutura" class="hover:text-job-green2 transition-colors">Infraestrutura</a></li>
          <li><a href="<?= home_url( '/servicos/' ) ?>#zeladoria" class="hover:text-job-green2 transition-colors">Zeladoria e Manutenção de Ativos</a></li>
          <li><a href="<?= home_url( '/servicos/' ) ?>#predial" class="hover:text-job-green2 transition-colors">Engenharia Predial</a></li>
          <li><a href="<?= home_url( '/servicos/' ) ?>#ambiental" class="hover:text-job-green2 transition-colors">Tecnologia Ambiental</a></li>
        </ul>
      </div>

      <div>
        <p class="text-white text-xs font-sans tracking-widest mb-5">Contato</p>
        <ul class="space-y-3 text-gray-400 text-sm font-body">
          <li><a href="tel:+<?= jg( 'job_whatsapp', '551122079212' ) ?>" class="hover:text-job-green2 transition-colors"><?= esc_html( jg( 'job_telefone', '(11) 2207-9212' ) ) ?></a></li>
          <li><a href="mailto:<?= esc_attr( jg( 'job_email', 'contato@jobeng.com.br' ) ) ?>" class="hover:text-job-green2 transition-colors"><?= esc_html( jg( 'job_email', 'contato@jobeng.com.br' ) ) ?></a></li>
          <li class="text-xs text-gray-500 pt-1"><?= esc_html( jg( 'job_horario', 'Seg. a sex. · 9h às 18h' ) ) ?></li>
        </ul>
      </div>

    </div>

    <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
      <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3 text-gray-600 text-xs font-body">
        <span>&copy; <?php echo date( 'Y' ); ?> JOB Engenharia. Todos os direitos reservados.</span>
        <span class="hidden sm:inline text-gray-700">·</span>
        <a href="<?= home_url( '/politica-de-privacidade/' ) ?>" class="hover:text-job-green2 transition-colors">Política de Privacidade</a>
        <span class="hidden sm:inline text-gray-700">·</span>
        <a href="<?= home_url( '/termos-de-uso/' ) ?>" class="hover:text-job-green2 transition-colors">Termos de Uso</a>
      </div>
      <div class="flex gap-3">
        <a href="<?= esc_url( jg( 'job_linkedin', 'https://www.linkedin.com/company/ecojob/' ) ) ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="flex items-center justify-center w-9 h-9 border border-gray-700 text-gray-500 hover:text-white hover:border-job-green2 transition-colors">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.77 0 5-2.24 5-5v-14c0-2.76-2.23-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.27c-.97 0-1.75-.79-1.75-1.76s.78-1.76 1.75-1.76 1.75.79 1.75 1.76-.78 1.76-1.75 1.76zm13.5 12.27h-3v-5.6c0-3.37-4-3.11-4 0v5.6h-3v-11h3v1.77c1.4-2.59 7-2.78 7 2.48v6.75z"/></svg>
        </a>
        <a href="<?= esc_url( jg( 'job_instagram', 'https://www.instagram.com/jobengenhariabr/' ) ) ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="flex items-center justify-center w-9 h-9 border border-gray-700 text-gray-500 hover:text-white hover:border-job-green2 transition-colors">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
        </a>
        <a href="<?= esc_url( jg( 'job_facebook', 'https://www.facebook.com/p/Job-Engenharia-Br-61554832118557/' ) ) ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="flex items-center justify-center w-9 h-9 border border-gray-700 text-gray-500 hover:text-white hover:border-job-green2 transition-colors">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
      </div>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
