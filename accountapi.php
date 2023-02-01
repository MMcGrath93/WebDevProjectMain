<?php
session_start();
header("Content-Type: application/json");

//Get Request to retrive account details and validate password
if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($_GET['user']))) {

    //DB Connection
    include "dbconn.php";
    $user = $conn->real_escape_string($_GET['user']);

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
    $user = $conn->real_escape_string($_GET['user']);

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

//API to create a new account
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

    echo "<p>In post</p>";

    include "dbconn.php";

    $username = $conn->real_escape_string($_POST['user']);
    $Name = $conn->real_escape_string($_POST['name']);
    $pass = $conn->real_escape_string($_POST['pass']);
    $confrimpass = $conn->real_escape_string($_POST['confirmpass']);
    $hashedpass = password_hash($pass, PASSWORD_DEFAULT);

    if (empty($confrimpass) || empty($pass) || empty($Name) || empty($username)) {
        header("Location: signup.php?error=erroremptyfields");
        exit();
    }

    //check passswords match
    elseif ($pass !== $confrimpass) {
        header("Location: signup.php?error=passwordsdontmatch");
        exit();

    } else {

        $readSQL = "SELECT * FROM `users` WHERE `username` = '$username'";
        $res = mysqli_query($conn, $readSQL);

        if (mysqli_num_rows($res) > 0) {
            header("Location: signup.php?error=usernametaken");
            exit();
        }

    }

    // Create User Record
    $insertSQL = "INSERT INTO `users` (`username`, `password`, `Name`) VALUES ('$username','$hashedpass','$Name');";
    $result = $conn->query($insertSQL);

    if ($result) {
        http_response_code(200);
        echo json_encode(["message" => "Account Created!"]);
        $_SESSION['username'] = $username;
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $storedid;
        //Redirect to main page
        header("Location: signupsuccess.php");


    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to create account!"]);
    }


}


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);
    $username = $conn->real_escape_string($data["user"]);
    $name = $conn->real_escape_string($data["name"]);
    $id = intval($data["userid"]);



    $updateSQL = "UPDATE `users` SET `username` = '$username', `Name` = '$name' WHERE `users`.`id` = '$id'";

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

    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);
    $id = intval($data["id"]);

    $deleteSQL = "DELETE FROM users WHERE `users`.`id` = $id";

    $result = $conn->query($deleteSQL);


    if (!$result) {
        http_response_code(404);
        echo "<p>unable to Delete user/p>";
    } else {
        http_response_code(200);
        echo "<p>User Deleted</p>";
    }

}

?>