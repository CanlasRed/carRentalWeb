<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drivers | Speedy</title>
    <link rel="icon" type="icon" href="favicon.ico">
    <?php include 'header.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <?php include 'driver-sidebar.php'; ?>
        
<div class="pt-5 col-lg-9 col-md-8 col-sm-12 col-xs-12" style="display: block; width: 100%;">

    <div class="ui secondary  menu">
      <div class="item" style="width: 400px;">
        <div class="ui fluid icon input large">
          <input type="text" placeholder="Search...">
          <i class="search link icon"></i>
        </div>
      </div>
      <div class="right menu">
          <div class="ui floating dropdown labeled icon button">
            <i class="filter icon pt-4"></i>
            <span class="text mt-1">Sort</span>
            <div class="menu">
              <div class="header">
                <i class="tags icon"></i>
                Sort By:car
              </div>
              <div class="divider"></div>
              <div class="item">
                <i class="thumbs up icon"></i>
                Relevance
              </div>
              <div class="item">
                <i class="clock icon"></i>
                Latest
              </div>
              <div class="item">
                <i class="sort amount up icon"></i>
                Price: Low to High
              </div>
              <div class="item">
                <i class="sort amount down icon"></i>
                Price: High to Low
              </div>
            </div>
          </div>
      </div>
    </div>


    <div class="p-4 ui grid" id="driver-list-container">

    </div>
  

</div>
    </div>
   <!--  <?php include 'footer.php' ?> -->
    <?php include 'scripts.php'; ?>
    <script type="text/javascript" src="js/driver-filtering.js"></script>


</body>
</html>