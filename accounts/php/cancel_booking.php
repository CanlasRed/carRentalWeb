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
		$sql = "SELECT * FROM tbl_rental WHERE rentalID = ".$rentalID."";
		$result = mysqli_query($dbconn, $sql);
		$row = mysqli_fetch_assoc($result);

		$owner = $row['ownerID'];

		$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$owner', 'user_cancelled')";

		if(mysqli_query($dbconn, $sql)){
			echo 200;
		} else {
			echo 400;
		}
	} else {
		echo 400;
	}
?>