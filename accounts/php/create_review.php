<?php
	include 'connection.php';
	session_start();

	$rate = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['rate']));
	$rentalID = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['rentalID']));
	$comment = mysqli_real_escape_string($dbconn, $_POST['comment']);

	$sql = "SELECT * FROM tbl_rental WHERE rentalID = ".$rentalID."";
	if($result = mysqli_query($dbconn, $sql)){
		foreach($result as $row){
			if($row['status']=='review'){
				$carID = $row['carID'];
				$userID = $_SESSION['userID'];
				$sql = "INSERT INTO tbl_car_review (carID, customerID, rate, comment) VALUES ('$carID', '$userID', '$rate', '$comment')";
				if(mysqli_query($dbconn, $sql)){
					$sql = "UPDATE tbl_rental SET status = 'completed' WHERE rentalID = ".$rentalID."";
					if(mysqli_query($dbconn, $sql)){
						$sql = "UPDATE tbl_payment SET status = 'completed' WHERE rentalID = ".$rentalID."";
						if(mysqli_query($dbconn, $sql)){
							echo 200;
						} else {
							echo 'error';
						}
					} else {
						echo 'error';
					}
				}
			} else {
				echo 'error';
			}
		}
	} else {
		echo 'error';
	}

	
?>