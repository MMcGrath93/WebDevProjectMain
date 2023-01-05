<?php

//Set connection variables
$host = "localhost";
$user ="root";
$pw = "";
$db ="moodsdb";


//create connection
$conn = new mysqli($host,$user,$pw,$db);

//check connection error
if($conn->connect_error){
    exit($conn->connect_error);
} else {
   //echo "<p>Connection Success</p>";
}
