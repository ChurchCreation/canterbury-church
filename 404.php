<?php
/**
 * Not found.
 *
 * @package canterbury-church
 */

?>
<?php get_header(); ?>

<main class="site-main" id="main">
  <div class="court">
    <h1><?php esc_html_e( 'That page has moved or never existed', 'canterbury-church' ); ?></h1>
    <p><?php esc_html_e( 'Try the menu above, or search for what you were looking for.', 'canterbury-church' ); ?></p>
    <?php get_search_form(); ?>
  </div>
</main>

<?php get_footer(); ?>
