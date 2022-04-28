<?php
	session_start();
	include 'connection.php';

	$userID = $_SESSION['userID'];

	$sql = "SELECT * FROM tbl_notification
			WHERE userID = '$userID' ORDER BY createdAt DESC LIMIT 5";
    $result = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($result) > 0) {
    	foreach($result as $row){
	    	$status = $row['status'];
	    	$notification_icon = "";
	    	$title = "";
	    	$description = "";
	    	$interval = "";
	    	$color = "";
	    	$rentalID = $row['rentalID'];

	    	date_default_timezone_set('Asia/Manila');
	        $notification_date = $row['createdAt'];
	        $notification_time = date('H:i:s', strtotime($row['createdAt']));

	        $date_today = date('Y-m-d H:i:s', time());
	        $time_today = date('H:i:s', time());

	        $date1 = new DateTime($date_today);
	        $date2 = new DateTime($notification_date);
			$diff = $date2->diff($date1);

	        $hours = $diff->h;

	        $hours = $hours + ($diff->days*24);

	        if($hours == 1) {
	          $interval = $hours .' '. "hour ago";
	        }
	        else if($hours > 1 && $hours <= 23) {
	          $interval = $hours .' '. "hours ago";
	        }
	        else if($hours > 24 && $hours <= 47) {
	          $daycount = $hours / 24;
	          $interval = intval($daycount) .' '. "day ago" ;
	        }
	        else if($hours >= 48) {
	          $daycount = $hours / 24;
	          $interval = intval($daycount) .' '. "days ago";
	        }
	        else {
	          $minutes = $diff->i;
	          if($minutes > 0) {
	            $interval = $minutes .' '. "minutes ago";
	          }
	          else {
	            $seconds = $diff->s;

	            $interval = $seconds .' '. "seconds ago";
	          }
	        }

	    	if($status == 'accepted') {
	    		$notification_icon = "check circle icon";
	    		$title = "Booking Accepted";
	    		$description = "Your booking has been accepted";
	    		$color = "text-success";
	    	}
	    	else if($status == 'cancelled') {
	    		$notification_icon = "times circle icon";
	    		$title = "Booking Cancelled";
	    		$description = "Your booking has been cancelled";
	    		$color = "text-danger";
	    	}
	    	else if($status == 'user_cancelled') {
	    		$notification_icon = "times circle icon";
	    		$title = "Booking Cancelled";
	    		$description = "A customer cancelled a booking";
	    		$color = "text-danger";
	    	}
	    	else if($status == 'pending') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Pending Bookings";
	    		$description = "You have a pending booking";
	    		$color = "text-warning";
	    	}
	    	else if($status == 'pickup') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Car Pickup";
	    		$description = "The car is ready for pickup";
	    		$color = "text-info";
	    	}
	    	else if($status == 'dropoff') {
	    		$notification_icon = "info circle icon";
	    		$title = "Car Picked-Up";
	    		$description = "The car has been picked-up";
	    		$color = "text-info";
	    	}
	    	else if($status == 'to_dropoff') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Car Drop-Off";
	    		$description = "You have a car drop-off due today";
	    		$color = "text-purple";
	    	}
	    	else if($status == 'review') {
	    		$notification_icon = "info circle icon";
	    		$title = "Car Dropped-Off";
	    		$description = "The car has been dropped-off";
	    		$color = "text-purple";
	    	}
	    	else if($status == 'to_review') {
	    		$notification_icon = "question circle icon";
	    		$title = "Review Your Ride";
	    		$description = "You have a pending review";
	    		$color = "text-olive";
	    	}
	    	else if($status == 'completed') {
	    		$notification_icon = "check circle icon";
	    		$title = "Booking Completed";
	    		$description = "Car rental completed and reviewed";
	    		$color = "text-success";
	    	}
	    	else if($status == 'overdue') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Car Overdue";
	    		$description = "A rental is overdue";
	    		$color = "text-purple";
	    	}
	    	else if($status == 'expired') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Booking Expired";
	    		$description = "A booking request has expired";
	    		$color = "text-warning";
	    	}
	    	else if($status == 'terminated') {
	    		$notification_icon = "exclamation circle icon";
	    		$title = "Booking Terminated";
	    		$description = "A car is not picked-up and is now terminated";
	    		$color = "text-danger";
	    	}

	    	/*
	    	echo '

	    			<a href="#" class="dropdown-item notification-info" data-bs-toggle="modal" data-id="'. $row['rentalID'] .'*'. $row['userID'] .'*'. $row['status'] .'*'. $row['createdAt'] .'*'. $row['notificationID'] .'">
			            <div class="media">
			              <i class="fas '.$notification_icon.' img-size-50 mr-3 mt-2 '.$color.'" style="font-size: 2.6rem; text-align: center;"></i>
			              <div class="media-body">
			                <h5 class="dropdown-item-title">
			                  '.$title.'
			                </h3>
			                <p class="text-sm" style="width: 220px; overflow: hidden; text-overflow: ellipsis;">'.$description.'</p>
			                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.$interval.'</p>
			              </div>
			            </div>
			         </a>

			         <div class="dropdown-divider"></div>
	    	';
	    	*/

	    	echo '

	    			<a href="#" class="dropdown-item notification-info" data-bs-toggle="modal" data-id="'. $row['rentalID'] .'*'. $row['userID'] .'*'. $row['status'] .'*'. $row['createdAt'] .'*'. $row['notificationID'] .'">
			            <div class="d-grid gap-2 d-md-flex d-flex justify-content-between">
			            	<i class="'.$notification_icon.' img-size-50 mr-3 mt-2 '.$color.'" style="font-size: 2.6rem; text-align: center;"></i>
				              <div class="media-body">
				              	<div class="h5" style="margin-bottom: 0px;">'.$title.'</div>
				              	<div style="width: 220px; overflow: hidden; text-overflow: ellipsis;">'.$description.'</div>
				              	<div class="fs-6 text-muted"><i class="far fa-clock mr-1"></i> '.$interval.'</div>

				               
				              </div>
			            </div>
			         </a>

			         <div class="dropdown-divider"></div>
	    	';

	    }

	    echo '<a href="#" class="dropdown-item dropdown-footer text-center">See All Notifications</a>';
    }
    else {
    	echo '<a href="#" class="dropdown-item dropdown-footer">No Notifications Found</a>';
    }
?>

<script type="text/javascript">
	$('.notification-info').click(function(){
        var notifs = $(this).attr('data-Id');
        const myArray = notifs.split("*");
        const rentalID = myArray[0];
        const userID = myArray[1];
        const status = myArray[2];
        const createdAt = myArray[3];
        const notificationID = myArray[4];

        //alert(rentalID + " " + userID+ " " + status+ " " + createdAt);

        $.ajax({
            url: 'php/notification_details.php',
            type: 'post',
            data: {rentalID: rentalID, userID: userID, status:status, createdAt:createdAt, notificationID:notificationID},
            success: function(response){ 
              // Add response in Modal body
              $('.notification-body').html(response);

              // Display Modal
              $('#notificationModal').modal('show'); 

            }
        });

    });
</script>