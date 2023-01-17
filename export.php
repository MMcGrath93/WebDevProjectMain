<?php
include_once "dbconn.php";
session_start();
$id = $_SESSION['id'];

//get records
$sql = "SELECT * FROM `moods` WHERE `user_id`='$id'";
$result = $conn->query($sql);

//set file name and delimiter
$delimiter = ",";
$filename = "Moods.csv";

// create a file pointer
$output = fopen('php://memory', 'w');

// set column headers
$fields = array('Mood', 'Notes', 'Date & Time Recorded');
fputcsv($output, $fields, $delimiter);

// output each row from moods 
while ($row = $result->fetch_assoc()) {
    $lineData = array($row['value'], $row['context'], $row['datetime']);
    fputcsv($output, $lineData, $delimiter);
}

//go back to begining of file
fseek($output, 0);

//set headers to download and set as csv
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer
fpassthru($output);


?>