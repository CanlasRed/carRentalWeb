<?php include 'header.php'; ?>
<div class="ui middle aligned center aligned grid">

  <div class="column ui segment px-4">
    <h5 class="ui my-4">
      <div class="content">
        <center><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 80px;"></center>
        <br>
        Create Account
      </div>
    </h5>
    <form action="" method="POST" id="register_form" class="ui large form">
      <div class="ui">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="firstName" placeholder="First Name *">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="lastName" placeholder="Last Name *">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="at icon"></i>
            <input class="rounded-pill" type="text" name="username" placeholder="E-mail address *">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="mobile alternate icon"></i>
            <input class="rounded-pill" type="text" name="phone" placeholder="Mobile no. *">
          </div>
        </div>
        <div class="field">
          <div class="ui action left icon input">
            <i class="lock icon"></i>
            <input class="rounded-pill" type="password" id="txtPassword" name="password" placeholder="Password *">
            <div class="ui icon button" id='toggle_pwd'>
              <i class="eye icon" id="toggle_pwd_icon"></i>
            </div>
          </div>
        </div>
        <div class="field">
          <div class="ui action left icon input">
            <i class="lock icon"></i>
            <input class="rounded-pill" type="password" id="txtPassword2" name="password2" placeholder="Retype Password *">
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
              identifier: 'firstName',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your first name'
                }
              ]
            },
            lastname: {
              identifier: 'lastName',
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
              identifier  : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'username',
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
          inline: true,
          onSuccess: function(e, fields){
          e.preventDefault();
          var formData = new FormData(this);
              $.ajax({
                url: "php/create-account.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data){
                  if(data.statusCode == 200 && data.data != null){
                    Swal.fire({
                        icon: 'success',
                        title: data.msg,
                        confirmButtonColor: '#1b1c1d',
                        confirmButtonText: 'OK'
                    }).then((result) =>{
                         location.href = '/carRentalWeb/';
                      
                    })
                  }
                  else if (data.statusCode == 500){
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: data.msg,
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                    })
                  }
                  else if (data.statusCode == 200 && data.data == null){
                    Swal.fire({
                      icon: 'error',
                      title: 'Invalid',
                      text: data.msg,
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                    })
                  }
                  else if (data.statusCode == 400 && data.data == null){
                    Swal.fire({
                      icon: 'error',
                      title: 'Invalid',
                      text: data.msg,
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                    })
                  }
                  else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'An error has occured',
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                    })
                  }
                }
              });
          }
        })
      ;

  
</script>


