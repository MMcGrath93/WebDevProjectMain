<?php

include "dbconn.php";
session_start();



if (!isset($_SESSION['id'])) {
    header('Location: login.php');

}
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpful Resources</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    //import nav bar
    include "./navbar.html";
    ?>

    <br>


    <!--Main Canvas-->
    <div class="hero is-large">
        < <div class="container has-text-centered">
            <!--Visualisations-->
            <div class="columns is-flex is-flex-direction-column box">
                <div class="column has-text-centered">
                    <h1>Uselful Links</h1>
                    <?php

$readSQL = "SELECT * FROM `resources`";
$result = $conn->query($readSQL);
//Table Headers
echo '<table class="table is-bordered is-striped is-narrow is-hoverable">';
echo '<tr>
    <th class="has-background-white">Name</th>
    <th class="has-background-white">Description</th>
    <th class="has-background-white">Link</th>
    </tr>';

while ($row = $result->fetch_assoc()) {

    $rName = $row["ResourceName"];
    $rDesc = $row["ResourceDesc"];
    $rLink = $row["Link"];

    //Add each row

    echo "<tr>
<td>$rName</td>
<td>$rDesc</td>
<td><a href='$rLink' >$rLink</a></td>";

}


echo '</table>';


?>


                </div>
            </div>
            <!--Visualisations End-->
        </div>
    </div>


    <!--End of Main Canvas-->
    <br>
<br>

    <!--Footer-->
    <div class="footer">
        <?php include "./footer.html"; ?>
    </div>


</body>

</html>