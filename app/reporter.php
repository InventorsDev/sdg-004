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

     <title> App | SpeakUp</title>
     
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bootstrap-sidebar.min.css" rel="stylesheet">
    <link href="../css/app.css" rel="stylesheet">

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
            <div class="title">Reports Filed</div>
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
        <h2 class="mt-4">Request for help below</h2>
        <p>Describe the help you need or press the button and help would come</p>
        <textarea class="form-control" placeholder="Describe your situation..." id="help" rows="3" cols="3"></textarea>
        <button class="btn btn-primary btn-help" id="get-help">Get Help</button>
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


 <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="success" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body text-center success-box">

                           <center class="alert"><i class="fa fa-check"></i></center>
                        <p id="success_text">Help request sent successfully!<br>
                          Stay calm! Heads up!
                        </p>
                        

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