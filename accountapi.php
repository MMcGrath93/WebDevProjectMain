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


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

 echo "<p>In put request</p>";
 include "dbconn.php";

 // Parse the data sent in the request
 parse_str(file_get_contents('php://input'), $data);
 $username = $conn->real_escape_string($data["user"]);
 $name= $conn->real_escape_string($data["name"]);
 $id = intval($data["userid"]);

 //Debugging
 /*e
 cho "<br>";
 echo var_dump($data);
 echo "<br>";
 echo $mood;
 echo "<br>";
 echo $moodchoice;
 echo "<br>";
 echo $id;
 echo "<br>";
 */

 $updateSQL = "UPDATE `users` SET `username` = '$username', `Name` = '$name' WHERE `users`.`id` = '$id'";

    echo $updateSQL;
 // Execute the update statement
 $result = $conn->query($updateSQL);
 if ($result) {
     http_response_code(200);
     echo json_encode(["message" => "Update Successful!"]);


 } else {
     http_response_code(404);
     echo json_encode(["message" => "Unable to perform Update!"]);
 }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    echo "<p>Entered Delete</p>";
    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);
    $id = intval($data["id"]);

    $deleteSQL = "DELETE FROM users WHERE `users`.`id` = $id";

    $result = $conn->query($deleteSQL);


    if (!$result) {
        echo "<p>unable to Delete user/p>";
    } else {

        echo "<p>User Deleted</p>";
    }

}

?>