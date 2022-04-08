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
                    $sql = "SELECT *, r.createdAt as rcreatedAt FROM tbl_rental r INNER JOIN tbl_customers c ON r.customerID = c.customerID WHERE r.customerID = 1 ORDER BY r.createdAt DESC";
                    $result = mysqli_query($dbconn, $sql);
                    foreach($result as $row){ 
                      ?>
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
                      <?php } else if ($row['status'] == 'review') {?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-olive">
                            To Review
                          </div>
                        </div>
                      <?php } else if ($row['status'] == 'overdue') {?>
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-indigo">
                            Overdue
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
                        <small class="text-muted"><?php  echo get_time_ago(strtotime($row['rcreatedAt']));?></small>
                      <?php } else { ?>
                        <small class="text-muted"><?php  echo get_time_ago(strtotime($row['updatedAt']));?></small>
                      <?php } 
                       if ($row['status'] == 'pending'){ ?>
                          <div class="text-right">
                            <a href="#" id="cancel_btn" data-id="<?php echo $row['rentalID']; ?>" data-bs-toggle="modal" data-bs-target="#cancel_modal" class="btn btn-sm btn-danger">
                              <i class="fas fa-ban"></i> Cancel
                            </a>
                          </div>
                        <?php } else if ($row['status'] == 'pickup') { ?>
                          <div class="text-right">
                            <a href="#" id="cancel_btn" data-id="<?php echo $row['rentalID']; ?>" data-bs-toggle="modal" data-bs-target="#cancel_modal" class="btn btn-sm btn-danger">
                              <i class="fas fa-ban"></i> Cancel
                            </a>
                          </div>
                        <?php } else if ($row['status'] == 'review') { ?>
                          <div class="text-right">
                            <a href="#" id="rate_btn" data-id="<?php echo $row['rentalID']; ?>" data-bs-toggle="modal" data-bs-target="#review_modal" class="btn btn-sm bg-olive">
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

<div class="modal fade" id="review_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Rate this Ride</h3>
        <center><div class="ui massive yellow rating"></div></center>
        <p class="text-center text-muted" id="invalid_rating"><small>Please select a rating</small></p>

          <div class="form-group">
            <input type="number" class="form-control" hidden name="rate" id="hidden_rate">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" hidden name="rentalID" id="hidden_rentalID">
          </div>

          <h3 class="text-center">Leave a Comment</h3>
          <div class="summernote" id="summer_comment" name="comment">

          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="submitReview()" class="btn btn-info">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="cancel_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancel Booking</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">

<form method="POST" enctype="multipart/form-data" action="php/cancel_booking.php" id="cancel_booking_form">

        <div class="form-group">
          <label>Select reason for cancellation</label>
          <select class="form-control" id="reason">
            <?php 
            $result = mysqli_query($dbconn, "SELECT * FROM tbl_cancellation_reasons;");
            foreach ($result as $row){ ?>
              <option value="<?php echo $row['reasonID']; ?>"><?php echo $row['reason']; ?></option>
           <?php } ?>
          </select>
        </div>


          <div class="form-group">
            <input type="number" class="form-control" hidden name="rentalID" id="hidden_rentalID2">
          </div>

          <div class="form-group">
            <label>Remarks</label>
            <textarea name="remarks" id="remarks" class="form-control" required></textarea>
          </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" onclick="submitCancellation()" class="btn btn-info">Submit</button>
      </div>
    </div>
  </div>
</div>

<?php include 'script.php'?>

<script type="text/javascript">
  $('.summernote').summernote({
     height: 200,
     toolbar: [
     ["font", ["bold", "underline", "clear"]],
     ["color", ["color"]],
     ["para", ["ul", "ol"]],
     ["insert", ["link","picture"]],
     ],
     callbacks: {
      onImageUpload: function(files) {
        editor = $(this);
        for(var i = files.length - 1;i>=0;i--){
          sendFile(files[i],editor);
        }
      }
    }
  });

  $('.ui.rating').rating({
    maxRating: 5,
    onRate(value){
      $('#hidden_rate').val(value);
      $('#invalid_rating').attr('hidden', true);
    }
  });

  $('.acceptBooking').on('click', function(){
    var status = $(this).attr('data-action');
    var rentalID = $(this).attr('data-id');
    if(status == 'pickup'){
      var statement = 'Accept Booking';
    } else if (status == 'dropoff'){
      var statement = 'Confirm car pick-up';
    } else if(status == 'completed'){
      var statement = 'Confirm car drop-off';
    } else if(status == 'cancelled'){
      var statement = 'Cancel Booking';
    }
    Swal.fire({
      icon: 'question',
      title: statement,
      confirmButtonColor: '#1b1c1d',
      showCancelButton: true,
      confirmButtonText: 'Yes'
    }).then((result) =>{
      if(result.isConfirmed){
        $.ajax({
          type: 'POST',
          url: 'php/change_booking_status.php',
          data:{
            status: status,
            rentalID: rentalID,
          },
          success: function(data){
            if(data == 200){
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Action Success',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              }).then((result) =>{
                location.reload();
                                                      
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Unexpected error has occured',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
          }
        });
      }
     })
  });


function submitReview(){
  var rate = $('#hidden_rate').val();
  var comment = $('#summer_comment').summernote('code');
  var rentalID = $('#hidden_rentalID').val();
  if (rate == null || rate < 1){
    Swal.fire({
      icon: 'error',
      title: 'Invalid',
      text: 'Select a rating first',
      confirmButtonColor: '#1b1c1d',
      confirmButtonText: 'OK'
    })
  } else {
    $.ajax({
      type: "POST",
      url: "php/create_review.php",
      data: {
        rentalID: rentalID,
        rate: rate,
        comment: comment
      },
      success: function(data){
        if(data == 200){
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Review Submitted',
            confirmButtonColor: '#1b1c1d',
            confirmButtonText: 'OK'
          }).then((result) =>{
            location.reload();

          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'The transaction/car is either invalid or not existing',
            confirmButtonColor: '#1b1c1d',
            confirmButtonText: 'OK'
          })
        }
      }
    });
  }
}

$('#rate_btn').on('click', function(){
  var rentalID = $(this).attr('data-id');
  $('#hidden_rentalID').val(rentalID);
});

$('#cancel_btn').on('click', function(){
  var rentalID = $(this).attr('data-id');
  $('#hidden_rentalID2').val(rentalID);
});


function submitCancellation(){
  var reason = $('#reason :selected').val();
  var remarks = $('#remarks').val();
  var rentalID = $('#hidden_rentalID2').val();
    $.ajax({
      type: "POST",
      url: "php/cancel_booking.php",
      data: {
        rentalID: rentalID,
        reason: reason,
        remarks: remarks
      },
      success: function(data){
        if(data == 200){
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Booking Cancelled',
            confirmButtonColor: '#1b1c1d',
            confirmButtonText: 'OK'
          }).then((result) =>{
            location.reload();

          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error has occured. Booking is not cancelled',
            confirmButtonColor: '#1b1c1d',
            confirmButtonText: 'OK'
          })
        }
      }
    });
  
}


</script>


</body>
</html>

