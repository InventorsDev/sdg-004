<?php

include_once '../functions.php'; 

if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
  $user_id = preg_replace('#[^0-9]#','',$_SESSION['user_id']);
  $user_type = test_input($_SESSION["user_type"]);

  $stmt = $conn->prepare("SELECT lastname, firstname, email, gender, phone, dob, state, address, organization, position, occupation, date_reg FROM users WHERE user_id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($lastname, $firstname, $email, $gender, $phone, $dob, $state, $address, $organization, $position, $occupation, $date_reg);

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

 <title>Profile | SpeakUp</title>

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

        <?php
        //RESPONDER MENU
        if ($user_type == 'responder') {?>
          <a href="responder" class="list-group-item list-group-item-action">Dashbboard</a>
          <a href="help" class="list-group-item list-group-item-action">Help Requests</a>
          <a href="view-reports" class="list-group-item list-group-item-action">View Reports</a>
          <a href="Profile" class="list-group-item list-group-item-action active">Profile</a>

        <?php }else{
        //REPORTER MENU ?>
        <a href="reporter" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="help" class="list-group-item list-group-item-action">Help me!</a>
        <a href="reports" class="list-group-item list-group-item-action ">Reports</a>
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
        <div class="offset-md-1 col-md-10 pt-5">

          <h4 class="mb-3">My Profile</h4>


          <div id="alert_box" style="display: none;" class="error_alert" >
            <span aria-label="close" onclick="close_alert('alert_box')" >&times;</span>
            <p><i class="fa fa-exclamation-circle"></i> <span id="alert"></span></p>
          </div>

          <form action="" autocomplete="off" id="profile-form" class="form-horiontal" method="post">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Lastname</label>
                <input type="text" id="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Enter your lastname" disabled>
                <span class="invalid-feedback">Please enter your lastname</span>
              </div>

              <div class="col-md-6 mb-3">
                <label>Firstname</label>
                <input type="text" id="firstname" value="<?php echo $firstname; ?>" class="form-control" placeholder="Enter your firstname" disabled>
                <span class="invalid-feedback">Please enter your firstname</span>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" id="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter your e-mail address" disabled>
                <span class="invalid-feedback" id="email_alert">Please enter your email address</span>
              </div>

              <div class="col-md-6 mb-3">
                <label>Gender</label>
                <select class="form-control" value="<?php echo $gender; ?>" id="gender" disabled>
                  <option value="">--Select gender--</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <span class="invalid-feedback">Please select your gender</span> 
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Phone number</label>
                <input type="tel" id="phone" value="<?php echo $phone; ?>" class="form-control editable" placeholder="Enter your phone number" disabled>
                <span class="invalid-feedback">Please enter your lastname</span>
              </div>

              <div class="col-md-6 mb-3">
                <label>Date of Birth</label>
                <input type="date" id="dob" value="<?php echo $dob; ?>" class="form-control editable" placeholder="Enter your address" disabled>
                <span class="invalid-feedback" id="dob_alert">Please select your date of birth</span>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>State of residence</label>
                <select class="form-control editable" id="state" value="<?php echo $state; ?>" disabled>
                  <option value="">--Select state--</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="AkwaIbom">AkwaIbom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">FCT</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamafara</option>
                </select>
                <span class="invalid-feedback">Please select your state of residence</span>
              </div>

              <div class="col-md-6 mb-3">
                <label>Address</label>
                <input type="text" id="address" class="form-control editable" value="<?php echo $address; ?>" placeholder="Enter your address" disabled>
                <span class="invalid-feedback">Please enter your address</span>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Organization</label>
                <input type="text" id="organization" value="<?php echo $organization; ?>" class="form-control editable" placeholder="Enter your Organization" disabled>
                <span class="invalid-feedback">Please enter your organization</span>
              </div>

              <div class="col-md-6 mb-3">
                <label>Position in your organization</label>
                <input type="text" id="position" value="<?php echo $position; ?>" class="form-control editable" placeholder="Enter your position in your organization" disabled>
                <span class="invalid-feedback">Please enter your position in your organization</span>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Occupation</label>
                <input type="text" id="occupation" value="<?php echo $occupation; ?>" class="form-control editable" placeholder="Enter your occupation" disabled>
                <span class="invalid-feedback">Please enter your occupation</span>
              </div>


              <div class="col-md-6 mb-3">
                <label>Active since</label>
                <p>2020</p>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12 text-center">
                <button class="btn btn-info btn-sm" type="button" id="edit-profile"><i class="fa fa-pencil"></i> Edit</button>
                <button class="btn btn-info btn-sm" style="display: none;" type="button" id="update-profile">Update <i class="fa fa-sign-in"></i></button>
              </div>
            </div>

          </form>

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