<?php

/*
Template Name: Home Page
*/

get_header(); ?>

<div class="content-area">
  <main>
    <section class="slider">
      <div class="flexslider">
        <ul class="slides">
          <?php
							// Getting data from Customizer to display the Slider section
							// 4 == we want only 3 slides
							for ( $i = 1; $i < 4; $i++ ) {
								$slider_page_[$i] = get_theme_mod( 'set_slider_page_' . $i );
								$slider_button_text_[$i] = get_theme_mod( 'set_slider_button_text_' . $i );
								$slider_button_url_[$i] = get_theme_mod( 'set_slider_button_url_' . $i );
							}

							$slider_loop = new WP_Query( array(
								'post_type'				=> 'page',
								'posts_per_page'	=> 3,
								'post__in'				=> $slider_page_, // page-id array(1, 2..)
								'orderby'					=> 'post__in' // order by id
							) );

							$j = 1;
							while ( $slider_loop->have_posts() ) {
								$slider_loop->the_post(); ?>
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
                    href="<?php echo esc_url( $slider_button_url[$j] ); ?>"><?php echo esc_html( $slider_button_text_[$j] ); ?></a>
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

    <!-- All products will appear only if woocommerce plugin is installed -->
    <?php if ( class_exists( 'WooCommerce' ) ): ?>
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
        <?php echo do_shortcode( '[products limit=" ' . esc_attr( $popular_limit ) . ' " columns=" ' . esc_attr( $popular_col ) . ' " orderby="popularity"]' ); ?>
      </div>
    </section>
    <section class="new-arrivals">
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_new_arrivals_title', __( 'New Arrivals', 'fancy-lab' ) ) ); ?>
          </h2>
        </div>
        <?php echo do_shortcode( '[products limit=" ' . esc_attr( $arrivals_limit ) . ' " columns=" ' . esc_attr( $arrivals_col ) . ' " orderby="date"]' ); ?>
      </div>
    </section>
    <!-- This option will be optional in customizer, the user can enable/disable it using checkbox -->
    <?php
					// 0: by default this section is false/disabled
					$showdeal	= get_theme_mod( 'set_deal_show', 0 ); // status
					$deal 		= get_theme_mod( 'set_deal' ); // product-id
					$currency	= get_woocommerce_currency_symbol(); // woocom settings
					// get_post_meta(id, DB_field_name, isRenderedToScreen?)
					$regular	= get_post_meta( $deal, '_regular_price', true );
					$sale 		= get_post_meta( $deal, '_sale_price', true );

					if ( $showdeal == 1 && ( !empty( $deal ) ) ):
						// Simple equation to calculate discount percentage
						$discount_percentage = absint( 100 - ( ( $sale / $regular ) * 100 ) );
				?>
    <section class="deal-of-the-week">
      <div class="container">
        <div class="section-title">
          <h2><?php echo esc_html( get_theme_mod( 'set_deal_title', __( 'Deal of the Week', 'fancy-lab' ) ) ); ?></h2>
        </div>
        <div class="row d-flex align-items-center">
          <div class="deal-img col-md-6 col-12 ml-auto text-center">
            <!-- Because we are outside the loop and we don't know the post-id, we use (echo get_the_post_thumbnail( $id, $img-size, $extras )) -->
            <!-- You have to choose a $deal or post-id in customizer to show the image -->
            <?php echo get_the_post_thumbnail( $deal, 'large', array( 'class' => 'img-fluid' ) ); ?>
          </div>
          <div class="deal-desc col-md-4 col-12 mr-auto text-center">
            <!-- The condition is to ensuare that no 100% discount! -->
            <?php if ( !empty( $sale ) ): ?>
            <span class="discount">
              <?php echo esc_html( $discount_percentage ) . esc_html__( '% OFF', 'fancy-lab' ); ?>
            </span>
            <?php endif; ?>
            <h3><a
                href="<?php echo esc_url( get_permalink( $deal ) ); ?>"><?php echo esc_html( get_the_title( $deal ) ); ?></a>
            </h3>
            <p><?php echo esc_html( get_the_excerpt( $deal ) ); ?></p>
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
            <a href="<?php echo esc_url( '?add-to-cart=' . $deal ); ?>"
              class="add-to-cart"><?php esc_html_e( 'Add to Cart', 'fancy-lab' ); ?></a>
          </div>
        </div>
      </div>
    </section>
    <?php endif; // end showing deal section ?>
    <?php endif; // end if class_exists 'WooCommerce' ?>
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
              <?php
													if( has_post_thumbnail() ):
														the_post_thumbnail( 'fancy-lab-blog', array( 'class' => 'img-fluid' ) );
													endif;
												?>
            </a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
  </main>
</div>
<?php get_footer(); ?>