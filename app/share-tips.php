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

if($user_type != 'responder' ){
      header('location: ../404');
      exit();
      } 

}else{
      $_SESSION['msg'] ='You must login first';
      header('location: ../login');
      exit();
      } 

?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>View Report | SpeakUp</title>
     
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

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <div class="sidebar-heading"><a href="../"> <i class="fa fa-bullhorn"></i> SpeakUp</a></div>
     
      <div class="round">
        <img class="img-fluid avatar" src="../images/avatar.jpg">
        <h4 class="type"> <?php echo $firstname; ?></h4>
        <small>(<?php echo ucfirst($user_type); ?>)</small>
      </div>

     
      <div class="list-group list-group-flush">
        <a href="responder" class="list-group-item list-group-item-action">Dashbboard</a>
        <a href="help" class="list-group-item list-group-item-action">Help Requests</a>
        <a href="view-reports" class="list-group-item list-group-item-action">View Reports</a>
        <a href="share-tips" class="list-group-item list-group-item-action active">Share Tips</a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!--page-content-->

    <div id="page-content-wrapper">

      <?php include_once 'includes/navbar.php'; ?>

      <div class="container-fluid">
        <div class="btn-group">
          <a class="btn btn-success mt-3" href="../tips">View tips</a>
          <button class="btn btn-info mt-3" type="button" id="make-new">Add new tips</button>
        </div>

        <div class="row">
          <div class="offset-md-1 col-md-10">

            <div class="add-tips">
            <h2 class="mt-4 text-center">Share Helpful Tips</h2>
            <p class="text-center mb-4">Help a soul today by entering a tip below and tap the share button to submit</p>

        <form action="" autocomplete="off" id="tips-form" class="form-horiontal" method="post">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Tips Title</label>
              <input type="text" id="tips-title" class="form-control" placeholder="Enter your occupation"/>
              <span class="invalid-feedback">Please enter tips title</span>
          </div>
          <div class="col-md-6 mb-3">
            <label>Cover Image</label>
            <div class="custom-file">
              <input type="file" id="tips-image" class="form-control custom-file-input" id="custom-file" />
              <label class="custom-file-label" id="tips-image-name" for="custom-file">Select a cover image</label>
              <span class="invalid-feedback">Please upload your cover image</span>
            </div>
          </div>
        </div>

          <textarea class="form-control" placeholder="Describe your situation..." id="tips-content" rows="4" cols="3"></textarea>
          <div class="invalid-feedback">Please enter your tips</div>
          
              <div class="col-md-12 text-center">
                  <button class="btn btn-info text-center" type="button" id="share-tips" style="margin-top: 15px;">Share Tips <i class="fa fa-sign-in"></i></button>
              </div>

        </form>
       
          </div>


          <div id="all-tips">
            
          </div>
        </div>

          <!--Footer Copywright-->
          <div class="text-right container-fluid">
          <div class="credits">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | SpeakUp
          </div>
        </div>
      </div>
    </div>

    <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="tips-success" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center success-box">
            <center class="alert"><i class="fa fa-check"></i></center>
            <p id="success_text">Tips  Shared Successfully!</p>
            <p class="get-back">Thanks for Sharing.</p>
            <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>   
          </div>
        </div>
      </div>
    </div>

</div><!--Flex Div Wrapper-->
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