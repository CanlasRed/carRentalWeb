<?php include 'header.php'; ?>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <div class="content">
        <a class="navbar-brand logo-full" href="#"><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 40px;"></a>
        Log-in to your account
      </div>
    </h2>
    <form action="https://s.codepen.io/voltron2112/debug/PqrEPM?" method="get" class="ui large form">
      <div class="ui stacked secondary  segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large black submit button">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      New to us? <a href="#">Register</a>
    </div>
  </div>
</div>

<style type="text/css">
   body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
</style>

