<?php

session_start();
$recordid = $_SESSION['id'];


header("Content-Type: application/json");
echo '<p>In the API</p>';
echo $_SERVER['REQUEST_METHOD'];
echo file_get_contents('php://input');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    include "dbconn.php";

}

//API call to add a new mood record to the users list
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

    echo "<p>In post</p>";

    include "dbconn.php";

    $mood = $conn->real_escape_string($_POST['mood']);
    $moodchoice = $conn->real_escape_string($_POST['moodchoice']);
    $recordid = $_SESSION['id'];


    $insertSQL = "INSERT INTO `moods` (`id`, `user_id`, `value`, `context`, `datetime`) VALUES (NULL,'$recordid','$moodchoice','$mood',current_timestamp())";


    $result = $conn->query($insertSQL);



    if (!$result) {
        exit($conn->error);
    } else {
        header("Location: viewMoods.php");
    }


}
//API call to update a record from the users mood list
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {


    echo "<p>In patch</p>";

    include "dbconn.php";

    $mood = $conn->real_escape_string($_PATCH['mood']);
    $id = $conn->real_escape_string($_PATCH['moodid']);

    echo $mood;


    $updateSQL = "UPDATE `moods` SET `context` ='$mood' WHERE `moods`.`id`=$id )";


    $result = $conn->query($insertSQL);

    if ($response != false) {
        http_response_code(200);

    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to perform Update!"]);
    }

}

//API call to update part of a record from the users mood list. This uses prepared statements in this example
if($_SERVER['REQUEST_METHOD'] === 'PUT') {

    include "dbconn.php";

    // Parse the data sent in the request
    parse_str(file_get_contents('php://input'), $data);

    $mood = $data['mood'];
    $moodchoice = $data['moodchoice'];
    $id = $data['mood_id'];

    // Update the mood and moodchoice fields
    $stmt = $conn->prepare("UPDATE `moods` SET `context` = ?, `moodchoice` = ? WHERE `moods`.`id` = ?");
    $stmt->bind_param("ssi", $mood, $moodchoice, $id);
    $result = $stmt->execute();
    if ($result) {
        http_response_code(200);
        header("Location: viewMoods.php");
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Unable to perform Update!"]);
    }
}



//API call to delete a record from the users mood list
if (($_SERVER['REQUEST_METHOD'] === 'DELETE') && (isset($_GET['moodid']))) {

    echo "<p>Entered Delete/p>";

    include("dbconn.php");
    $mood_id = $_GET['moodid'];

    $deleteSQL = "DELETE FROM moods WHERE `moods`.`id` = $mood_id";

    $result = $conn->query($deleteSQL);

    if (!$result) {
        echo "<p>unable to Delete mood</p>";
    } else {
        header("Location: viewMoods.php");
        echo "<p>Mood Deleted</p>";
        
    }


}

?>