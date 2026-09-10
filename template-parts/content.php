<?php
/**
 * One post in a list or on its own.
 *
 * @package canterbury-church
 */

?>
<article <?php post_class(); ?>>
  <?php if ( is_singular() ) : ?>
    <h1><?php the_title(); ?></h1>
  <?php else : ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php endif; ?>

  <?php if ( 'post' === get_post_type() ) : ?>
    <p class="entry-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
  <?php endif; ?>

  <?php if ( has_post_thumbnail() ) : ?>
    <figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></figure>
  <?php endif; ?>

  <?php if ( is_singular() ) : ?>
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
  <?php else : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>
</article>
