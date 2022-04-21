<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account | Speedy</title>
  <?php include 'header.php';?>
  <!-- SEMANTIC UI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
 
<!-- Site wrapper -->

<div class="wrapper">
  


  <!-- /.navbar -->

  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Owner Profile</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right">
              <a href="add-car.php">
              <div class="ui vertical green animated button rounded-pill rent-btn" tabindex="0">
                <div class="hidden content" style="font-weight:bold"><i class="fas fa-plus"></i> Add New Car</div>
                  <div class="visible content">
                      <i class="fas fa-plus"></i> Add New Car
                  </div>
              </div>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
      <div class="row">
        <?php
            $sql = "SELECT * FROM tbl_customers WHERE customerID = 1";
            $result = mysqli_query($dbconn, $sql);
            $row = mysqli_fetch_assoc($result);
          ?>
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-dark card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/avatar_2.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['firstName'].' '.$row['lastName']; ?></h3>

                <p class="text-muted text-center">Owner <i class="fas fa-badge-check"></i></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <p class="float-right"><?php echo $row['username']?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Phone No.</b> <p class="float-right"><?php echo $row['phone']?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Location</b> <p class="float-right">Olongapo City</p>
                  </li>
                </ul>

                <a href="#" class="btn bg-black btn-block"><b><i class="fas fa-badge-check"></i> Verify Account</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>


        <div class="col-md-9">
        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> My Cars</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
              <!-- /.card-header -->
              <!-- form start --> 
            <div class="card-body">
              <div class="row">

              <?php
             $sql = "SELECT c.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 AND c.ownerID = 1 ";
              $result = mysqli_query($dbconn, $sql);
              foreach($result as $row){ ?>
              <div class="col-12 col-xl-4 col-lg-4 col-sm-12 col-md-6">
              <div class="ui card m-2" style="width:100%">
              <div class="content">
                <div class="right floated meta"><small><?php  echo get_time_ago(strtotime($row['createdAt']));?></small></div>
                 <a style="font-weight: bold;text-decoration: none; color:#1b1c1d;" href="../cars.php?car=<?php echo $row['name'];?>&carID=<?php echo $row['carID'];?>">
                  <?php echo $row['name'] ;?>
                  </a>
              </div>
              <a href="../cars.php?car=<?php echo $row['name'];?>&carID=<?php echo $row['carID'];?>" class="image">
                <?php
                $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY carID ASC";
                  $res = mysqli_query($dbconn, $sql);
                  $img = mysqli_fetch_assoc($res);
               ?>
                <div style="width:100%; overflow:hidden; height:220px; background: url(../assets/cars/<?php echo $img['image']; ?>) no-repeat center; background-size: contain;">
                </div>
              </a>
              <div class="content">
                <div class="row">
                  <div class="col-6">
                    <i class="user icon"></i><?php echo $row['capacity']?> Seater
                  </div>
                  <div class="col-6">
                    <i class="cogs icon"></i> <?php echo $row['transmission']?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <i class="gas pump icon"></i><?php echo $row['engine']?> 
                  </div>
                  <div class="col-6">
                    <i class="car icon"></i><?php echo $row['type']?> 
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12">
                      <div class="ui inverted black label my-1">
                        <?php 
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
                         echo round($avgRatings,1); ?>
                      </div>
                        <div class="ui yellow rating" data-rating="<?php echo round($avgRatings); ?>"></div>
                  </div>
                </div>
              </div>
              <div class="content">
                <span class="float-start mt-2">
                    <h3 class="fw-bolder">₱<?php echo $row['rate']?>/hr</h3>
                </span>
                <span class="float-right">
                  <a href="edit-car.php?car=<?php echo $row['name'].'&carID='.$row['carID']?>">
                    <div class="ui vertical animated button secondary rent-btn" tabindex="0">
                      <div class="hidden content"   style="font-weight:bold">Edit</div>
                      <div class="visible content">
                        Edit
                      </div>
                    </div>
                  </a>
                  <a href="../cars.php?car=<?php echo $row['name'].'&carID='.$row['carID']?>">
                    <div class="ui vertical animated button secondary rent-btn" tabindex="0">
                      <div class="hidden content"   style="font-weight:bold">View</div>
                      <div class="visible content">
                        View
                      </div>
                    </div>
                  </a>
                </span>
              </div>
            </div>
            </div>
          <?php } ?>

          </div>
          </div>
        </div>
        </div>


      </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--   <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include 'script.php'?>


</body>
</html>

