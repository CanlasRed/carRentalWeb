<?php
	include 'connection.php';
	$imageID = $_POST['imageID'];
	$action = $_POST['action'];
	session_start();

	if($action == 1){
		$sql ="UPDATE tbl_car_image SET status = '0' WHERE imageID = '$imageID'";
		if(mysqli_query($dbconn, $sql)){
			echo 'success';
		} else {
			echo'dbfailed';
		}
	} else if ($action == 2) {
		$sql ="UPDATE tbl_car_image SET status = '1' WHERE imageID = '$imageID'";
		if(mysqli_query($dbconn, $sql)){
			echo 'success';
		} else {
			echo'dbfailed';
		}
	}
?>