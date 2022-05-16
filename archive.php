<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fancy Lab
 */

get_header();
?>

<div class="content-area">
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-9">
          <?php
            the_archive_title( '<h1 class="article-title">', '</h1>' );

            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();

                get_template_part( 'template-parts/content', 'archive' );
              }

              // We're using numeric page navigation here.
              the_posts_pagination( array(
                'prev_text'		=> esc_html__( 'Previous', 'fancy-lab' ),
                'next_text'		=> esc_html__( 'Next', 'fancy-lab' ),
              ) );

            } else { ?>
          <p><?php esc_html_e( 'Nothing to display.', 'fancy-lab' ); ?></p>
          <?php } ?>
        </div>

        <!-- Sidebar from sidebar.php -->
        <?php get_sidebar(); ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>