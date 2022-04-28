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
	$credentialID = $_POST['credentialID'];

	$sql = "SELECT *, c.createdAt AS submitDate, u.createdAt AS createdAt
			FROM tbl_credentials c
			INNER JOIN tbl_users u ON c.userID = u.userID
			WHERE c.credentialID = '$credentialID' 
			ORDER BY c.credentialID
			LIMIT 1";
    $result = mysqli_query($dbconn, $sql);


                                                            

    foreach($result as $row){

    	

    	echo '
    		<div class="row">
    			<div class="col-5">
    				<img src="../assets/user-image/'.$row["image"].'" alt="user-image" class="img-fluid">
    			</div>

    			<div class="col-7">
    				<table class="table table-striped text-capitalize" >
    					<thead style="border-top: none !important;">
    						<tr style="border-top: none !important;">
							    <th class="h3">'.$row["firstName"].' '.$row['lastName'].'</th>
							    <th></th>
							</tr>
    					</thead>
    					<tbody>
    						<tr>
							   	<td><span class="font-weight-bold">Email:</span></td>
							   	<td>'.$row["username"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Phone #:</span></td>
							   	<td>'.$row["phone"].'</td>
							</tr>
    						<tr>
							   	<td><span class="font-weight-bold">Address:</span></td>
							   	<td>'.$row["address"].'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Date Account Created:</span></td>
							   	<td>'.date('M j, Y g:i A', strtotime($row['createdAt'])).'</td>
							</tr>
							<tr>
							   	<td><span class="font-weight-bold">Application Date:</span></td>
							   	<td>'.date('M j, Y g:i A', strtotime($row['submitDate'])).'</td>
							</tr>
    					</tbody>
    				</table>
    			</div>
    		</div>

    		<hr>
    		
    		<h3><i class="fas fa-id-badge"></i> Valid ID</h3>
    		<div class="d-grid gap-2 d-md-flex d-flex justify-content-between">
    			<div class="row d-flex justify-content-center credentialID" id="cred-front" data-bs-toggle="modal" data-id="'. $row['credentialID'] .'*front">
	    			<a href="#"><img width="400" src="../assets/credentials/'.$row["front"].'" alt="front-id" class="img-fluid"></a>
	    		</div>
	  		
	    		<div class="row d-flex justify-content-center credentialID" id="cred-back" data-bs-toggle="modal" data-id="'. $row['credentialID'] .'*back">
	    			<a href="#"><img width="400" src="../assets/credentials/'.$row["back"].'" alt="back-id" class="img-fluid"></a>			
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