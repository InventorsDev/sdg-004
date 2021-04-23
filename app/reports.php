<?php

include_once '../functions.php'; 

if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
$user_id = preg_replace('#[^0-9]#','',$_SESSION['user_id']);
$user_type = test_input($_SESSION["user_type"]);

 $stmt = $conn->prepare("SELECT lastname, firstname FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($lastname, $firstname);
        $stmt->fetch();

}else{
      $_SESSION['msg'] ='You must login first';
      header('location: ../login');
      exit();
      } 

?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Report | SpeakUp</title>
     
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bootstrap-sidebar.min.css" rel="stylesheet">

   <!-- MAIN CSS -->
  <link href="../css/app.css" rel="stylesheet">

</head>

<body>

 
  <?php include_once 'includes/navbar.php'; ?>

      <div class="container-fluid">

          <button class="btn btn-info mt-3" type="button" id="make-new">Make New Report</button>
        

        <div class="row">
          <div class="offset-md-1 col-md-10">


            <div class="track-report">
              <h3 class="mt-2 mb-3 text-center">Track Submitted Reports</h3>

              <div class="card">
                <div class="card-body">
                  <a href=""><h5 class="card-title mb-n1">I was bullied today</h5></a>
                  <small class="card-subtitle mb-3 text-muted">Submitted as annonymous</small>
                  <!--<p class="card-text text-capitalize"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->
                  <div class="pull-right">
                    <small class="text-muted">Status: Pending | </small>
                  <small class="text-muted">Submitted: 24th of Jan, 2021</small>
                </div>
                </div>
              </div>

             <div class="card">
                <div class="card-body">
                  <a href=""><h5 class="card-title mb-n1">I was bullied today</h5></a>
                  <small class="card-subtitle mb-3 text-muted">Submitted as annonymous</small>
                  <!--<p class="card-text text-capitalize"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->
                  <div class="pull-right">
                    <small class="text-muted">Status: Pending | </small>
                  <small class="text-muted">Submitted: 24th of Jan, 2021</small>
                </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <a href=""><h5 class="card-title mb-n1">I was bullied today</h5></a>
                  <small class="card-subtitle mb-3 text-muted">Submitted as annonymous</small>
                  <!--<p class="card-text text-capitalize"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->
                  <div class="pull-right">
                    <small class="text-muted">Status: Pending | </small>
                  <small class="text-muted">Submitted: 24th of Jan, 2021</small>
                </div>
                </div>
              </div>

            </div>


            <div class="new-report" style="display: none;">
        <form action="" autocomplete="off" id="report-form" class="form-horiontal" method="post">
        <h3 class="mt-2 text-center">Submit a New Report</h3>

        <div class="form-row mb-4">
        <label>Report Title</label>
        <input type="text" name="" class="form-control" placeholder="Describe your situation...">
        </div>

        <div class="form-row mb-4">
        <label>Report Description</label>
        <textarea class="form-control" placeholder="Describe your situation..." rows="3" cols="3"></textarea>
      </div>

        <div class="form-row mb-4">
        <label>Upload Evidence</label>
      <div class="custom-file">
                            <input type="file" id="cv" class="form-control custom-file-input" id="custom-file" multiple>
                          <label class="custom-file-label text-left" id="cv1" for="custom-file">Select curriculum vitae</label>
                            <p id="cv_alert" class="form-alert"></p> 
                          </div>
                        </div>
        <div class="form-row mb-4">
        <div class="form-con=trol custom-checkbox ml-4" >
          <input type="checkbox" class="custom-control-input" id="file">
          <label class="custom-control-label" for="file">Submit as anonymous</label>
        </div>
      </div>

        <div class="form-group">
        <button class="btn btn-dark mr-4" type="button" id="close-new">Cancel</button>
        <button class="btn btn-primary" type="button">Submit report</button>
      </div>
    </form>
  </div>

      </div>
    </div>
      </div>

        <div class="text-right container-fluid">
        <div class="credits">
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | SpeakUp
         
        </div>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery-sidebar.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/app.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>