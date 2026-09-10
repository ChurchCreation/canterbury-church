<?php
/**
 * Header.
 *
 * @package canterbury-church
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'canterbury-church' ); ?></a>
<svg class="icon-sprite" aria-hidden="true" focusable="false" width="0" height="0">
  <symbol id="i-contrast" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 3a9 9 0 0 0 0 18Z" fill="currentColor" stroke="none"/></symbol>
  <symbol id="i-menu" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18"/></symbol>
  <symbol id="i-close" viewBox="0 0 24 24"><path d="M5 5l14 14M19 5L5 19"/></symbol>
  <symbol id="i-arrow-right" viewBox="0 0 24 24"><path d="M3 12h16M13 6l6 6-6 6"/></symbol>
  <symbol id="i-arrow-up-right" viewBox="0 0 24 24"><path d="M6 18L18 6M8 6h10v10"/></symbol>
  <symbol id="i-chevron-down" viewBox="0 0 24 24"><path d="M4 9l8 7 8-7"/></symbol>
  <symbol id="i-external" viewBox="0 0 24 24"><path d="M14 4h6v6M20 4L11 13M18 14v6H4V6h6"/></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><path d="M12 21s7-6.4 7-11a7 7 0 1 0-14 0c0 4.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/></symbol>
  <symbol id="i-phone" viewBox="0 0 24 24"><path d="M6 3h3.5L11 7.5 8.6 9.2a12.5 12.5 0 0 0 6.2 6.2L16.5 13l4.5 1.5V18a2.5 2.5 0 0 1-2.5 2.5A15.5 15.5 0 0 1 3.5 5.5 2.5 2.5 0 0 1 6 3Z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><path d="M3 5h18v14H3zM3 6l9 6.5L21 6"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 6.5V12l4 2.5"/></symbol>
  <symbol id="i-calendar" viewBox="0 0 24 24"><path d="M4 6h16v15H4zM4 10.5h16M8.5 3v4M15.5 3v4"/></symbol>
  <symbol id="i-print" viewBox="0 0 24 24"><path d="M7 8V3h10v5M4 8h16v8h-3M7 16H4M7 13h10v8H7z"/></symbol>
  <symbol id="i-play" viewBox="0 0 24 24"><path d="M7 4l13 8-13 8Z"/></symbol>
  <symbol id="i-download" viewBox="0 0 24 24"><path d="M12 3v12M7 11l5 5 5-5M3 21h18"/></symbol>
  <symbol id="i-coin" viewBox="0 0 24 24"><path d="M2.5 7h19v10h-19z"/><circle cx="12" cy="12" r="2.6"/><path d="M5.5 7v10M18.5 7v10"/></symbol>
  <symbol id="i-book" viewBox="0 0 24 24"><path d="M12 6v15M12 6a5 5 0 0 0-5-3H3v15h4a5 5 0 0 1 5 3 5 5 0 0 1 5-3h4V3h-4a5 5 0 0 0-5 3Z"/></symbol>
  <symbol id="i-note" viewBox="0 0 24 24"><path d="M9 17V4l11-2v13"/><ellipse cx="6" cy="17.5" rx="3" ry="2.5"/><ellipse cx="17" cy="15.5" rx="3" ry="2.5"/></symbol>
</svg>

<header class="porch">
  <div class="court">
    <a class="porch__mark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( canterbury_church_get( 'short_name' ) ); ?></a>
    <div class="porch__tools">
      <button class="theme-toggle" type="button" aria-label="Switch theme"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-contrast"/></svg></button>
    </div>
  </div>
  <nav class="porch__ways" aria-label="Primary">
    <div class="court">
      <button class="porch-toggle" type="button" aria-expanded="false">
        <svg class="icon icon--menu" aria-hidden="true" focusable="false"><use href="#i-menu"/></svg><svg class="icon icon--close" aria-hidden="true" focusable="false"><use href="#i-close"/></svg>
        <span data-porch-label><?php esc_html_e( 'Menu', 'canterbury-church' ); ?></span>
      </button>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => '',
          'depth'          => 1,
          'fallback_cb'    => 'canterbury_church_menu_fallback',
        )
      );
      ?>
    </div>
  </nav>
</header>
