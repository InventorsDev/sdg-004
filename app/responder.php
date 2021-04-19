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

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
       <div class="sidebar-heading"><a href="../"> <i class="fa fa-bullhorn"></i> SpeakUp</a></div>
     
      <img class="img-fluid avatar" src="../images/avatar.jpg">
      <h4 class="type">Responder</h4>
     
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action active">Reports</a>
        <a href="#" class="list-group-item list-group-item-action">Share Tips</a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
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
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fa fa-bell-o"></i><span class="badge">3</span> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-envelope-o"></i> <span class="badge">5</span> </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Firstname Lastname
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
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