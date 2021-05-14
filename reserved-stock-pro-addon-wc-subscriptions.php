<?php
/**
 * Plugin Name:       Reserved Stock Pro | Add-on - WPML
 * Plugin URI:        https://puri.io/plugin/reserve-stock-pro-for-woocommerce/
 * Description:       Example Add-on enables product reservations sync across all WPML languages. Tested with WPML 4.4.10
 * Version:           1.0.0
 * Author:            Puri.io
 * Author URI:        https://puri.io/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Check if the product ID belongs to a translated product, if so - find the orginal product id.
 *
 * Hooks used:
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605256
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605535
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605607
 */
function puri_custom_rsp_wpml_find_default_language_product_id( $product_id ) {

	// Make sure the WPML function is available.
	if ( function_exists( 'icl_object_id' ) ) {

		// Fetch the default language code.
		$default_language = apply_filters( 'wpml_default_language', null );

		// Current language may not be current at various WC steps, not using it for now.
		// $current_language = apply_filters( 'wpml_current_language', null );

		// Find the orginal product id for our default language. Fallback to this product if none is found.
		$product_id = icl_object_id( $product_id, 'product', $product_id, $default_language );
	}

	return $product_id;
}
add_filter( 'reserved_stock_pro_handle_product_id', 'puri_custom_rsp_wpml_find_default_language_product_id', 10 );
