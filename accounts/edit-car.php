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

  <!-- Content Wrapper. Contains page content --><script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Car</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right">
              <button type="submit" form="add_car_from" class="ui vertical green animated submit button rounded-pill rent-btn" tabindex="0" form="add_car_from">
                <div class="hidden content"   style="font-weight:bold"><i class="fas fa-plus"></i> Save</div>
                  <div class="visible content">
                      <i class="fas fa-plus"></i> Save
                  </div>
              </button>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
      $sql = "SELECT * FROM tbl_cars WHERE carID = ".$_GET['carID']."";
      $result = mysqli_query($dbconn, $sql);
      $car = mysqli_fetch_assoc($result);
    ?>


    <!-- Main content -->
    <section class="content">
    <form action="php/add_car.php" id="add_car_from" method="POST">
      <div class="container-fluid">
      <div class="row">


        <div class="col-sm-6">


        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> Car Details</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
              <!-- /.card-header -->
              <!-- form start --> 
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                 
                    
                      <div class="form-group">
                        <label>Car Name</label>
                        <input type="text" name="name" class="form-control rounded-pill" placeholder="Car Name" value="<?php echo $car['name']; ?>">
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Car Type</label>
                            <select class="form-control rounded-pill" name="type">
                              <?php 
                              include 'php/connection.php';
                              $sql = "SELECT * FROM tbl_car_types";
                              $result = mysqli_query($dbconn, $sql);
                              foreach($result as $row){ ?>
                              <option value="<?php echo $row['typeID']?>" <?php if ($row['typeID'] == $car['typeID']) echo ' selected="selected"'; ?>>
                                <?php echo $row['name']?>
                              </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label>Color</label>
                          <input type="text" name="color" class="form-control rounded-pill" placeholder="Color" value="<?php echo $car['color']; ?>">
                      </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Car Brand</label>
                            <select class="form-control rounded-pill" name="brand">
                              <?php 
                              include 'php/connection.php';
                              $sql = "SELECT * FROM tbl_car_brands";
                              $result = mysqli_query($dbconn, $sql);
                              foreach($result as $row){ ?>
                              <option value="<?php echo $row['brandID']?>" <?php if ($row['brandID'] == $car['brandID']) echo ' selected="selected"'; ?>>
                                <?php echo $row['brand']?>
                              </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control rounded-pill" placeholder="Brand Model" value="<?php echo $car['model']; ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control rounded-pill" placeholder="Model Year" value="<?php echo $car['year']; ?>">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Plate Number</label>
                            <input type="text" name="plateNumber" class="form-control rounded-pill" placeholder="Plate Number" value="<?php echo $car['plateNumber']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rate/hr</label>
                            <input type="Number" name="rate" class="form-control rounded-pill" placeholder="Rate" value="<?php echo $car['rate']; ?>">
                          </div>
                        </div>
                      </div>

                      
                      

                  
                </div>
              </div>
          </div>
        </div>
        
        <!-- ./card -->


        
        <div class="card">
          <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
            <h3 class="card-title"><i class="fas fa-cars"></i> Car Specifications</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
              <!-- /.card-header -->
              <!-- form start --> 
            <div class="card-body">

              <div class="form-group">
                  <label>Seating Capacity</label>
                  <input type="Number" name="capacity" class="form-control rounded-pill" placeholder="Capacity" value="<?php echo $car['capacity']; ?>">
              </div>

              <div class="form-group">
                <label>Engine</label>
                <select class="form-control rounded-pill" name="engine" <?php if ($row['engine'] == $car['engine']) echo ' selected="selected"'; ?>>
                  <option value="unleaded">Unleaded</option>
                  <option value="diesel">Diesel</option>
                  <option value="electric">Electric</option>
                </select>
              </div>

              <div class="form-group">
                <label>Transmission</label>
                <select class="form-control rounded-pill" name="transmission" <?php if ($row['transmission'] == $car['transmission']) echo ' selected="selected"'; ?>>
                  <option value="automatic">Automatic</option>
                  <option value="manual">Manual</option>
                </select>
              </div>

              <div class="form-group">
                <label>Compartment</label>
                <select class="form-control rounded-pill" name="compartment" <?php if ($row['compartment'] == $car['compartment']) echo ' selected="selected"'; ?>>
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                </select>
              </div>

              <div class="form-group">
                <label>AC</label>
                <select class="form-control rounded-pill" name="AC" <?php if ($row['AC'] == $car['AC']) echo ' selected="selected"'; ?>>
                  <option value="1">Yes</option>
                  <option value="2">No</option>
                </select>
              </div>

              <div class="form-group">
                  <label>Speed</label>
                  <input type="Number" name="speed" class="form-control rounded-pill" placeholder="Speed per hour" value="<?php echo $car['speed']; ?>">
              </div>
              </form>
          </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-header ui-sortable-handle bg-black" style="cursor: move;">
              <h3 class="card-title"><i class="fas fa-cars"></i> Car Image</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
                <!-- /.card-header -->
                <!-- form start --> 
              <div class="card-body">
        <form action="php/insert_car_images.php" id="insert_car_images" method="POST">
          <input type="text" name="carID" value="<?php echo $_GET['carID']; ?>" hidden>
                <div class="form-group">
                  <label>Car Title</label>
                  <input type="text" name="title" class="form-control rounded-pill" placeholder="Image Title" required>
                </div>
                <div class="form-group">
                  <label for="add_image">Car Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" id="add_image1" onchange="displayImage(this)">
                          <label class="custom-file-label" for="add_image1">JPEG, JPG Max. 3MB</label>
                        </div>
                      </div>
                    
                    <div class="mt-3">
                      <img class="img-fluid" alt="Plant Image" id="add_image_preview" src="../assets/imgPlaceholder.png">
                    </div>
                    <br>
                    <div>
                      <button type="submit" form="insert_car_images" class="ui vertical green animated submit button rounded-pill rent-btn" tabindex="0" form="add_image_form">
                        <div class="hidden content"   style="font-weight:bold"><i class="fas fa-plus"></i> Add</div>
                          <div class="visible content">
                              <i class="fas fa-plus"></i> Add
                          </div>
                      </button>
                    </div>
                </div>
                </form>
                  <script type="text/javascript">
                      function displayImage(e){
                        if (e.files[0]){
                          var reader = new FileReader();

                          reader.onload = function(e){
                            document.querySelector('#add_image_preview').setAttribute('src', e.target.result);
                          }
                          reader.readAsDataURL(e.files[0]);
                        }
                      }
                  </script>
            </div>
          </div>
          <div class="card">
              <div class="card-header ui-sortable-handle bg-black">
                <h3 class="card-title">Saved Image</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
                <div class="card-body">
                  <table class="table" id="table">
                    <thead>
                      <tr>
                        <th scope="col">Image ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM tbl_car_image WHERE status = 1 AND carID = ".$_GET['carID']."";
                        $result = mysqli_query($dbconn, $sql);
                        foreach($result as $row) { ?>
                        <tr>
                          <th><?php echo $row['imageID'];?></th>
                          <td  id="image<?php echo $row['imageID']; ?>">
                            <img style="width:300px;" src="../assets/cars/<?php echo $row['image']; ?>" class="img-thumbnail">
                          </td>
                          <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit_modal" class="btn btn-info edit_btn" 
                            data-id="<?php echo $row['imageID']; ?>" 
                            data-title="<?php echo $row['title']; ?>"  
                            data-image="<?php echo $row['image']; ?>"
                            ><i class="fas fa-pencil-alt"></i></button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger delete_pdf" data-id="<?php echo $row['imageID']; ?>"><i class="fas fa-trash-alt"></i></button>
                          </td>
                        </tr>

                      <?php  } ?>
                    </tbody>
                  </table>  
              </div>
            </div>

            <button type="button" data-bs-toggle="modal" data-bs-target="#archives_modal" class="btn btn-danger archives_btn"><i class="fas fa-trash-alt"></i> Trash</button>

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

<?php include 'script.php'?>
<script type="text/javascript" src="js/add_car_validation.js"></script>


</body>
</html>
