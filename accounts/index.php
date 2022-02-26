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
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav">
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="card card-olive">
              <!-- /.card-header -->
              <!-- form start --> 
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?php echo $count_users; ?></h3>

                      <p>Number of Users</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="users-table.php?page=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><?php echo $count_plants; ?></h3>

                      <p>Number of  Plants</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-leaf"></i>
                    </div>
                    <a href="plants-table.php?page=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $count_favs; ?></h3>

                      <p>Favorite Plants</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-star"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            <!-- ./col -->
              </div>




              <div class="row">
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?php echo $count_ban; ?></h3>

                      <p>Banned Users</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="users-table.php?page=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <h3><?php echo $count_game; ?></h3>

                      <p>Quiz Game Players</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-game-controller-b"></i>
                    </div>
                    <a href="plants-table.php?page=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                  <!-- small box -->
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <h3><?php echo $count_forum; ?></h3>

                      <p>Number of Forum Threads</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-chatbubbles"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            <!-- ./col -->
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

