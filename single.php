<?php
/**
 * Single post.
 *
 * @package canterbury-church
 */

?>
<?php get_header(); ?>

<main class="site-main" id="main">
  <div class="court">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
      <?php the_post_navigation(); ?>
      <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
      ?>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
