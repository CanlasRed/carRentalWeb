$(document).ready(function(){

	filter_data();

	function filter_data(){

		var order = $('#hidden_order').val();
		
		var priceMin = $('#priceMin').val();
		var priceMax = $('#priceMax').val();
		var type = get_filter('car_type');
		var transmission = get_filter('car_transmission');
		$.ajax({
			url: "php/fetch_cars.php",
			method:"post",
			data:{
				action: 'fetch_data',
				priceMin: priceMin,
				priceMax: priceMax,
				type: type,
				transmission: transmission,
				order: order
			},
			success:function(data){
				$('#car-list-container').html(data);
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