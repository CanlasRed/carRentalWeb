<?php 
	include 'connection.php';
	session_start();

	$credentialID = $_POST['credentialID'];
	$action = $_POST['action'];

	if($action == 'accept'){
		$sql = "UPDATE tbl_credentials SET status = 2, updatedAt = now() WHERE credentialID = '$credentialID'";
		if(mysqli_query($dbconn, $sql)){
			$sql = "SELECT * FROM tbl_credentials WHERE credentialID = '$credentialID'";
			if($result = mysqli_query($dbconn, $sql)){
				if (mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$userID = $row['userID'];

					$sql = "UPDATE tbl_users SET userType = 2 WHERE userID = '$userID'";
					if (mysqli_query($dbconn, $sql)){
						echo 'approved';
					} else {
						echo 400;
					}
				}
			}
		}
	} else if ($action == 'reject'){
		$sql = "UPDATE tbl_credentials SET status = 0, updatedAt = now() WHERE credentialID = '$credentialID'";
		if(mysqli_query($dbconn, $sql)){
			echo 'rejected';
		} else {
			echo 400;
		}
	} else {
		echo 400;
	}
?>