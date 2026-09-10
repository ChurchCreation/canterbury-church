<?php
/**
 * Footer.
 *
 * @package canterbury-church
 */

?>
<footer class="valediction">
  <div class="court">
    <a class="valediction__mark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( canterbury_church_get( 'name' ) ); ?></a>
    <div class="valediction__grid">
      <div>
        <h2><?php esc_html_e( 'Find us', 'canterbury-church' ); ?></h2>
        <p><?php echo esc_html( canterbury_church_address() ); ?></p>
        <p style="margin-block-start:var(--s-3)">
          <a class="with-icon" href="<?php echo esc_url( canterbury_church_maps_url() ); ?>"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-pin"/></svg><span><?php esc_html_e( 'Directions and parking', 'canterbury-church' ); ?></span></a>
        </p>
      </div>
      <div>
        <h2><?php esc_html_e( 'Parish office', 'canterbury-church' ); ?></h2>
        <ul>
          <li><a class="with-icon" href="<?php echo esc_url( canterbury_church_tel_url() ); ?>"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg><span><?php echo esc_html( canterbury_church_get( 'phone' ) ); ?></span></a></li>
          <li><a class="with-icon" href="<?php echo esc_url( canterbury_church_mailto_url() ); ?>"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg><span><?php echo esc_html( canterbury_church_get( 'email' ) ); ?></span></a></li>
          <li><?php esc_html_e( 'Tuesday to Friday, 9.30 to 12.30', 'canterbury-church' ); ?></li>
        </ul>
      </div>
      <div>
        <h2><?php esc_html_e( 'Start here', 'canterbury-church' ); ?></h2>
        <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => '',
          'depth'          => 1,
          'fallback_cb'    => false,
        )
      );
      ?>
      </div>
      <div>
        <h2><?php esc_html_e( 'Giving', 'canterbury-church' ); ?></h2>
        <p style="font-size:var(--t-sm);color:var(--muted-invert)"><?php esc_html_e( 'The building costs about £190 a day to keep open. Nothing here depends on your giving.', 'canterbury-church' ); ?></p>
        <p style="margin-block-start:var(--s-4)"><a class="btn" href="<?php echo esc_url( canterbury_church_get( 'giving_url' ) ); ?>"><?php esc_html_e( 'Give', 'canterbury-church' ); ?></a></p>
      </div>
    </div>
    <p class="valediction__note">
      <span>&copy; <span><?php echo esc_html( wp_date( 'Y' ) ); ?></span> <span><?php echo esc_html( canterbury_church_get( 'name' ) ); ?></span> <?php esc_html_e( '&middot; PCC registered charity 1130000', 'canterbury-church' ); ?></span>
      <?php if ( canterbury_church_show_credit() ) : ?><span><?php esc_html_e( 'Canterbury — a free template from', 'canterbury-church' ); ?> <a href="https://churchcreation.com/templates/canterbury/"><?php esc_html_e( 'ChurchCreation', 'canterbury-church' ); ?></a></span><?php endif; ?>
    </p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
