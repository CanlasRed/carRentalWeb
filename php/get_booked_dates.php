<?php 
	include 'connection.php';
	session_start();

	$sql = "SELECT * FROM tbl_rental WHERE (status = 'pickup' OR status = 'dropoff') AND carID = ".$_POST['carID']."";
	$result = mysqli_query($dbconn, $sql);
	$startDates = array();
	$endDates = array();
	$endTimes = array();
	foreach($result as $row){
		$sdate = date('Y-m-d', strtotime($row['startDate']));
		$edate = date('Y-m-d', strtotime($row['endDate']));
		$eTime = date('h:i A', strtotime($row['endDate']) + 60*60);

		array_push($startDates, $sdate);
		array_push($endDates, $edate);
		array_push($endTimes, $eTime);
	}
	echo json_encode(array($startDates, $endDates, $endTimes));
?>