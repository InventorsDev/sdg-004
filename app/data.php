<?php

header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","speakup");

$year = date("Y");
$sqlQuery = "SELECT COUNT(report_id) AS reports, MONTHNAME(date_added) as months FROM reports 
	WHERE Year(date_added) = '$year' GROUP BY Month(date_added) ";
$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);

?>