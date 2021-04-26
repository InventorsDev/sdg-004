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

     <title>Help request | SpeakUp</title>
     
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
        <a href="help" class="list-group-item list-group-item-action active">Help Requests</a>
        <a href="view-reports" class="list-group-item list-group-item-action">View Reports</a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

 
  <?php include_once 'includes/navbar.php'; ?>

      <div class="container-fluid">        

        <div class="row">
          <div class="offset-md-1 col-md-10">


           <!-- Code goes here -->
           
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


       <!-- Alert modals -->
 <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="success" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body text-center success-box">

                           <center class="alert"><i class="fa fa-check"></i></center>
                        <p id="success_text">Report submitted successfully!</p>
                        
                      <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>

                      </div>
                    </div>
                  </div>
                </div>

                 <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="fail" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-body text-center success-box">

                           <center class="alert"><i class="fa fa-exclamation-circle"></i></center>
                        <p id="fail_text"></p>
                        
                      <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>

                      </div>
                    </div>
                  </div>
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