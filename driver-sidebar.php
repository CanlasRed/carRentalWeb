<div class="sidebar pt-5 col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="ui dividing header">
      <i class="filter icon"></i>
      <div class="content">
        Drivers
      </div>
    </div>
  <div class="accordion" id="accordion-filter">


  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-car-type">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel-car-type" aria-expanded="true" aria-controls="panel-car-type">
        Age Group
      </button>
    </h2>
    <div id="panel-car-type" class="accordion-collapse collapse show" aria-labelledby="heading-car-type">
      <div class="accordion-body">
        <label id="ageMin">18</label>
        <label id="ageMax" class="float-end">100</label>
        <div class="ui range slider" id="slider-range"></div>

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
          <?php for ($i=0;$i<4;$i++) { ?>
            <li>
            <div class="ui checkbox">
              <input type="checkbox" name="example" id="<?php echo $i; ?>">
              <label for="<?php echo $i; ?>">Capacity</label>
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
        Gender
      </button>
    </h2>
    <div id="panel-transmission" class="accordion-collapse collapse show" aria-labelledby="heading-transmission">
      <div class="accordion-body">
        <ul>
          <?php for ($i=0;$i<2;$i++) { ?>
            <li>
            <div class="ui checkbox">
              <input type="checkbox" name="example" id="<?php echo $i; ?>">
              <label for="<?php echo $i; ?>">Male</label>
            </div>
            </li>
          <?php } ?>
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
          <div class="row">
            <div class="ui input col-5">
              <input type="number" placeholder="Min">
            </div>
            _
            <div class="ui input col-5">
              <input type="number" placeholder="Max">
            </div>
          </div>
          <div class="row pt-3 px-3">
              <button class="ui secondary button">
                Apply
              </button>
          </div>
      </div>
    </div>
  </div>



</div>
</div>

