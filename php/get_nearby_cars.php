<?php 
date_default_timezone_set('Asia/Hong_Kong');
function get_time_ago( $time )
{
	$time_difference = time() - $time;

	if( $time_difference < 1 ) { return 'Just Now'; }


	$condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
		30 * 24 * 60 * 60       =>  'month',
		24 * 60 * 60            =>  'day',
		60 * 60                 =>  'hour',
		60                      =>  'minute',
		1                       =>  'second'
	);

	foreach( $condition as $secs => $str )
	{
		$d = $time_difference / $secs;

		if( $d >= 1 )
		{
			$t = round( $d );
			return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
		}
	}
}
	include 'connection.php';
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$output = "";

	$sql = "SELECT * FROM (
		SELECT *, 
		(
			(
				(
					acos(
						sin(( $lat * pi() / 180))
                        *
						sin(( `lat` * pi() / 180)) + cos(( $lat * pi() /180 ))
                        *
						cos(( `lat` * pi() / 180)) * cos((( $long - `lng`) * pi()/180)))
					) * 180/pi()
				) * 60 * 1.1515 * 1.609344
			)
		as distance FROM `tbl_users`
	) tbl_users
	WHERE distance <= 25
	LIMIT 15";

	$result = mysqli_query($dbconn, $sql);

	if(mysqli_num_rows($result)>0){
	foreach($result as $user){
		$sql = "SELECT c.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 AND c.ownerID = ".$user['userID']."";
		$result = mysqli_query($dbconn, $sql);

		foreach($result as $row){
			$sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY carID ASC";
				$res = mysqli_query($dbconn, $sql);
				$img = mysqli_fetch_assoc($res);
				$postedTime = get_time_ago(strtotime($row['createdAt']));
				$total = 0;
                        $avgRatings = 0;
                        $sql = "SELECT * FROM tbl_car_review WHERE status = 1 AND carID = ".$row['carID']."";
                        if($result = mysqli_query($dbconn, $sql)){
                          $total = mysqli_num_rows($result);
                          $arr = array(0,0,0,0,0);
                          foreach($result as $rate){
                            if($rate['rate']==5){
                              $arr[0]++;
                            } else if ($rate['rate']==4){
                              $arr[1]++;
                            } else if ($rate['rate']==3){
                              $arr[2]++;
                            } else if ($rate['rate']==2){
                              $arr[3]++;
                            } else if ($rate['rate']==1){
                              $arr[4]++;
                            }
                          }

                          if($total>0){
                            $avgRatings = ((1*$arr[4])+(2*$arr[3])+(3*$arr[2])+(4*$arr[1])+(5*$arr[0]))/$total;
                          }
                        }
				$output .='
				<div class="ui card m-2">
			        <div class="content">
			           <div class="right floated meta"><small style="color: #fff">'.$postedTime.'</small></div>
			            <a class="fw-bold" style="text-decoration: none; color:#fff;" href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'">
			            '. $row['name'] .'
			            </a>
			        </div>
			        <a href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'" class="image">';
			        if(!isset($img)){
							  $output .='<div style="width:100%; overflow:hidden; height:220px; background: url(assets/cars/Speedy_Full_Logo_Black.png) no-repeat center; background-size: contain;">
							          </div>';
							 } else {
							  $output .='<div style="width:100%; overflow:hidden; height:220px; background: url(assets/cars/'.$img['image'].') no-repeat center; background-size: contain;">
							          </div>';
							 }

			    $output .= '</a>
			        <div class="content">
			          <div class="row">
			            <div class="col-6">
			              <i class="user icon"></i> '.$row['capacity'].' Seater
			            </div>
			            <div class="col-6">
			              <i class="cogs icon"></i> '.$row['transmission'].'
			            </div>
			          </div>
			          <div class="row">
			            <div class="col-6">
			              <i class="gas pump icon"></i> '.$row['engine'].'
			            </div>
			            <div class="col-6">
			              <i class="car icon"></i> '.$row['type'].'
			            </div>
			          </div>
			          <div class="row mt-2">
			            <div class="col-12">
			                <div class="ui label my-1">
			                  '.round($avgRatings,1).'
			                </div>
			                 <div class="ui yellow rating" data-rating="'.round($avgRatings).'"></div>
			            </div>
			          </div>
			        </div>
			        <div class="content">
			          <span class="float-start mt-2">
			              <h5 style="font-weight: bold;">₱'.$row['rate'].'/hr</h5>
			          </span>
			          <span class="float-end">
			            <a href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'">
			              <div class="ui vertical animated button rent-btn" tabindex="0">
			                <div class="hidden content"   style="font-weight:400">Rent</div>
			                <div class="visible content">
			                  <i class="shop icon"   style="font-weight:400"></i>
			                </div>
			              </div>
			            </a>
			          </span>
			        </div>
			      </div>
				';
		}
	}
	
	} else {
		$output.='<h3 class="fw-bold">No Nearby Cars Found...</h3>';
	}

	echo $output;