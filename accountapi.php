<?php
header("Content-Type: application/json");

//Get Request to retrive account details and validate password
if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($_GET['user']))) {

    //DB Connection
    include "dbconn.php";
    $user = $_GET['user'];

    //Get Data from Database
    $readSQL = "SELECT * FROM `users` WHERE `username` = '$user'";
    $result = $conn->query($readSQL);


    if (!$result) {
        exit($conn->error);
    }

    //Build Response Set Array
    $api_response = array();

    while ($row = $result->fetch_assoc()) {
        array_push($api_response, $row);
    }
    //Convert response to Json   
    $response = json_encode($api_response);

    //Provide status code
    if ($response != false) {
        http_response_code(200);
        echo $response;
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to perform GET!"]);
    }

}

//Get Request to retrive all account details
if (($_SERVER['REQUEST_METHOD'] === 'GET') && (!isset($_GET['user']))) {

    //DB Connection
    include "dbconn.php";
    $user = $_GET['user'];

    //Get Data from Database
    $readSQL = "SELECT * FROM `users`";
    $result = $conn->query($readSQL);

    $result = $conn->query($readSQL);

    if (!$result) {
        exit($conn->error);
    }

    //Build Response Set Array
    $api_response = array();

    while ($row = $result->fetch_assoc()) {
        array_push($api_response, $row);
    }
    //Convert response to Json   
    $response = json_encode($api_response);

    //Provide status code
    if ($response != false) {
        http_response_code(200);
        echo $response;
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to perform GET!"]);
    }

}


if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

    include "dbconn.php";


}

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {

    include "dbconn.php";

}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    include "dbconn.php";

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    include "dbconn.php";

}

?>