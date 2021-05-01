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
 <base href="/sdg-004/app/">
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

      <nav class="navbar navbar-expand-lg navbar-lght border-bottom">
       <button class="navbar-toggler" type="button" id="menu-toggle" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <img class="avaar" src="../images/avatar.jpg" ><span class="fa fa-caret-down"></span></a>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav notification-row ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="badge" id="unread_notification">0</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
              <p class="new dropdown-item">You have <span id="unread_notification2">0</span> new notification</p>
              <a class="dropdown-item notification-item" href="#">
                <span class="subject">
                  <span class="fa fa-bell"></span>
                  <span class="from">Greg  Martin</span>
                  <span class="time">1 min</span>
                </span>
              </a>


              <div class="dropdown-divider"></div>
              <a class="dropdown-item notification-item" href="#">
                <span class="subject">
                  <span class="fa fa-bell"></span>
                  <span class="from">Greg  Martin I really like this admin panel.</span>
                  <span class="time">1 min</span>
                </span>
              </a>


              <div class="dropdown-divider"></div>
              <a class="dropdown-item notification-item" href="#">
                <span class="subject">
                  <span class="fa fa-bell"></span>
                  <span class="from">Greg  Martin</span>
                  <span class="time">1 min</span>
                </span>
              </a>
              <a class="dropdown-item last" href="notification">See all notifications</a>
            </div></li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge" id="unread_message">0</span> </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messageDropdown">
                <p class="dropdown-item new">You have <span id="unread_message2">0</span> new messages</p>
                <a class="dropdown-item message-item" href="#">
                  <span class="photo"><img alt="avatar" src="../images/profile-image.jpg"></span>
                  <span class="subject">
                    <span class="from">Greg  Martin</span>
                    <span class="time">1 min ago</span>
                  </span>
                  <span class="message">
                    I really like this admin panel.
                  </span>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item message-item" href="#">
                  <span class="photo"><img alt="avatar" src="../images/profile-image.jpg"></span>
                  <span class="subject">
                    <span class="from">Greg  Martin</span>
                    <span class="time">1 min</span>
                  </span>
                  <span class="message">
                    I really like n panel.
                  </span>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item message-item" href="#">
                  <span class="photo"><img alt="avatar" src="../images/profile-image.jpg"></span>
                  <span class="subject">
                    <span class="from">Greg  Martin</span>
                    <span class="time">1 min</span>
                  </span>
                  <span class="message">
                    I really like this admin panel.
                  </span>
                </a>
                <a class="dropdown-item last" href="messages">See all messages</a>
              </div></li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $firstname.' '.$lastname; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="settings">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        
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