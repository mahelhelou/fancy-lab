<?php
/**
 * Template Overrides for WooCommerce pages
 *
 * @package Fancy Lab
 */

/**
 * Why this method? Hooks used to add content -that comes from some function- to the page, so you can control how this content should look!
 * Use 'Simply show hooks By Stuart O'Brien, cxThemes' to show what's hook used to render that content on the page
 *
 */

// Modifying template filess using hooks & filters
function fancy_lab_wc_modify() {
  // Adding bootstrap .container and .row classes to wrap the page content
  function fancy_lab_open_container_row() {
    echo '<div class="container shop-content"><div class="row">';
  }

  add_action( 'woocommerce_before_main_content', 'fancy_lab_open_container_row', 5 ); // must have priority greater than 10, the default priority is 10

  // Adding closing <divs> for .container and .row classes
  function fancy_lab_close_container_row() {
    echo '</div></div>';
  }

  add_action( 'woocommerce_after_main_content', 'fancy_lab_close_container_row', 5 ); // should have the same priority as <opening tags>

  // Remove default sidebar then echo it again inside new sidebar tags
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

  // Add sidebar only to shop page and remove it from other pages
  if ( is_shop() ) {
    // Adding sidebar again after removing default sidebar that's generated by woocommerce. We remove it because it's in the wrong place!
    // 1. Add sidebar tags
    function fancy_lab_add_sidebar_tags() {
      echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
    }

    add_action( 'woocommerce_before_main_content', 'fancy_lab_add_sidebar_tags', 6 ); // (6) because we want it inside .container>.row, which have a value of (5)

    // 2. Add sidebar again using another hook (custom)
    add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 ); // (6: tags, 7: get_sidebar)

    // 3. Add closing sidebar tags
    function fancy_lab_close_sidebar_tags() {
      echo '</div>';
    }

    add_action( 'woocommerce_before_main_content', 'fancy_lab_close_sidebar_tags', 8 );

    // If we in Shop page, add a short description to the product
    add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );
  }

  function fancy_lab_add_shop_tags() {
    // The content size for shop page is 9 col, for other pages is 12
    if ( is_shop() ) {
      echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
    } else {
      echo '<div class="col">';
    }
  }

  add_action( 'woocommerce_before_main_content', 'fancy_lab_add_shop_tags', 9 );

  function fancy_lab_close_shop_tags(){
    echo '</div>';
  }

  add_action( 'woocommerce_after_main_content', 'fancy_lab_close_shop_tags', 4 );

  // (TEST): Testing filters hooks to make changes
  // Filters return only true or false
  // Filter: input -> processing -> output
  /*
  function fancy_lab_remove_shop_title( $val ) { // input
    $val = false; // processing (You can't return a string, just bool)
    return $val; // output
    // If one $param, you can write the function in a simpler way function x() { return false }
  }

  add_filter( 'woocommerce_show_page_title', 'fancy_lab_remove_shop_title' );
  */

}

add_action( 'wp', 'fancy_lab_wc_modify' );