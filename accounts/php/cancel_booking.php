<?php 
	include 'connection.php';

	$reason = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['reason']));
	$rentalID = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['rentalID']));
	$remarks = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['remarks']));

	if(!isset($remarks) || empty($remarks) || $remarks == ''){
		$sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now(), cancelReason = '$reason' WHERE rentalID = '$rentalID'";
	}
	else {
		$sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now(), cancelReason = '$reason', remarks = '$remarks' WHERE rentalID = '$rentalID'";
	}
	if(mysqli_query($dbconn, $sql)){
		echo 200;
	} else {
		echo 400;
	}
?>