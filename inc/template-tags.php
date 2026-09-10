<?php
/**
 * The church's details, and the links derived from them.
 *
 * In the HTML edition of this template these come from church.config.json and
 * are filled in by the browser. Here they are Customizer settings, rendered by
 * PHP, so the header, footer, contact details and structured data cannot drift
 * apart.
 *
 * @package canterbury-church
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * One Customizer setting, with the demo value as its default.
 *
 * @param string $key Setting key.
 * @return string
 */
function canterbury_church_get( $key ) {
	$defaults = canterbury_church_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	$value    = get_theme_mod( 'canterbury_church_' . $key, $default );

	if ( 'name' === $key && '' === $value ) {
		$value = get_bloginfo( 'name' );
	}

	return (string) $value;
}

/**
 * Defaults, taken from the template's own demo content.
 *
 * @return array
 */
function canterbury_church_defaults() {
	return array(
		'name'        => 'St Botolph\'s, Barwick',
		'short_name'  => 'St Botolph\'s',
		'tagline'     => 'The parish church of Barwick, keeping the daily office since 1348',
		'street'      => 'Church Green',
		'city'        => 'Barwick',
		'region'      => 'Somerset',
		'postal'      => 'BA22 9TD',
		'phone'       => '01632 960274',
		'email'       => 'parishoffice@example.org',
		'giving_url'  => 'https://example.org/give',
	);
}

/**
 * The address on one line.
 *
 * @return string
 */
function canterbury_church_address() {
	$parts = array_filter( array(
		canterbury_church_get( 'street' ),
		canterbury_church_get( 'city' ),
		canterbury_church_get( 'region' ),
		canterbury_church_get( 'postal' ),
	) );

	return implode( ', ', $parts );
}

/**
 * A maps link for the address.
 *
 * @return string
 */
function canterbury_church_maps_url() {
	$address = canterbury_church_address();
	if ( '' === $address ) {
		return '';
	}
	return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $address );
}

/**
 * A tel: link, with everything a dialler cannot use removed.
 *
 * @return string
 */
function canterbury_church_tel_url() {
	$phone = preg_replace( '/[^0-9+]/', '', canterbury_church_get( 'phone' ) );
	return $phone ? 'tel:' . $phone : '';
}

/**
 * A mailto: link.
 *
 * @return string
 */
function canterbury_church_mailto_url() {
	$email = canterbury_church_get( 'email' );
	return is_email( $email ) ? 'mailto:' . $email : '';
}

/**
 * Whether to show the template credit in the footer.
 *
 * @return bool
 */
function canterbury_church_show_credit() {
	return (bool) get_theme_mod( 'canterbury_church_show_credit', true );
}

/**
 * Shown in place of the primary menu until one is assigned, so a fresh install
 * is navigable instead of showing an empty bar.
 */
function canterbury_church_menu_fallback() {
	echo '<ul>';
	wp_list_pages( array( 'title_li' => '', 'depth' => 1 ) );
	echo '</ul>';
}

/**
 * Structured data describing the church.
 *
 * The HTML edition builds this in JavaScript from church.config.json; here it
 * is emitted server-side so it is in the markup a crawler first receives.
 */
function canterbury_church_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Church',
		'name'     => canterbury_church_get( 'name' ),
		'url'      => home_url( '/' ),
	);

	$street = canterbury_church_get( 'street' );
	if ( $street ) {
		$data['address'] = array_filter( array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $street,
			'addressLocality' => canterbury_church_get( 'city' ),
			'addressRegion'   => canterbury_church_get( 'region' ),
			'postalCode'      => canterbury_church_get( 'postal' ),
		) );
	}

	foreach ( array( 'telephone' => 'phone', 'email' => 'email' ) as $prop => $key ) {
		$value = canterbury_church_get( $key );
		if ( $value ) {
			$data[ $prop ] = $value;
		}
	}

	echo '<script type="application/ld+json">' .
		wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) .
		'</script>' . "\n";
}
add_action( 'wp_head', 'canterbury_church_schema' );
