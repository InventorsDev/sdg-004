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

        if($user_type != 'reporter' ){
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
        <a href="<?php echo $user_type; ?>" class="list-group-item list-group-item-action active">Help me!</a>
        <a href="reports" class="list-group-item list-group-item-action">Reports</a>
        <a href="profile" class="list-group-item list-group-item-action">Profile</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

  <?php include_once 'includes/navbar.php'; ?>

      <div class="container-fluid">
        <div class="row board-row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="board bg-primary">
            <span class="count">
            <?php
            $stmt = $conn->prepare("SELECT report_id FROM reports WHERE user_id = ?");
              $stmt->bind_param("i", $user_id);
              $stmt->execute();
              $stmt->store_result();
              echo $stmt->num_rows;
            ?>
          </span>
            <div class="title">Reports Filed</div>
          </div>
        </div>
          
           <div class="col-md-4">
          <div class="board bg-dark">
            <span class="count">
            <?php
            $status = 'treated';
            $stmt = $conn->prepare("SELECT report_id FROM reports WHERE user_id = ? AND status = ?");
              $stmt->bind_param("is", $user_id, $status);
              $stmt->execute();
              $stmt->store_result();
              echo $stmt->num_rows;
            ?>
          </span>
            <div class="title">Resolved Cases</div>
          </div>
        </div>
         
           <div class="col-md-4">
          <div class="board bg-warning">
            <span class="count">
             <?php
            $stmt = $conn->prepare("SELECT badge FROM users WHERE user_id = ?");
              $stmt->bind_param("i", $user_id);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($badge);
              $stmt->fetch();

              $my_badge = 0;
              if ($badge != '') {
               $badge = explode(',', $badge);
                  foreach ($badge as $key => $file) {
                  $my_badge = $my_badge+1; 
                   }
              }
               echo $my_badge;
            ?>
          </span>
            <div class="title">Badges Earned</div>
          </div>
        </div>

        </div>
        <div class="row">
          <div class="offset-md-1 col-md-10">
        <h2 class="mt-4 text-center">Request for help below</h2>
        <p class="text-center mb-4">Describe the help you need or press the button and help would come</p>

        <textarea class="form-control" placeholder="Describe your situation..." id="help" rows="3" cols="3"></textarea>
        <div class="invalid-feedback">Please describe your situation</div>

        <div class="text-center"><button class="btn btn-primary btn-help" id="get-help">Get Help</button></div>
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
                        <p id="success_text">Help request sent successfully!<br>
                          Stay calm! Heads up!
                        </p>
                        
                      <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>

                      </div>
                    </div>
                  </div>
                </div>

                 <div aria-hidden="true" aria-labelledby="staticBackdropLabel" role="dialog" tabindex="-1" id="fail" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <center class="alert"><i class="icon_error-circle_alt"></i></center>
                        <p class="text-center " id="fail_text"></p><br/>
                        
                      <div style="margin-bottom: 40px;">
                      <button class="btn btn-primary pull-right" data-dismiss="modal" type="button">Ok</button>
                      </div>
                        
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