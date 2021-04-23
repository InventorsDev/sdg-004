<?php

session_start();
include_once '../config.php';


  	 
$user_id = preg_replace('#[^0-9]#','',$_SESSION['user_id']);
$user_type = test_input($_SESSION["user_type"]);

function test_input($text){ 
 $text = trim($text);
  $text = strip_tags($text);
 $text = stripslashes($text);
  return $text;
}

 $stmt = $conn->prepare("SELECT assign FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($assign);
        $stmt->fetch();

  if (isset($_POST['request'])) {
        $request =preg_replace('#[^0-9]#','',$_POST['request']);
   }


   if ($request == 1) {
  	$message = test_input($_POST["help"]);

  	if ($message != "") {
  		$status = 'unread';
  		$label = 'outbox';
  		$sender = $user_id;
  		 $stmt = $conn->prepare("INSERT INTO chats (sender, receiver, message, label, status) VALUES ( ?, ?, ?, ?, ?)");
          $stmt->bind_param("iisss", $user_id, $assign, $message, $label, $status);
          if($stmt->execute()){
          echo json_encode( array("status" => 1, "message" => "help request sent!") );
            exit;	
          } 
      }
  	}

 if ($request == 2) {

  		$label = 'inbox';
  		$status = 'unread';
  		$sender = $user_id;

  		  $stmt = $conn->prepare("SELECT chat_id FROM chats WHERE receiver = ? and label = ? and status = ?");
        $stmt->bind_param("iss", $user_id, $label, $status);
        $stmt->execute();
        $stmt->store_result();

          echo $stmt->num_rows;
            exit;
  	}

?>