<?php 
	include 'connection.php';
	$carID = $_POST['carID'];
	$action = $_POST['action'];

	if($action == 1){
		$sql ="UPDATE tbl_cars SET status = '0' WHERE carID = '$carID'";
		if(mysqli_query($dbconn, $sql)){
			echo 'success';
		} else {
			echo'dbfailed';
		}
	} else if ($action == 2) {
		$sql ="UPDATE tbl_cars SET status = '1' WHERE carID = '$carID'";
		if(mysqli_query($dbconn, $sql)){
			echo 'success';
		} else {
			echo'dbfailed';
		}
	}
?>