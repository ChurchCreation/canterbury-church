<?php
/**
 * Search results.
 *
 * @package canterbury-church
 */

?>
<?php get_header(); ?>

<main class="site-main" id="main">
  <div class="court">
    <header>
      <h1><?php
        /* translators: %s: search query. */
        printf( esc_html__( 'Search results for %s', 'canterbury-church' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
      ?></h1>
    </header>
    <?php if ( have_posts() ) : ?>
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
