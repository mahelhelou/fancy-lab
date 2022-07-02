<?php

/*
Template Name: Home Page
*/

get_header(); ?>

<div class="content-area">
  <?php
    if ( current_user_can( 'administrator' ) ) { ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label for="numberOfBnousSessions">عدد الجلسات</label>
    <select name="numberOfBonusSessions">
      <option value="choose">--- عدد الجلسات الإضافية ---</option>
      <?php
        $args = [
          'post_type'       => 'product',
          'posts_per_page'  => -1
        ];

        $products = new WP_Query( $args );

        while ( $products->have_posts() ) {
          $products->the_post(); ?>
      <option value="<?php the_ID(); ?>"><?php the_ID(); ?></option>
      <?php }
        wp_reset_postdata();
      ?>
    </select>
    <label for="bonusSessionsNote">سبب منح العميل جلسات إضافية</label>
    <textarea name="bonusSessionsNote" cols="30" rows="10">لماذا تريد اضافه جلسات</textarea><br>
    <input name="bonusSessionsAction" type="submit" value="إضافه">
    <p>قام بإضافة الجلسات إلى رصيد العميل المُحرّر <?php the_author(); ?></p>
  </form>
  <?php }

  $bonus_sessions_note = $_POST['bonusSessionsNote'];
  $bonus_sessions_action = $_POST['bonusSessionsAction'];

  if ( isset( $bonus_sessions_action ) ) {
    if ( ! empty( $number_of_bonus_sessions ) && ! empty( $bonus_sessions_note ) ) {

    global $woocommerce;

    $product = filter_input( INPUT_POST, 'numberOfBonusSessions', FILTER_SANITIZE_STRING );

    // Create the order
    $order = wc_create_order();

    // Set customer id
    $order->set_customer_id( apply_filters( 'woocommerce_checkout_customer_id', get_current_user_id() ) );

    // Add product id
    // $order->add_product( get_product( 50 ), 1 );
    $order->add_product( get_product( 50 ), 1 );

    // Attach notes with the order
    $order->set_customer_note( isset( $bonus_sessions_note ) ? $bonus_sessions_note: '' );

  }
  }



  ?>

  <main>
    <section class="slider">
      <div class="flexslider">
        <ul class="slides">
          <?php
            /**
             * Getting data from Customizer to display the Slider section
             * 4 == we want only 3 slides
             * We started from 1 because our options in Customizer starts from 1
             */
            for ( $i = 1; $i < 4; $i++ ) {
              $slider_page_[$i] = get_theme_mod( 'set_slider_page_' . $i );
              $slider_button_text_[$i] = get_theme_mod( 'set_slider_button_text_' . $i );
              $slider_button_url_[$i] = get_theme_mod( 'set_slider_button_url_' . $i );
            }

            $args = [
              'post_type'				=> 'page',
              'posts_per_page'	=> 3,
              'post__in'				=> $slider_page_, // page-id array(1, 2..)
              'orderby'					=> 'post__in' // order by id
            ];

            $slides = new WP_Query( $args );

            $j = 1;
            while ( $slides->have_posts() ) {
              $slides->the_post(); ?>
          <li>
            <?php the_post_thumbnail( 'fancy-lab-slider', array( 'class'	=> 'img-fluid' ) ); ?>
            <div class="container">
              <div class="slider-details-container">
                <div class="slider-title">
                  <h1><?php the_title(); ?></h1>
                </div>
                <div class="slider-description">
                  <div class="subtitle"><?php the_content(); ?></div>
                  <a class="link"
                    href="<?php echo esc_url( $slider_button_url_[$j] ); ?>"><?php echo esc_html( $slider_button_text_[$j] ); ?></a>
                </div>
              </div>
            </div>
          </li>
          <?php
						$j++;
						}
							wp_reset_postdata();
						?>
        </ul>
      </div>
    </section>

    <?php
    // All products will appear only if woocommerce plugin is installed
    if ( class_exists( 'WooCommerce' ) ): ?>
    <!-- Popular products -->
    <section class="popular-products">
      <?php
        // Second param is backup if no value in customizer
        $popular_limit	= get_theme_mod( 'set_popular_max_num', 4 );
        $popular_col 		= get_theme_mod( 'set_popular_max_col', 4 );
        $arrivals_limit	= get_theme_mod( 'set_new_arrivals_max_num', 4 );
        $arrivals_col		= get_theme_mod( 'set_new_arrivals_max_col', 4 );
			?>
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_popular_title', __( 'Popular products', 'fancy-lab' ) ) ); ?>
          </h2>
        </div>
        <?php
          // Static query to get popular products
          // echo do_shortcode( '[products limit="4" columns="4" orderby="popularity"]' );

          // Dynamic query to get popular products
          echo do_shortcode( '[products limit=" ' . esc_attr( $popular_limit ) . ' " columns=" ' . esc_attr( $popular_col ) . ' " orderby="popularity"]' );
        ?>
      </div>
    </section>
    <!-- popular-products-end -->

    <!-- New arrivals -->
    <section class="new-arrivals">
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_new_arrivals_title', __( 'New Arrivals', 'fancy-lab' ) ) ); ?>
          </h2>
        </div>
        <?php
        // Dynamic query to get new arrivals products
        echo do_shortcode( '[products limit=" ' . esc_attr( $arrivals_limit ) . ' " columns=" ' . esc_attr( $arrivals_col ) . ' " orderby="date"]' ); ?>
      </div>
    </section>
    <!-- new-arrivals-end -->

    <?php
      /**
       * This option will be optional in customizer, the user can enable/disable it using checkbox
       * 0: by default this section is false/disabled
       */
      $showDeal       = get_theme_mod( 'set_deal_show', 0 ); // status
      $dealProductId  = get_theme_mod( 'set_deal' ); // product-id
      $currency       = get_woocommerce_currency_symbol(); // woocom settings
      // get_post_meta(id, DB_field_name, isRenderedToScreen?)
      $regular	= get_post_meta( $dealProductId, '_regular_price', true );
      $sale 		= get_post_meta( $dealProductId, '_sale_price', true );

    if ( $showDeal && ( !empty( $dealProductId ) ) ):
      // Simple equation to calculate discount percentage
      $discount       = absint( 100 - ( ( $sale / $regular ) * 100 ) );
      $discount_rate  = '%' . $discount;
    ?>
    <!-- Deal of the week -->
    <section class="deal-of-the-week">
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_deal_title', __( 'Deal of the Week', 'fancy-lab' ) ) ); ?></h2>
        </div>
        <div class="row d-flex align-items-center">
          <div class="deal-img col-md-6 col-12 ml-auto text-center">
            <?php
            /**
             * Because we are outside the loop and we don't know the post-id, we use (echo get_the_post_thumbnail( $id, $img-size, $extras ))
             * You have to choose a $dealProductId or post-id in customizer to show the image
             */
            echo get_the_post_thumbnail( $dealProductId, 'large', array( 'class' => 'img-fluid' ) ); ?>
          </div>
          <div class="deal-desc col-md-4 col-12 mr-auto text-center">

            <?php
            // The condition is to ensuare that no 100% discount!
            if ( !empty( $sale ) ): ?>
            <span class="discount">
              <?php echo esc_html( $discount_rate ) . esc_html__( ' OFF', 'fancy-lab' ); ?>
            </span>
            <?php endif; ?>
            <h3>
              <a
                href="<?php echo esc_url( get_permalink( $dealProductId ) ); ?>"><?php echo esc_html( get_the_title( $dealProductId ) ); ?></a>
            </h3>
            <p><?php echo esc_html( get_the_excerpt( $dealProductId ) ); ?></p>
            <div class="prices">
              <span class="regular">
                <?php
                  echo esc_html( $currency );
                  echo esc_html( $regular );
                ?>
              </span>
              <?php if ( !empty( $sale ) ): ?>
              <span class="sale">
                <?php
                  echo esc_html( $currency );
                  echo esc_html( $sale );
                  ?>
              </span>
              <?php endif; ?>
            </div>
            <!-- Give the id of the item to be added to cart -->
            <a href="<?php echo esc_url( '?add-to-cart=' . $dealProductId ); ?>"
              class="add-to-cart"><?php esc_html_e( 'Add to Cart', 'fancy-lab' ); ?></a>
          </div>
        </div>
      </div>
    </section>
    <!-- deal-of-the-week-end -->

    <?php endif; // end showing deal section ?>
    <?php endif; // end if class_exists 'WooCommerce' ?>

    <!-- Blog posts -->
    <section class="lab-blog">
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_blog_title', __( 'News From Our Blog', 'fancy-lab' ) ) ); ?></h2>
        </div>
        <div class="row">
          <?php
          $blog_posts = new WP_Query( array(
            'post_type'				=> 'post',
            'posts_per_page'	=> 2
          ) );

          // If there are any posts
          if ( $blog_posts->have_posts() ):
            while( $blog_posts->have_posts() ): $blog_posts->the_post();
          ?>
          <article class="col-12 col-md-6">
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ):
                  the_post_thumbnail( 'fancy-lab-blog', array( 'class' => 'img-fluid' ) );
                endif;
              ?>
            </a>
            <h3 class="mt-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </article>
          <?php
            endwhile;
            wp_reset_postdata();
          else: ?>
          <p><?php esc_html_e( 'Nothing to display.', 'fancy-lab' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- blog-posts-end -->
  </main>
</div>

<?php get_footer(); ?>