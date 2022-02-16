<?php include 'header.php'; ?>
<div class="ui middle aligned center aligned grid">

  <div class="column ui secondary segment px-4">
    <h5 class="ui my-4">
      <div class="content">
        <center><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 80px;"></center>
        <br>
        Sign in to your account
      </div>
    </h5>
    <form action="" method="POST" class="ui large form">
      <div class="ui">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui action left icon input">
            <i class="lock icon"></i>
            <input class="rounded-pill" type="password" id="txtPassword" name="password" placeholder="Password">
            <div class="ui icon button" id='toggle_pwd'>
              <i class="eye icon" id="toggle_pwd_icon"></i>
            </div>
          </div>
        </div>
        <div class="my-3">
          <small><a href="#">Forgot your password?</a></small>
        </div>
        <div class="ui fluid large vertical black animated submit button rounded-pill">
          <div class="hidden content">Sign in</div>
          <div class="visible content">
            Sign in
          </div>
        </div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div>
      Don't have an account? <a href="register.php">Create</a>
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
<?php include 'scripts.php'; ?>

<script type="text/javascript">
      $('#toggle_pwd').click(function(){
        $('#toggle_pwd_icon').toggleClass('slash');
          if($('#toggle_pwd_icon').hasClass('slash')){
            var type = 'text';
          } else {
            var type = 'password';
          }
        $("#txtPassword").attr("type", type);
      });

      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier: 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter a password'
                },
                {
                  type   : 'minLength[6]',
                  prompt : 'Your password must be at least {ruleValue} characters'
                },
                {
                  type   : 'contains[1]',
                  prompt : 'Your password not stronkgs'
                }
              ]
            }
          },
          inline: true
        })
      ;
</script>


