<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars | Speedy</title>
    <link rel="icon" type="icon" href="favicon.ico">
    <?php include 'header.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        
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
                Sort By:
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



    <div class="p-4 ui grid">
<?php for ($i=0;$i<5;$i++) { ?>

      <div class="ui card m-2">
        <div class="content">
          <div class="right floated meta">14h</div>
            Kia Picanto
        </div>
        <div class="image">
          <img src="assets/car-types/hatchback.png">
        </div>
        <div class="content">
          <div class="row">
            <div class="col-6">
              4 Seater
            </div>
            <div class="col-6">
              Auto
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              Engine: Gas
            </div>
            <div class="col-6">
              Type: Hatchback
            </div>
          </div>
        </div>
        <div class="content">
          <span class="float-start mt-2">
              <h5 style="font-weight: bold;">₱4,000</h5>
          </span>
          <span class="float-end">
            <a href="">
              <div class="ui vertical animated button secondary" tabindex="0">
                <div class="hidden content"   style="font-weight:400">Rent</div>
                <div class="visible content">
                  <i class="shop icon"   style="font-weight:400"></i>
                </div>
              </div>
            </a>
          </span>
        </div>
      </div>

  <?php } ?>
    </div>

</div>
    </div>
   <!--  <?php include 'footer.php' ?> -->
    <?php include 'scripts.php'; ?>


</body>
</html>