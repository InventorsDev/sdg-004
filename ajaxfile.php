<?php

session_start();
include_once 'config.php';

function test_input($text){ 
 $text = trim($text);
  $text = strip_tags($text);
 $text = stripslashes($text);
  return $text;
}

  if (isset($_POST['request'])) {
        $request =preg_replace('#[^0-9]#','',$_POST['request']);
   }


   if ($request == 1) {
  	$lastname = test_input($_POST["lastname"]);
  	$firstname = test_input($_POST["firstname"]);
  	$email = test_input($_POST["email"]);
  	$occupation = test_input($_POST["occupation"]);
  	$password = test_input($_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
  	$user_type = 'reporter';

  	if ($lastname != "" && $firstname != "" && $email != "" && $password != "" && $occupation != "") {

  		 $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0 ) {
        	echo json_encode( array("status" => 0, "message" => "oop's! This email already exist") );
            exit;
        }else{
  		
  		$status = 'active';
  		 $stmt = $conn->prepare("INSERT INTO users (lastname, firstname, email, occupation, password, status, user_type) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("sssssss", $lastname, $firstname, $email, $occupation, $password, $status, $user_type);
          if($stmt->execute()){

        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION["user_type"] = $user_type;

          echo json_encode( array("status" => 1, "message" => "Signed up successfully!") );
            exit;	
          } 
      }
  	}
  }


  if ($request == 2) {
  	$lastname = test_input($_POST["lastname"]);
  	$firstname = test_input($_POST["firstname"]);
  	$email = test_input($_POST["email"]);
  	$phone = test_input($_POST["phone"]);
  	$password = test_input($_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
  	$gender = test_input($_POST["gender"]);
  	$dob = test_input($_POST["dob"]);
  	$state = test_input($_POST["state"]);
  	$address = test_input($_POST["address"]);
  	$occupation = test_input($_POST["occupation"]);
  	$organization = test_input($_POST["organization"]);
  	$position = test_input($_POST["position"]);
  	$cv = test_input($_FILES['cv']['name']);
  	$motive = test_input($_POST["motive"]);
  	$user_type = 'responder';

  	if ($lastname != "" && $firstname != "" && $email != "" && $phone != "" && $password != "" &&  $gender != "" && $dob != "" && $state != "" && $address != "" && $occupation != "" && $organization != "" && $position != "" && $cv != "" && $motive != "" ) {

 			$path = $_FILES["cv"]["name"];
           $extension = pathinfo($path, PATHINFO_EXTENSION);
           $file_name = $email.'_cv.'.$extension;
           // image file directory
           $target = "cv/".$file_name; 
           
            $file_type = array('docx','pdf','doc');
           if(!in_array($extension,$file_type)){
            echo json_encode( array("status" => 0,"message" => $file_name) );
            exit;
              }

  		 $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0 ) {
        	echo json_encode( array("status" => 0, "message" => "oop's! This email already exist") );
            exit;
        }else{
  		$status = 'reviewing';
  		$stmt = $conn->prepare("INSERT INTO users (lastname, firstname, email, phone, password, gender, status, user_type, dob, state, address, occupation, organization, position, cv, motive) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssssssssssss", $lastname, $firstname, $email, $phone, $password, $gender, $status, $user_type, $dob, $state, $address, $occupation, $organization, $position, $file_name, $motive);
          if($stmt->execute()){
            $move= move_uploaded_file($_FILES['cv']['tmp_name'], $target);
          echo json_encode( array("status" => 1, "message" => "Signed up successfully!") );
            exit;	
          }  }
  	}
  }



  if ($request == 3) {

  	$email = test_input($_POST["email"]);
  	$password = test_input($_POST["password"]);

  	if ($email != "" && $password != "") {

  		 $stmt = $conn->prepare("SELECT user_id, password, status, user_type FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $hash, $status, $user_type);
        if($stmt->num_rows > 0 ) {
        $stmt->fetch();

        if ($status == 'active') {
	        	if (password_verify($password, $hash)) {	     
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_type"] = $user_type;

	        	echo json_encode( array("status" => 1, "user_type" => $user_type, "message" => 'Logged in successfully') );
	          exit();
	      		}else{
	  			echo json_encode( array("status" => 0, "message" => 'Invalid login credentials!') );
	            exit;
	          }
          }else if($status == 'supended'){
  			echo json_encode( array("status" => 0, "message" => 'Sorry! This account has been suspended') );
            exit;
          }else{
  			echo json_encode( array("status" => 0, "message" => 'Invalid login credentials!') );
            exit;
          }    
        }else{
  			echo json_encode( array("status" => 5, "message" => 'Invalid login credentials!') );
            exit;
          }
  	}
  }


   if ($request == 4) {

  	$msg = test_input($_POST["msg"]);
  	$msg = "[[:<:]]".$msg."[[:>:]]";
    $status = 0;
    $html = '';

  	 $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question RLIKE ? ");
        $stmt->bind_param("s", $msg);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($answer);
        if($stmt->num_rows > 0 ) {
        while($stmt->fetch()){
        $status = 1;

        $html .= '<li class="by-me msg">
            <div class="avatar pull-left">
              <img class="bot-img" src="images/avatar.jpg" alt="" />
            </div>
            <div class="chat-content">
              <div class="chat-meta">SpeakUp <span class="pull-right">'.date("h:i:s A").'</span></div>
              '.$answer.'
              <div class="clearfix"></div>
            </div>
          </li>';

        }}

         echo json_encode( array("status" => $status, "message" => $html) );
         exit;
       }

?>