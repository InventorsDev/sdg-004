

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

     