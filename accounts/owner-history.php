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
            <h1>Owner History</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
      <div class="row">



        <div class="col-md-12">
        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> Bookings</h3>
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
                <div id="hipGrid">
              <?php
              $sql = "SELECT *,r.createdAt as rcreatedAt FROM tbl_rental r INNER JOIN tbl_customers c ON r.customerID = c.customerID WHERE ownerID = 1 AND (status = 'completed' OR status = 'cancelled') ORDER BY r.rentalID DESC";
              $result = mysqli_query($dbconn, $sql);
              foreach($result as $row){ ?>
              <div class="hip-item">
                <!-- RIBBONS -->
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
                        <li class="small">
                          <i class="fas fa-map-marker"></i> Olongapo City
                        </li>
                        <li class="small">
                          <i class="fas fa-calendar-alt"></i> 
                          <?php echo date('M-d-Y h:i a', strtotime($row['startDate']));?>
                        </li>
                        <li class="small">
                          <i class="fas fa-calendar-check"></i> 
                          <?php echo date('M-d-Y h:i a', strtotime($row['endDate']));?>
                        </li>
                        <li class="small">
                          <i class="fas fa-hourglass-half"></i> <?php echo get_time_diff(strtotime($row['startDate']), strtotime($row['endDate'])); ?>
                        </li>
                        <li>
                          <?php 
                          $sql = "SELECT *, SUM(carAmount+deposit+addCharge) AS total FROM tbl_payment WHERE rentalID = ".$row['rentalID']."";
                          $result=mysqli_query($dbconn, $sql);
                          $amount = mysqli_fetch_assoc($result);
                          setlocale(LC_MONETARY, "en_US");
                          ?>
                          <b>₱ <?php echo number_format($amount['total']); ?></b>
                        </li>
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



                <!-- ACTIONS -->
                <div class="card-footer">
                  <?php if ($row['status'] == 'pending'){ ?>
                  <small class="text-muted"><?php  echo get_time_ago(strtotime($row['rcreatedAt']));?></small>
                <?php } else { ?>
                  <small class="text-muted"><?php  echo get_time_ago(strtotime($row['updatedAt']));?></small>
                  <?php } 
                  if ($row['status'] == 'pending'){ ?>
                    <div class="text-right">
                      <a data-action="cancelled" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-danger acceptBooking">
                        <i class="fas fa-ban"></i> Reject
                      </a>
                      <a data-action="pickup" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-success acceptBooking">
                        <i class="fas fa-check"></i> Accept
                      </a>
                    </div>
                  <?php } else if ($row['status'] == 'pickup') { ?>
                    <div class="text-right">
                      <a data-action="cancelled" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-danger acceptBooking">
                        <i class="fas fa-ban"></i> Cancel
                      </a>
                      <a data-action="dropoff" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-info acceptBooking">
                        <i class="fas fa-check"></i> Pick-Up
                      </a>
                    </div>
                  <?php } else if ($row['status'] == 'dropoff' || $row['status'] == 'overdue') { ?>
                    <div class="text-right">
                      <a data-action="review" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm bg-purple acceptBooking">
                        <i class="fas fa-check"></i> Drop-Off
                      </a>
                    </div>
                  <?php } ?>
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

<script type="text/javascript">
      $(document).ready(function(){
          $('#hipGrid').hip({
            itemsPerPage: 10,
            dynItemsPerRow: {
              hs: 1,
              sm: 1,
              md: 2,
              lg: 3
            },
            paginationPos:'right',
            filter:true,
            filterPos:"right",
            filterText:"Search"
          });
      });
    </script>

<script type="text/javascript">
  $('.acceptBooking').on('click', function(){
    var status = $(this).attr('data-action');
    var rentalID = $(this).attr('data-id');
    if(status == 'pickup'){
      var statement = 'Accept Booking';
    } else if (status == 'dropoff'){
      var statement = 'Confirm car pick-up';
    } else if(status == 'review'){
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
</script>


</body>
</html>
