<?php
/**
 * A header template of our website
 *
 * @package Fancy Lab
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header>
			<div class="search">
				<div class="container">
					<div class="text-center d-md-flex align-items-center">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="brand col-12 col-md-3 col-lg-2 text-center text-md-left">
							<!-- Dynamic/custom logo feature -->
							<a href="<?php echo esc_url(home_url('/')); // or site_url() ?>">
								<?php if (has_custom_logo()) {
									the_custom_logo();
								} else { ?>
									<p>
										<?php bloginfo('title'); ?>
									</p>
									<span>
										<?php bloginfo('description'); ?>
									</span>
								<?php }
								?>
							</a>
						</div>
						<div class="second-column col-12 col-md-9 col-lg-10">
							<div class="row">
								<?php if (class_exists('WooCommerce')) { ?>
									<div class="account col-12">
										<div class="navbar-expand">
											<ul class="navbar-nav float-left">
												<?php if (is_user_logged_in()) { ?>
													<li>
														<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
															class="nav-link"><?php esc_html_e('My Account', 'fancy-lab'); ?></a>
													</li>
													<li>
														<a href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))); ?>"
															class="nav-link"><?php esc_html_e('Logout', 'fancy-lab'); ?></a>
													</li>
													<!-- To allow registration in My account page, go to WooCommerce -> Settings -> Accounts and privacy -> `Allow customers to create an account on the "My account" page` -->
												<?php } else { ?>
													<li>
														<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
															class="nav-link"><?php esc_html_e('Login / Register', 'fancy-lab'); ?></a>
													</li>
												<?php }
												?>
											</ul>
										</div>

										<!-- Adding shopping cart to the website -->
										<div class="cart text-right">
											<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><span class="cart-icon"></span></a>
											<span class="items">
												<?php echo esc_html(WC()->cart->get_cart_contents_count()); ?>
											</span>
										</div>
									</div>
								<?php }
								?>
								<div class="col-12">
									<!-- Copied from navwalker github documentation -->
									<nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
											data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" `
											aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'fancy-lab'); ?>">
											<span class="navbar-toggler-icon"></span>
										</button>
										<!-- <a class="navbar-brand" href="#">Navbar</a> -->
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'fancy_lab_main_menu',
												'depth' => 3,
												// (sub sub menu) Number of menu levels
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'container_id' => 'bs-example-navbar-collapse-1',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
												'walker' => new WP_Bootstrap_Navwalker(),
											)
										);
										?>
									</nav>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</header>
