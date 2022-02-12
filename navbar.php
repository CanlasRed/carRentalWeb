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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="car-list.php">Cars</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <div class="ui vertical animated black button rounded-pill" tabindex="0">
            <div class="hidden content">Login</div>
            <div class="visible content">
              Login
            </div>
          </div>
        </li>
      </ul>
    </div>


  </div>
</nav>


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