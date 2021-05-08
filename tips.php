<?php 
include_once 'functions.php';
$login = '';

if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
  $user_id = preg_replace('#[^0-9]#','',$_SESSION['user_id']);
  $user_type = test_input($_SESSION["user_type"]);
  $login = true;
}
?>
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
        <a href="tips" class="nav-link active">Guides & Tips</a>
      </li>
      <li class="nav-item">
        <a href="home#frequently-question" class="nav-link smoothScroll">FAQ's</a>
      </li>
      <?php if(!$login){ ?>
      <li class="nav-item">
        <a href="signup" class="nav-link">Signup</a>
      </li>

      <li class="nav-item">
        <a href="login" class="nav-link login">Login</a>
      </li>
      <?php }else{ ?>
      <li class="nav-item">
        <a href="app/logout" class="nav-link login">Logout</a>
      </li>
       <?php } ?>
    </ul>
  </div>
</div>
</nav>

<!-- SIGNUP -->
  <section class="tips section-padding-half pb-20" id="tips-and-guides">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-12 signup-header">
      <h2 class="text-center" data-aos="fade-up"> Tips and Guide</h2>
      <p class="text-center mb-5" data-aos="fade-up"  id="as">Get daily tips and guides to keep you above any situation</p>
    </div>
  </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
                <?php
                  $limit = 9;
                  $stmt = $conn->prepare("SELECT posted_by, tips_title, title_slug, tips_content, cover_image, date_added FROM tips_guides ORDER BY date_added DESC LIMIT ?");
                  $stmt->bind_param("i", $limit);
                  $stmt->execute();
                  $stmt->store_result();
                  $stmt->bind_result($posted_by, $tips_title, $title_slug, $tips_content, $cover_image, $date_added);
                  $tips_count = $stmt->num_rows;
                  if($tips_count > 0){
                    while($stmt->fetch()) {
                       $count= strlen($tips_content);
                       $message = "";
                       if($count > 35){
                        $newcount = 35; 
                        // Define how many character you want to display.
                        $message = substr($tips_content, 0, $newcount).'...'; 
                      }
                ?>
                <div class="col-md-4">
                    <div class="tips-wrap">
                        <a href="tips/<?php echo $title_slug; ?>" class="tips-img">
                            <img src="images/tips/<?php echo $cover_image; ?>" class="img-fluid tips-img" alt="#">
                        </a>
                        <div class="tips-avatar">
                            <img src="images/avatar.jpg" alt="#">
                            <p><?php echo $posted_by; ?></p>
                        </div>
                        <div class="tips-content_wrap">
                            <a href="tips/<?php echo $title_slug; ?>" class="tips-title">
                                <h5><?php echo $tips_title; ?></h5>
                            </a>
                            <p><?php echo $message; ?></p>
                            <a href="tips/<?php echo $title_slug; ?>" class="tips-category" >Read More ➝</a>
                        </div>
                    </div>
                </div>
              <?php }}else{
                echo "
                <div class='col-lg-12 col-12'>
                  <p class='text-center mb-5' data-aos='fade-up'  id='as'>Yucks! There are no tips yet, check back later.</p>
                </div>";
              } ?>
                
            </div>

            <div class="row">
              <div class="col-12 text-center mt-4">
                <?php 
                  if($tips_count > 9){ 
                    echo '<button class="btn btn-primary" id="load-more-tips" type="button">View more <i class="fa fa-long-arrow-right"></i></button>';
                  }
                ?>
            </div>
          </div>


  </div>
</section>



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
        <p class="copyright-text">Copyright &copy; <script>document.write(new Date().getFullYear());</script> SpeakUp
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