<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>     

    <!-- Bootstrap -->
     <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>bootstrap/css/bootstrap.min.css"  />
    <!-- Font Awesome -->     
     <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>font-awesome/css/font-awesome.min.css"  />
      <!-- NProgress -->
    <!-- <link href="../vendors/nprogress/nprogress.css" rel="stylesheet"> -->
     <link href="<?php echo asset_url(); ?>nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <!-- <link href="../vendors/animate.css/animate.min.css" rel="stylesheet"> -->
    <link href="<?php echo asset_url(); ?>animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <!-- <link href="../build/css/custom.min.css" rel="stylesheet"> -->
    <link href="<?php echo asset_url(); ?>build/css/custom.min.css" rel="stylesheet">



  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login-form" name="login-form"  method="post" action="<?php echo site_url('login/dologin');?>">

              <h1>Login Form</h1>
              <div>
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="loginpass" id="loginpass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit logincls" href="#" onclick="loginFormsubmit();">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>


  <script>
        function loginFormsubmit() {

           // document.getElementById('login-form').submit();
           document.login-form.submit();
        }

  </script>


  </body>
</html>
