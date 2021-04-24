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


  	//SUBMIT REPORT
  	if ($request == 3) {

  		$title = test_input($_POST['title']);
  		$description = test_input($_POST['description']);
      $anonymous = test_input($_POST['anonymous']);
      $file_status = test_input($_POST['file_status']);
    
    if ($anonymous == 'yes') {
     $submitted_as = 'anonymous';
    }else{
     $submitted_as = 'a reporter';
    }

    $responder_id = 2;

    
    if ($title != "" && $description != "") {

       if ($file_status == 1) {
      //Count number of uploaded files
      $countfiles = count($_FILES['files']['name']);

      //Select ID of last report
     $stmt = $conn->prepare("SELECT MAX(report_id) FROM reports ORDER BY report_id DESC LIMIT 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($last_report_id);
        $stmt->fetch();
        $report_id = $last_report_id + 1;

    //Rename files in batch
    for($i=0; $i < $countfiles; $i++){

      // File name
      $file_name = $_FILES['files']['name'][$i];

        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = 'report_'.$report_id.'_file_'.$i.'.'.$extension;
        $evidence[] = $file_name;

        // Valid file extensions
        $valid_ext = array("pdf","doc","docx","jpg","png","jpeg","3gp","mp4","mp3","aac","opus");

        // Check extension
        $extension = strtolower($extension);
        if(!in_array($extension,$valid_ext)){                
          echo json_encode( array("status" => 0, "message" => "Uploaded file(s) contains unaccepted file") );
            exit; 
        } } 

      //Covert array to string
      $evidence = implode(',', $evidence);
        
      }else{
          $evidence = 'none';        
      }
        
      $status = "pending";
      //Insert report into database
			$stmt = $conn->prepare("INSERT INTO reports (user_id, responder_id, title, description, evidence, status, submitted_as) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("iisssss", $user_id, $responder_id, $evidence, $title, $description, $status, $submitted_as);
          if($stmt->execute()){


       if ($file_status == 1) {
      for($i=0; $i < $countfiles; $i++){

      // File name
      $file_name = $_FILES['files']['name'][$i];

        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
           $file_name = 'report_'.$report_id.'_file_'.$i.'.'.$extension;

          // Upload directory
          $target = "uploads/".$file_name; 

				// Upload file
				move_uploaded_file($_FILES['files']['tmp_name'][$i],$target);
        }
      }

      $html = '<div class="card report">
                <div class="card-body">
                  <a href=""><h5 class="card-title mb-n1">'.ucfirst($title).'</h5></a>
                  <small class="card-subtitle mb-3 text-muted">Submitted as '.$submitted_as.'</small>
                  <div class="footer">
                    <small class="text-muted">Status: Pending | </small>
                  <small class="text-muted">Submitted: '.date('jS M Y ', strtotime(date("Y-m-d H:i:s"))).'</small>
                </div>
                </div>
              </div>';

          echo json_encode( array("status" => 1, "message" => $html) );
            exit; 
      }else{        
          echo json_encode( array("status" => 0, "message" => "Oop's! Something went wrong") );
            exit; 
      }
    }}

?>