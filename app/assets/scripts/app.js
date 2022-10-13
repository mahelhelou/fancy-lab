jQuery(function ($) {
	$('#live-posts-filter').on('change', function () {
		let filter = $(this).val()

		if (filter === 'all') {
			$('#live-posts-list .post').show(300)
		} else {
			$('#live-posts-list .post').hide(100)
			$('#live-posts-list ' + filter).show(200)
		}
	})

	$.ajax({
		type: 'POST',
		url: '/wp-admin/admin-ajax.php',
		dataType: 'html',
		data: {
			action: 'filter_projects',
			category: $(this).data('slug')
		},
		success: function (res) {
			$('.project-tiles').html(res)
		}
	})
})
