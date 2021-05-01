

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
             <div class="dropdown-menu dropdown-menu-right" id="notification-row" aria-labelledby="notificationDropdown">

              </div></li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge" id="unread_message">0</span> </a>

             <div class="dropdown-menu dropdown-menu-right" id="message-row" aria-labelledby="messageDropdown">
              
              </div></li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo strtolower($firstname.' '.$lastname); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

     