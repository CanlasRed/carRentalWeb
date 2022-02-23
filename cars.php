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
    <?php include 'navbar.php'; 
    $sql = "SELECT c.*, i.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_image i ON c.carID = i.carID INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 AND i.status = 1 AND i.displayImage = 1 AND c.carID = ".$_GET['carID']."";
    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="container mt-4">

        <div class="row ui inverted raised segment p-3 m-0">
            <div class="ui medium header p-3">
                Car Details
            </div>
        </div>

        <div class="row m-0">

            <!-- LEFT COLUMN -->
            <div class="col-lg-9 mt-3">

                <!-- CAR DETAILS SEGMENT -->
                <div class=" ui raised segment">
                    <div class="row m-0">
                        <div class="col-12 py-3">
                            <div class="ui header large">
                                <?php echo $row['name'];?>
                            </div>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col-md-5">
                            <div class="row image-preview-slider">
                                <?php 
                                    $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$_GET['carID']." ";
                                    $result = mysqli_query($dbconn, $sql);
                                    foreach($result as $carImage) { ?>
                                        <img width="50px" src="assets/cars/<?php echo $carImage['image'];?>">
                                <?php } ?>
                            </div>
                             <div class="row">
                                 <div class="car-images-slider">
                                    <?php 
                                    foreach($result as $carImage) { ?>
                                        <div class="card" style="width:100px; height:100px">
                                            <div class="ui bordered image" style="height:auto; object-fit: cover;">
                                                <img height="100%" src="assets/cars/<?php echo $carImage['image'];?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-7">

                            <div class="row">
                                <div class="col-10 py-1">
                                    <div class="ui inverted black label my-1" data-tooltip="Top Speed" data-inverted="" data-variation="tiny">
                                      <i class="tachometer alternate icon"></i>
                                      <?php echo $row['speed']; ?>kph
                                    </div>
                                    <div class="ui inverted black label my-1" data-tooltip="Seating Capacity" data-inverted="" data-variation="tiny">
                                      <i class="user icon"></i>
                                      <?php echo $row['capacity']; ?>
                                    </div>
                                    <div class="ui inverted black label my-1" data-tooltip="Gear Transmission" data-inverted="" data-variation="tiny">
                                      <i class="cogs icon"></i>
                                      <?php echo $row['transmission']; ?>
                                    </div>
                                    <div class="ui inverted black label my-1" data-tooltip="Gasoline" data-inverted="" data-variation="tiny">
                                      <i class="gas pump icon"></i>
                                      <?php echo $row['engine']; ?>
                                    </div>
                                    <div class="ui inverted black label my-1" data-tooltip="Compartment Size" data-inverted="" data-variation="tiny">
                                      <i class="suitcase icon"></i>
                                      <?php echo $row['compartment']; ?>
                                    </div>
                                    <?php if ($row['AC'] == 1){ ?>
                                        <div class="ui inverted black label my-1" data-tooltip="Aircondition" data-inverted="" data-variation="tiny">
                                          <i class="snowflake icon"></i>
                                          A/C
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 py-2">
                                    <div class="ui header m-0">
                                        Car Details:
                                    </div>
                                    <div class="ui list">
                                        <div class="item">
                                            <i class="check icon"></i>
                                            <div class="content">
                                              With free driver
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="check icon"></i>
                                            <div class="content">
                                              Complete airbags
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="check icon"></i>
                                            <div class="content">
                                              Full tank to full tank
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="check icon"></i>
                                            <div class="content">
                                              1 Spare tire
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 py-2">
                                    <div class="ui inverted black label my-1">
                                        4.7
                                    </div>
                                    <div class="ui star rating" data-rating="5"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- RENTAL DATE SEGMENT -->
                <div class=" ui raised segment">
                    <div class="row m-0">
                        <div class="col-12 py-3">
                            <div class="ui header medium">
                                Car Rental Date
                            </div>
                        </div>
                    </div>
                    <div class="ui two column stackable grid pb-3">
                        <div class="ui vertical divider"></div>

                        <div class="middle aligned row ui form">
                          <div class="column px-5">

                            <div class="field">
                              <label>Pick-up Date</label>
                              <div class="ui inverted calendar" id="rangestart">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text" placeholder="Pick-up Date">
                                </div>
                              </div>
                            </div>

                            <div class="ui list">
                                <div class="item">
                                    <i class="map marker alternate icon"></i>
                                    <div class="content">
                                        Harbor Point, Ayala Malls Subic
                                        <div class="ui">
                                            2F SUBIC BAY TOW, Rizal Hwy, Subic Bay Freeport Zone, 2200 Zambales
                                        </div>
                                    </div>
                                </div>           
                            </div>

                          </div>
                          <div class="column px-5">

                            <div class="field">
                              <label>Drop-off Date</label>
                              <div class="ui inverted calendar" id="rangeend">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text" placeholder="Drop-off Date">
                                </div>
                              </div>
                            </div>

                            <div class="ui list">
                                <div class="item">
                                    <i class="map marker alternate icon"></i>
                                    <div class="content">
                                        Harbor Point, Ayala Malls Subic
                                        <div class="ui">
                                            2F SUBIC BAY TOW, Rizal Hwy, Subic Bay Freeport Zone, 2200 Zambales
                                        </div>
                                    </div>
                                </div>           
                            </div>

                          </div>
                        </div>
                      </div>
                       
                </div>

                <!-- DRIVER SEGMENT -->
                 <div class=" ui raised segment mb-3">
                    <div class="row m-0">
                        <div class="col-12 py-3">
                            <div class="ui header medium">
                                <label>Driver</label>
                                  <div class="ui toggle checkbox">
                                    <input type="checkbox" checked="checked">
                                    <label></label>
                                  </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 px-3 my-1 mx-2">

                          <div class="ui horizontal card" style="width:100%">

                            <div style="height: 100%; max-width: 210px;">
                              <img class="img-fluid"  src="https://cdn.pixabay.com/photo/2017/08/01/01/33/beanie-2562646_960_720.jpg">
                            </div>

                            <div class="content">
                              <div class="header">Juan Dela Driver</div>
                              <div class="meta">
                                <a>Professional</a>
                              </div>
                              <div class="description">
                                <div>
                                    <i class="mars icon"></i>
                                    Male
                                </div>
                                <div>
                                    <i class="sort numeric up icon"></i>
                                    23
                                </div>
                                <div>
                                    <i class="map marker alternate icon"></i>
                                    Olongapo City
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                        
                    </div>
                       
                </div>

            </div>
            <!-- END OF LEFT COLUMN -->


            <!-- RIGHT COLUMN -->
            <div class="col-lg-3 mt-3">
                <div class="ui inverted raised clearing segment">
                    <h4 class="ui header">Owner Info</h4>
                    <div>
                        <img class="ui avatar image" src="assets/car-types/hatchback.png">
                        <span><a href="" style="text-decoration: none; color: #fff; font-weight: bold;">Juan Dela Cruz</a></span>

 <!--                        <button class="circular ui right floated icon button">
                          <i class="icon comments"></i>
                        </button> -->
                    </div>
                    <div>
                        <i class="mars icon"></i>
                        Male
                    </div>
                    <div>
                        <i class="sort numeric up icon"></i>
                        23
                    </div>
                    <div>
                        <i class="map marker alternate icon"></i>
                        Olongapo City
                    </div>
                </div>

                <div class="ui inverted raised clearing segment">
                    <h3 class="ui header">Price Summary</h3>
                    <div>
                        Car Rental Fee:
                        <div class="float-end">
                            3,000
                        </div>
                    </div>
                    <div>
                        Drivers Fee:
                        <div class="float-end">
                            1,000
                        </div>
                    </div>
                    <div>
                        Deposit:
                        <div class="float-end">
                            2,000
                        </div>
                    </div>
                    <div class="mt-3 ui header">
                        Total Amount:
                        <div class="float-end ui inverted header">
                            6,000
                        </div>
                    </div>
                    <div class="ui fluid large vertical green animated submit button rounded-pill">
                      <div class="hidden content">Book</div>
                      <div class="visible content">
                        Book
                      </div>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
   <!--  <?php include 'footer.php' ?> -->
    <?php include 'scripts.php'; ?>

    <script type="text/javascript">
        $(document).ready(function(){
             $('.image-preview-slider').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.car-images-slider'
            });
            $('.car-images-slider').slick({
              slidesToShow: 3,
              slidesToScroll: 1,
              asNavFor: '.image-preview-slider',
              dots: false,
              centerMode: false,
              focusOnSelect: true,
              infinite: false
            });
        });
    </script>

</body>
</html>