<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Speedy</title>
	

	<?php include 'header.php'; ?>
</head>
<body>

	<?php 

	include 'navbar.php'; ?>

	<div class="container">
		<section id="showroom">
			<div class="row">
				<div class="col-lg-6 slide-right" hidden>
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


		<section id="car-types" class="mb-5">
			<div class="row">
				<div class="col-6">
					<h6 class="bold-text">Categories</h6>
				</div>
				<div class="col-6">
					<h6 class="float-end bold-text"><a class="link-text" href="">View All <i class="arrow right icon"></i></a></h6>
				</div>
			</div>
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


		<section id="nearby" class="mt-5 py-5">
			<div class="row">
				<div class="col-lg-12 py-5 text-center">
						<div class="align-middle">
							<div>
								<h3 style="font-weight: bold; font-family: poppins;">Rent Cars Nearby</h3>
							</div>
							<br>
							<div>
								<div class="ui fluid huge left icon input">
								  <input type="text" placeholder="Enter your street and house number">
								  <i class="map marker alternate icon"></i>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card-deck">
					 <div class="nearby-slick">
					 	<?php for ($i=0;$i<=5;$i++){ ?>
						  <div class="card">
						  	<div class="card-header">
						  		<div class="container-fluid" style="padding: 0;">
							  		<div class="row" style="display: flex; padding: 0;">
								    	<div class="col-sm-6">
								    		<div class="card-title">Kia Picanto</div>
								    	</div>
								    	<div class="col-sm-6">
								    		<div class="float-end">Kia Logo</div>
								    	</div>
									</div>
								</div>
							 </div>
						    <img class="card-img-top" src="assets/car-types/hatchback.png" alt="Card image cap">
						    <div class="card-body">
						      <h5 class="card-title">7,000/<small>day</small></h5>
						      <ul>
						      	<li>120kph</li>
						      	<li>4 seater</li>
						      	<li>Cool AC</li>
						      	<li>100L compartment</li>
						      </ul>
						    </div>
						    <div class="card-footer">
						      <small class="text-muted"> <i class="map marker alternate icon"></i> Olongapo City, Zambales</small>
						    </div>
						  </div>
						<?php } ?>


						</div>
					 </div>
				</div>

			</div>
		</section>


		<section id="features">
			<div class="row pb-5">
				<div class="col-12" style="text-align: center;"><h4>Features</h4></div>
			</div>
			<div class="row" >
				<div class="col-md-4 my-4">
					<box-icon name='car' size="lg" type='solid' color='#ffffff' ></box-icon>
					<h6>Rent A Car</h6>
					<p>Choose and rent various cars of different types and brands from different of car owners</p>
				</div>
				<div class="col-md-4 my-4">
					<box-icon name='user-detail' size="lg" type='solid' color='#ffffff' ></box-icon>
					<h6>Rent A Driver</h6>
					<p>Already have a car but in need of driver? don't worry, wwe got you covered</p>
				</div>
				<div class="col-md-4 my-4">
					<box-icon name='car-garage' size="lg" type='solid' color='#ffffff' ></box-icon>
					<h6>Start Your Rentals</h6>
					<p>Start or move your own car rental business online with us</p>
				</div>
			</div>
		</section>


		<section id="mobile-app">
			<div class="row">

				<div class="col-lg-6">
					<img src="assets/mockup.png" height="600">
				</div>


				<div class="col-lg-6">
					<div class="align-middle">
						<div>
							<h1 style="font-size: 5vmin; font-weight: bold; font-family: poppins;">Download Your New Travel Buddy</h1>
						</div>
						<br>
						<div>
							<p style="font-size:1.5rem">Renting cars made easier and convinient now all at your fingertips</p>
						</div>
						<br>
						<div class="ui vertical animated black button rounded-pill" tabindex="0">
				            <div class="hidden content"><i class="google play icon"></i>Download App</div>
				            <div class="visible content">
				              <i class="google play icon"></i>Download App
				            </div>

				         </div>

					</div>
				</div>

			</div>
		</section>




	</div><!--  END OF CONTAINER -->

			<?php include 'footer.php' ?>

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
					$('.slide-right').transition('fade right');
				}, 100);
		

			$('.items').slick({
				  infinite: true,
				  speed: 300,
				  slidesToShow: 6,
				  slidesToScroll: 1,
				  autoplay: true,
	  			  autoplaySpeed: 3000,
				  responsive: [
				    {
				      breakpoint: 992,
				      settings: {
				        slidesToShow: 4,
				        slidesToScroll: 1,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 1
				      }
				    },
				    {
				      breakpoint: 576,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 1,
				        autoplay: true,
	  					autoplaySpeed: 3000,
				      }
				    }
				  ]
			});

			$('.nearby-slick').slick({
				  infinite: true,
				  speed: 300,
				  slidesToShow: 4,
				  slidesToScroll: 2,
				  autoplay: true,
	  			  autoplaySpeed: 5000,
	  			  responsive: [
	  			  	{
				      breakpoint: 1200,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 1,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      breakpoint: 992,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 1,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				  ]
			});


		});


	</script>
</body>
</html>