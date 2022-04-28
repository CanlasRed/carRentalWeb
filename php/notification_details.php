<?php
	session_start();
	include 'connection.php';

	$notificationID = $_POST['notificationID'];
	$rentalID = $_POST['rentalID'];
	$userID = $_POST['userID'];
	$status = $_POST['status'];
	$createdAt = $_POST['createdAt'];

	//echo json_encode($rentalID .' '. $userID .' '. $status .' '. $createdAt);

	$sql = "SELECT *,
			tbl_cars.name AS car_name,
			tbl_notification.status AS notification_status
			FROM tbl_notification
			INNER JOIN tbl_users ON tbl_notification.userID = tbl_users.userID
			INNER JOIN tbl_rental ON tbl_notification.rentalID = tbl_rental.rentalID
			INNER JOIN tbl_cars ON tbl_rental.carID = tbl_cars.carID
			WHERE notificationID = '$notificationID'";
    $result = mysqli_query($dbconn, $sql);
    foreach($result as $row){

    	$status = $row['notification_status'];
    	$color = "";
    	if($status == 'accepted') {
	    		$color = "bg-success";
	    	}
	    	else if($status == 'cancelled') {
	    		$color = "bg-danger";
	    	}
	    	else if($status == 'user_cancelled') {
	    		$color = "bg-danger";
	    	}
	    	else if($status == 'pending') {
	    		$color = "bg-warning";
	    	}
	    	else if($status == 'pickup') {
	    		$color = "bg-info";
	    	}
	    	else if($status == 'dropoff') {
	    		$color = "bg-info";
	    	}
	    	else if($status == 'review') {
	    		$color = "bg-purple";
	    	}
	    	else if($status == 'to_review') {
	    		$color = "bg-olive";
	    	}
	    	else if($status == 'completed') {
	    		$color = "bg-success";
	    	}

    	echo '
    				<table class="table table-striped text-capitalize" >
    					<tbody>
    						<tr>
							   	<td><span class="font-weight-bold">Car:</span></td>
							   	<td>'.$row["car_name"].' ('.$row["year"].')</td>
							</tr>
    						<tr>
							   	<td><span class="font-weight-bold">Color:</span></td>
							   	<td>'.$row["color"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Plate #:</span></td>
							   	<td>'.$row["plateNumber"].'</td>
							</tr>
							<tr hidden>
							   	<td><span class="font-weight-bold">Start:</span></td>
							   	<td>'.date('M j, Y g:i A', strtotime($row['createdAt'])).'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Status:</span></td>
							   	<td><span class="h5 '.$color.'" style="padding-left: 1rem; padding-right: 1rem; padding-top: 0.3rem; padding-bottom: 0.3rem; border:none; border-radius: 3rem;">'.$row["notification_status"].'</span></td>
							</tr>
    					</tbody>
    				</table>
    	';

    	if($row['userType'] == 2 || $row['userType'] == 1) {
    		echo '
    				<div class="d-flex justify-content-end">
    					<a href="accounts/owner-dashboard.php" class="btn btn-dark" id="view_dashboard">View</a>
    				</div>
    				

    		';
    	}

    	
    }


?>