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

     <title>App | SpeakUp</title>
     
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
        <div class="row board-row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="board bg-primary">
            <h1 class="count">8</h1>
            <div class="title">Assigned Cases</div>
          </div>
        </div>
          
           <div class="col-md-4">
          <div class="board bg-dark">
            <span class="count">8</span>
            <div class="title">Resolved Cases</div>
          </div>
        </div>
         
           <div class="col-md-4">
          <div class="board bg-warning">
            <h1 class="count">8</h1>
            <div class="title">Badges Earned</div>
          </div>
        </div>

        </div>
        <div class="row">
          <div class="offset-md-1 col-md-10 text-center">
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

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>