$(document).ready(function(){
	$('.car-type').on('click', function(){
		var img = $(this).attr('data-img');

		$('.car-display').transition('fade left');
		setTimeout(
				function ()
				{
					$('.car-display').attr('src', 'assets/car-types/' + img);
					$('.car-display').transition('fade left');
				}, 300);

			

	});
});