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

                <a href="#" class="btn bg-black btn-block"><b>Edit Profile</b></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-bs-toggle="tab">Bookings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-bs-toggle="tab">History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-bs-toggle="tab">Edit Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                    <?php
                    $sql = "SELECT * FROM tbl_rental r INNER JOIN tbl_customers c ON r.customerID = c.customerID WHERE r.customerID = 1 AND status != 'done'";
                    $result = mysqli_query($dbconn, $sql);
                    foreach($result as $row){ ?>
                    <div class="col-12 col-lg-6 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                      <?php if ($row['status'] == 'pending'){ ?>
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-warning">
                            Pending
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'pickup') { ?>
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-info">
                            Pick-Up
                          </div>
                        </div>
                      <?php } ?>
                      <div class="card-header border-bottom-0">
                        <?php $sql = "SELECT * FROM tbl_cars WHERE carID = ".$row['carID']."";
                        $res = mysqli_query($dbconn,$sql);
                        $car = mysqli_fetch_assoc($res); ?>
                        <b><a style="color:#1b1c1d" href="../cars.php?car=<?php echo $car['name'];?>&carID=<?php echo $car['carID'];?>"><?php echo $car['name'];?></a></b>
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
                            <img src="../assets/cars/toyota_fortuner.png" alt="car-image" class="img-circle img-fluid">
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
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                </div>

                  </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
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

