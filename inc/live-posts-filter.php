<?php

/**
 * Live posts ffilter
 * @package Fancy Lab
 */

add_action('wp_ajax_live_posts_filter','live_posts_filter');
add_action('wp_ajax_nopriv_live_posts_filter','live_posts_filter');

function live_posts_filter() {
  $catagory_filters = $_POST['livePostsFilter'];

  foreach($catagory_filters as $category_filter){
    $args = array(
        'post_type'=> 'post',
        'orderby'    => 'ID',
        'category_name' => $category_filter,
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' =>-1 // this will retrive all the post that is published
        );

        
        $result = new WP_Query( $args );
        if ( $result-> have_posts() ) :
         while ( $result->have_posts() ) : $result->the_post();
             $link = get_permalink();
            echo '<a href="'.$link.'" target="_blank">';
            echo '<div class="service-wrapper" style="border:1px solid #367bae;">';

              $title= get_the_title();
                echo '<center><div style="color:#367bae;font-size:22px;font-weight:700;position: relative;margin-top: 25%;padding:5%;">'.$title.'</div></center>';
          echo '<div class="service-wrapper-inner">';
          //$title= get_the_title();
          //echo '<h3>'.$title.'</h3>';
           echo '<center><i style="font-size:18px;color:#fff;-webkit-transition: 1s;-moz-transition: 1s;-ms-transition: 1s;-o-transition: 1s; transition: 1s;" class="fa fa-bars"></i></center>';
          $excerpt= the_excerpt();
          echo '<div class="description"><p>'.$excerpt.'</p></div></div></div></a>';
          endwhile;
          endif;
          wp_reset_postdata();
  }
}

// function live_posts_filter() {
//   $category_slug = $_POST['livePostsFilter'];

//   $ajax_posts = new WP_Query([
//     'post_type'       => 'post',
//     'posts_per_page'  => -1,
//     'category_name'   => $category_slug,
//     'orderby'         => 'menu_order',
//     'order'           => 'desc',
//   ]);

//   $response = '';

//   if ( $ajax_posts->have_posts() ) {
//     while ( $ajax_posts->have_posts() ) : $ajax_posts->the_post();

//       $response .= get_template_part('templates/_components/project-list-item');
//     endwhile;
//   } else {
//     $response = 'empty';
//   }

//   echo $response;
//   exit;
// }

// add_action('wp_ajax_live_posts_filter', 'live_posts_filter');
// add_action('wp_ajax_nopriv_live_posts_filter', 'live_posts_filter');