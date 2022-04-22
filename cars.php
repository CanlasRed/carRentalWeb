<?php session_start(); ?>
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
         $sql = "SELECT c.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 1 AND c.carID = ".$_GET['carID']."";
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
                        <div class="col-md-5">
                            <div class="image-preview-slider">
                                <?php 
                                    $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$_GET['carID']." ";
                                    $result = mysqli_query($dbconn, $sql);
                                    if(mysqli_num_rows($result)>0){
                                    foreach($result as $carImage) { ?>
                                    <div class="card m-1 slick-ratio">
                                        <div class="slick-ratio">
                                            <img class="img-fluid align-middle" src="assets/cars/<?php echo $carImage['image'];?>">
                                        </div>
                                    </div>
                                <?php } } else { ?>
                                    <div class="card m-1 slick-ratio">
                                        <div class="slick-ratio">
                                            <img class="img-fluid align-middle" src="assets/cars/Speedy_Full_Logo_Black.png">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                             
                                 <div class="car-images-slider my-1">
                                    <?php 
                                    foreach($result as $carImage) { ?>
                                        <div class="card m-1 slick-ratio">
                                            <div class="slick-border slick-ratio">
                                                <img class="img-fluid align-middle img-cropped" src="assets/cars/<?php echo $carImage['image'];?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                 </div>
                            
                        </div>
                        <div class="col-md-7">
                            <div class="row m-0">
                                <div class="col-12 mt-1 py-2 px-0">
                                    <div class="ui header large m-0">
                                        <?php echo $row['name'];?>
                                        <span class="float-end">₱<?php echo $row['rate'];?>/hr</span>
                                    </div>
                                    <div class="">
                                         <?php echo $row['brandID'];?>  <?php echo $row['model'];?>  <?php echo $row['year'];?>
                                    </div>
                                </div>
                            </div>
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
                <div class="ui raised segment">
                <form action="" method="POST" class="ui form" id="date_form">
                    <div class="row m-0">
                        <div class="col-12 py-3">
                            <div class="ui header medium">
                                Car Rental Date
                                <div id="apply_date" class="ui vertical black animated submit button float-end" tabindex="0">
                                  <div class="hidden content">Apply</div>
                                  <div class="visible content">
                                    Apply
                                  </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="ui two column stackable grid pb-3">
                        <div class="ui vertical divider"></div>

                        <div class="middle aligned row">
                          <div class="column px-5">

                            <div class="field">
                              <label>Pick-up Date</label>
                              <div class="ui inverted calendar" id="rangestart">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text" autocomplete="off" name="startDate" placeholder="Pick-up Date">
                                </div>
                              </div>
                              <div class="ui inverted mt-3">
                                <div class="ui input left icon">
                                  <i class="clock icon"></i>
                                  <input type="time" name="startTime" placeholder="Pick-up Time">
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
                                  <input type="text" autocomplete="off" name="endDate" placeholder="Drop-off Date">
                                </div>
                              </div>
                              <div class="ui inverted mt-3">
                                <div class="ui input left icon">
                                  <i class="clock icon"></i>
                                  <input type="time" name="endTime" placeholder="Drop-off Time">
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
                </form>
                </div>

                <!-- DRIVER SEGMENT -->
                 <!-- <div class=" ui raised segment mb-3">
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
                       
                </div> -->


                <?php 
                $total = 0;
                $avgRatings = 0;
                $sql = "SELECT * FROM tbl_car_review WHERE status = 1 AND carID = ".$_GET['carID']."";
                if($result = mysqli_query($dbconn, $sql)){
                    $total = mysqli_num_rows($result);
                    $arr = array(0,0,0,0,0);
                    foreach($result as $row){
                        if($row['rate']==5){
                            $arr[0]++;
                        } else if ($row['rate']==4){
                            $arr[1]++;
                        } else if ($row['rate']==3){
                            $arr[2]++;
                        } else if ($row['rate']==2){
                            $arr[3]++;
                        } else if ($row['rate']==1){
                            $arr[4]++;
                        }
                    }

                    if($total>0){
                        $avgRatings = ((1*$arr[4])+(2*$arr[3])+(3*$arr[2])+(4*$arr[1])+(5*$arr[0]))/$total;
                    }
                }
        ?>





                <!-- REVIEWS SEGMENT -->
                <div class=" ui raised segment mb-3">
                    <div class="row m-0">
                        <div class="col-12 py-3">
                            <div class="ui header medium">
                                <label>Reviews</label>
                            </div>
                        </div>
                    </div>

                    <div class="row px-3">

                        <div class="col-6 px-2 my-2">
                          <div class=" ui raised segment mb-3" style="height:170px">
                            <div class="col-12">
                                <div class="ui tiny header">
                                    <label>Overall Rating</label>
                                </div>
                            </div>

                            <div class="row text-center mt-4 justify-content-center d-flex">
                                <h2 class="fw-bold"><?php echo round($avgRatings,1); ?><small class="text-muted">/5</small></h2>
                            </div>

                            <div class="text-center">
                                <div class="ui large yellow rating" data-rating="<?php echo round($avgRatings); ?>"></div>
                            </div>
                            <div class="row text-center justify-content-center d-flex">
                                <small class="fw-bold text-muted"><?php echo $total; ?> Reviews</small>
                            </div>
                          </div>
                        </div>


                        <div class="col-6 px-2 my-1">
                          <div class=" ui raised segment mb-3">
                            <div class="col-12">
                                <div class="ui tiny header">
                                    <label>Rating Breakdown</label>
                                </div>
                            </div>

                            <div class="ui list">

                              <div class="item d-flex flex-row">
                                <div class="ui large yellow rating" data-rating="5"></div>
                                <div class="mx-2 me-4 mt-1 my-0 ui green progress" id="ratings_5" style="width: 100% !important;">
                                    <div class="bar">
                                    </div>
                                </div>
                                <div class="me-auto text-muted"><p style="position: absolute; right: 15px !important;"><?php echo $arr[0]; ?></p></div>
                              </div>
                              <div class="item d-flex flex-row">
                                <div class="ui large yellow rating" data-rating="4"></div>
                                <div class="mx-2 me-4 mt-1 my-0 ui teal progress" id="ratings_4" style="width: 100% !important;">
                                    <div class="bar">
                                    </div>
                                </div>
                                <div class="me-auto text-muted"><p style="position: absolute; right: 15px !important;"><?php echo $arr[1]; ?></p></div>
                              </div>
                              <div class="item d-flex flex-row">
                                <div class="ui large yellow rating" data-rating="3"></div>
                                <div class="mx-2 me-4 mt-1 my-0 ui yellow progress" id="ratings_3" style="width: 100% !important;">
                                    <div class="bar">
                                    </div>
                                </div>
                                <div class="me-auto text-muted"><p style="position: absolute; right: 15px !important;"><?php echo $arr[2]; ?></p></div>
                              </div>
                              <div class="item d-flex flex-row">
                                <div class="ui large yellow rating" data-rating="2"></div>
                                <div class="mx-2 me-4 mt-1 my-0 ui orange progress" id="ratings_2" style="width: 100% !important;">
                                    <div class="bar">
                                    </div>
                                </div>
                                <div class="me-auto text-muted"><p style="position: absolute; right: 15px !important;"><?php echo $arr[3]; ?></p></div>
                              </div>
                              <div class="item d-flex flex-row">
                                <div class="ui large yellow rating" data-rating="1"></div>
                                <div class="mx-2 me-4 mt-1 my-0 ui red progress" id="ratings_1" style="width: 100% !important;">
                                    <div class="bar">
                                    </div>
                                </div>
                                <div class="me-auto text-muted"><p style="position: absolute; right: 15px !important;"><?php echo $arr[4]; ?></p></div>
                              </div>
                            </div>
                            
                          </div>
                        </div>

                    </div>

                    <div class="row px-3">
                      <div class="col-12 px-2 my-1">
                        <table id="example2" class="table ">
                          <thead>
                              <tr>
                                <th hidden></th>

                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        $sql = "SELECT *,r.rate as reviewRate, r.createdAt as reviewDate FROM tbl_car_review r INNER JOIN tbl_cars c ON c.carID = r.carID INNER JOIN tbl_customers u ON u.customerID = r.customerID WHERE r.status = 1 AND r.carID = ".$_GET['carID']." ORDER BY r.rate DESC";
                        $result = mysqli_query($dbconn, $sql);
                        if(mysqli_fetch_assoc($result)){
                            foreach($result as $row){  echo '<tr>' ?>
                                <td>
                                    <div class=" ui raised segment mb-3">
                                        <div class="ui comments">
                                          <div class="comment">
                                            <a class="avatar">
                                              <img src="assets/avatar_2.png">
                                            </a>
                                            <div class="content">
                                              <a class="author" style="text-decoration: none;"><?php echo $row['firstName'].' '.$row['lastName']; ?></a>
                                              <div class="metadata">
                                                <div class="date"><?php echo get_time_ago(strtotime($row['reviewDate'])); ?></div>
                                              </div>
                                              <div class="text">
                                                <?php echo $row['comment']; ?>
                                              </div>
                                              <div class="meta">
                                                <div class="ui large yellow rating" data-rating="<?php echo $row['reviewRate']; ?>"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                              
                            <?php } 
                        } else { ?>
                            <td>
                                <div class=" ui raised segment mb-3 text-center">
                                <h6 class="fw-bold">This car has no reviews...</h6>
                            </div>
                            </td>
                            
                        <?php } ?>
                  </tbody>
                  
                </table>

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
                        <span><a href="" data-bs-toggle="modal" data-bs-target="#archives_modal" style="text-decoration: none; color: #fff; font-weight: bold;">Juan Dela Cruz</a></span>

                        <!-- Modal -->
                        <div class="modal fade" id="archives_modal" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-dark">
                                <h5 class="modal-title" id="exampleModalLong">More about owner</h5>
                                <button type="button" class="close clear-text" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="content text-dark">
                                    <img class="img-fluid avatar image" src="assets/car-types/hatchback.png">
                                    <i class="user icon"></i><b>Name </b><p>Juan Dela Cruz</p>
                                    <i class="mars icon"></i><b>Gender </b><p>Male</p>
                                    <i class="sort numeric up icon"></i><b>Age </b><p>23</p>
                                    <i class="map marker alternate icon"></i><b>Address </b><p>Olongapo City</p>
                                    <i class="phone icon"></i><b>Phone </b><p>09123456789</p>
                                </div>   
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary clear-text" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>


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
                            <div>₱<?php echo $row['rate']?> x <label id="rent_hours"></label></div>
                            <input type="text" name="rate" id="rate_fee" value="<?php echo $row['rate']; ?>" hidden>
                        </div>
                    </div>
                    <div>
                        =
                        <div class="float-end">
                            <label id="computed_rental"></label>
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
                            <label id="grand_total">6,000</label>
                        </div>
                    </div>
                    <?php include 'rental_form.php'; ?>
                </div>
            </div>

            

        </div>
    </div>
   <!--  <?php include 'footer.php' ?> -->
    <?php include 'scripts.php'; ?>

    <style type="text/css">
        td[data-variation="red"]{
            background: firebrick !important;
            color: #fff !important;
        }
    </style>


    <!-- DataTables  & Plugins -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

    <!-- Page specific script -->
    <script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "pageLength" : 5,
          "columnDefs": [{
                "targets": '_all',
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('padding', '0px')
                    $(td).css('border', '1px solid white')
                }
            }],
        });
      });
    </script>

    <style type="text/css">
        #example2.dataTable.no-footer{
            border-bottom:  none !important;
        }
    </style>

    <script type="text/javascript">
        var carID = '<?php echo $_GET["carID"]; ?>';
        $.ajax({
            type: 'POST',
            url: 'php/get_car_reviews.php',
            dataType: 'JSON',
            data: {
                carID:carID,
            },
            success: function(data){
                if(data.total>0){
                    $('#ratings_5').progress({
                      percent: (data.rates[0]/data.total)*100
                    });
                    $('#ratings_4').progress({
                      percent: (data.rates[1]/data.total)*100
                    });
                    $('#ratings_3').progress({
                      percent: (data.rates[2]/data.total)*100
                    });
                    $('#ratings_2').progress({
                      percent: (data.rates[3]/data.total)*100
                    });
                    $('#ratings_1').progress({
                      percent: (data.rates[4]/data.total)*100
                    });
                }
            }
        });

        



        var carID = "<?php echo $_GET['carID'];?>";
        

        $.ajax({
            type: "POST",
            url: 'php/get_booked_dates.php',
            dataType: "JSON",
            data:{
                carID: carID,
            },
            success: function(data){
                var arr = [];
                var arr2 = [];
                for(var i=0;i<data[0].length;i++){
                    var start = data[0][i];
                    var end = data[1][i];
                    var disable = start;
                    var endTime = data[2][i];
                    while (disable < end){
                        arr.push({
                            date: new Date(disable),
                            message: 'Date Booked',
                            inverted: true,
                            variation: 'red'
                        });

                        var disable = moment(disable).add(1, 'day');
                        disable = moment(disable).format('YYYY-MM-DD');
                    }
                    while (disable == end){
                        arr2.push({
                            date: new Date(disable),
                            message: 'Booking starts @ '+data[2][i],
                            inverted: true,
                            class: 'green'
                        });

                        var disable = moment(disable).add(1, 'day');
                        disable = moment(disable).format('YYYY-MM-DD');
                    }
                    
                }

                console.log(arr);
                var today = new Date();
                $('#rangestart').calendar({
                    type: 'date',
                    minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
                    endCalendar: $('#rangeend'),
                    disabledDates: arr,
                    eventDates: arr2

                });

                $('#rangeend').calendar({
                    type: 'date',
                    startCalendar: $('#rangestart'),
                    disabledDates: arr,
                    eventDates: arr2
                });
            }
        });

        



        $(document).ready(function(){
             $('.image-preview-slider').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.car-images-slider'
            });
            $('.car-images-slider').slick({
              slidesToShow: 4,
              slidesToScroll: 1,
              asNavFor: '.image-preview-slider',
              dots: false,
              centerMode: false,
              focusOnSelect: true,
              infinite: false
            });

            // $('.car-images-slider').on('afterChange', function(slick, currentSlide){
            //     $('.slick-active').each(function(){
            //         var divWidth = $(this).width(); 
            //         $(this).height(divWidth);
            //     })
            // });

            $('.slick-ratio').each(function(){
                var divWidth = $(this).width(); 
                $(this).height(divWidth);
            })
            
            $(window).resize(function(){
                $('.slick-ratio').each(function(){
                    var divWidth = $(this).width(); 
                    $(this).height(divWidth);
                })
            });

            
                $('#date_form').form({
                    fields:{
                        startDate:{
                            identifier: 'startDate',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a Pick-up Date'
                                }
                            ]
                        },
                        startTime:{
                            identifier: 'startTime',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a Pick-up Time'
                                }
                            ]
                        },
                        endDate:{
                            identifier: 'endDate',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a Drop-off Date'
                                }
                            ]
                        },
                        endTime:{
                            identifier: 'endTime',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a Drop-off Time'
                                }
                            ]
                        }
                    },
                    inline:true,
                    onSuccess: function(e){

                        $form  = $(this);
                        e.preventDefault();
                          // $_form = $(this).find('#date_form');
                          $form.addClass('loading');
                          $('#apply_date').addClass('loading');


                          $.ajax({
                              type: "POST",
                              url: "php/compute_date.php",
                              data: $form.serialize(),
                              dataType:'JSON',
                              success:function(data){
                                if(data.length>0){
                                    $('#rent_hours').html(data[0]);
                                    var rate = $('#rate_fee').val();
                                    var rentalFee = rate*data[0];
                                    $('#computed_rental').html(rentalFee);
                                    $('#carAmount').val(rentalFee);
                                    $('#grand_total').html(rentalFee+3000);

                                    var startDate = moment(data[1] + ' ' + data[2]).format('YYYY-MM-DD HH:mm:ss');
                                    var endDate = moment(data[3] + ' ' + data[4]).format('YYYY-MM-DD HH:mm:ss');

                                    alert(startDate);

                                    $('#rental_start').val(startDate);
                                    $('#rental_end').val(endDate);
                                }
                              }
                             
                        });
                           $form.removeClass('loading');  
                           $('#apply_date').removeClass('loading')
                           $('#book_btn').removeClass('disabled');               
                    }
                });



                $('#rental_form').form({
                    // fields:{
                    //     startDate:{
                    //         identifier: 'startDate',
                    //         rules: [
                    //             {
                    //                 type: 'empty',
                    //                 prompt: 'Please enter a Pick-up Date'
                    //             }
                    //         ]
                    //     },
                    //     endDate:{
                    //         identifier: 'endDate',
                    //         rules: [
                    //             {
                    //                 type: 'empty',
                    //                 prompt: 'Please enter a Drop-off Date'
                    //             }
                    //         ]
                    //     }
                    // },
                    // inline:true,
                    onSuccess: function(e){

                        $form  = $(this);
                        e.preventDefault();
                          // $_form = $(this).find('#date_form');
                    
                            Swal.fire({
                                icon: 'question',
                                title: 'Confirm Booking',
                                confirmButtonColor: '#1b1c1d',
                                showCancelButton: true,
                                confirmButtonText: 'Yes'
                            }).then((result) =>{
                                if(result.isConfirmed){

                                    $.ajax({
                                        type: "POST",
                                        url: "php/insert_carRental.php",
                                        data: $form.serialize(),
                                        success:function(data){
                                        if(data>0){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: 'Please allow up to 5 working hours for your rental confirmation',
                                                confirmButtonColor: '#1b1c1d',
                                                confirmButtonText: 'OK'
                                            }).then((result) =>{
                                                location.href = '/carRentalWeb/accounts/';
                                                      
                                            })

                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                confirmButtonColor: '#1b1c1d',
                                                confirmButtonText: 'OK'
                                            }).then((result) =>{
                                                location.href = '/carRentalWeb/';
                                                      
                                            })
                                        }
                                        }
                                              
                                             
                                    });
                                }
                            })
                        
                    }
                });
        });

        
    </script>

</body>
</html>