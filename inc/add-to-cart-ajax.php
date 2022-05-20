<?php

/**
 * Add to Cart by Ajax
 *
 * @package Fancy Lab
 */

function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start(); ?>

<!-- The HTML span that contents tht cart items count -->
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}