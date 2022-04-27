<?php
	include 'connection.php';
	session_start();

	$start = strtotime($_POST['start']);
	$end = strtotime($_POST['end']);
	$carID = $_POST['carID'];
	$ownerID = $_POST['ownerID'];
	$userID = $_SESSION['userID'];
	$driverID = $_POST['driverID'];
	$carAmount = $_POST['carAmount'];
	$driverAmount = $_POST['driverAmount'];
	$deposit = $_POST['deposit'];

	$start = date("Y-m-d H:i:s", $start);
	$end = date("Y-m-d H:i:s", $end);
	

	$sql = "INSERT INTO tbl_rental (startDate, endDate, carID, ownerID, customerID, driverID) VALUES ('$start', '$end', '$carID','$ownerID','$userID','$driverID')";

	if(mysqli_query($dbconn, $sql)){
		$last_id = $dbconn->insert_id;

		$sql = "INSERT INTO tbl_payment (rentalID, carAmount, driverAmount, deposit) VALUES ('$last_id', '$carAmount', '$driverAmount', '$deposit')";
		if(mysqli_query($dbconn, $sql)){

			$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$last_id', '$ownerID', 'pending')";

			if(mysqli_query($dbconn, $sql)){
				echo 200;
			} else {
				echo 400;
			}
		} else {
			echo 400;
		}
	} else {
		echo 500;
	}
?>