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
	    		$notification_icon = "fa-check-circle";
	    		$title = "Booking Accepted";
	    		$description = "Your booking has been accepted";
	    		$color = "text-success";
	    	}
	    	else if($status == 'cancelled') {
	    		$notification_icon = "fa-times-circle";
	    		$title = "Booking Cancelled";
	    		$description = "Your booking has been cancelled";
	    		$color = "text-danger";
	    	}
	    	else if($status == 'user_cancelled') {
	    		$notification_icon = "fa-times-circle";
	    		$title = "Booking Cancelled";
	    		$description = "A customer cancelled a booking";
	    		$color = "text-danger";
	    	}
	    	else if($status == 'pending') {
	    		$notification_icon = "fa-exclamation-circle";
	    		$title = "Pending Bookings";
	    		$description = "You have a pending booking";
	    		$color = "text-warning";
	    	}
	    	else if($status == 'pickup') {
	    		$notification_icon = "fa-exclamation-circle";
	    		$title = "Car Pickup";
	    		$description = "The car is ready for pickup";
	    		$color = "text-info";
	    	}
	    	else if($status == 'dropoff') {
	    		$notification_icon = "fa-info-circle";
	    		$title = "Car Picked-Up";
	    		$description = "The car has been picked-up";
	    		$color = "text-info";
	    	}
	    	else if($status == 'review') {
	    		$notification_icon = "fa-info-circle";
	    		$title = "Car Dropped-Off";
	    		$description = "The car has been dropped-off";
	    		$color = "text-purple";
	    	}
	    	else if($status == 'to_review') {
	    		$notification_icon = "fa-ballot";
	    		$title = "Review Your Ride";
	    		$description = "You have a pending review";
	    		$color = "text-olive";
	    	}
	    	else if($status == 'completed') {
	    		$notification_icon = "fa-check-circle";
	    		$title = "Booking Completed";
	    		$description = "Car rental completed and reviewed";
	    		$color = "text-success";
	    	}
	    	echo '

	    			<a href="#" class="dropdown-item notification-info" data-bs-toggle="modal" data-id="'. $row['rentalID'] .'*'. $row['userID'] .'*'. $row['status'] .'*'. $row['createdAt'] .'">
			            <div class="media">
			              <i class="fas '.$notification_icon.' img-size-50 mr-3 mt-2 '.$color.'" style="font-size: 2.6rem; text-align: center;"></i>
			              <div class="media-body">
			                <h3 class="dropdown-item-title">
			                  '.$title.'
			                </h3>
			                <p class="text-sm" style="width: 220px; overflow: hidden; text-overflow: ellipsis;">'.$description.'</p>
			                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.$interval.'</p>
			              </div>
			            </div>
			         </a>

			         <div class="dropdown-divider"></div>
	    	';

	    }

	    echo '<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>';
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

        alert(rentalID + " " + userID+ " " + status+ " " + createdAt);

        /*
        $.ajax({
            url: 'modules/Notification/AJAX-notification-details-show.php',
            type: 'post',
            data: {notif_type: notif_type, any_id: any_id, success_or_not:success_or_not, subject:subject},
            success: function(response){ 
              // Add response in Modal body
              $('.notification-body').html(response);

              // Display Modal
              $('#notificationModal').modal('show'); 

            }
        });
        */
    });
</script>