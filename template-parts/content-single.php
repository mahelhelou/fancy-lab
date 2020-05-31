<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fancy Lab
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
      <h1><?php the_title(); ?></h1>
      <div class="meta">
      <p><?php _e( 'Published by', 'fancy-lab' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', 'fancy-lab' ); ?> <?php echo get_the_date(); ?>
            <br />
            <?php if( has_category() ): ?>
                <?php _e( 'Categories', 'fancy-lab' ); ?>: <span><?php the_category( ' ' ); ?></span>
            <?php endif; ?>
            <br/>
            <?php if(has_tag()): ?>
                <?php _e( 'Tags', 'fancy-lab' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
            <?php endif; ?>
            </p>
      </div>
      <div class="post-thumbnail">
          <?php
          if( has_post_thumbnail() ):
              the_post_thumbnail( 'fancy-lab-blog', array( 'class' => 'img-fluid') );
          endif;
          ?>
      </div>
  </header>
  <div class="content">
    <!-- In the case if there's a huge content, this function divides the content into numbered pages. You have to use break pages in editor you use -->
    <?php
      // Test for post titled: Post 10
      wp_link_pages( array(
          'before'	=> '<p class="inner-pagination">' . __( 'Pages', 'fancy-lab' ),
          'after'		=> '</p>',
        ) );
    ?>
    <?php the_content(); ?>
  </div>
</article>