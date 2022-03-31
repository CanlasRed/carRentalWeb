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
            <h1>Owned Cars</h1>
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


        <div class="col-md-4">
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
                <div class="col-lg-12">
                  <!-- small box -->
                  <div class="info-box">
                    <span class="info-box-icon bg-black">
                      <i style="font-size: 30px;" class="fas fa-cars"></i>
                    </span>
                    <div class="info-box-content">
                      <?php 
                        $sql = "SELECT COUNT(*) AS 'count' FROM tbl_cars WHERE ownerID = 1";
                        $result = mysqli_query($dbconn, $sql);
                        $row = mysqli_fetch_assoc($result);
                      ?>
                      <span class="info-box-text">Number of Cars</span>
                      <span class="info-box-number"><?php echo $row['count']?></span>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-12">
                  <!-- small box -->
                    <div class="info-box">
                      <span class="info-box-icon bg-black">
                        <i style="font-size: 30px;" class="fas fa-clipboard-check"></i>
                      </span>
                      <div class="info-box-content">
                        <?php 
                          $sql = "SELECT COUNT(*) AS 'count' FROM tbl_cars WHERE ownerID = 1";
                          $result = mysqli_query($dbconn, $sql);
                          $row = mysqli_fetch_assoc($result);
                        ?>
                        <span class="info-box-text">Successful Bookings</span>
                        <span class="info-box-number"><?php echo $row['count']?></span>
                      </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-12">
                  <!-- small box -->
                    <div class="info-box">
                      <span class="info-box-icon bg-black">
                        <i style="font-size: 30px;" class="fas fa-book"></i>
                      </span>
                      <div class="info-box-content">
                    <?php 
                        $sql = "SELECT COUNT(*) AS 'count' FROM tbl_rental WHERE ownerID = 1 AND status = 'pending'";
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
        </div>
        <!-- ./card -->


        <div class="col-md-8">
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
              <div class="col-12 col-xl-4 col-lg-6 col-sm-12 col-md-6 d-flex align-items-stretch flex-column">
              <div class="ui card m-2">
              <div class="content">
                <div class="right floated meta">14h</div>
                  <?php echo $row['name'] ?>
              </div>
              <div class="image">
                <?php if ($row['driverID']!=NULL){ ?>
                  <div class="ui black right corner label">
                    <i class="user plus icon"></i>
                  </div>
               <?php } 
                $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY carID ASC";
                  $res = mysqli_query($dbconn, $sql);
                  $img = mysqli_fetch_assoc($res);
               ?>
                <div style="width:100%; overflow:hidden; height:220px; background: url(../assets/cars/<?php echo $img['image']; ?>) no-repeat center; background-size: contain;">
                </div>
              </div>
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
                        4.7
                      </div>
                       <div class="ui star rating" data-rating="5"></div>
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

