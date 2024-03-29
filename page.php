<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Fancy Lab
 */

get_header();
?>
<div class="content-area">
  <main>
    <div class="container">
      <div class="row">
        <?php
							// If there are any posts
							if( have_posts() ):

								// Load posts loop
								while( have_posts() ): the_post();
									get_template_part( 'template-parts/content', 'page' );
								endwhile;
							else:
						?>
        <p>Nothing to display.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>