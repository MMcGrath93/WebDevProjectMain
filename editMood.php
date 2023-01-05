
<?php

session_start();

include("dbconn.php");
$mood_id = $_GET['mood_id'];
$readSQL = "SELECT * from `moods` WHERE id=$mood_id";


$result = $conn->query($readSQL);

if (!$result){
    echo "<p>Success</p>";
    exit($conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record My Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

<?php
//import nav bar
include"./navbar.html";
?>

<?php
while($row = $result->fetch_assoc()){
    $mood = $row["context"];
    $moodchoice = $row["value"];


}
    ?>

    <!-- Create Form Action - POST -->
    <form action="moodsapi.php" method="put">

        <!--Main Canvas-->
        <div class="hero is-medium">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Content Box-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">


                        <div class="field">
                            <div>
                                <label for="moodchoice">How are you feeling today?</label>
                                <select class="select" name="moodchoice" id="moodchoice">
                                    <option>Happy</option>
                                    <option>Sad</option>
                                    <option>Nervous</option>
                                    <option>Angry</option>
                                    <option>Anxious</option>
                                    <option>Depressed</option>
                                </select>
                            </div>
                            <br>
                            <br>

                            <div class="field">
                                <div>
                                    <label for="mood">Any observations you want to note?</label>
                                    <textarea class="textarea" type="text" value=<?php echo $mood;?> name="mood" id="mood"> </textarea>
                                </div>
                                <br>

                                <div class="field">
                                    <input class="button is-success is-block" type="submit" value="Submit">
                                </div>

                            </div>
                        </div>
                        <!--Content Box Box End-->
                        <!--End of Main Canvas-->

</body>

</html>