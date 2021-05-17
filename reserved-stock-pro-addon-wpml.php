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
 * Hooks:
 * https://wpml.org/wpml-hook/wpml_object_id/
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605256
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605535
 * https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-605607
 */
function puri_custom_rsp_wpml_find_default_language_product_id( $product_id ) {

	$default_language_code = apply_filters( 'wpml_default_language', null );
	$current_language_code = apply_filters( 'wpml_current_language', null );

	if ( $default_language_code !== $current_language_code ) {
		$product_id = apply_filters( 'wpml_object_id', $product_id, 'product', true, $default_language_code );
	}

	return $product_id;
}
add_filter( 'reserved_stock_pro_handle_product_id', 'puri_custom_rsp_wpml_find_default_language_product_id', 10 );
