$(document).ready(function(){

	filter_data();

	function filter_data(){

		var order = $('#hidden_order').val();
		var search = $('#searchbox').val();
		var priceMin = $('#priceMin').val();
		var priceMax = $('#priceMax').val();
		var type = get_filter('car_type');
		var transmission = get_filter('car_transmission');
		var capacity = get_filter('car_capacity');
		var color = get_filter('car_color');
		$.ajax({
			url: "php/fetch_cars.php",
			method:"post",
			data:{
				action: 'fetch_data',
				priceMin: priceMin,
				priceMax: priceMax,
				search: search,
				type: type,
				transmission: transmission,
				capacity: capacity,
				order: order,
				color: color
			},
			success:function(data){
				$('#car-list-container').html(data);
				$('.ui.rating')
		          .rating({
		            maxRating: 5
		          })
		          .rating('disable');
		        ;
			}
		})
	}

	function get_filter(class_name){
		var filter = [];
		$('.'+class_name+':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	$(document).on('click', '.common_selector', function(){
		filter_data();
	});


});