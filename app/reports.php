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
  if($stmt->num_rows > 0 ) {
    $stmt->fetch();
  }else{
    $_SESSION['msg'] ='You must login first';
    header('location: ../login');
    exit();
  } 

  if($user_type != 'reporter' ){
    header('location: 404');
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
        <a href="reporter" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="help" class="list-group-item list-group-item-action">Help me!</a>
        <a href="reports" class="list-group-item list-group-item-action active">Reports</a>
        <a href="profile" class="list-group-item list-group-item-action">Profile</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     
      <?php include_once 'includes/navbar.php'; ?>

      <div class="container-fluid">

        <button class="btn btn-info mt-3" type="button" id="make-new">Make New Report</button>
        

        <div class="row">
          <div class="offset-md-1 col-md-10">


            <div class="track-report">
              <h3 class="mt-3 mb-3 text-center">Track Submitted Reports</h3>
              <div class="accordion" id="view-reports">                

                <?php
                $stmt = $conn->prepare("SELECT report_id, user_id, submitted_as, title, description, evidence, status, date_added FROM reports WHERE user_id = ?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($report_id, $reporter_id, $submitted_by, $title, $description, $evidence, $status, $date_added);
                if($stmt->num_rows > 0 ) {
                  while($stmt->fetch()){

                    if ($submitted_by != 'anonymous') {

                  //select sender's name
                      $stmt1 = $conn->prepare("SELECT firstname, lastname FROM users WHERE user_id = ?");
                      $stmt1->bind_param("i", $reporter_id);
                      $stmt1->execute();
                      $stmt1->store_result();
                      $stmt1->bind_result($firstname, $lastname);
                      $stmt1->fetch();
                      $submitted_by = '<a href="./reporter'.$reporter_id.'">'.ucwords($firstname.' '.$lastname).'</a>';
                    }else{
                      $submitted_by = 'Anonymous';
                    } ?>

                    <div class="card report">
                      <div class="card-body preview" id="heading<?php echo $report_id; ?>">
                        <a href="#collapse<?php echo $report_id; ?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse<?php echo $report_id; ?>">
                          <h5 class="card-title mb-n1"><?php echo ucfirst($title); ?></h5></a>                                           
                          <small class="card-subtitle mb-3 text-muted">Submitted by: <?php echo $submitted_by; ?></small>
                          <div class="footer">
                            <small class="text-muted">Status: <?php echo $status; ?> | </small>
                            <small class="text-muted">Submitted: <?php echo date('jS M Y ', strtotime($date_added)); ?></small>
                          </div>
                        </div>

                        <div id="collapse<?php echo $report_id; ?>" class="collapse" aria-labelledby="heading<?php echo $report_id; ?>" data-parent="#view-reports">
                          <div class="card-body"><?php echo $description; ?>
                          <h5 class="mt-1">Evidence: </h5>

                          <?php 
                          $evidence= explode(',', $evidence);
                          foreach ($evidence as $key => $file) {
                            $key = $key +1;
                            echo '<a href="evidence/'.$file.'" >Download evidence '.$key.'</a><br>'; 
                          } 
                          ?>
                          
                        </div>
                      </div>
                    </div>


                  <?php }}else{

                    echo '<div class="card report no-report">
                    <div class="card-body">
                    <p class="card-subtitle p-2 text-center">No report submitted!</p>
                    </div>
                    </div>';
                  }
                  ?>

                </div>

              </div>


              <div class="new-report" style="display: none;">
                <form action="" autocomplete="off" id="report-form" class="form-horiontal" method="post">
                  <h3 class="mt-2 text-center">Submit a New Report</h3>

                  <div class="form-row mb-4">
                    <label>Report Title</label>
                    <input type="text" id="report-title" class="form-control" placeholder="Enter report title">
                    <div class="invalid-feedback">Please enter report title</div>
                  </div>

                  <div class="form-row mb-4">
                    <label>Report Description</label>
                    <textarea class="form-control" id="description" placeholder="Describe your situation..." rows="3" cols="3"></textarea>
                    <div class="invalid-feedback">Please enter report description</div>
                  </div>

                  <div class="form-row mb-4">
                    <label>Upload Evidence</label>
                    <div class="custom-file">
                      <input type="file" id="files" class="form-control custom-file-input" multiple>
                      <label class="custom-file-label" id="files1" for="files">Upload evidence</label>
                      <p id="cv_alert" class="form-alert"></p> 
                    </div>
                  </div>

                  <div class="form-row mb-4">
                    <div class="form-con=trol custom-checkbox ml-4" >
                      <input type="checkbox" value="no" class="custom-control-input" id="anonymous">
                      <label class="custom-control-label" for="anonymous">Submit as anonymous</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-dark mr-4" type="button" id="close-new">Cancel</button>
                    <button class="btn btn-primary" type="button" id="report" >Submit report</button>
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
