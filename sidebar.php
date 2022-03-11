<div class="sidebar pt-5 col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="ui dividing header">
      <i class="filter icon"></i>
      <div class="content">
        Cars
      </div>
    </div>
  <div class="accordion" id="accordion-filter">


  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-car-type">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-car-type" aria-expanded="true" aria-controls="panel-car-type">
        Car Type
      </button>
    </h2>
    <div id="panel-car-type" class="accordion-collapse collapse show" aria-labelledby="heading-car-type">
      <div class="accordion-body">
        <ul>
          <?php 
          $sql = 'SELECT * FROM tbl_car_types ORDER BY typeID ASC';
          $result = mysqli_query($dbconn, $sql); 
          foreach ($result as $row) { ?>
            <li>
              <div class="ui checkbox">
                <input type="checkbox" class="car_type common_selector" name="checkbox" value="<?php echo $row['typeID']; ?>" id="checkbox_<?php echo $row['name']; ?>">
                <label for="checkbox_<?php echo $row['name']; ?>"><?php echo $row['name']; ?></label>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-capacity">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-capacity" aria-expanded="false" aria-controls="panel-capacity">
        Capacity
      </button>
    </h2>
    <div id="panel-capacity" class="accordion-collapse collapse show" aria-labelledby="heading-capacity">
      <div class="accordion-body">
        <ul> 
              <?php 
              $sql = "SELECT DISTINCT capacity FROM tbl_cars";
              $result = mysqli_query($dbconn, $sql);
              $ctr = 0;
              foreach ($result as $cap){ $ctr++; ?>
            <li>
              <div class="ui checkbox">
                <input type="checkbox" name="capacity" class="common_selector car_capacity" id="capacity<?php echo $ctr;?>">
                <label for="capacity<?php echo $ctr;?>"><?php echo $cap['capacity']; ?> Seaters</label>
              </div>
            </li>
            <?php } ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-transmission">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-transmission" aria-expanded="false" aria-controls="panel-transmission">
        Transmission
      </button>
    </h2>
    <div id="panel-transmission" class="accordion-collapse collapse show" aria-labelledby="heading-transmission">
      <div class="accordion-body">
        <ul>
            <li>
              <div class="ui checkbox">
                <input type="checkbox" class="common_selector car_transmission" value="automatic" name="example" id="transmission">
                <label for="transmission">Automatic</label>
              </div>
            </li>
            <li>
              <div class="ui checkbox">
                <input type="checkbox" class="common_selector car_transmission" value="manual" name="example" id="transmission2">
                <label for="transmission2">Manual</label>
              </div>
            </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-price">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-price" aria-expanded="false" aria-controls="panel-price">
        Price Range
      </button>
    </h2>
    <div id="panel-price" class="accordion-collapse collapse show" aria-labelledby="heading-price">
      <div class="accordion-body">
        <div class="ui grid m-0 p-0" style="width: 100%;">
            <div class="two column row p-0 m-0">
              <div class="ui input left floated column">
                <label class="left floated column">Min</label>
                <input type="number" id="priceMin" placeholder="Min" value="50">
              </div>
              
              <div class="ui input right floated column">
                <label class="float-end">Max</label>
                <input type="number" id="priceMax" placeholder="Max" value="10000">
              </div>
            </div>
          <div class="two column row m-0">
            <div class="ui range slider" id="slider-price"></div>
          </div>
          <div class="row px-3 m-0">
              <button class="ui secondary button common_selector">
                Apply
              </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-color">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-color" aria-expanded="false" aria-controls="panel-color">
        Color
      </button>
    </h2>
    <div id="panel-color" class="accordion-collapse collapse show" aria-labelledby="heading-color">
      <div class="accordion-body">
        <ul>
          <?php for ($i=0;$i<2;$i++) { ?>
            <li>
            <div class="ui checkbox">
              <input type="checkbox" name="example" id="color<?php echo $i; ?>">
              <label for="color<?php echo $i; ?>">Red</label>
            </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</div>
</div>

