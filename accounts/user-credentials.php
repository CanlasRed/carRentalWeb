<?php
session_start();
if($_SESSION['userType']!=3){
  header("Location: ../index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account | Speedy</title>
  <?php include 'header.php';?>
  <!-- SEMANTIC UI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Site wrapper -->

  <div class="wrapper">



    <!-- /.navbar -->

    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>User Verification</h1>
            </div>
            <!-- <div class="col-6">
              <div class="float-right">
                <a href="add-car.php">
                  <div class="ui vertical green animated button rounded-pill rent-btn" tabindex="0">
                    <div class="hidden content" style="font-weight:bold"><i class="fas fa-plus"></i> Add New Car</div>
                    <div class="visible content">
                      <i class="fas fa-plus"></i> Add New Car
                    </div>
                  </div>
                </a>
              </div>
            </div>
 -->          </div><!-- /.container-fluid -->
        </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#cars" data-bs-toggle="tab">Pending</a></li>
                    <li class="nav-item"><a class="nav-link" href="#archived" data-bs-toggle="tab">Verified</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <!-- /.card-header -->
                <!-- form start --> 
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="cars">

                      <div class="row">
                       <div id="hipGrid">

                        <?php
                        $sql = "SELECT *, c.createdAt AS dateCreated FROM tbl_credentials c INNER JOIN tbl_users u ON c.userID = u.userID WHERE status = 1 ORDER BY c.credentialID DESC";
                        $result = mysqli_query($dbconn, $sql);
                        foreach($result as $row){ ?>
                         <div class="hip-item">

                          <!-- RIBBONS -->
                          <div class="card bg-light d-flex flex-fill card_hover" data-id="<?php echo $row['credentialID'];?>">

                            <div class="card-header border-bottom-0">
                              <b>Application No: <?php echo $row['credentialID'];?></b>
                            </div>


                            <div class="card-body pt-0 card_view" data-id="<?php echo $row['credentialID']; ?>">
                              <div class="row">


                                <div class="col-7">
                                  <h2><b><?php echo $row['firstName'].' '.$row['lastName'];?></b></h2>

                                  <ul class="ml-0 mb-0 fa-ul text-muted">
                                    <li class="small">
                                      <i class="fas fa-envelope"></i> <?php echo $row['username']; ?>
                                    </li>
                                    <li class="small">
                                      <i class="fas fa-phone"></i> <?php echo $row['phone']; ?>
                                    </li>
                                    <li class="small">
                                      <i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?>
                                    </li>
                                  </ul>

                                </div>


                                <div class="col-5 text-center">
                                  <img src="../assets/credentials/<?php echo $row['front']; ?>" alt="front-id-image" class="img-fluid">
                                </div>


                              </div>
                            </div>



                            <!-- ACTIONS -->
                            <div class="card-footer">
                               <small class="text-muted"><?php  echo get_time_ago(strtotime($row['dateCreated']));?></small>
                              <div class="text-right">
                                <a class="btn btn-sm bg-success cred_action" data-action="accept" data-id="<?php echo $row['credentialID'];?>">
                                  <i class="fas fa-check"></i> Approve
                                </a>
                                <a class="btn btn-sm btn-danger cred_action" data-action="reject" data-id="<?php echo $row['credentialID'];?>">
                                  <i class="fas fa-ban"></i> Reject
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                      </div>
                    </div>
                  </div>



                    <div class="tab-pane" id="archived">
                      <div class="row">

                        <?php
                        $sql = "SELECT c.*, t.name AS type FROM tbl_cars c INNER JOIN tbl_car_types t ON c.typeID = t.typeID WHERE c.status = 0 AND c.ownerID = ".$_SESSION['userID']." ";
                        $result = mysqli_query($dbconn, $sql);
                        foreach($result as $row){ ?>
                          <div class="col-12 col-xl-4 col-lg-4 col-sm-12 col-md-6">
                            <div class="ui card m-2" style="width:100%">
                              <div class="content">
                                <div class="right floated meta"><small><?php  echo get_time_ago(strtotime($row['createdAt']));?></small></div>
                                <a style="font-weight: bold;text-decoration: none; color:#1b1c1d;" href="../cars.php?car=<?php echo $row['name'];?>&carID=<?php echo $row['carID'];?>">
                                  <?php echo $row['name'] ;?>
                                </a>
                              </div>
                              <a href="../cars.php?car=<?php echo $row['name'];?>&carID=<?php echo $row['carID'];?>" class="image">
                                <?php
                                $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$row['carID']." ORDER BY carID ASC";
                                $res = mysqli_query($dbconn, $sql);
                                $img = mysqli_fetch_assoc($res);
                                ?>
                                <div style="width:100%; overflow:hidden; height:220px; background: url(../assets/cars/<?php echo $img['image']; ?>) no-repeat center; background-size: contain;">
                                </div>
                              </a>
                              <div class="content">
                                <div class="row">
                                  <div class="col-6">
                                    <i class="user icon"></i><?php echo $row['capacity']?> Seater
                                  </div>
                                  <div class="col-6">
                                    <i class="cogs icon"></i> <?php echo $row['transmission']?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <i class="gas pump icon"></i><?php echo $row['engine']?> 
                                  </div>
                                  <div class="col-6">
                                    <i class="car icon"></i><?php echo $row['type']?> 
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-12">
                                    <div class="ui inverted black label my-1">
                                      <?php 
                                      $total = 0;
                                      $avgRatings = 0;
                                      $sql = "SELECT * FROM tbl_car_review WHERE status = 1 AND carID = ".$row['carID']."";
                                      if($result = mysqli_query($dbconn, $sql)){
                                        $total = mysqli_num_rows($result);
                                        $arr = array(0,0,0,0,0);
                                        foreach($result as $rate){
                                          if($rate['rate']==5){
                                            $arr[0]++;
                                          } else if ($rate['rate']==4){
                                            $arr[1]++;
                                          } else if ($rate['rate']==3){
                                            $arr[2]++;
                                          } else if ($rate['rate']==2){
                                            $arr[3]++;
                                          } else if ($rate['rate']==1){
                                            $arr[4]++;
                                          }
                                        }

                                        if($total>0){
                                          $avgRatings = ((1*$arr[4])+(2*$arr[3])+(3*$arr[2])+(4*$arr[1])+(5*$arr[0]))/$total;
                                        }
                                      }
                                      echo round($avgRatings,1); ?>
                                    </div>
                                    <div class="ui yellow rating" data-rating="<?php echo round($avgRatings); ?>"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="content">
                                <span class="float-start mt-2">
                                  <h3 class="fw-bolder">₱<?php echo $row['rate']?>/hr</h3>
                                </span>
                                <span class="float-right">
                                  <a href="edit-car.php?car=<?php echo $row['name'].'&carID='.$row['carID']?>">
                                    <div class="ui vertical animated button secondary rent-btn" tabindex="0">
                                      <div class="hidden content"   style="font-weight:bold">Edit</div>
                                      <div class="visible content">
                                        Edit
                                      </div>
                                    </div>
                                  </a>
                                  <!-- <a href="../cars.php?car=<?php echo $row['name'].'&carID='.$row['carID']?>">
                                    <div class="ui vertical animated button secondary rent-btn" tabindex="0">
                                      <div class="hidden content"   style="font-weight:bold">View</div>
                                      <div class="visible content">
                                        View
                                      </div>
                                    </div>
                                  </a> -->
                                  <a data-id="<?php echo $row['carID']; ?>" class="restoreCar">
                                    <div class="ui green vertical animated button rent-btn" tabindex="0">
                                      <div class="hidden content" style="font-weight:bold">Restore</div>
                                      <div class="visible content">
                                        Restore
                                      </div>
                                    </div>
                                  </a>
                                </span>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

                      </div>
                  </div>


                </div>
              </div>
            </div>
          </div>


        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--   <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- MODAL -->
<div class="modal fade" id="bookinginfo_Modal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form name="" id="">
        <div class="modal-header bg-black">
          <h5 class="modal-title"><i class="fas fa-cars"></i> User Credentials</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bookinginfo-body">
          
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ./MODAL -->

<?php include 'script.php'?>
<script type="text/javascript">
  $('.card_view').on('click', function(){
    var credentialID = $(this).attr('data-id');


    $.ajax({
      url: 'php/credential_info.php',
      type: 'post',
      data: {credentialID: credentialID},
      success: function(response){ 

        $('.bookinginfo-body').html(response);
        $('#bookinginfo_Modal').modal('show'); 

      }
    });

  });

  $('.cred_action').on('click', function(){
    var credentialID = $(this).attr('data-id');
    var action = $(this).attr('data-action');
    var displayAction = action.charAt(0).toUpperCase() + action.slice(1)

      Swal.fire({
        icon: 'question',
        title: displayAction,
        text: 'Are you sure you want to ' + action +' user verification?',
        confirmButtonColor: '#1b1c1d',
        confirmButtonText: 'OK',
        showCancelButton: 'true'
      }).then((result) =>{
        if (result.isConfirmed){
          $.ajax({
            url: 'php/verify_user.php',
            type: 'post',
            data:{
              credentialID: credentialID,
              action: action
            },
            success: function(data){
              if(data == 'approved'){
                Swal.fire({
                  icon: 'success',
                  title: 'User Verified',
                  text: 'The user has been verified successfully',
                  confirmButtonColor: '#1b1c1d',
                  confirmButtonText: 'OK'
                }).then((result) =>{
                  if (result.isConfirmed){
                   location.reload();
                 }
               })
              }
              else if(data == 'rejected'){
                Swal.fire({
                  icon: 'success',
                  title: 'Verification Rejected',
                  text: 'THe user verification has been rejected successfully',
                  confirmButtonColor: '#1b1c1d',
                  confirmButtonText: 'OK'
                }).then((result) =>{
                  if (result.isConfirmed){
                   location.reload();
                 }
               })
              }
              else{
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'An error has occured while updating the data',
                  confirmButtonColor: '#1b1c1d',
                  confirmButtonText: 'OK'
                })
              }
            }
          })
        }
      })

  });


  $(document).ready(function(){
    $('#hipGrid').hip({
      itemsPerPage: 10,
      dynItemsPerRow: {
              hs: 1,
              sm: 2,
              md: 3,
              lg: 4,
      },
      paginationPos:'right',
      filter:true,
      filterPos:"right",
      filterText:"Search"
    });
  });
</script>
<script type="text/javascript">
  $('.ui.rating')
  .rating({
    maxRating: 5
  })
  .rating('disable');
  ;

  $('.deleteCar').on('click', function(){
    var carID = $(this).attr('data-id');
    Swal.fire({
      icon: 'warning',
      title: 'Confirm Delete',
      text: 'Are you sure you want to delete this data?',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      confirmButtonColor: '#dc3545',
    }).then((result) => {
     if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "php/delete_car.php",
        data: {
          action: 1,
          carID: carID
        },
        success: function(data){
          if(data == 'success'){
            Swal.fire({
              icon: 'success',
              title: 'Data Deleted',
              text: 'Car has been delete successfully',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            }).then((result) =>{
              if (result.isConfirmed){
               location.reload();
             }
           })
          }
          else{
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error has occured while deleting the data',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          }
        }
      });
    }
  })
  });

  $('.restoreCar').on('click', function(){
    var carID = $(this).attr('data-id');
    Swal.fire({
      icon: 'warning',
      title: 'Restore Data',
      text: 'Are you sure you want to restore this data?',
      showCancelButton: true,
      confirmButtonText: 'Restore',
      confirmButtonColor: '#28a745',
    }).then((result) => {
     if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "php/delete_car.php",
        data: {
          action: 2,
          carID: carID
        },
        success: function(data){
          if(data == 'success'){
            Swal.fire({
              icon: 'success',
              title: 'Data Restored',
              text: 'Car has been restored successfully',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            }).then((result) =>{
              if (result.isConfirmed){
               location.reload();
             }
           })
          }
          else{
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error has occured while restoring the data',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          }
        }
      });
    }
  })
  });

</script>


</body>
</html>

