<?php 
  $userID = $_SESSION['userID']; 
  $sql = "SELECT * FROM tbl_users WHERE userId = '$userID'";
  $result = mysqli_query($dbconn, $sql);
  $row = mysqli_fetch_assoc($result);
  $userType = $row['userType'];
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <?php include 'php/notifications.php'; ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" id="click_notification" data-bs-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell" style="font-size: 18px;">
            <span class="badge badge-danger navbar-badge" id="count_notification">
              <!-- NUMBER OF NOTIFICATION -->
            </span>
          </i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="load_notification_list">
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>





          <!--<span class="dropdown-item dropdown-header">Notifications</span>-->
          <div class="dropdown-divider"></div>
          <?php if ($pendings > 0) { ?>
          <a href="owner-dashboard.php" class="dropdown-item">
            <i class="fas fa-cars"></i>
            <?php echo $pendings;?> New Pending Rentals
            <span class="float-right text-muted text-sm">4h ago</span>
          </a>
        <?php } ?>
        </div>
      </li>
    </ul>
  </nav>

 <!-- Main Sidebar Container -->
  <div class="preloader-wrapper">
    <div class="preloader-custom">
        <div class="spinner-border text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div>
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../assets/logo/Speedy_Logo_White.png" alt="Speedy" class="brand-image">
      <span class="brand-text font-weight-heavy">Account</span>
    </a>

     <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/avatar_2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['firstName'].' '.$row['lastName'];?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">User</li>
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>User Profile</p>
              </a>
            </li>
          </li>

          <?php if($userType==2){ ?>
          <li class="nav-header">Owner</li>
          <li class="nav-item">
            <a href="owner-dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="owner-history.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="owner-cars.php" class="nav-link">
              <i class="nav-icon fas fa-cars"></i>
              <p>
                Cars
              </p>
            </a>
          </li>
        <?php } ?>

          <!-- <li class="nav-header">Driver</li>
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="game-types.php" class="nav-link">
              <i class="nav-icon fas fa-steering-wheel"></i>
              <p>
                Driver Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="game-levels.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                History
              </p>
            </a>
          </li> -->
          <?php if($userType == 3){ ?>
          <li class="nav-header">Admin</li>
          <!-- <li class="nav-item">
            <a href="car-types.php" class="nav-link">
              <i class="nav-icon fas fa-shuttle-van"></i>
              <p>
                Car Types
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="../php/logout.php" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Car Brands
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user-credentials.php" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                User Verification
              </p>
            </a>
          </li>
        <?php } ?>
      

          <li class="nav-header">Exit</li>
          <li class="nav-item">
            <a href="../" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home Page
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="modal" data-bs-target="#confirm-logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Log out Confirmation -->
  <div class="modal fade" id="confirm-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure, do you want to logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form method="POST" action="../php/logout.php">
           <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Notification Details -->
  <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form name="" id="">
        <div class="modal-header bg-black">
          <h5 class="modal-title"><i class="fas fa-bell"></i> Notification Details</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body notification-body">
          
        </div>
      </form>
    </div>
  </div>
</div>





  