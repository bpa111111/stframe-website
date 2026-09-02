<?php
/**
 * The main template fallback
 *
 * @package ST_Frame
 */

get_header(); ?>

<main class="flex-grow py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        the_title( '<h1 class="text-3xl font-bold font-heading mb-6">', '</h1>' );
        the_content();
      endwhile;
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>
