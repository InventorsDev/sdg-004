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
  	# code...
  }


   if ($request == 2) {
  	$lastname = test_input($_POST["lastname"]);
  	$firstname = test_input($_POST["firstname"]);
  	$email = test_input($_POST["email"]);
  	$occupation = test_input($_POST["occupation"]);
  	$password = test_input($_POST["password"]);
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
  		
  		 $stmt = $conn->prepare("INSERT INTO users (lastname, firstname, email, occupation, password, user_type) VALUES ( ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $lastname, $firstname, $email, $occupation, $password, $user_type);
          if($stmt->execute()){
          echo json_encode( array("status" => 1, "message" => "Signed up successfully!") );
            exit;	
          } 
      }
  	}
  }


  if ($request == 3) {
  	$lastname = test_input($_POST["lastname"]);
  	$firstname = test_input($_POST["firstname"]);
  	$email = test_input($_POST["email"]);
  	$phone = test_input($_POST["phone"]);
  	$password = test_input($_POST["password"]);
  	$gender = test_input($_POST["gender"]);
  	$dob = test_input($_POST["dob"]);
  	$state = test_input($_POST["state"]);
  	$address = test_input($_POST["organization"]);
  	$occupation = test_input($_POST["occupation"]);
  	$organization = test_input($_POST["organization"]);
  	$position = test_input($_POST["position"]);
  	$cv = test_input($_POST["cv"]);
  	$motive = test_input($_POST["motive"]);
echo json_encode( array("status" => 0, "message" => "oop's! A responder with this email already exist") );
            exit;
  	if ($lastname != "" && $firstname != "" && $email != "" && $phone != "" && $password != "" &&  $gender != "" && $dob != "" && $state != "" && $address != "" && $occupation != "" && $organization != "" && $position != "" && $cv != "" && $motive != "" ) {

  		 $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0 ) {
        	echo json_encode( array("status" => 0, "message" => "oop's! A responder with this email already exist") );
            exit;
        }
  		
  		 $stmt = $conn->prepare("INSERT INTO user (user_id, activity, log, created_by, activity_date) VALUES ( ?, ?, ?, ?, ?)");
          $stmt->bind_param("issss", $organization_id, $activity, $activity_log, $created_by, $activity_date);
          if($stmt->execute()){
          echo json_encode( array("status" => 1, "message" => "Signed up successfully") );
            exit;	
          } 
  	}
  }



?>