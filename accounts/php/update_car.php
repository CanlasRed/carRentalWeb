<?php 
	session_start();
	include 'connection.php';
	$carID = $_POST['carID'];
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
	$description = mysqli_real_escape_string($dbconn, $_POST['description']);


	$sql = "UPDATE  tbl_cars SET
			ownerID = 1,
			typeID = '$type',
			name = '$name',
			brandID = '$brand',
			model = '$model',
			year = '$year',
			color = '$color',
			plateNumber = '$plateNumber',
			capacity = '$capacity',
			engine = '$engine',
			transmission = '$transmission',
			compartment = '$compartment',
			AC = '$AC',
			speed = '$speed',
			rate = '$rate',
			description = '$description'
			WHERE carID = '$carID'";

	if(mysqli_query($dbconn,$sql)){
		echo 'updated';
	} else{
		echo 'dbfailed';
	}
	
?>