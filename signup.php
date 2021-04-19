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
<body onload="botFuntion()">

 <!-- MENU BAR -->
 <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="./">
      <i class="fa fa-bullhorn"></i>
      SpeakUp
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="home#how-it-works" class="nav-link smoothScroll">How it Works</a>
      </li>
      <li class="nav-item">
        <a href="tips" class="nav-link smoothScroll">Guides & Tips</a>
      </li>
      <li class="nav-item">
        <a href="home#frequently-question" class="nav-link smoothScroll">FAQ's</a>
      </li>
      <li class="nav-item">
        <a href="signup" class="nav-link active">Signup</a>
      </li>
      <li class="nav-item">
        <a href="login" class="nav-link login">Login</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<!-- SIGNUP -->

<section class="signup section-padding-half pb-20" id="signup" >
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-12 signup-header">
      <h2 class="text-center" data-aos="fade-up"> Welcome! </h2>
      <p class="text-center mb-5" data-aos="fade-up"  id="as">Signup as</p>
    </div>
  </div>

    <!-- How it work Code goes here-->
      <div class="row" id="signup-as" data-aos="fade-up" data-aos-delay="100">
      <div class="offset-md-2 col-md-8 mt-5">
        <button class="btn btn-light pull-left signup-button" id="reporter"><i class="fa fa-user"></i> Reporter</button>
        <button class="btn btn-light pull-right signup-button" id="responder"><i class="fa fa-user-md"></i> Responder</button>
      </div>
     </div>


   <div style="display: none;" class="signup-container" id="signup-as-reporter">
        
            <div class="signup-box" data-aos="fade-up">
                <div class="signup-body">
                    <div class="signup-title"><strong>Basic Information</strong></div>

                     <div id="alert_box" style="display: none;" class="error_alert" >
          <span aria-label="close" onclick="close_alert('alert_box')" >&times;</span>
             <p><i class="fa fa-exclamation-circle"></i> <span id="alert"></span></p>
             </div>

                    <form action="" autocomplete="off" id="signup-form1" class="form-horiontal" method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label>Lastname</label>
                            <input type="text" id="lastname" class="form-control" placeholder="Enter your lastname"/>
                            <p id="lastname_alert" class="form-alert"></p> 
                        </div>

                        <div class="col-md-6">
                          <label>Firstname</label>
                            <input type="text" id="firstname" class="form-control" placeholder="Enter your firstname"/>
                            <p id="firstname_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-6">
                          <label>Email</label>
                            <input type="text" id="email" class="form-control" placeholder="Enter your e-mail address"/>
                            <p id="email_alert" class="form-alert"></p> 
                        </div>

                        <div class="col-md-6">
                          <label>Occupation</label>
                            <select class="form-control" id="occupation">
                            <option value="">--Select occupation--</option>
                            <option value="student">Student</option>
                            <option value="others">Others</option>
                          </select>
                            <p id="occupation_alert" class="form-alert"></p> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                          <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Enter your password"/>
                            <p id="password_alert" class="form-alert"></p> 
                        </div>
                   
                        <div class="col-md-6">
                          <label>Confirm password</label>
                            <input type="password" id="cpassword" class="form-control" placeholder="Confirm password"/>
                            <p id="cpassword_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-info btn-sm" type="button" id="reporter-signup">Signup <i class="fa fa-sign-in"></i></button>
                        </div>
                      </div>

                    <div class="signup-subtitle text-center">
                        Already have an account? <a href="login">Login</a>
                    </div>
                    </form>
                </div>
                <div class="signup-footer">
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


          <div style="display: none;" class="signup-container" id="signup-as-responder1">
        
            <div class="signup-box" data-aos="fade-up">
                <div class="signup-body">
                    <div class="signup-title"><strong>Basic Information</strong></div>

                    <form action="" autocomplete="off" id="signup-form2" class="form-horiontal" method="post">
                     <div class="form-row">
                        <div class="col-md-6">
                          <label>Lastname</label>
                            <input type="text" id="lastname1" class="form-control" placeholder="Enter your lastname"/>
                            <p id="lastname1_alert" class="form-alert"></p> 
                        </div>
                    

                        <div class="col-md-6">
                          <label>Firstname</label>
                            <input type="text" id="firstname1" class="form-control" placeholder="Enter your firstname"/>
                            <p id="firstname1_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-6">
                          <label>Email</label>
                            <input type="text" id="email1" class="form-control" placeholder="Enter your e-mail address"/>
                            <p id="email1_alert" class="form-alert"></p> 
                        </div>


                        <div class="col-md-6">
                          <label>Phone number</label>
                            <input type="tel" id="phone" class="form-control" placeholder="Enter phone number"/>
                            <p id="phone_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-6">
                          <label>Password</label>
                            <input type="password" id="password1" class="form-control" placeholder="Enter your password"/>
                            <p id="password1_alert" class="form-alert"></p> 
                        </div>


                        <div class="col-md-6">
                          <label>Confirm password</label>
                            <input type="password" id="cpassword1" class="form-control" placeholder="Confirm password"/>
                            <p id="cpassword1_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-info btn-sm" type="button" id="responder-next">Next <i class="fa fa-long-arrow-right"></i></button>
                        </div>
                      </div>

                    <div class="signup-subtitle text-center">
                        Already have an account? <a href="login">Login</a>
                    </div>
                    </form>
                </div>
                <div class="signup-footer">
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


          <div style="display: none;" class="signup-container" id="signup-as-responder2">
        
            <div class="signup-box" data-aos="fade-up">
                <div class="signup-body">
                    <div class="signup-title"><strong>Additional Information</strong></div>

                     <div id="alert1_box" style="display: none;" class="error_alert" >
          <span aria-label="close" onclick="close_alert('alert1_box')" >&times;</span>
             <p><i class="fa fa-exclamation-circle"></i> <span id="alert1"></span></p>
             </div>

                    <form action="" autocomplete="off" id="signup-form3" class="form-horiontal" method="post">
                   <div class="form-row">
                        <div class="col-md-6">
                          <label>Gender</label>
                           <select class="form-control" id="gender">
                            <option value="">--Select gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                            <p id="gender_alert" class="form-alert"></p> 
                        </div>


                        <div class="col-md-6">
                          <label>Date of Birth</label>
                            <input type="date" id="dob" class="form-control" placeholder="Enter your address"/>
                            <p id="dob_alert" class="form-alert"></p> 
                        </div>
                      </div>

                        <div class="form-row">
                        <div class="col-md-6">
                          <label>State of residence</label>
                          <select class="form-control" id="state">
                            <option value="">--Select state--</option>
                          </select>
                            <p id="state_alert" class="form-alert"></p> 
                        </div>

                        <div class="col-md-6">
                          <label>Address</label>
                            <input type="text" id="address" class="form-control" placeholder="Enter your address"/>
                            <p id="address_alert" class="form-alert"></p> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                          <label>Occupation</label>
                            <input type="text" id="occupation1" class="form-control" placeholder="Enter your occupation"/>
                            <p id="occupation1_alert" class="form-alert"></p> 
                        </div>

                        <div class="col-md-6">
                          <label>Organization</label>
                            <input type="text" id="organization" class="form-control" placeholder="Enter your Organization"/>
                            <p id="organization_alert" class="form-alert"></p> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                          <label>Position in your organization</label>
                             <select class="form-control" id="position">
                            <option>--Select position--</option>
                            <option value="others">Others</option>
                          </select>
                            <p id="position_alert" class="form-alert"></p> 
                        </div>


                       <div class="col-md-6">
                          <label>Curriculum vitae</label>
                          <div class="custom-file">
                            <input type="file" id="cv" class="form-control custom-file-input" id="custom-file" />
                          <label class="custom-file-label" id="cv1" for="custom-file">Select curriculum vitae</label>
                            <p id="cv_alert" class="form-alert"></p> 
                          </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                          <label>What's your motive for doing this?</label>
                            <textarea id="motive" class="form-control" placeholder="Enter your motive for doing this"></textarea>
                            <p id="motive_alert" class="form-alert"></p> 
                        </div>
                    </div>

                     <div class="form-row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success btn-sm" type="button" id="responder-pre"><i class="fa fa-long-arrow-left"></i> Previous</button>
                            <button class="btn btn-info btn-sm" type="button" id="responder-signup">Signup <i class="fa fa-sign-in"></i></button>
                        </div>
                      </div>

                    <div class="signup-subtitle text-center">
                        Already have an account? <a href="login">Login</a>
                    </div>
                    </form>
                </div>
                <div class="signup-footer">
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

  </div>
</section>


<button class="float btn" id="menu-share" data-toggle="modal" data-target="#success"><i class="fa fa-wechat"></i></button>

 <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="success" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body text-center success-box">

                           <center class="alert"><i class="fa fa-check"></i></center>
                        <p id="success_text">Signed up successfully!</p>
                        <p class="redirect">redirecting in 5 seconds...</p>
                        

                      <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>

                        
                      </div>
                    </div>
                  </div>
                </div>


<footer class="site-footer">
  <div class="container">
    <div class="row footer-row">

      <div class="col-md-6 col-12">
        <h4 class="text-white text-center">Safe the world <strong>SpeakUp</strong> Today.</h4>
      </div>

      <div class="col-md-6 col-12 ">
        <ul class="social-icon">
          <li><a href="#" class="fa fa-instagram"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-whatsapp"></a></li>
          <li><a href="#" class="fa fa-envelope"></a></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="text-center col-md-12 col-12" >
        <p class="copyright-text">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Campus Intel
          <br>Design: Inventor Build For SGD Team 004</p>
        </div>

      </div>
    </div>
  </footer>


  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>