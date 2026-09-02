<?php
/**
 * Single Project Template
 *
 * @package ST_Frame
 */

get_header(); ?>

<main class="flex-grow py-16 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php
    while ( have_posts() ) : the_post();
    ?>
      <article class="space-y-8">
        <div>
          <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="text-xs text-orange-600 font-semibold mb-4 inline-flex items-center gap-1">
            <i class="fas fa-arrow-left"></i> ย้อนกลับไปหน้าผลงานโครงการ
          </a>
          <h1 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 mt-2"><?php the_title(); ?></h1>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
          <div class="rounded-2xl overflow-hidden shadow-xl border border-slate-200 h-96">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>

        <div class="prose max-w-none text-slate-700 leading-relaxed text-sm sm:text-base">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
