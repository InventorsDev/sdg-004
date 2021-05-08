<?php

include_once '../functions.php'; 

/* if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
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

}else{
  $_SESSION['msg'] ='You must login first';
  header('location: ../login');
  exit();
} */


header('location: 404');
exit();

?>


<!DOCTYPE html>
<html lang="en">
<head>

 <title> Messages | SpeakUp</title>
 
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
     <?php
        //RESPONDER MENU
        if ($user_type == 'responder') {?>
          <a href="responder" class="list-group-item list-group-item-action">Dashbboard</a>
          <a href="help" class="list-group-item list-group-item-action">Help Requests</a>
          <a href="view-reports" class="list-group-item list-group-item-action">View Reports</a>
        <a href="share-tips" class="list-group-item list-group-item-action active">Share Tips</a>
          <a href="Profile" class="list-group-item list-group-item-action active">Profile</a>

        <?php }else{
        //REPORTER MENU ?>
        <a href="reporter" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="help" class="list-group-item list-group-item-action">Help Me!</a>
        <a href="reports" class="list-group-item list-group-item-action ">Reports</a>
        <a href="../tips" class="list-group-item list-group-item-action">Tips & Guides </a>
        <a href="profile" class="list-group-item list-group-item-action  active">Profile</a>
      <?php } ?>

    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <?php include_once 'includes/navbar.php'; ?>

    <div class="container-fluid">
     
     <!-- Code goes in here -->

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