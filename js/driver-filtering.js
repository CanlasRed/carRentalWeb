$(document).ready(function(){

	filter_data();

	function filter_data(){

		var order = $('#hidden_order').val();
		
		var priceMin = $('#priceMin').val();
		var priceMax = $('#priceMax').val();
		var ageMin = $('#ageMin').html();
		var ageMax = $('#ageMax').html();
		var gender = get_filter('driver_gender');
		var vaccine = get_filter('driver_vaccine');
		$.ajax({
			url: "php/fetch_drivers.php",
			method:"post",
			data:{
				action: 'fetch_data',
				priceMin: priceMin,
				priceMax: priceMax,
				ageMin: ageMin,
				ageMax: ageMax,
				gender: gender,
				vaccine: vaccine,
				order: order
			},
			success:function(data){
				$('#driver-list-container').html(data);
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