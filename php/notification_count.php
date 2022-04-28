<?php 
	session_start();
	include 'connection.php';

	$userID = $_SESSION['userID'];

	$count = 0;
	$sql = "SELECT *, 
			COUNT(notificationID ) AS count 
			FROM tbl_notification
			WHERE userID = '$userID' AND notified = 0";
    $result = mysqli_query($dbconn, $sql);

    foreach($result as $row){
    	$count = $row['count'];
    }

    if($count != 0) {
    	echo $count;
    }
    

?>