<?php
	include 'connection.php';
	$output = "";

	if(isset($_POST['action'])){

		$sql = "SELECT c.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 ";

		if(isset($_POST['priceMin'], $_POST['priceMax']) && !empty($_POST['priceMin']) && !empty($_POST['priceMax']))
		{
			$sql .= "AND c.rate BETWEEN '".$_POST['priceMin']."' AND '".$_POST['priceMax']."' ";
		}

		if(isset($_POST['search']) && !empty($_POST['search']))
		{
			$sql .= 'AND (c.name LIKE "%'.$_POST["search"].'%" ';
			$sql .= 'OR c.model LIKE "%'.$_POST["search"].'%" ';
			$sql .= 'OR c.year LIKE "%'.$_POST["search"].'%" ';
			$sql .= 'OR t.name LIKE "%'.$_POST["search"].'%") ';
		}

		if(isset($_POST['type']))
		{
			$type_filter = implode("','", $_POST["type"]);
			$sql .= "AND c.typeID IN ('".$type_filter."') ";
		}

		if(isset($_POST['transmission']))
		{
			$trans_filter = implode("','", $_POST["transmission"]);
			$sql .= "AND c.transmission IN ('".$trans_filter."') ";
		}

		if(isset($_POST['capacity']))
		{
			$trans_filter = implode("','", $_POST["capacity"]);
			$sql .= "AND c.capacity IN ('".$trans_filter."') ";
		}



		if(isset($_POST['order'])){
			if($_POST['order'] == 'oldest'){
				$sql .= "ORDER BY c.createdAt ASC";
			}
			else if ($_POST['order'] == 'latest'){
				$sql .= "ORDER BY c.createdAt DESC";
			}
			else if ($_POST['order'] == 'price_asc'){
				$sql .= "ORDER BY c.rate ASC";
			}
			else if ($_POST['order'] == 'price_desc'){
				$sql .= "ORDER BY c.rate DESC";
			}
		}


		$result = mysqli_query($dbconn, $sql);
		$total_row = mysqli_num_rows($result);
		if($total_row>0){
			foreach($result as $row){
				$sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY carID ASC";
				$res = mysqli_query($dbconn, $sql);
				$img = mysqli_fetch_assoc($res);
				$output .='
				<div class="ui card m-2">
			        <div class="content">
			          <div class="right floated meta">14h</div>
			            <a class="fw-bold" style="text-decoration: none; color:#1b1c1d;" href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'">
			            '. $row['name'] .'
			            </a>
			        </div>
			        <a href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'" class="image">
			          <?php if ('.$row['driverID'].'!=NULL){ ?>
			            <div class="ui black right corner label">
			              <i class="user plus icon"></i>
			            </div>
			         <?php } ?>
			         <div style="width:100%; overflow:hidden; height:220px; background: url(assets/cars/'.$img['image'].') no-repeat center; background-size: contain;">
			          </div>
			        </a>
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
			                <div class="ui inverted black label my-1">
			                  4.7
			                </div>
			                <div class="ui star rating" data-rating="5"></div>
			            </div>
			          </div>
			        </div>
			        <div class="content">
			          <span class="float-start mt-2">
			              <h5 style="font-weight: bold;">₱'.$row['rate'].'/hr</h5>
			          </span>
			          <span class="float-end">
			            <a href="cars.php?car='.$row['name'].'&carID='.$row['carID'].'">
			              <div class="ui vertical animated button secondary rent-btn" tabindex="0">
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
		else {
			$output = '<h3> No Cars Found</h3>';
		}
		echo $output;
	}

?>