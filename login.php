<?php include 'header.php'; ?>
<div class="ui middle aligned center aligned grid">

  <div class="column ui segment px-4">
    <h5 class="ui my-4">
      <div class="content">
        <center><img src="assets/logo/Speedy_Full_Logo_Black.png" style="height: 80px;"></center>
        <br>
        Sign in to your account
      </div>
    </h5>
    <form action="php/login.php" id="login_form" method="POST" class="ui large form">
      <div class="ui">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input class="rounded-pill" type="text" name="username" placeholder="E-mail address">
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
                }
              ]
            }
          },
          inline: true
        })
      ;

      $(document).ready(function(){
        $('#login_form').submit(function(e){
          e.preventDefault();
          var formData = new FormData(this);
              $.ajax({
                url: "php/login.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data){
                  if(data.statusCode == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Success',
                        confirmButtonColor: '#1b1c1d',
                        confirmButtonText: 'OK'
                    }).then((result) =>{
                         location.href = '/carRentalWeb/';
                      
                    })
                  }
                  else if (data.statusCode == 401){
                    Swal.fire({
                      icon: 'error',
                      title: 'Invalid',
                      text: 'Invalid Credentials',
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                    })
                  }
                  else if (data.statusCode == 400){
                    Swal.fire({
                      icon: 'error',
                      title: 'Invalid',
                      text: 'Username and Password is Required',
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
        });
      });

</script>


