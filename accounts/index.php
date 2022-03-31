<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account | Speedy</title>
  <?php include 'header.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
 
<!-- Site wrapper -->

<div class="wrapper">
  


  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Profile</h1>
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
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#bookings" data-bs-toggle="tab">Bookings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-bs-toggle="tab">History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit-profile" data-bs-toggle="tab">Edit Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="bookings">
                    <div class="row">
                    <?php
                    $sql = "SELECT * FROM tbl_rental r INNER JOIN tbl_customers c ON r.customerID = c.customerID WHERE r.customerID = 1 AND status != 'done'";
                    $result = mysqli_query($dbconn, $sql);
                    foreach($result as $row){ ?>
                    <div class="col-12 col-lg-6 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                     <?php if ($row['status'] == 'pending'){ ?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-warning">
                            Pending
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'pickup') { ?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-info">
                            Pick-Up
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'dropoff') { ?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-purple">
                            Ongoing
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'completed') {?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-success">
                            Complete
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'cancelled') {?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-danger">
                            Cancelled
                          </div>
                        </div>
                      <?php } ?>
                      <div class="card-header border-bottom-0">
                        <?php $sql = "SELECT * FROM tbl_cars WHERE carID = ".$row['carID']."";
                        $res = mysqli_query($dbconn,$sql);
                        $car = mysqli_fetch_assoc($res); ?>
                        <b>Transaction No: <?php echo $row['rentalID'];?></b>
                       
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                             <b><a style="color:#1b1c1d" href="../cars.php?car=<?php echo $car['name'];?>&carID=<?php echo $car['carID'];?>"><?php echo $car['name'];?></a></b>
                            <h2 class="lead"><b><?php echo $row['firstName'].' '.$row['lastName'];?></b></h2>

                            <ul class="ml-0 mb-0 fa-ul text-muted">
                              <li class="small"><i class="fas fa-map-marker"></i> Olongapo City</li>
                              <li class="small"><i class="fas fa-calendar-alt"></i> <?php echo date('M-d-Y h:i a', strtotime($row['startDate']));?></li>
                              <li class="small"><i class="fas fa-calendar-check"></i> <?php echo date('M-d-Y h:i a', strtotime($row['endDate']));?></li>
                              <li class="small"><i class="fas fa-hourglass-half"></i> 24 Hours</li>
                              <li><b>₱ 6,000</b></li>
                            </ul>

                          </div>
                          <div class="col-5 text-center">
                            <?php 
                              $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY imageID ASC LIMIT 1";
                              $result = mysqli_query($dbconn, $sql);
                              $carIMG = mysqli_fetch_assoc($result);
                              ?>
                            <img src="../assets/cars/<?php echo $carIMG['image']; ?>" alt="car-image" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <?php if ($row['status'] == 'pending'){ ?>
                          <div class="text-right">
                            <a href="#" class="btn btn-sm btn-danger">
                              <i class="fas fa-ban"></i> Cancel
                            </a>
                          </div>
                        <?php } else if ($row['status'] == 'pickup') { ?>
                          <div class="text-right">
                            <a href="#" class="btn btn-sm btn-danger">
                              <i class="fas fa-ban"></i> Cancel
                            </a>
                          </div>
                        <?php } else if ($row['status'] == 'completed') { ?>
                          <div class="text-right">
                            <a href="#" class="btn btn-sm btn-info">
                              <i class="fas fa-star"></i> Rate
                            </a>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                </div>

                  </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="history">
                    <div class="row">
                      <div class="col-12">
                        <div class="card bg-light d-flex flex-fill">
                          <div class="card-header border-bottom-0">
                            <?php $sql = "SELECT * FROM tbl_cars WHERE carID = ".$row['carID']."";
                            $res = mysqli_query($dbconn,$sql);
                            $car = mysqli_fetch_assoc($res); ?>
                            <a style="color:#1b1c1d" href="../cars.php?car=<?php echo $car['name'];?>&carID=<?php echo $car['carID'];?>">
                              <h4 style="font-weight: bold"><?php echo $car['name'];?></h4>
                            </a>
                          </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b><?php echo $row['firstName'].' '.$row['lastName'];?></b></h2>

                            <ul class="ml-0 mb-0 fa-ul text-muted">
                              <li class="small"><i class="fas fa-map-marker"></i> Olongapo City</li>
                              <li class="small"><i class="fas fa-calendar-alt"></i> <?php echo date($row['startDate']);?></li>
                              <li class="small"><i class="fas fa-calendar-check"></i> <?php echo date($row['endDate']);?></li>
                              <li class="small"><i class="fas fa-hourglass-half"></i> 24 Hours</li>
                              <li><b>₱ 6,000</b></li>
                            </ul>

                          </div>
                          <div class="col-5 text-center">
                            <img src="../assets/cars/toyota_fortuner.png" width="200" alt="car-image" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                            <a href="#" class="btn btn-sm bg-black">
                              Rent Again
                            </a>
                          </div>
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="edit-profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="fname" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lname" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" placeholder="Phone No.">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="password" placeholder="Password">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-black">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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

