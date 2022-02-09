<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Speedy</title>
	<link rel="icon" type="icon" href="favicon.ico">

	<?php include 'header.php'; ?>
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container">
		<section id="showroom">
			<div class="row">
				<div class="col-lg-6">
					<div class="align-middle">
						<div>
							<h1 style="font-size: 5vmin; font-weight: bold; font-family: poppins;">Start Your Hassle Free Travel Now With Speedy</h1>
						</div>
						<br>
						<div>
							<p style="font-size:1.5rem">Rent a car? with or without driver? want driver only? do you own a car for rent? With Speedy we make all that possible speed and sound</p>
						</div>
						<br>
						<div class="ui vertical animated black button rounded-pill" tabindex="0">
				            <div class="hidden content">Book Now</div>
				            <div class="visible content">
				              Book Now
				            </div>
				         </div>
					</div>
				</div>

				<div class="col-lg-6" id="showroom-car">
					<img class="car-display" src="assets/car-types/hatchback.png" height="600" hidden>
				</div>
			</div>
		</section>

		<?php
			include 'php/connection.php';
			$sql = "SELECT * FROM tbl_car_types";
			$result = mysqli_query($dbconn, $sql);
		?>


		<section id="car-types">
			<div class="row">
			 <div class="items">
			 	<?php foreach($result as $row) { ?>
			     <div class="car-type" data-img="<?php echo $row['image'];?>" data-id="<?php echo $row['typeID'] ?>">
			     	<img src="assets/car-types/<?php echo $row['icon'];?>"><?php echo $row['name'];?>
			     </div>
			 	<?php } ?>
			 </div>
			</div>
		</section>


		<section id="mobile_app">
			<div class="row">
				<div class="col-lg-6">
					<div class="align-middle">
						<div>
							<h1 style="font-size: 5vmin; font-weight: bold; font-family: poppins;">Start Your Hassle Free Travel Now With Speedy</h1>
						</div>
						<br>
						<div>
							<p style="font-size:1.5rem">Rent a car? with or without driver? want driver only? do you own a car for rent? With Speedy we make all that possible speed and sound</p>
						</div>
						<br>
						<div class="ui vertical animated black button rounded-pill" tabindex="0">
				            <div class="hidden content">Book Now</div>
				            <div class="visible content">
				              Book Now
				            </div>
				         </div>
					</div>
				</div>

				<div class="col-lg-6" id="showroom-car">
					<img class="car-display" src="assets/car-types/hatchback.png" height="600" hidden>
				</div>
			</div>
		</section>


	</div>

	<style type="text/css">
		.slick-prev:before {
		  color: black;
		}
		.slick-next:before {
		  color: black;
		}
	</style>



	<?php include 'scripts.php'; ?>
	<script type="text/javascript" src="js/type_preview.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(
				function ()
				{
					$('.car-display').transition('fade left');
				}, 100);
		});

		$('.items').slick({
			  infinite: true,
			  speed: 300,
			  slidesToShow: 5,
			  slidesToScroll: 1,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 1,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
		});

		$(window).scroll(function(){
	        if($(window).scrollTop() <= 50){
	            $(".navbar").css({"background-color":"transparent"});   
	        }
	        else{
	            $(".navbar").css({"background-color":"#fff"});
	        }

    	})

	</script>
</body>
</html>