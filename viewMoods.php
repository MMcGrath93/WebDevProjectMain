<?php

include "dbconn.php";
session_start();
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
            <div class="container has-text-centered">
                <!--Content Box-->


                <?php

                $readSQL = "SELECT * FROM `moods` WHERE `user_id`='$id'";
                $result = $conn->query($readSQL);
                //Table Headers
                echo '<table class="table is-bordered is-striped is-narrow is-hoverable">';
                echo '<tr>
                    <th class="has-background-white">Mood</th>
                    <th class="has-background-white">Notes</th>
                    <th class="has-background-white">Date & Time Recorded</th>
                    <th class="has-background-white"></th>
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

            </div>
        </div>

        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Sign Up Box-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <h1>Visualisations go here</h1>
                    </div>
                </div>
                <!--Sign Up Box End-->
            </div>
        </div>
        <!--End of Main Canvas-->

</body>

</html>