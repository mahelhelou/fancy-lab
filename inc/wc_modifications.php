<?php
/**
 * Template Overrides for WooCommerce pages
 *
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 *
 * @package Fancy Lab
 */

// Modifying template filess using hooks & filters
function fancy_lab_wc_modify() {
  add_action( 'woocommerce_before_main_content', 'fancy_lab_open_container_row', 5 ); // Must have priority greater than 10, the default priority
  function fancy_lab_open_container_row(){
    echo '<div class="container shop-content"><div class="row">';
  }

  add_action( 'woocommerce_after_main_content', 'fancy_lab_close_container_row', 5 ); // have the same priority as <opening tags>
  function fancy_lab_close_container_row(){
    echo '</div></div>';
  }

  // Remove default sidebar then echo it again inside new sidebar tags
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

  // Add sidebar only to shop page and remove it from other pages
  if ( is_shop() ) {
    add_action( 'woocommerce_before_main_content', 'fancy_lab_add_sidebar_tags', 6 );
    function fancy_lab_add_sidebar_tags(){
      echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
    }

    // Add sidebar again, but using another hook (custom)
    add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 );

    add_action( 'woocommerce_before_main_content', 'fancy_lab_close_sidebar_tags', 8 );
    function fancy_lab_close_sidebar_tags(){
      echo '</div>';
    }

    // Adding short description to the product
    add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );
  }

  add_action( 'woocommerce_before_main_content', 'fancy_lab_add_shop_tags', 9 );
  function fancy_lab_add_shop_tags(){
    // The content size for shop page is 9 col, for other pages is 12
    if ( is_shop() ) {
      echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
    } else {
      echo '<div class="col">';
    }
  }

  add_action( 'woocommerce_after_main_content', 'fancy_lab_close_shop_tags', 4 );
  function fancy_lab_close_shop_tags(){
    echo '</div>';
  }

  // TEST: Testing filters hooks to make changes
  // Filter: input -> processing -> output
  /* add_filter( 'woocommerce_show_page_title', 'fancy_lab_remove_shop_title' );
  function fancy_lab_remove_shop_title( $val ) { // input
    $val = false; // processing (You can't return a string, just bool)
    return $val; // output
    // If one $param, you can write the function in a simpler way function x() { return false }
  } */

}

add_action( 'wp', 'fancy_lab_wc_modify' );