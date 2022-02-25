<?php
	include 'connection.php';
	$start =  strtotime($_POST['startDate']);
	$end =  strtotime($_POST['endDate']);
	$secs = $end - $start;
	$hours = $secs / 3600;


	$hours = round($hours);
	$array = array($hours, $_POST['startDate'], $_POST['endDate']);

	echo json_encode($array);
	
	// echo $start->diff($end)->format("%H");

?>