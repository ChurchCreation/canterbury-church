<?php
/**
 * Comments.
 *
 * @package canterbury-church
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
    <h2><?php
      $count = get_comments_number();
      /* translators: %s: comment count. */
      printf( esc_html( _n( '%s comment', '%s comments', $count, 'canterbury-church' ) ), esc_html( number_format_i18n( $count ) ) );
    ?></h2>
    <ol class="comment-list">
      <?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
    </ol>
    <?php the_comments_navigation(); ?>
  <?php endif; ?>

  <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p><?php esc_html_e( 'Comments are closed.', 'canterbury-church' ); ?></p>
  <?php endif; ?>

  <?php comment_form(); ?>
</section>
