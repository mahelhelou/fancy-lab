<?php
/**
 * Template for displaying search forms in Fancy Lab
 *
 * @package Fancy Lab
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="search" class="search-field"
    placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'fancy-lab' ); ?>"
    value="<?php echo get_search_query(); ?>" name="s" />
  <button type="submit" class="search-submit">
    <span class="screen-reader-text">
      <?php echo _x( 'Search', 'submit button', 'fancy-lab' ); ?>
    </span>
  </button>
  <!-- Because we want to distribute the theme and we can use it without woocommerce plugin -->
  <?php
    // Make search feature works for every theme, not for woocommerce only
    if ( class_exists( 'WooCommerce' ) ) { ?>
      <!-- Because it's woocommerce store, include only products in the search results -->
      <input type="hidden" value="product" name="post_type" id="post_type">
    <?php }
  ?>
</form>