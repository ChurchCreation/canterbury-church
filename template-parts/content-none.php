<?php
/**
 * Shown when the loop finds nothing.
 *
 * @package canterbury-church
 */

?>
<section>
  <h2><?php esc_html_e( 'Nothing here yet', 'canterbury-church' ); ?></h2>
  <p><?php esc_html_e( 'No posts matched. Try a different search.', 'canterbury-church' ); ?></p>
  <?php get_search_form(); ?>
</section>
