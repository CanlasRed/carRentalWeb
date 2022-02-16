<?php include 'header.php'; ?>
<div class="ui middle aligned center aligned grid">

  <div class="column ui secondary segment px-4">
    <h5 class="ui my-4">
      <div class="content">
        <center><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 80px;"></center>
        <br>
        Create Account
      </div>
    </h5>
    <form action="" method="POST" class="ui large form">
      <div class="ui">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="firstname" placeholder="First Name">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="lastname" placeholder="Last Name">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="at icon"></i>
            <input class="rounded-pill" type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="mobile alternate icon"></i>
            <input class="rounded-pill" type="text" name="phone" placeholder="Mobile no.">
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
        <div class="field">
          <div class="ui action left icon input">
            <i class="lock icon"></i>
            <input class="rounded-pill" type="password" id="txtPassword2" name="password2" placeholder="Retype Password">
            <div class="ui icon button" id='toggle_pwd2'>
              <i class="eye icon" id="toggle_pwd_icon2"></i>
            </div>
          </div>
        </div>
        <div class="ui fluid large vertical black animated submit button rounded-pill">
          <div class="hidden content">Create Account</div>
          <div class="visible content">
            Create Account
          </div>
        </div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div>
      Already have an account? <a href="login.php">Sign in</a>
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

      $('#toggle_pwd2').click(function(){
        $('#toggle_pwd_icon2').toggleClass('slash');
          if($('#toggle_pwd_icon2').hasClass('slash')){
            var type = 'text';
          } else {
            var type = 'password';
          }
        $("#txtPassword2").attr("type", type);
      });


      $('.ui.form')
        .form({
          fields: {

            firstname: {
              identifier: 'firstname',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your first name'
                }
              ]
            },
            lastname: {
              identifier: 'lastname',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your last name'
                }
              ]
            },
            phone: {
              identifier: 'phone',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your phone number'
                },
                {
                  type   : 'integer',
                  prompt : 'Please enter a valid phone number'
                }
              ]
            },
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
            },
            password2: {
              identifier: 'password2',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please retype your password'
                },
                {
                  type   : 'match[password]',
                  prompt : 'Your password do not match'
                }
              ]
            },
            terms: {
              identifier: 'terms',
              rules: [
                {
                  type   : 'checked',
                  prompt : 'You must agree to the terms and conditions'
                }
              ]
            }
          },
          inline: true
        })
      ;
</script>


