<?php 
	include 'connection.php';
	$total = 0;
	$carID = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['carID']));
	$sql = "SELECT * FROM tbl_car_review WHERE status = 1 AND carID = ".$carID."";
	$result = mysqli_query($dbconn, $sql);
	$total = mysqli_num_rows($result);
	$arr = array(0,0,0,0,0);
	foreach($result as $row){
		if($row['rate']==5){
			$arr[0]++;
		} else if ($row['rate']==4){
			$arr[1]++;
		} else if ($row['rate']==3){
			$arr[2]++;
		} else if ($row['rate']==2){
			$arr[3]++;
		} else if ($row['rate']==1){
			$arr[4]++;
		}
	}

	echo json_encode(array("rates"=>$arr, "total"=>$total));
?>
