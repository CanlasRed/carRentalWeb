<style type="text/css">
	.table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td {
    	border-bottom: 1px solid white !important;
    	border-top: 1px solid white !important;
	}
</style>

<?php
	session_start();
	include 'connection.php';

	date_default_timezone_set('Asia/Manila');
	$rentalID = $_POST['rentalID'];
	$carID = 0;

	$sql = "SELECT *, 
			c.name AS car_name, 
			ct.name AS cartype_name, 
			o.firstName AS owner_firstname, 
			o.lastName AS owner_lastname, 
			o.username AS owner_username, 
			o.phone AS owner_phone,
			o.address AS owner_address,
			o.userType AS owner_type,
			u.firstName AS customer_firstname, 
			u.lastName AS customer_lastname, 
			u.username AS customer_username, 
			u.phone AS customer_phone,
			u.address AS customer_address,
			u.userType AS customer_type,
			r.driverID AS rental_driverID,
			i.image AS car_image

			FROM tbl_rental r
			INNER JOIN tbl_cars c ON r.carID = c.carID
			INNER JOIN tbl_car_types ct ON c.typeID  = ct.typeID
			INNER JOIN tbl_car_image i ON r.carID = i.carID
			INNER JOIN tbl_payment p ON r.rentalID = p.rentalID
			INNER JOIN tbl_users o ON r.ownerID = o.userID
			INNER JOIN tbl_users u ON r.customerID  = u.userID
			WHERE r.rentalID = '$rentalID' 
			LIMIT 1";
    $result = mysqli_query($dbconn, $sql);


                                                            

    foreach($result as $row){

    	if($row['rental_driverID'] != 0) {
    		$total = ($row['carAmount'] + $row['driverAmount']+$row['addCharge']);
    	}
    	else {
    		$total = $row['carAmount']+$row['addCharge'];
    	}

    	$start = strtotime($row['startDate']);
	    $end = strtotime($row['endDate']);
	    $diff = $end-$start;
	    $hours = $diff/3600;
	    $hours = round($hours);

    	

    	echo '
    		<div class="row">
    			<div class="col-5">
    				<img src="../assets/cars/'.$row["car_image"].'" alt="car-image" class="img-fluid">
    			</div>

    			<div class="col-7">
    				<table class="table table-striped text-capitalize" >
    					<thead style="border-top: none !important;">
    						<tr style="border-top: none !important;">
							    <th class="h3">'.$row["car_name"].'</th>
							    <th></th>
							</tr>
    					</thead>
    					<tbody>
    						<tr>
							   	<td><span class="font-weight-bold">Model:</span></td>
							   	<td>'.$row["model"].' ('.$row["year"].')</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Type:</span></td>
							   	<td>'.$row["cartype_name"].'</td>
							</tr>
    						<tr>
							   	<td><span class="font-weight-bold">Color:</span></td>
							   	<td>'.$row["color"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Plate #:</span></td>
							   	<td>'.$row["plateNumber"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Capacity:</span></td>
							   	<td>'.$row["capacity"].' Seater</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Transmission:</span></td>
							   	<td>'.$row["transmission"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Start:</span></td>
							   	<td>'.date('M j, Y g:i A', strtotime($row['startDate'])).'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">End:</span></td>
							   	<td>'.date('M j, Y g:i A', strtotime($row['endDate'])).'</td>
							</tr>
    					</tbody>
    				</table>
    			</div>
    		</div>

    		<hr>

    		<div class="row">
    			<div class="col">
    				<table class="table table-striped text-capitalize" >
    					<thead style="border-top: none !important;">
    						<tr style="border-top: none !important;">
							    <th class="h5"><i class="fas fa-cash-register"></i> Payment</th>
							    <th></th>
							</tr>
    					</thead>
    					<tbody>
    						<tr>
							   	<td><span class="">Hourly Rate:</span></td>
							   	<td> ₱'.number_format($row['rate'],2).'</td>
							</tr>

							<tr>
							   	<td><span class="">Rental Hours:</span></td>
							   	<td>x '.$hours.' Hours</td>
							</tr>

							<tr>
							   	<td><span class="">Sub Total:</span></td>
							   	<td>₱'.number_format($row['carAmount'],2).'</td>
							</tr>
		';

		if($row['rental_driverID'] != 0) {
    		echo '
							<tr>
							   	<td><span class="">Driver:</span></td>
							   	<td>+ ₱'.number_format($row['driverAmount'],2).'</td>
							</tr>
			';
    	}

    	if($row['addCharge']>0){
    		echo '
							<tr style="color: red;">
							   	<td><span class="">Overdue Penalty:</span></td>
							   	<td>+ ₱'.number_format($row['addCharge'],2).'</td>
							</tr>
			';
    	}
							

		echo '	
							
							<tr>
							   	<td class="h5"><span class="font-weight-bolder">Total Amount:</span></td>
							   	<td class="font-weight-bolder h5">₱'.number_format($total,2).'</td>
							</tr>

							<tr>
							   	<td><span class="">Deposit:</span></td>
							   	<td>± ₱'.number_format($row['deposit'],2).'</td>
							</tr>
    					</tbody>
    				</table>
    			</div>
    		</div>

    		<hr>
    		
    		<div class="row">
    			<div class="col-6">
    				<table class="table table-striped text-capitalize" >
    					<thead style="border-top: none !important;">
    						<tr style="border-top: none !important;">
							    <th class="h5"><i class="fas fa-user"></i> Owner Details</th>
							    <th></th>
							</tr>
    					</thead>
    					<tbody>
    						<tr>
							   	<td><span class="font-weight-bold">Name:</span></td>
							   	<td>'.$row["owner_firstname"].' '.$row["owner_lastname"].' ';
							   if($row['owner_type']==2){
							   	echo '<i class="fas fa-badge-check text-muted"></i>';
							   }
							echo'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Email:</span></td>
							   	<td>'.$row["owner_username"].'</td>
							</tr>
    						<tr>
							   	<td><span class="font-weight-bold">Phone #:</span></td>
							   	<td>'.$row["owner_phone"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Address:</span></td>
							   	<td>'.$row["owner_address"].'</td>
							</tr>
    					</tbody>
    				</table>
    			</div>

    			<div class="col-6">
    				<table class="table table-striped text-capitalize" >
    					<thead style="border-top: none !important;">
    						<tr style="border-top: none !important;">
							    <th class="h5"><i class="fas fa-user"></i> Customer Details</th>
							    <th></th>
							</tr>
    					</thead>
    					<tbody>
    						<tr>
							   	<td><span class="font-weight-bold">Name:</span></td>
							   	<td>'.$row["customer_firstname"].' '.$row["customer_lastname"].' ';
							   if($row['customer_type']==2){
							   	echo '<i class="fas fa-badge-check text-muted"></i>';
							   }
							echo'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Email:</span></td>
							   	<td>'.$row["customer_username"].'</td>
							</tr>
    						<tr>
							   	<td><span class="font-weight-bold">Phone #:</span></td>
							   	<td>'.$row["customer_phone"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Address:</span></td>
							   	<td>'.$row["customer_address"].'</td>
							</tr>
    					</tbody>
    				</table>
    			</div>
    			
    		</div>

    	';
    	/*
    	echo '

    		<div class="ui header large m-0">
                '.$row["name"].'
                    <span class="float-end">₱ '.$row["rate"].'/hr</span>
            </div>
            <div class="">
                '.$row["brandID"].' '.$row["model"].' '.$row["year"].'
            </div>

    	';
    	*/
    }

    

	//echo $model .' '. $color .' '. $plateNumber;

	/*
	if($status == 'pickup'){
	


			$sql = "UPDATE tbl_rental SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";

			if(mysqli_query($dbconn, $sql)){
				$sql = "UPDATE tbl_payment SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
				if(mysqli_query($dbconn, $sql)){
					$sql = "SELECT * FROM tbl_rental WHERE rentalID = ".$rentalID."";
					$result = mysqli_query($dbconn, $sql);
					$row = mysqli_fetch_assoc($result);
					$carID = $row['carID'];
					$start = $row['startDate'];
					$end = $row['endDate'];


					$sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now() WHERE rentalID != '$rentalID' AND carID = '$carID' AND startDate BETWEEN '$start' AND '$end'";
					if(mysqli_query($dbconn, $sql)){
						echo 200;
					} else {
						echo 400;
					}
				} else {
					echo 400;
				}
			} else {
				echo 400;
			}

	} else {

		$sql = "UPDATE tbl_rental SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
		if(mysqli_query($dbconn, $sql)){
			$sql = "UPDATE tbl_payment SET status = '$status', updatedAt = now() WHERE rentalID = '$rentalID'";
			if(mysqli_query($dbconn, $sql)){
				echo 200;
			} else {
				echo 400;
			}
		} else {
			echo 400;
		}

	}
	*/

?>