<?php

/**
 * Add to Cart by Ajax
 *
 * @package Fancy Lab
 */

/**
 * Update shopping cart using ajax, without need to refresh the page
 * This function comes from WooCommerce documentation
 */
function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

	ob_start(); ?>

<!-- The HTML tag we specified for shopping cart item -->
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}