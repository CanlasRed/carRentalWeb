<!-- SCRIPT -->


<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- SEMANTIC UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!-- SLICK SLIDER -->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--  <script type="text/javascript" src="js/login_validation.js"></script> -->

<!-- IMAGE ZOOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js" integrity="sha512-UH428GPLVbCa8xDVooDWXytY8WASfzVv3kxCvTAFkxD2vPjouf1I3+RJ2QcSckESsb7sI+gv3yhsgw9ZhM7sDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




     <script type="text/javascript">
        $(document).ready( function () {
            // COUNT THE NOTIFICATION
              load_notifcation_count();
              setInterval(function(){ load_notifcation_count(); }, 10000);

              function load_notifcation_count() { 
                $.ajax({
                  url: 'php/notification_count.php',
                  type: 'post',
                  success: function(data){ 
                      var number = data.replace(/[^0-9 ]/g, "");    
                      $("#count_notification").html(parseInt(number));
                  }
                });
              };

              $('#click_notification').click(function(){
                $.ajax({
                  url: 'php/notification_click_notified.php',
                  type: 'post',
                  /*
                  success: function(data){ 
                    $("#count_notification").html(0);
                  }
                  */

                });

                $.ajax({
                  url: 'php/notification_list.php',
                  type: 'post',
                  success: function(data){ 
                      $('#load_notification_list').html(data);
                  }
                });
              });

              $('#book_now').click(function(){
                window.location.href = "car-list.php";
              });
        });

        $('.ui.dropdown').dropdown();

        

        $(window).scroll(function(){
            if($(window).scrollTop() <= 50){
                $(".navbar").css({"background-color":"transparent"});   
            }
            else{
                $(".navbar").css({"background-color":"#fff"});
            }

        })

       $('.ui.rating')
          .rating({
            maxRating: 5
          })
          .rating('disable');
        ;


        
      


        $('#slider-age')
          .slider({
            min: 18,
            max: 100,
            start: 18,
            end: 100,
            step: 1,
            smooth: true,
            onMove: function(value, min, max) {
                $('#ageMin').html(min);
                $('#ageMax').html(max);
            }
          })
        ;

        $('#slider-price')
          .slider({
            min: 50,
            max: 10000,
            start: 50,
            end: 10000,
            step: 1,
            smooth: true,
            onMove: function(value, min, max) {
                $('#priceMin').val(min);
                $('#priceMax').val(max);
            }
          })
        ;


        $('#filter_dropdown')
            .dropdown({
                onChange: function(value, name){
                    $('#hidden_order').val(value);
                }
            });
    


    </script>

