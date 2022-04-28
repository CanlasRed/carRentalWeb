<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <div class="container">

    <a class="navbar-brand logo-full" href="#"><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 40px;"></a>
    <a class="navbar-brand logo-min" href="#"><img src="assets/logo/Speedy_Logo_Black.png" style="height: 40px;"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-lg-1">
        <li class="nav-item px-3">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="car-list.php">Cars</a>
        </li>
        

        <?php if(isset($_SESSION['userID'])) { ?>
         <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="accounts">Account</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirm-logout">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle click_notification" href="#" id="click_notification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bell icon" style="font-size: 18px;">
              <span class="badge rounded-pill bg-danger" id="count_notification" style="margin-left: -0.6rem;"></span>
            </i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="load_notification_list" style="margin-left: -18rem !important; width: 300px;">
            <!-- NUMBER OF NOTIFICATION -->
          </div>
          
          <!--
          <button type="button" class="btn btn-primary position-relative">
            Inbox
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              99+
              <span class="visually-hidden">unread messages</span>
            </span>
          </button>
        -->
          
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a href="login.php">
            <div class="ui vertical animated black button rounded-pill" tabindex="0">
              <div class="hidden content">Login</div>
              <div class="visible content">
                Login
              </div>
            </div>
          </a>
        </li>
      <?php } ?>
      
    </ul>
  </div>


</div>
</nav>

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
          <form method="POST" action="php/logout.php">
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
          <h5 class="modal-title text-light"><i class="bell icon"></i> Notification Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body notification-body">
          
        </div>
      </form>
    </div>
  </div>
</div>

<style type="text/css">
  .nav-item a{
    font-weight: 500;
  }
  .logo-min{
    display: none;
  }
  @media(max-width: 576px){
    .logo-min{
      display: block;
    }
    .logo-full{
      display: none;
    }
  }
</style>