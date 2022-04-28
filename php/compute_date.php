<?php
	include 'connection.php';
	date_default_timezone_set('Asia/Manila');
	$startDate =  strtotime($_POST['startDate']);
	$startTime =  strtotime($_POST['startTime']);
	$endDate =  strtotime($_POST['endDate']);
	$endTime =  strtotime($_POST['endTime']);
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$datenow = strtotime($date);
	$timenow = strtotime($time);

	$timediff = ($startDate + $startTime) - ($datenow + $timenow);
	$hourdiff = $timediff/3600;
	$diff = round($hourdiff);

		$secs = ($endDate + $endTime) - ($startDate + $startTime);
		$hours = $secs / 3600;


		$hours = round($hours);
		$array = array($hours, $_POST['startDate'], $_POST['startTime'], $_POST['endDate'], $_POST['endTime'], $diff);

		echo json_encode($array);
	
	// echo $start->diff($end)->format("%H");

?>