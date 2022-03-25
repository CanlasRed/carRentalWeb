<?php
	session_start();
	include 'connection.php';

	$rentalID = $_POST['rentalID'];
	$status = $_POST['status'];

	$sql = "UPDATE tbl_rental SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
	if(mysqli_query($dbconn, $sql)){
		echo 200;
	} else {
		echo 400;
	}

?>