<?php

session_start();
$id = $_SESSION['id'];

echo $id;


$endpoint = "http://localhost/WebDevProject/accountapi.php";


$postdata = http_build_query(
    array(
        'id' => $id
    )
);

echo var_dump($postdata);



$opts = array(
    'http' => array(
        'method' => 'DELETE',
        'header' => 'Content-Type: application-x-www-form-urlencoded',
        'content' => $postdata
    )
);

echo var_dump($opts);

$context = stream_context_create($opts);
$resource = file_get_contents($endpoint, false, $context);

echo var_dump($resource);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Process</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <?php


    if ($response === FALSE) {
        echo "<p>unable to Delete user</p>";
        
    } else {
        echo "<p>User Deleted</p>";
       header("Location: login.php");
    }

    ?>


</body>

</html>