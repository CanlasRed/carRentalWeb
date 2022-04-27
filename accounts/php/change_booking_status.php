<?php
	session_start();
	include 'connection.php';

	$rentalID = $_POST['rentalID'];
	$status = $_POST['status'];

	

	if($status == 'pickup'){
	


			$sql = "UPDATE tbl_rental SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";

			if(mysqli_query($dbconn, $sql)){
				$sql = "UPDATE tbl_payment SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
				if(mysqli_query($dbconn, $sql)){

					$sql = "SELECT * FROM tbl_rental WHERE rentalID = ".$rentalID."";
					$result = mysqli_query($dbconn, $sql);
					$row = mysqli_fetch_assoc($result);
					$carID = $row['carID'];
					$start = $row['startDate'];
					$end = $row['endDate'];

					$owner = $row['ownerID'];
					$customer = $row['customerID'];

					$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$customer', 'accepted')";
					mysqli_query($dbconn, $sql);

					$sql = "SELECT * FROM tbl_rental WHERE status = 'pending' AND rentalID != '$rentalID' AND carID = '$carID' AND startDate BETWEEN '$start' AND '$end'";
					$result = mysqli_query($dbconn, $sql);
					if(mysqli_num_rows($result)>0){
						foreach($result as $row){
							$rentID = $row['rentalID'];
							$customer = $row['customerID'];
							$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentID', '$customer', 'cancelled')";
							mysqli_query($dbconn, $sql);
						}
					}

					$sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now() WHERE rentalID != '$rentalID' AND carID = '$carID' AND startDate BETWEEN '$start' AND '$end'";
					if(mysqli_query($dbconn, $sql)){
						echo 200;
					} else {
						echo 400;
					}
				} else {
					echo 400;
				}
			} else {
				echo 400;
			}

	} else {

		$sql = "UPDATE tbl_rental SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
		if(mysqli_query($dbconn, $sql)){
			$sql = "UPDATE tbl_payment SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
			if(mysqli_query($dbconn, $sql)){

					$sql = "SELECT * FROM tbl_rental WHERE rentalID = ".$rentalID."";
					$result = mysqli_query($dbconn, $sql);
					$row = mysqli_fetch_assoc($result);

					$owner = $row['ownerID'];
					$customer = $row['customerID'];

					$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$customer', '$status')";
					mysqli_query($dbconn, $sql);

					if($status == 'review'){
						$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$customer', 'to_review')";
						mysqli_query($dbconn, $sql);
					}

				echo 200;
			} else {
				echo 400;
			}
		} else {
			echo 400;
		}

	}

?>