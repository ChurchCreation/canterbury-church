<?php
/**
 * Archives.
 *
 * @package canterbury-church
 */

?>
<?php get_header(); ?>

<main class="site-main" id="main">
  <div class="court">
    <?php if ( have_posts() ) : ?>
      <header><?php the_archive_title( '<h1>', '</h1>' ); ?><?php the_archive_description(); ?></header>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
    <?php else : ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
