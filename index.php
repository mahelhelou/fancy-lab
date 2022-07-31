<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fancy Lab
 */

get_header();
?>

<div class="content-area">

  <!-- Live ajax posts filter -->
  <div class="py-4">
    <div class="container">
      <form class="live-posts-filter-form">
        <?php
        $categories = get_categories(array(
          'hide_empty' => false,
          'orderby' => 'name',
          'order' => 'ASC',
          'exclude' => array(1)
        ));
      ?>
        <label for="live-posts-filter">Categories</label>
        <select class="form-control" name="livePostsFilter" id="live-posts-filter">
          <option value="*">All</option>
          <?php
          foreach ( $categories as $category ) { ?>
          <option value=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
          <?php } ?>
        </select>
      </form>
    </div>
  </div>

  <main class="blog-posts">
    <div class="container">
      <div class="row grid">
        <div class="col-12 col-md-8 col-lg-9 grid-item <?php
              $categories = get_the_category( get_the_ID() );
              foreach ( $categories as $category ) {
                echo $category->slug . ' ';
              }
            ?>">
          <?php if ( have_posts() ):
								while( have_posts() ): the_post();
									get_template_part( 'template-parts/content' );
								endwhile;

								// We're using numeric page navigation here.
								the_posts_pagination( array(
									'prev_text'		=> esc_html__( 'Previous', 'fancy-lab' ),
									'next_text'		=> esc_html__( 'Next', 'fancy-lab' ),
								));
							else:
						?>
          <p><?php esc_html_e( 'Nothing to display.', 'fancy-lab' ); ?></p>
          <?php endif; ?>
        </div>

        <!-- Sidebar from sidebar.php -->
        <?php get_sidebar(); ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>