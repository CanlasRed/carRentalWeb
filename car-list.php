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
    <?php include 'navbar.php'; ?>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        
<div class="pt-5 col-lg-9 col-md-8 col-sm-12 col-xs-12" style="display: block; width: 100%;">
  <?php if (isset($_GET['typeID'])){ ?>
  <input type="text" id="gettype" value="<?php echo $_GET['typeID'] ?>" hidden readonly>
<?php } ?>


    <div class="ui secondary  menu">
      <div class="item" style="width: 400px;">
        <div class="ui fluid icon input large">
          <input type="text" placeholder="Search..." id="searchbox">
          <i class="search link icon common_selector"></i>
        </div>
      </div>
      <div class="right menu">
          <div class="ui floating dropdown labeled icon button" id="filter_dropdown" >
            <i class="filter icon pt-4"></i>
            <span class="text mt-1">Sort</span>
            <div class="menu">
              <div class="header">
                <i class="tags icon"></i>
                Sort By:
              </div>
              <div class="divider"></div>
                <div class="item" data-value="latest">
                  <i class="thumbs up icon"></i>
                  Latest
                </div>
                <div class="item" data-value="oldest">
                  <i class="clock icon"></i>
                  Oldest
                </div>
                <div class="item" data-value="price_asc">
                  <i class="sort amount up icon"></i>
                  Price: Low to High
                </div>
                <div class="item" data-value="price_desc">
                  <i class="sort amount down icon"></i>
                  Price: High to Low
                </div>
            </div>
          </div>
      </div>
      <input type="text" name="order" id="hidden_order" hidden>
    </div>



    <div class="p-4 ui grid" id="car-list-container">

    </div>

</div>
    </div>
   <!--  <?php include 'footer.php' ?> -->
    <?php include 'scripts.php'; ?>
    <script type="text/javascript">
      $(document).ready( function () {


        var type = document.getElementById("gettype").value;
        if(type) {
          if(type == "hatchback") {
            document.getElementById("checkbox_hatchback").checked = true;
          }
          else if(type == "sedan") {
            document.getElementById("checkbox_sedan").checked = true;
          }
          else if(type == "coupe") {
            document.getElementById("checkbox_coupe").checked = true;
          }
          else if(type == "suv") {
            document.getElementById("checkbox_suv").checked = true;
          }
          else if(type == "minivan") {
            document.getElementById("checkbox_minivan").checked = true;
          }
          else if(type == "van") {
            document.getElementById("checkbox_van").checked = true;
          }
          else if(type == "pickup") {
            document.getElementById("checkbox_pickup").checked = true;
          }
          else if(type == "jeep") {
            document.getElementById("checkbox_jeep").checked = true;
          }
          else if(type == "supercar") {
            document.getElementById("checkbox_supercar").checked = true;
          }
        }
        

      });
    </script>

    <script type="text/javascript" src="js/car-filtering.js"></script>

    

</body>
</html>