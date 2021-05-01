<?php

session_start();
include_once 'config.php';

//SANITIZE USER INPUT
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

?>