<?php

$moodid = $_POST['moodid'];
$moodchoice = $_POST['moodchoice'];
$mood = $_POST['mood'];


$endpoint = "http://localhost/moodsapi.php?moodid=$moodid";

$postdata = http_build_query(

    

    array(
        'mood' => $mood,
        'moodchoice' => $moodchoice,
        'moodid' => $moodid,
    )
);

echo $postdata;
$opts = array(
    'http' => array(
        'method' => 'PUT',
        'header' => 'Content-Type: application-x-www-form-urlencoded',
        'content' => $postdata

    )
);

$context = stream_context_create($opts);
$resource = file_get_contents($endpoint,false,$context)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Process</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>

<?php 


 if ($resource=== FALSE){
    echo "<p>unable to Delete mood</p>";
 }else{
    header("Location: viewMoods.php");
 }

?>

    
</body>
</html>