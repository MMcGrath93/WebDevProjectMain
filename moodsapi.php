<?php

session_start();
$recordid = $_SESSION['id'];

header("Content-Type: application/json");
//API Debugging 
/*
echo '<p>In the API</p>';
echo "<br>";
echo $_SERVER['REQUEST_METHOD'];
echo "<br>";
echo file_get_contents('php://input');
*/

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    include "dbconn.php";

}

//API call to add a new mood record to the users list
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

    //echo "<p>In post</p>";

    include "dbconn.php";

    $mood = $conn->real_escape_string($_POST['mood']);
    $moodchoice = $conn->real_escape_string($_POST['moodchoice']);
    $recordid = $conn->real_escape_string($_POST['id']);




    $insertSQL = "INSERT INTO `moods` (`id`, `user_id`, `value`, `context`, `datetime`) VALUES (NULL,'$recordid','$moodchoice','$mood',current_timestamp())";


    $result = $conn->query($insertSQL);

    if (!$result) {
        http_response_code(404);
        echo json_encode(["message" => "Unable to perform entry!"]);
        exit($conn->error);
    } else {
        http_response_code(200);
        echo json_encode(["message" => "Record Created!"]);
        header("Location: viewMoods.php");
    }


}
//API call to update a record from the users mood list
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {


    //echo "<p>In patch</p>";


}

//API call to update part of a record from the users mood list. This uses prepared statements in this example
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    //echo "<p>In put request</p>";
    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);
    $mood = $conn->real_escape_string($data["mood"]);
    $moodchoice = $conn->real_escape_string($data["moodchoice"]);
    $id = intval($data["mood_id"]);

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

    $updateSQL = "UPDATE `moods` SET `context` = '$mood', `value` = '$moodchoice' WHERE `moods`.`id` = '$id'";

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



//API call to delete a record from the users mood list
if (($_SERVER['REQUEST_METHOD'] === 'DELETE')) {

    // echo "<p>Entered Delete/p>";
    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);
    $id = intval($data["mood_id"]);

    //send query to delete record
    $deleteSQL = "DELETE FROM moods WHERE `moods`.`id` = $id";

    $result = $conn->query($deleteSQL);


    if (!$result) {
        echo "<p>unable to Delete mood</p>";
    } else {

        echo "<p>Mood Deleted</p>";

    }


}

?>