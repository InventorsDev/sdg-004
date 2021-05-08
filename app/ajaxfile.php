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

//TIME AGO FUNCTION
function time_Ago($time) { 

  $time = strtotime($time);
    // Calculate difference between current 
    // time and given timestamp in seconds 
  $diff     = time() - $time; 

    // Time difference in seconds 
  $sec     = $diff; 

    // Convert time difference in minutes 
  $min     = round($diff / 60 ); 

    // Convert time difference in hours 
  $hrs     = round($diff / 3600); 

    // Convert time difference in days 
  $days     = round($diff / 86400 ); 

    // Convert time difference in weeks 
  $weeks     = round($diff / 604800); 

    // Convert time difference in months 
  $mnths     = round($diff / 2600640 ); 

    // Convert time difference in years 
  $yrs     = round($diff / 31207680 ); 

    // Check for seconds 
  if($sec <= 60) { 
    $date = "$sec sec ago"; 
  } 

    // Check for minutes 
  else if($min <= 60) { 
    if($min==1) { 
      $date = "one min ago"; 
    } 
    else { 
     $date = "$min min ago"; 
   } 
 } 

    // Check for hours 
 else if($hrs <= 24) { 
  if($hrs == 1) {  
   $date = "an hour ago"; 
 } 
 else { 
   $date ="$hrs hours ago"; 
 } 
} 

    // Check for days 
else if($days <= 7) { 
  if($days == 1) { 
   $date = "Yesterday"; 
 } 
 else { 
   $date = "$days days ago"; 
 } 
} 

    // Check for weeks 
else if($weeks <= 4.3) { 
  if($weeks == 1) { 
   $date = "a week ago"; 
 } 
 else { 
   $date = "$weeks weeks ago"; 
 } 
} 

    // Check for months 
else if($mnths <= 12) { 
  if($mnths == 1) { 
    $date = "a month ago"; 
  } 
  else { 
   $date = "$mnths months ago"; 
 } 
} 

    // Check for years 
else { 
  if($yrs == 1) { 
   $date = "one year ago"; 
 } 
 else { 
   $date = "$yrs years ago"; 
 } 
}

return $date;
} 

//SELECT ASSIGNED RESPONDER
$stmt = $conn->prepare("SELECT assigned FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($assigned);
$stmt->fetch();

if (isset($_POST['request'])) {
  $request =preg_replace('#[^0-9]#','',$_POST['request']);
}


//SUBMIT HELP REQUEST
if ($request == 1) {
 $msg = test_input($_POST["help"]);

 if ($msg != "") {
  $status = 'unread';
  $label = 'outbox';
  $date = date("Y-m-d H:i:s");

  $stmt = $conn->prepare("SELECT lastname, firstname FROM users WHERE user_id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($lastname, $firstname);
  $stmt->fetch();

  $subject = ucwords($firstname.' '.$lastname).' needs you help';
  $body = $msg;
  $message = '<b>Help Needed Here!</b><br>'.$msg;

  $stmt = $conn->prepare("INSERT INTO notifications (user_id, subject, body, status, date_sent) VALUES ( ?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $assigned, $subject, $body, $status, $date);
  if($stmt->execute()){

   $stmt = $conn->prepare("INSERT INTO chats (sender, receiver, message, label, status, date_sent) VALUES ( ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("iissss", $user_id, $assigned, $message, $label, $status, $date);
   if($stmt->execute()){
    echo json_encode( array("status" => 1, "message" => "help request sent!") );
    exit;	
  } 
}
}
}


//AUTO REFRESH MESSAGE COUNT
if ($request == 2) {

  $label = 'inbox';
  $status = 'unread';

  if ($user_type == 'responder') {
    $label = 'outbox';       
  }

  $stmt = $conn->prepare("SELECT chat_id FROM chats WHERE receiver = ? and label = ? and status = ?");
  $stmt->bind_param("iss", $user_id, $label, $status);
  $stmt->execute();
  $stmt->store_result();
  $unread = $stmt->num_rows;

  echo $unread;
  exit;               
}


//AUTO REFRESH MESSAGE
if ($request == 3) {

  $label = 'inbox';
  $status = 'unread';

  if ($user_type == 'responder') {
    $label = 'outbox';       
  }

  $stmt = $conn->prepare("SELECT chat_id FROM chats WHERE receiver = ? and label = ? and status = ?");
  $stmt->bind_param("iss", $user_id, $label, $status);
  $stmt->execute();
  $stmt->store_result();
  $unread = $stmt->num_rows;

  $html = '<p class="dropdown-item new">You have <span >'.$unread.'</span> new messages</p>';

  $limit = 4;
  $stmt = $conn->prepare("SELECT sender, message, status, date_sent FROM chats WHERE receiver = ? and label = ? ORDER BY chat_id DESC LIMIT ? ");
  $stmt->bind_param("isi", $user_id, $label, $limit);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($sender, $message, $status, $date_sent);
  if($stmt->num_rows > 0){
    while ($stmt->fetch()) {

          //change background of unread messages
      $unread_message = '';
      if ($status == 'unread') {
       $unread_message = 'style="background: rgba(0,0,0,0.1);"';
     }

     $count= strlen($message);
     if($count > 45){
      $newcount = 45; 
            // Define how many character you want to display.
      $message = substr($message, 0, $newcount).'...'; 
    }


        //select sender's name
    $stmt1 = $conn->prepare("SELECT firstname, lastname FROM users WHERE user_id = ?");
    $stmt1->bind_param("i", $sender);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($firstname, $lastname);
    $stmt1->fetch();

    $date_sent = time_Ago($date_sent);

    $html .= '<a class="dropdown-item message-item" href="messages" '.$unread_message.'>
    <span class="photo"><img alt="avatar" src="../images/profile-image.jpg"></span>
    <span class="subject">
    <span class="from">'.$firstname.' '.$lastname.'</span>
    <span class="time">'.$date_sent.'</span>
    </span>
    <span class="message">'.$message.'</span>
    </a>
    <div class="dropdown-divider"></div>';
  }
  $html .= '<a class="dropdown-item last" href="messages">See all messages</a>';
}else{              
  $html .= '<a class="dropdown-item last" href="#">You don\'t have any messages </a>';
}

echo $html;
exit;               
}



//AUTO REFRESH NOTIFICATION COUNT
if ($request == 4) {

  $status = 'unread';

  $stmt = $conn->prepare("SELECT notification_id FROM notifications WHERE user_id = ? and status = ?");
  $stmt->bind_param("is", $user_id, $status);
  $stmt->execute();
  $stmt->store_result();
  $unread = $stmt->num_rows;

  echo $unread;
  exit;               
}



//AUTO REFRESH NOTIFICATION
if ($request == 5) {

  $status = 'unread';

  $stmt = $conn->prepare("SELECT notification_id FROM notifications WHERE user_id = ? and status = ?");
  $stmt->bind_param("is", $user_id, $status);
  $stmt->execute();
  $stmt->store_result();
  $unread = $stmt->num_rows;

  $html = '<p class="dropdown-item new">You have <span >'.$unread.'</span> new notifications</p>';

  $limit = 4;
  $stmt = $conn->prepare("SELECT subject, notification_slug, status, date_sent FROM notifications WHERE user_id = ? ORDER BY notification_id DESC LIMIT ? ");
  $stmt->bind_param("ii", $user_id, $limit);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($subject, $notification_slug, $status, $date_sent);
  if($stmt->num_rows > 0){
    while ($stmt->fetch()) {
      $unread_notification = '';
      if ($status == 'unread') {
       $unread_notification = 'style="background: rgba(0,0,0,0.1);"';
     }

     $count= strlen($subject);
     if($count > 40){
      $newcount = 40; 
            // Define how many character you want to display.
      $subject = substr($subject, 0, $newcount).'...'; 
    }

    $date_sent = time_Ago($date_sent);

    $html .= ' <a class="dropdown-item notification-item" href="notifications/'.$notification_slug.'" '.$unread_notification.'>
    <span class="subject">
    <span class="fa fa-bell"></span>
    <span class="from">'.$subject.'</span>
    <span class="time">'.$date_sent.'</span>
    </span>
    </a>
    <div class="dropdown-divider"></div>';
  }
  $html .= '<a class="dropdown-item last" href="notifications">See all notifications</a>';
}else{              
  $html .= '<a class="dropdown-item last" href="#">You don\'t have any notification </a>';
}

echo $html;
exit;               
}



  	//SUBMIT REPORT
if ($request == 6) {

  $title = test_input($_POST['title']);
  $description = test_input($_POST['description']);
  $anonymous = test_input($_POST['anonymous']);
  $file_status = test_input($_POST['file_status']);
  $date = date("Y-m-d H:i:s");

  if ($anonymous == 'yes') {
   $submitted_as = 'anonymous';
 }else{
   $submitted_as = 'a reporter';
 }

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

    $status = "received";
      //Insert report into database
    $stmt = $conn->prepare("INSERT INTO reports (user_id, responder_id, title, description, evidence, status, submitted_as, date_added) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $user_id, $assigned, $title, $description, $evidence, $status, $submitted_as, $date);
    if($stmt->execute()){

     $subject = 'A new report submitted: <b>'.ucwords($title).'</b>';
     $notification_slug = rand();
     $body = '<p>You have received a new report from one of your assigned reporter.<br>Please take your time to go through the doments and treat every reports received as important.</p><p>Good luck!</p>';
     $notification_status = 'unread';

     $stmt = $conn->prepare("INSERT INTO notifications (user_id, subject, notification_slug, body, status, date_sent) VALUES ( ?, ?, ?, ?, ?, ?)");
     $stmt->bind_param("isssss", $assigned, $subject, $notification_slug, $body, $notification_status, $date);
     $stmt->execute();

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
    <small class="text-muted">Submitted: '.date('jS M Y ', strtotime($date)).'</small>
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

//REPLY CHATS
if ($request == 7) {
  $message = test_input($_POST["msg"]);
  $sender = test_input($_POST["sender"]);

  if ($message != "") {
    $status = 'unread';
    $date = date("Y-m-d H:i:s");

    if ($user_type == 'responder') {
    $label = 'inbox';
     $sender = $sender;
     $receiver = $user_id;
   }else{
    $label = 'outbox';
     $sender = $user_id;
     $receiver = $assigned;        
   }

   $stmt = $conn->prepare("INSERT INTO chats (sender, receiver, message, label, status, date_sent) VALUES ( ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("iissss", $sender, $receiver, $message, $label, $status, $date);
   if($stmt->execute()){

     $html = '<li class="help-row by-me">
     <div class="chat-content"> <div class="chat-meta">'.time_Ago($date).' <i>Delivered</i>
     <span class="pull-right">You</span> </div>
     <div style="text-align:justify;" class="pull-right text-right">'.$message.'</div>
     <div class="clearfix"></div></div>
     </li>';

     echo json_encode( array("status" => 1, "message" => $html) );
     exit; 
   }
 }
}


//AUTO REFRESH CHAT
if ($request == 8) {

  $html = '';
  $stmt = $conn->prepare("SELECT receiver, message, label, status, file, date_sent FROM chats WHERE sender = ? OR receiver = ? ORDER BY chat_id ASC");
  $stmt->bind_param("ii", $user_id, $user_id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($receiver, $message, $label, $status, $file, $date_sent);
  if($stmt->num_rows > 0 ) {
    while ($stmt->fetch()) {

          //Show message status
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
        $html .= '<li class="help-row by-other">
        <div class="chat-content" > <div class="chat-meta">
        <span class="pull-right">'.$date_sent.'</span> </div>
        <div style="text-align:justify;" class="pull-left text-left">'.$attachment.$message.'</div>
        <div class="clearfix"></div></div>
        </li>';
      }else{
        $html .= '<li class="help-row by-me">
        <div class="chat-content"> <div class="chat-meta">'.$date_sent.' <i>'.$status.'</i>
        <span class="pull-right">You</span> </div>
        <div style="text-align:justify;" class="pull-right text-right">'.$attachment.$message.'</div>
        <div class="clearfix"></div></div>
        </li>';            
      }


    }else{

     if($user_type == 'responder'){
      $html .= '<li class="help-row by-me">
      <div class="chat-content" > <div class="chat-meta">'.$date_sent.' <i>'.$status.'</i>
      <span class="pull-right">You</span> </div>
      <div style="text-align:justify;" class="pull-right text-right">'.$attachment.$message.'</div>
      <div class="clearfix"></div></div>
      </li>';  
    }else{ 
      $html .= '<li class="help-row by-other">
      <div class="chat-content" > <div class="chat-meta">
      <span class="pull-right">'.$date_sent.'</span> </div>
      <div style="text-align:justify;" class="pull-left text-left">'.$attachment.$message.'</div>
      <div class="clearfix"></div></div>
      </li>';           
    }
  }

}}

echo $html;
exit;               
}

//SHARE TIPS
if ($request == 9) {
  $tips_title = test_input($_POST["tips-title"]);
  $title_slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($tips_title)));
  $tips_content = test_input($_POST["tips-content"]);
  $tips_image = test_input($_FILES['tips-image']['name']);
  $date_added = date("Y-m-d H:i:s");

  $stmt = $conn->prepare("SELECT lastname, firstname FROM users WHERE user_id = ?");
      $stmt->bind_param("i", $user_id);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($lastname, $firstname);
      $stmt->fetch();

  if ($tips_title != "" && $tips_content != "" && $tips_image != "" ) {

        //check for duplicate
    $stmt = $conn->prepare("SELECT tips_title FROM tips_guides WHERE tips_title = ?");
    $stmt->bind_param("s", $tips_title);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0 ) {
     echo json_encode( array("status" => 0, "message" => "Oop's! A tip with this title already exist") );
     exit;
   }

         $path = $_FILES["tips-image"]["name"];
       $extension = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = $title_slug.'.'.$extension;
       
       // image file directory
       $target = "../images/tips/".$file_name; 
       
        $file_type = array('jpeg','jpg','png', 'gif');
       if(!in_array(strtolower($extension),$file_type)){
        echo json_encode( array("status" => 0,"message" => 'Please upload a jpeg, jpg, png or gif file') );
        exit;
          }

      $posted_by = $firstname.' '.$lastname;
      $stmt = $conn->prepare("INSERT INTO tips_guides (posted_by, posted_id, tips_title, title_slug, tips_content, cover_image, date_added) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssss", $posted_by, $user_id, $tips_title, $title_slug, $tips_content, $file_name, $date_added);
      if($stmt->execute()){
        $move= move_uploaded_file($_FILES['tips-image']['tmp_name'], $target);
      echo json_encode( array("status" => 1, "message" => "Tips Shared Successfully!") );
        exit;	
      }else{
          echo json_encode( array("status" => 0, "message" => "error! We're unble to share your tips!") );
      }
  }
}


?>