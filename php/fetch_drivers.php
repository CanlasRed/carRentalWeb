<?php
	include 'connection.php';
	$output = "";

	if(isset($_POST['action'])){

		$sql = "SELECT * FROM tbl_drivers WHERE status = 1 ";

		if(isset($_POST['priceMin'], $_POST['priceMax']) && !empty($_POST['priceMin']) && !empty($_POST['priceMax']))
		{
			$sql .= "AND rate BETWEEN '".$_POST['priceMin']."' AND '".$_POST['priceMax']."' ";
		}


		if(isset($_POST['ageMin'], $_POST['ageMax']) && !empty($_POST['ageMin']) && !empty($_POST['ageMax']))
		{
			$sql .= "AND  TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) BETWEEN '".$_POST['ageMin']."' AND '".$_POST['ageMax']."' ";
		}

		if(isset($_POST['gender']))
		{
			$type_filter = implode("','", $_POST["gender"]);
			$sql .= "AND gender IN ('".$type_filter."') ";
		}

		if(isset($_POST['vaccine']))
		{
			$trans_filter = implode("','", $_POST["vaccine"]);
			$sql .= "AND vaccineType IN ('".$trans_filter."') ";
		}



		if(isset($_POST['order'])){
			if($_POST['order'] == 'oldest'){
				$sql .= "ORDER BY createdAt ASC";
			}
			else if ($_POST['order'] == 'latest'){
				$sql .= "ORDER BY createdAt DESC";
			}
			else if ($_POST['order'] == 'price_asc'){
				$sql .= "ORDER BY rate ASC";
			}
			else if ($_POST['order'] == 'price_desc'){
				$sql .= "ORDER BY rate DESC";
			}
		}


		$result = mysqli_query($dbconn, $sql);
		$total_row = mysqli_num_rows($result);
		if($total_row>0){
			foreach($result as $row){
				$dateOfBirth = $row['birthdate'];
				$today = date("Y-m-d");
				$diff = date_diff(date_create($dateOfBirth), date_create($today));
				$age = $diff->format('%y');

				if ($row['gender'] == 1){
					$gender = 'Male';
				} else if ($row['gender'] == 2){
					$gender = 'Female';
				} else {
					$gender = 'Others';
				}

				if ($row['vaccineType'] == 1){
					$vac = '1 Dose';
				} else if ($row['vaccineType'] == 2){
					$vac = 'Full Dose';
				} else if ($row['vaccineType'] == 3){
					$vac = 'Full Dose + Booster';
				}
				$output .='
					<?php for ($i=0;$i<5;$i++) { ?>

					      <div class="ui card m-2">
					        <div class="content">
					          <a href=""><img class="right floated mini ui image" src="assets/avatar_2.png"></a>
					          <div class="header">
					            '.$row['firstName'].' '.$row['lastName'].'
					          </div>
					          <div class="meta">
					            Professional
					          </div>
					        </div>
					        <div class="content">
					          <div class="description">
					            '.$row['description'].'
					          </div>
					          <div class="ui list">
					            <div class="item">
					              <i class="user icon"></i>
					              <div class="content">
					                '.$age.'
					              </div>
					            </div>
					            <div class="item">
					              <i class="venus mars icon"></i>
					              <div class="content">
					                '.$gender.'
					              </div>
					            </div>
					            <div class="item">
					              <i class="syringe icon"></i>
					              <div class="content">
					                '.$vac.'
					              </div>
					            </div>
					            <div class="item">
					              <i class="map marker alternate icon"></i>
					              <div class="content">
					                Olongapo City
					              </div>
					            </div>
					            <div class="item">
					                <div class="ui inverted black label my-1">
					                  4.7
					                </div>
					                 <div class="ui star rating" data-rating="5"></div>
					            </div>
					          </div>

					        </div>
					        <div class="content">
					          <span class="float-start mt-2">
					              <h5 style="font-weight: bold;">₱100/hr</h5>
					          </span>
					          <span class="float-end">
					            <a href="">
					              <div class="ui vertical animated button secondary" tabindex="0">
					                <div class="hidden content"   style="font-weight:400">Rent</div>
					                <div class="visible content">
					                  <i class="shop icon"   style="font-weight:400"></i>
					                </div>
					              </div>
					            </a>
					          </span>
					        </div>
					      </div>

					  <?php } ?>
				';
			}
		}
		else {
			$output = '<h3> No Drivers Found</h3>';
		}
		echo $output;
	}

?>