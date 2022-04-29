<?php
session_start();
if($_SESSION['userType']!=2){
  header("Location: ../index.php");
} 
?>

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
          <div class="col-sm-6">
            <h1 style="font-weight: bold;">Owner Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
      <div class="row">


        <div class="col-md-6 col-lg-8">
        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> Overview</h3>
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
                <div class="col-lg-4">
                  <!-- small box -->
                  <div class="info-box">
                    <span class="info-box-icon bg-black">
                      <i style="font-size: 30px;" class="fas fa-cars"></i>
                    </span>
                    <div class="info-box-content">
                      <?php 
                        $sql = "SELECT COUNT(*) AS 'count' FROM tbl_cars WHERE ownerID = ".$_SESSION['userID']."";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_assoc($result);
                      ?>
                      <span class="info-box-text">Number of Cars</span>
                      <span class="info-box-number"><?php echo $row['count']?></span>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4">
                  <!-- small box -->
                    <div class="info-box">
                      <span class="info-box-icon bg-black">
                        <i style="font-size: 30px;" class="fas fa-clipboard-check"></i>
                      </span>
                      <div class="info-box-content">
                        <?php 
                          $sql = "SELECT COUNT(*) AS 'count' FROM tbl_rental WHERE ownerID = ".$_SESSION['userID']." AND status = 'completed'";
                          $result = mysqli_query($dbconn, $sql);
                          $row = mysqli_fetch_assoc($result);
                        ?>
                        <span class="info-box-text"> Successful Bookings</span>
                        <span class="info-box-number"><?php echo $row['count']?></span>
                      </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4">
                  <!-- small box -->
                    <div class="info-box">
                      <span class="info-box-icon bg-black">
                        <i style="font-size: 30px;" class="fas fa-book"></i>
                      </span>
                      <div class="info-box-content">
                    <?php 
                        $sql = "SELECT COUNT(*) AS 'count' FROM tbl_rental WHERE ownerID = ".$_SESSION['userID']." AND status = 'pending'";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_assoc($result);
                      ?>
                        <span class="info-box-text">Pending Bookings</span>
                        <span class="info-box-number"><?php echo $row['count']?></span>
                      </div>
                    </div>
                </div>
            <!-- ./col -->
              </div>
          </div>
        </div>

            <div class="card">
              <div class="card-header bg-black">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Successfull Bookings</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>


            <div class="card">
              <div class="card-header bg-black">
                <h3 class="card-title"><i class="fas fa-chart-line"></i> Sales</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>


        </div>
        <!-- ./card -->


        <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> Active Bookings</h3>
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
              $sql = "SELECT *,r.createdAt as rcreatedAt FROM tbl_rental r INNER JOIN tbl_users c ON r.customerID = c.userID WHERE ownerID = ".$_SESSION['userID']." AND status != 'completed' AND status != 'cancelled' ORDER BY r.rentalID DESC";
              $result = mysqli_query($dbconn, $sql);
              if (mysqli_num_rows($result)<=0){ ?>
                <div>
                  <h4 class="ml-3">No Active Bookings...</h4>
                </div>
              <?php } else { ?>
                <div id="hipGrid">
              <?php } 
              foreach($result as $row){ ?>
              <div class="hip-item">

                <!-- RIBBONS -->
              <div class="card bg-light d-flex flex-fill card_hover" data-id="<?php echo $row['rentalID'];?>">
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


                <div class="card-body card_view pt-0" data-id="<?php echo $row['rentalID'];?>">
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
                        <?php 
                        $sql = "SELECT *, SUM(carAmount+addCharge) AS total FROM tbl_payment WHERE rentalID = ".$row['rentalID']."";
                        $result=mysqli_query($dbconn, $sql);
                        $amount = mysqli_fetch_assoc($result);
                        setlocale(LC_MONETARY, "en_US");
                        if($amount['addCharge']>0){
                          ?>
                          <li>
                            <small>₱ <?php echo number_format($amount['carAmount']); ?>
                          </small>+ <b style="color: red">₱
                            <?php echo number_format($amount['addCharge']); ?>
                          </b>
                        </li>
                      <?php } ?>
                      <li>
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
                      <?php $date_now = date("Y-m-d H:i:s");
                        if($row['startDate']<=$date_now){ ?>
                          <a data-action="dropoff" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-info acceptBooking">
                            <i class="fas fa-check"></i> Pick-Up
                          </a>
                        <?php } else { ?>
                          <a data-action="dropoff" data-id="<?php echo $row['rentalID'];?>" class="btn btn-sm btn-info disabled acceptBooking">
                            <i class="fas fa-check"></i> Pick-Up
                          </a>
                        <?php } ?>
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

<!-- MODAL -->
<div class="modal fade" id="bookinginfo_Modal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form name="" id="">
        <div class="modal-header bg-black">
          <h5 class="modal-title"><i class="fas fa-cars"></i> Booking Information</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bookinginfo-body">
          
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ./MODAL -->


<?php include 'script.php'?>

    <script type="text/javascript">
      $(document).ready(function(){
          $('#hipGrid').hip({
            itemsPerPage: 10,
            itemsPerRow: 1,
            paginationPos:'right',
            filter:true,
            filterPos:"right",
            filterText:"Search"
          });
      });
    </script>

<script type="text/javascript">
  $('.card_view').on('click', function(){
    var rentalID = $(this).attr('data-id');

    $.ajax({
      url: 'php/booking_info.php',
      type: 'post',
      data: {rentalID: rentalID},
      success: function(response){ 

        $('.bookinginfo-body').html(response);
        $('#bookinginfo_Modal').modal('show'); 

      }
    });

  });

  $('.acceptBooking').on('click', function(){
    var status = $(this).attr('data-action');
    var rentalID = $(this).attr('data-id');
    if(status == 'pickup'){
      var statement = 'Accept Booking? Pending bookings under the same date will be cancelled';
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

  var months = [];
  var cancelled = [];
  var completed = [];
  var sales = [];

  $.ajax({
    type: 'POST',
    url: 'php/get_chart_value.php',
    data:{
      action: 'fetch',
    },
    success: function(data){
      data = JSON.parse(data);
      console.log(data);


      months = data.month;
      cancelled = data.cancelled;
      completed = data.completed;
      sales = data.sales;

      fillCharts(months, cancelled, completed, sales);

    }
  });

function fillCharts(months, cancelled, completed, sales){

  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')



    var areaChartData = {
      labels  : months,
      datasets: [
        {
          label               : 'Cancelled',
          backgroundColor     : 'rgba(220, 53, 69,0.7)',
          borderColor         : 'rgba(220, 53, 69,0.6)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(220, 53, 69,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220, 53, 69,1)',
          pointStyle: 'circle',
          pointRadius: 3,
          pointHoverRadius: 5,
          data                : cancelled
        },
        {
          label               : 'Completed',
          backgroundColor     : 'rgba(40, 167, 69, 0.7)',
          borderColor         : 'rgba(40, 167, 69, 0.6)',
          pointRadius         : false,
          pointColor          : 'rgba(40, 167, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(40, 167, 69,1)',
          pointStyle: 'circle',
          pointRadius: 3,
          pointHoverRadius: 5,
          data                : completed
        },
      ]
    }

    var salesChartData = {
      labels  : months,
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(40, 167, 69, 0.7)',
          borderColor         : 'rgba(40, 167, 69, 0.6)',
          pointRadius         : false,
          pointColor          : 'rgba(40, 167, 69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(40, 167, 69,1)',
          pointStyle: 'circle',
          pointRadius: 5,
          pointHoverRadius: 10,
          data                : sales
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        x: {
          display : true,
          title: {
            display: true
          }
        },
        y: {
          display : true,
          title: {
            display: true
          }
        }
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: salesChartData,
      options: areaChartOptions
    })

  var barChartCanvas = $('#barChart');
    var barChartData = $.extend(true, {}, areaChartData);
    var temp0 = areaChartData.datasets[0];
    var temp1 = areaChartData.datasets[1];
    barChartData.datasets[0] = temp1;
    barChartData.datasets[1] = temp0;

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
}
</script>


</body>
</html>

