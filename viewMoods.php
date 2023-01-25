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
    <title>My Moods</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    //import nav bar
    include "./navbar.html";
    ?>

    <br>
    <!-- Create Form Action - POST -->
    <form action="processLogin.php" method="post">

        <!--Main Canvas-->
        <div class="hero is-large">
            <div class="container has-text-centered is-size-5">
                <!--Content Box-->




                <?php

                $readSQL = "SELECT * FROM `moods` WHERE `user_id`='$id'";
                $result = $conn->query($readSQL);
                //Table Headers
                echo '<table class="table is-bordered is-striped is-narrow is-hoverable">';
                echo '<tr>
                    <th class="has-background-white is-size-4">Mood</th>
                    <th class="has-background-white is-size-4">Notes</th>
                    <th class="has-background-white is-size-4">Date & Time Recorded</th>
                    <th class="has-background-white is-size-4"></th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {

                    $mood = $row["context"];
                    $date = $row["datetime"];
                    $moodid = $row["id"];
                    $moodchoice = $row["value"]
                    ;
                    //Add each row
                
                    echo "<tr>
        <td>$moodchoice</td>
<td>$mood</td>
<td>$date</td>";
                    echo "<td> <a href='editMood.php?mood_id=$moodid' class='button'>Edit</a> <a href='processDelete.php?moodid=$moodid'class='button is-danger'>Delete</a></td>
</tr>";

                }


                echo '</table>';


                ?>
                <a href='export.php' class='button is-primary'>Export My Mood Log</a>
            </div>
        </div>

        <div class="hero is-large">
            <div class="hero-body is-justify-content-center is-align-items-center pt-6 pb-6">
                <!--Visualisations-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column has-text-centered">
                        <h1>Visualisations go here</h1>
                    </div>
                </div>
                <!--Visualisations End-->
            </div>
        </div>
        <!--End of Main Canvas-->
        <!--Footer-->
        <div class="footer">
            <?php include "./footer.html"; ?>
        </div>


</body>

</html>