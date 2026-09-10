<?php
/**
 * Single page.
 *
 * @package canterbury-church
 */

?>
<?php get_header(); ?>

<main class="site-main" id="main">
  <div class="court">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <figure><?php the_post_thumbnail( 'large' ); ?></figure>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
      </article>
      <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
      ?>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
