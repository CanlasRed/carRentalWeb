<?php
	include 'connection.php';
	$startDate =  strtotime($_POST['startDate']);
	$startTime =  strtotime($_POST['startTime']);
	$endDate =  strtotime($_POST['endDate']);
	$endTime =  strtotime($_POST['endTime']);

	$secs = ($endDate + $endTime) - ($startDate + $startTime);
	$hours = $secs / 3600;


	$hours = round($hours);
	$array = array($hours, $_POST['startDate'], $_POST['startTime'], $_POST['endDate'], $_POST['endTime']);

	echo json_encode($array);
	
	// echo $start->diff($end)->format("%H");

?>