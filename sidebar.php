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
          <?php for ($i=0;$i<6;$i++) { ?>
            <li>
              <div class="ui checkbox">
                <input type="checkbox" name="example" id="<?php echo $i; ?>">
                <label for="<?php echo $i; ?>">Car Type</label>
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
        Transmission
      </button>
    </h2>
    <div id="panel-transmission" class="accordion-collapse collapse show" aria-labelledby="heading-transmission">
      <div class="accordion-body">
        <ul>
          <?php for ($i=0;$i<2;$i++) { ?>
            <li>
            <div class="ui checkbox">
              <input type="checkbox" name="example" id="<?php echo $i; ?>">
              <label for="<?php echo $i; ?>">Automatic</label>
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
              <input type="checkbox" name="example" id="<?php echo $i; ?>">
              <label for="<?php echo $i; ?>">Red</label>
            </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</div>
</div>

<div class="pt-5 col-lg-9 col-md-8 col-sm-12 col-xs-12" style="display: block; width: 100%;">

    <div class="ui secondary  menu">
      <div class="item" style="width: 400px;">
        <div class="ui fluid icon input large">
          <input type="text" placeholder="Search...">
          <i class="search link icon"></i>
        </div>
      </div>
      <div class="right menu">
          <div class="ui floating dropdown labeled icon button">
            <i class="filter icon pt-4"></i>
            <span class="text mt-1">Sort</span>
            <div class="menu">
              <div class="header">
                <i class="tags icon"></i>
                Sort By:
              </div>
              <div class="divider"></div>
              <div class="item">
                <i class="thumbs up icon"></i>
                Relevance
              </div>
              <div class="item">
                <i class="clock icon"></i>
                Latest
              </div>
              <div class="item">
                <i class="sort amount up icon"></i>
                Price: Low to High
              </div>
              <div class="item">
                <i class="sort amount down icon"></i>
                Price: High to Low
              </div>
            </div>
          </div>
      </div>
    </div>



    <div class="p-4 ui grid">
<?php for ($i=0;$i<5;$i++) { ?>

      <div class="ui card m-2">
        <div class="content">
          <div class="right floated meta">14h</div>
            Kia Picanto
        </div>
        <div class="image">
          <img src="assets/car-types/hatchback.png">
        </div>
        <div class="content">
          <div class="row">
            <div class="col-6">
              4 Seater
            </div>
            <div class="col-6">
              Auto
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              Engine: Gas
            </div>
            <div class="col-6">
              Type: Hatchback
            </div>
          </div>
        </div>
        <div class="content">
          <span class="float-start mt-2">
              <h5 style="font-weight: bold;">₱4,000</h5>
          </span>
          <span class="float-end">
            <a href="">
              <div class="ui vertical animated button secondary" tabindex="0">
                <div class="hidden content"   style="font-weight:400">Rent</div>
                <div class="visible content">
                  <i class="shop icon"   style="font-weight:400"></i>
                </div>
              </div>
            </a>
          </span>
        </div>
      </div>

  <?php } ?>
    </div>

</div>