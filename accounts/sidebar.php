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
        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell" style="font-size: 18px;">
            <span class="badge badge-danger navbar-badge"></span>
          </i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
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
          <a href="#" class="d-block">Juan Dela Cruz</a>
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
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
              </p>
            </a>
          </li>

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
      

          <li class="nav-header">Exit</li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home Page
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../php/logout.php" class="nav-link">
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

  