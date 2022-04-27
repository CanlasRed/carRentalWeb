<?php 
	session_start();
	include 'connection.php';

	$userID = $_SESSION['userID'];

	$sql = "UPDATE tbl_notification SET
			notified = 1
			WHERE userID = '$userID'";

	if(mysqli_query($dbconn,$sql)){
		echo 0;
	}
	
?>