$(function () {
	// Filter items on select change
	let $grid = $('.grid').isotope({
		// select.search-list
		itemSelector: '.grid-item',
		layoutMode: 'fitRows'
	})

	// bind filter on select change
	$('#live-posts-filter').on('change', function () {
		// get filter value from option value
		let filterValue = this.value
		// use filterFn if matches value
		$grid.isotope({ filter: filterValue })
	})
})
