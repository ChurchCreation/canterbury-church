<?php
/**
 * Canterbury theme setup.
 *
 * @package canterbury-church
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CANTERBURY_CHURCH_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Theme supports and menus.
 */
function canterbury_church_setup() {
	load_theme_textdomain( 'canterbury-church', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-logo', array( 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'canterbury-church' ),
			'footer'  => __( 'Footer', 'canterbury-church' ),
		)
	);
}
add_action( 'after_setup_theme', 'canterbury_church_setup' );

/**
 * Styles and scripts.
 *
 * The stylesheets are the template's own and must load in this order: tokens
 * before the family sheet, or the cascade resolves the wrong custom properties.
 */
function canterbury_church_assets() {
	$css = array(
		'canterbury-church-fonts' => 'fonts.css',
		'canterbury-church-tokens' => 'tokens.css',
		'canterbury-church-chrome-editorial' => '_chrome-editorial.css',
		'canterbury-church-parish' => 'parish.css',
		'canterbury-church-base' => 'base.css',
		'canterbury-church-components' => 'components.css',
		'canterbury-church-motion' => 'motion.css',
		'canterbury-church-liturgy' => 'liturgy.css',
		'canterbury-church-viz' => 'viz.css',
		'canterbury-church-template' => 'template.css',
	);

	$deps = array();
	foreach ( $css as $handle => $file ) {
		wp_enqueue_style( $handle, get_theme_file_uri( 'assets/css/' . $file ), $deps, CANTERBURY_CHURCH_VERSION );
		$deps = array( $handle );
	}

	// The theme's own style.css carries only the header, but wordpress.org
	// expects it enqueued so a child theme has something to depend on.
	wp_enqueue_style( 'canterbury-church-style', get_stylesheet_uri(), $deps, CANTERBURY_CHURCH_VERSION );

	wp_enqueue_script( 'canterbury-church-main', get_theme_file_uri( 'assets/js/main.js' ), array(), CANTERBURY_CHURCH_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'canterbury_church_assets' );

/**
 * The template's scripts are ES modules that import one another.
 *
 * wp_enqueue_script_module() would be tidier but is WordPress 6.5+, and this
 * theme supports 6.0.
 */
function canterbury_church_module_type( $tag, $handle ) {
	if ( 'canterbury-church-main' === $handle ) {
		return str_replace( '<script ', '<script type="module" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'canterbury_church_module_type', 10, 2 );

/**
 * Editor styles, so the block editor matches the front end.
 */
function canterbury_church_editor_assets() {
	add_editor_style( array(
		'assets/css/fonts.css',
		'assets/css/tokens.css',
		'assets/css/_chrome-editorial.css',
		'assets/css/parish.css',
		'assets/css/base.css',
		'assets/css/components.css',
		'assets/css/motion.css',
		'assets/css/liturgy.css',
		'assets/css/viz.css',
		'assets/css/template.css',
	) );
}
add_action( 'after_setup_theme', 'canterbury_church_editor_assets' );

/**
 * Mark the current menu item for assistive technology.
 *
 * WordPress adds current-menu-item as a class but no aria-current.
 */
function canterbury_church_menu_aria_current( $atts, $item ) {
	if ( ! empty( $item->current ) ) {
		$atts['aria-current'] = 'page';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'canterbury_church_menu_aria_current', 10, 2 );
