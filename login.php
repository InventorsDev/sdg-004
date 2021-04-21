<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>

 <title>SpeakUp</title>

 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
 <meta name="description" content="">
 <meta name="keywords" content="">
 <meta name="author" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <link rel="stylesheet" href="css/aos.css">
 <link rel="stylesheet" href="css/owl.carousel.min.css">
 <link rel="stylesheet" href="css/owl.theme.default.min.css">

 <!-- MAIN CSS -->
 <link rel="stylesheet" href="css/style.css">

</head>
<body>



<!-- Login-->
<div class="login-container">
        
            <div class="login-box" data-aos="fade-up">
              <a href="./"><h3 class="login-header">SpeakUp</h3></a>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>

                     <div id="alert_box" style="display: none;" class="error_alert" >
          <span aria-label="close" onclick="close_alert('alert_box')" >&times;</span>
             <p><i class="fa fa-exclamation-circle"></i> <span id="alert"></span></p>
             </div>

                    <form action="" autocomplete="off" class="form-horiontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="email" class="form-control" placeholder="E-mail"/>
                            <p id="email_alert" class="form-alert"></p> 
                        </div>
                    </div>

                        <div class="col-md-12"> 
                    <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Password"/>
                      <div class="input-group-append">
                      <div class="input-group-text" id="show-hide"><span class="eye fa fa-eye"></span></div>
                    </div> </div>
                     <p id="password_alert" class="form-alert mt-n3 mb-n4"></p>
                    </div>

                    <div class="form-row mt-5">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type="button" id="login">Log In</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Don't have an account yet? <a href="signup">Create an account</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <script>document.write(new Date().getFullYear());</script> SpeakUp
                    </div>
                    <div class="pull-right">
                        <a href="tips">Tips</a> |
                        <a href="privacy">Privacy</a>
                    </div>
                </div>
            </div>
          </div>



  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>