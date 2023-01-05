<?php

include "dbconn.php";
$recordID = $_GET['moodid'];
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

$deleteSQL = "DELETE FROM moods WHERE `moods`.`id` = $recordID";

 $result = $conn->query($deleteSQL);



 if (!$result){
    echo "<p>unable to Delete mood</p>";
 }else{
    header("Location: viewMoods.php");
 }

?>

    
</body>
</html>