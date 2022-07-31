<?php

/**
 * Live posts ffilter
 * @package Fancy Lab
 */

function live_posts_filter() {
  $category_slug = $_POST['livePostsFilter'];

  $ajax_posts = new WP_Query([
    'post_type'       => 'post',
    'posts_per_page'  => -1,
    'category_name'   => $category_slug,
    'orderby'         => 'menu_order',
    'order'           => 'desc',
  ]);

  $response = '';

  if ( $ajax_posts->have_posts() ) {
    while ( $ajax_posts->have_posts() ) : $ajax_posts->the_post();

      $response .= get_template_part('templates/_components/project-list-item');
    endwhile;
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
}

add_action('wp_ajax_live_posts_filter', 'live_posts_filter');
add_action('wp_ajax_nopriv_live_posts_filter', 'live_posts_filter');