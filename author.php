<?php get_header(); ?>

<div class="py-5 bg-light">
  <div class="container">
    <h4 class="mb-4">Author Page for Testing Purposes!</h4>
    <p>Hi! My name is <strong><?php echo get_author_name(); ?></strong>, and my id is
      <strong><?php echo get_the_author_ID(); ?></strong>
    </p>

    <!-- Buttons -->
    <a href="#" class="btn btn-primary px-5 py-3 d-none d-md-block" data-toggle="modal"
      data-target="#modal<?php the_ID(); ?>">Web
      View</a>
    <a href="<?php the_field( 'author_profile_deep_link' ); ?>"
      class="btn btn-primary px-5 py-3 d-block d-md-none">Mobile View</a>
  </div>
</div>

<!-- Modal for QR code -->
<div class="modal fade" id="modal<?php the_ID(); ?>" tabindex="-1" role="dialog"
  aria-labelledby="modal<?php the_ID(); ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Scan the QR Code to book the session!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <img src="<?php echo get_field( 'author_profile_qr' )['url']; ?>" alt="Author QR Code" height="300">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>