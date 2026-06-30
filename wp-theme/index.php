<?php
/**
 * Fallback genérico (blog, busca, páginas sem template próprio).
 * As páginas institucionais terão templates dedicados.
 */
get_header(); ?>

<main class="max-w-grid mx-auto px-8 py-20 lg:py-28">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="mb-16">
      <h1 class="font-sans text-job-black mb-8" style="font-size:clamp(2rem,4vw,3rem);line-height:1.05;letter-spacing:-0.02em;"><?php the_title(); ?></h1>
      <div class="font-body" style="font-size:16px;line-height:1.65;max-width:70ch;"><?php the_content(); ?></div>
    </article>
  <?php endwhile; else : ?>
    <p class="font-body" style="font-size:16px;">Nada publicado por aqui ainda.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
