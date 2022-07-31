jQuery(function ($) {
	// Add ajax filter support to blog posts
	$('.live-posts-filter-form').on('change', function (e) {
		e.preventDefault()

		let activeCategoryFilter = $(this).find('#live-posts-filter option:selected').val()

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: {
				action: 'live_posts_filter',
				filter: activeCategoryFilter,
				category: $('#live-posts-filter option:selected').data('slug')
			},
			type: 'post',
			success: function (data) {
				$('.blog-posts').html(data)
			}
		})
	})
})
