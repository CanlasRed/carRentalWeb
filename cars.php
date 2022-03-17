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
                        <div class="col-md-5">
                            <div class="image-preview-slider">
                                <?php 
                                    $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$_GET['carID']." ";
                                    $result = mysqli_query($dbconn, $sql);
                                    foreach($result as $carImage) { ?>
                                    <div class="card m-1 slick-ratio">
                                        <div class="slick-ratio">
                                            <img class="img-fluid align-middle" src="assets/cars/<?php echo $carImage['image'];?>">
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
                                  <input type="text" name="startDate" placeholder="Pick-up Date">
                                </div>
                              </div>
                              <div class="ui inverted calendar mt-3" id="timestart">
                                <div class="ui input left icon">
                                  <i class="clock icon"></i>
                                  <input type="text" name="startTime" placeholder="Pick-up Time">
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
                                  <input type="text" name="endDate" placeholder="Drop-off Date">
                                </div>
                              </div>
                              <div class="ui inverted calendar mt-3" id="timeend">
                                <div class="ui input left icon">
                                  <i class="clock icon"></i>
                                  <input type="text" name="endTime" placeholder="Drop-off Time">
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

                                    var startDate = moment(`${data[1]} ${data[2]}`, 'YYYY-MM-DD HH:mm:ss').format();
                                    var endDate = moment(`${data[3]} ${data[4]}`, 'YYYY-MM-DD HH:mm:ss').format();

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
                                                text: 'Car Booked Successfully',
                                                confirmButtonColor: '#1b1c1d',
                                                confirmButtonText: 'OK'
                                            }).then((result) =>{
                                                location.href = '/carRentalWeb/';
                                                      
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