<?php 
	include 'connection.php';
	session_start();
	$action = $_POST['action'];
	$sql = "SELECT *, date_format(updatedAt, '%M') AS month, SUM(CASE status WHEN 'completed' THEN 1 ELSE NULL END) completed, SUM(CASE status WHEN 'cancelled' THEN 1 ELSE NULL END) cancelled FROM tbl_rental WHERE (status = 'completed' OR status = 'cancelled') AND ownerID = ".$_SESSION['userID']." GROUP BY MONTH(updatedAt) ORDER BY MONTH(updatedAt)";
	$result = mysqli_query($dbconn, $sql);

	$month = array();
	$cancelled = array();
	$completed = array();
	$sales = array();

	foreach($result as $row){
		array_push($month, $row['month']);
		array_push($cancelled, $row['cancelled']);	
		array_push($completed, $row['completed']);	
	}

	$sql = "SELECT *, date_format(createdAt, '%M') AS month, SUM(carAmount+deposit+addCharge) AS sales FROM tbl_payment WHERE status = 'pending' GROUP BY MONTH(createdAt) ORDER BY MONTH(createdAt)";
	$result = mysqli_query($dbconn, $sql);
	foreach($result as $row){
		array_push($sales, $row['sales']);
	}


	echo json_encode(array("sales"=>$sales, "month"=>$month, "cancelled"=>$cancelled, "completed"=>$completed));
?>