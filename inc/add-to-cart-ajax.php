<<<<<<< HEAD
<?php

/**
 * Add to Cart by Ajax
 *
 * @package Fancy Lab
 */
=======
<?php // Fancy Lab - Add to Cart by Ajax
>>>>>>> 6f6bc2c528d81f015fb0a3aff2e8aaacb4fd13c0

/**
 * Update shopping cart using ajax, without need to refresh the page
 * This function comes from WooCommerce documentation
 */
function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

	ob_start(); ?>

<<<<<<< HEAD
<!-- The HTML tag we specified for shopping cart item -->
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

<?php
=======
	<!-- The HTML tag we specified for shopping cart item -->
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

	<?php
>>>>>>> 6f6bc2c528d81f015fb0a3aff2e8aaacb4fd13c0
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}