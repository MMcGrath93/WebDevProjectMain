<?php

session_start();
$id = $_SESSION['id'];
$username = $_GET['user'];
$name = $_GET['name'];

//set endpoint
$endpoint = "http://localhost/WebDevProject/accountapi.php";

//build body
$postdata = http_build_query(
    array(
        'user' => $username,
        'name' => $name,
        'userid' => $id
    )
);


//build request
$opts = array(
    'http' => array(
        'method' => 'PUT',
        'header' => 'Content-Type: application-x-www-form-urlencoded',
        'content' => $postdata
    )
);

//send request 
$context = stream_context_create($opts);
$resource = file_get_contents($endpoint, false, $context);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Process</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <?php
    if ($response === FALSE) {
        echo "<p>unable to update account/p>";

    } else {
        echo "<p>account updated</p>";
        header("Location: myAccount.php");
    }

    ?>


</body>

</html>