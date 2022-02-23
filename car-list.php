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
<?php 
$sql = "SELECT c.*, i.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_image i ON c.carID = i.carID INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 AND i.status = 1 AND i.displayImage = 1";
$result = mysqli_query($dbconn, $sql);

foreach ($result as $row) { ?>

      <div class="ui card m-2">
        <div class="content">
          <div class="right floated meta">14h</div>
            <?php echo $row['name']; ?>
        </div>
        <div class="image">
          <?php if ($row['driverID']!=NULL){ ?>
            <div class="ui black right corner label">
              <i class="user plus icon"></i>
            </div>
          <?php } ?>
          <img class="p-2" src="assets/cars/<?php echo $row['image'];?>" alt="<?php echo $row['title']; ?>">
        </div>
        <div class="content">
          <div class="row">
            <div class="col-6">
              <i class="user icon"></i> <?php echo $row['capacity']; ?> Seater
            </div>
            <div class="col-6">
              <i class="cogs icon"></i> <?php echo $row['transmission']; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <i class="gas pump icon"> </i><?php echo $row['engine']; ?>
            </div>
            <div class="col-6">
              <i class="car icon"></i> <?php echo $row['type']; ?>
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
              <h5 style="font-weight: bold;">₱<?php echo $row['rate'];?>/hr</h5>
          </span>
          <span class="float-end">
            <a href="cars.php?car=<?php echo $row['name'];?>&carID=<?php echo $row['carID']; ?>">
              <div class="ui vertical animated button secondary rent-btn" tabindex="0">
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