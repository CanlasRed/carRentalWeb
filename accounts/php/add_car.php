<?php 
	session_start();
	include 'connection.php';
	$name = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['name']));
	$color = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['color']));
	$type = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['type']));
	$brand = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['brand']));
	$model = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['model']));
	$year = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['year']));
	$plateNumber = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['plateNumber']));

	$capacity = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['capacity']));
	$engine = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['engine']));
	$transmission = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['transmission']));
	$compartment = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['compartment']));
	$AC = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['AC']));
	$speed = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['speed']));

	$rate = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['rate']));


	$sql = "INSERT INTO tbl_cars (
			ownerID,
			typeID,
			name,
			brandID,
			model,
			year,
			color,
			plateNumber,
			capacity,
			engine,
			transmission,
			compartment,
			AC,
			speed,
			rate)
			VALUES (
			'1',
			'$type',
			'$name',
			'$brand',
			'$model',
			'$year',
			'$color',
			'$plateNumber',
			'$capacity',
			'$engine',
			'$transmission',
			'$compartment',
			'$AC',
			'$speed',
			'$rate')";

	if(mysqli_query($dbconn,$sql)){
		$newID = $dbconn->insert_id;
		echo $newID;
	} else{
		echo 'dbfailed';
	}
	
?>