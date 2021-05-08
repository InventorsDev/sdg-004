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

//UPDATE MESSAGE STATUS
  $new_status = 'read';
  if ($user_type == 'responder') {
    $new_label = 'outbox';
    $stmt = $conn->prepare("UPDATE chats SET status = ? WHERE receiver = ? AND label = ? ");
    $stmt->bind_param("sis", $new_status, $user_id, $new_label);
    $stmt->execute();
  }else{
    $new_label = 'inbox';
    $stmt = $conn->prepare("UPDATE chats SET status = ? WHERE sender = ? AND label = ? ");
    $stmt->bind_param("sis", $new_status, $user_id, $new_label);
    $stmt->execute();          
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

<body onload="scroll_message()">

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

      <div class="row">
        <div class="offset-md-2 col-md-8 pt-5">

          <!-- Help request -->
          <div class="card my-scroll-border">
            <div class="card-header">
              <?php
              $stmt = $conn->prepare("SELECT sender FROM chats WHERE receiver = ? ");
              $stmt->bind_param("i", $user_id);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($sender);
              $stmt->fetch();

              $stmt = $conn->prepare("SELECT lastname, firstname FROM users WHERE user_id = ? ");
              $stmt->bind_param("i", $sender);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($Rlastname, $Rfirstname);
              $stmt->fetch();

              if ($user_type == 'reporter') {
                $Ruser_type = 'responder';
              }else{
                $Ruser_type = 'reporter';          
              }
              ?>

              <span class="pull-left"><img src="../images/profile-image.jpg"> 
                <small>
                  <?php echo $Rfirstname.' '.$Rlastname; ?> <i>(<?php echo ucfirst($Ruser_type); ?> -</i><i class="text-primary"> Online)</i>
                </small>
              </span>
              <span class="pull-right">Help Request</span>
            </div>        
            <div class="card-body my-scroll-div">
              <ul class="chats" id="chats">
                <?php

                $stmt = $conn->prepare("SELECT receiver, message, label, status, file, date_sent FROM chats WHERE sender = ? OR receiver = ? ORDER BY chat_id ASC");
                $stmt->bind_param("ii", $user_id, $user_id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($receiver, $message, $label, $status, $file, $date_sent);
                if($stmt->num_rows > 0 ) {
                  while ($stmt->fetch()) {

           //change background of unread messages
                    $unread_message = '';
                    if($user_type == 'responder' and $status == 'unread' and $label == 'outbox' ) {
                     $unread_message = 'style="background: rgba(0,0,0,0.1);"';
                   }

                   if($user_type == 'reporter' and $status == 'unread' and $label == 'inbox' ) {
                     $unread_message = 'style="background: rgba(0,0,0,0.1);"';
                   }

                   if ($status == 'unread') {
                     $status = 'Delivered';
                   }

                   $date_sent=time_Ago($date_sent);

                   $attachment ='';

                   if ($file != '') {
                     $attachment ='<div class="attachment-container pull-right">
                     <img style="border-radius:0%; width:200px; height:200px" src="uploads/'.$file.'" >
                     <div class="middle"><a href="support#" class="view-image" data-id="uploads/'.$file.'">VIEW ATTACHMENT</a></div>
                     </div><br>';
                   }

                   if($label == 'outbox'){

                    if($user_type == 'responder'){  
                      $html = '<li class="help-row by-other">
                      <div class="chat-content" '.$unread_message.'> <div class="chat-meta">
                      <span class="pull-right">'.$date_sent.'</span> </div>
                      <div style="text-align:justify;" class="pull-left text-left">'.$attachment.$message.'</div>
                      <div class="clearfix"></div></div>
                      </li>';
                    }else{
                      $html = '<li class="help-row by-me">
                      <div class="chat-content" '.$unread_message.'> <div class="chat-meta">'.$date_sent.' <i>'.$status.'</i>
                      <span class="pull-right">You</span> </div>
                      <div style="text-align:justify;" class="pull-right text-right">'.$attachment.$message.'</div>
                      <div class="clearfix"></div></div>
                      </li>';            
                    }


                  }else{

                   if($user_type == 'responder'){
                    $html = '<li class="help-row by-me">
                    <div class="chat-content" '.$unread_message.'> <div class="chat-meta">'.$date_sent.' <i>'.$status.'</i>
                    <span class="pull-right">You</span> </div>
                    <div style="text-align:justify;" class="pull-right text-right">'.$attachment.$message.'</div>
                    <div class="clearfix"></div></div>
                    </li>';  
                  }else{ 
                    $html = '<li class="help-row by-other">
                    <div class="chat-content" '.$unread_message.'> <div class="chat-meta">
                    <span class="pull-right">'.$date_sent.'</span> </div>
                    <div style="text-align:justify;" class="pull-left text-left">'.$attachment.$message.'</div>
                    <div class="clearfix"></div></div>
                    </li>';           
                  }
                }

    // Creating HTML structure
                echo $html;

              }} else{

                echo '<small class="text-center"><i>You have no new messages...</i></small>';
              }
              ?>
            </ul>
            <i style="color: brown" id="notsent"></i>  
          </div>

          <div class="card-footer my-scroll-footer">
           <form class="form-horizontal" method="POST" action="">

            <div class="form-row">
              <div class="col-md-9">
                <input style="display: none;" type="file" id="replywithimage">          
                <textarea required="required" id="help-message" type="text" class="form-control" placeholder="Type your message here..."></textarea>
                <div id="launch_08" class="invalid-feedback"></div>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-default"><i class="fa fa-image"></i></button>
                <button type="button" id="reply-message"  class="btn btn-info btn-sm">Send <i class="fa fa-send-o"></i></button>
              </div>
            </div>
          </form>


        </div>
        
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