<?php 
	include 'connection.php';
	session_start();

	$sql = "SELECT * FROM tbl_rental WHERE status = 'pickup'";
	$result = mysqli_query($dbconn, $sql);
	if(mysqli_num_rows($result)>0){
		foreach($result as $row){
			$startDate = date('Y-m-d', strtotime($row['startDate']));
			$now = date('Y-m-d');
			$rentalID = $row['rentalID'];
			$customer = $row['customerID'];
			if($startDate == $now){
				$sql = "SELECT * FROM tbl_notification WHERE userID = '$customer' AND status = 'pickup' AND rentalID = '$rentalID'";
				$result = mysqli_query($dbconn, $sql);
				if(mysqli_num_rows($result)>0){
					
				} else {
					$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$customer', 'pickup')";
						mysqli_query($dbconn, $sql);
				}
			}
		}
	}


	$sql = "SELECT * FROM tbl_rental WHERE status = 'dropoff'";
	$result = mysqli_query($dbconn, $sql);
	if(mysqli_num_rows($result)>0){
		foreach($result as $row){
			$endDate = date('Y-m-d', strtotime($row['endDate']));
			$now = date('Y-m-d');
			$rentalID = $row['rentalID'];
			$customer = $row['customerID'];
			if($endDate == $now){
				$sql = "SELECT * FROM tbl_notification WHERE userID = '$customer' AND status = 'dropoff' AND rentalID = '$rentalID'";
				$result = mysqli_query($dbconn, $sql);
				if(mysqli_num_rows($result)>0){
					
				} else {
					$sql = "INSERT INTO tbl_notification (rentalID, userID, status) VALUES ('$rentalID', '$customer', 'to_dropoff')";
						mysqli_query($dbconn, $sql);
				}
			}
		}
	}

?>