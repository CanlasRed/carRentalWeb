<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>



<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/OverlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- SUMMERNOTE -->
<script type="text/javascript" src="js/summernote.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<!-- FILE INPUT FORM -->
 <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

 <!-- VALIDATION JS -->
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

<script type="text/javascript" src="js/location_picker.js"></script>
<!-- API KEY MAPS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9RAm5gDSDHlWWqsvwESs29KOsnJSbQ4w&callback=initMap" async defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js" integrity="sha512-KGE6gRUEc5VBc9weo5zMSOAvKAuSAfXN0I/djLFKgomlIUjDCz3b7Q+QDGDUhicHVLaGPX/zwHfDaVXS9Dt4YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script type="text/javascript" src="js/preloader.js"></script>

  <script type="text/javascript" src="js/tooltip.js"></script>



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  
  <script type="text/javascript" src="js/grid-layout-pagination-hip/lib/hip.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {

      $("body").on("click", ".credentialID", function(event){

        var credential = $(this).attr('data-Id');
        const myArray = credential.split("*");
        const credentialID = myArray[0];
        const frontback = myArray[1];

        //alert(credentialID + "" + frontback);
        $.ajax({
          url: 'php/credential_id_show.php',
          type: 'post',
          data: {credentialID: credentialID, frontback:frontback},
          success: function(response){ 
            // Add response in Modal body
            $('.id-body').html(response);

            // Display Modal
            $('#idModal').modal('show'); 
          }
        });
      });


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
            $('#count_notification').hide();  
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

      $('#table').DataTable();
      $(document).on('click', '.archives_btn', function(){
        $('#archives_table').DataTable();
      });
      $(document).on('click', '.archives_btn2', function(){
        $('#archives_table2').DataTable();
      });

      $('.ui.dropdown').dropdown();

    });

    $(function () {
      bsCustomFileInput.init();
    });

    check_booking_time();
      setInterval(function(){ check_booking_time(); }, 10000);

      function check_booking_time() { 
        $.ajax({
          url: 'php/check_booking_time.php',
          type: 'post',
          success: function(data){ 
              
          }
        });
      };

  </script>
