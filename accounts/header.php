  <link rel="icon" type="image" href="../favicon.ico">
  
  <link rel="stylesheet" type="text/css" href="css/administration.css?v=12">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

      <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ICHECK BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

  <style type="text/css">
    .ribbon-wrapper.ribbon-lg .ribbon{
      width: 100% !important;
      top: 13px !important;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    .ribbon-wrapper .ribbon{
      -webkit-transform:  rotate(0deg) !important;
      transform:  rotate(0deg) !important;
    }
    .ribbon::before, .ribbon::after{
      display: none !important;
    }
  </style>

<?php include '../php/connection.php'; ?>

<?php 

date_default_timezone_set('Asia/Hong_Kong');

function get_time_ago( $time )
{
  $time_difference = time() - $time;

  if( $time_difference < 1 ) { return 'Just Now'; }


  $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
    30 * 24 * 60 * 60       =>  'month',
    24 * 60 * 60            =>  'day',
    60 * 60                 =>  'hour',
    60                      =>  'minute',
    1                       =>  'second'
  );

  foreach( $condition as $secs => $str )
  {
    $d = $time_difference / $secs;

    if( $d >= 1 )
    {
      $t = round( $d );
      return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
    }
  }
}

function get_time_diff($stime, $etime)
{
  $time_difference = $etime - $stime;

  if( $time_difference < 1 ) { return 'Just Now'; }


  $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
    30 * 24 * 60 * 60       =>  'month',
    24 * 60 * 60            =>  'day',
    60 * 60                 =>  'hour',
    60                      =>  'minute',
    1                       =>  'second'
  );

  foreach( $condition as $secs => $str )
  {
    $d = $time_difference / $secs;

    if( $d >= 1 )
    {
      $t = round( $d );
      return $t . ' ' . $str . ( $t > 1 ? 's' : '' );
    }
  }
}


$sql = "SELECT * FROM tbl_rental";
$result = mysqli_query($dbconn, $sql);
foreach($result as $row){ 
  $date_now = date("Y-m-d H:i:s");
  if($row['status']=='dropoff' && $row['endDate']<$date_now){
    $sql = "UPDATE tbl_rental SET status = 'overdue', updatedAt = now() WHERE rentalID = ".$row['rentalID']."";
    mysqli_query($dbconn, $sql);
  }
  if($row['status']=='pending' && $row['startDate']<=$date_now){
    $sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now() WHERE rentalID = ".$row['rentalID']."";
    mysqli_query($dbconn, $sql);
  }
  if($row['status']=='pickup' && $row['endDate']<=$date_now){
    $sql = "UPDATE tbl_rental SET status = 'cancelled', updatedAt = now() WHERE rentalID = ".$row['rentalID']."";
    mysqli_query($dbconn, $sql);
  }
}
                     
?>