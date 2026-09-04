<?php
/**
 * The template for displaying all pages
 *
 * @package ST_Frame
 */

get_header(); ?>

<main class="flex-grow py-16 bg-slate-950 text-white min-h-[60vh]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
    ?>
      <div class="mb-10 border-b border-slate-800 pb-6">
        <h1 class="text-3xl sm:text-4xl font-extrabold font-heading text-white"><?php the_title(); ?></h1>
      </div>
      <div class="prose prose-invert max-w-none text-slate-300 leading-relaxed space-y-4">
        <?php the_content(); ?>
      </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>
