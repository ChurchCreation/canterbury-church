<?php
/**
 * Customizer settings: the church's own details.
 *
 * @package canterbury-church
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the section and its fields.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function canterbury_church_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'canterbury_church_details',
		array(
			'title'       => __( 'Church details', 'canterbury-church' ),
			'priority'    => 30,
			'description' => __( 'Used in the header, the footer and the structured data. Fill these in once and they stay consistent across the site.', 'canterbury-church' ),
		)
	);

	$fields = array(
		'name' => array( 'label' => __( 'Church name', 'canterbury-church' ), 'type' => 'text' ),
		'short_name' => array( 'label' => __( 'Short name', 'canterbury-church' ), 'type' => 'text' ),
		'tagline' => array( 'label' => __( 'Tagline', 'canterbury-church' ), 'type' => 'text' ),
		'street' => array( 'label' => __( 'Street', 'canterbury-church' ), 'type' => 'text' ),
		'city' => array( 'label' => __( 'Town or city', 'canterbury-church' ), 'type' => 'text' ),
		'region' => array( 'label' => __( 'County or region', 'canterbury-church' ), 'type' => 'text' ),
		'postal' => array( 'label' => __( 'Postcode', 'canterbury-church' ), 'type' => 'text' ),
		'phone' => array( 'label' => __( 'Telephone', 'canterbury-church' ), 'type' => 'text' ),
		'email' => array( 'label' => __( 'Email', 'canterbury-church' ), 'type' => 'email' ),
		'giving_url' => array( 'label' => __( 'Giving link', 'canterbury-church' ), 'type' => 'url' ),
	);

	$defaults = canterbury_church_defaults();

	$wp_customize->add_setting(
		'canterbury_church_show_credit',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'canterbury_church_show_credit',
		array(
			'label'   => __( 'Show the template credit in the footer', 'canterbury-church' ),
			'section' => 'canterbury_church_details',
			'type'    => 'checkbox',
		)
	);

	foreach ( $fields as $key => $field ) {
		$sanitize = 'sanitize_text_field';
		if ( 'email' === $field['type'] ) {
			$sanitize = 'sanitize_email';
		} elseif ( 'url' === $field['type'] ) {
			$sanitize = 'esc_url_raw';
		}

		$wp_customize->add_setting(
			'canterbury_church_' . $key,
			array(
				'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'canterbury_church_' . $key,
			array(
				'label'   => $field['label'],
				'section' => 'canterbury_church_details',
				'type'    => 'url' === $field['type'] ? 'url' : $field['type'],
			)
		);
	}
}
add_action( 'customize_register', 'canterbury_church_customize_register' );
