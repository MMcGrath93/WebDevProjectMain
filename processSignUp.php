<?php

include("dbconn.php");
session_start();

//Get Inputs
$username = $_POST['user'];
$password = $_POST['pass'];
$confirmpassword = $_POST['confirmpass'];
$hashedpass = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['name']

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <?php


    // Validate Info
    //Check no info is missing 
    if (empty($username) || empty($password) || empty($name) || empty($confirmpassword)) {
        header("Location: signup.php?error=erroremptyfields");
        exit();
    }

    //check passswords match
    elseif ($password !== $confirmpassword) {
        header("Location: signup.php?error=passwordsdontmatch");
        exit();

    } else {

        $readSQL = "SELECT * FROM `users` WHERE `username` = '$username'";
        $res = mysqli_query($conn, $readSQL);

        if (mysqli_num_rows($res) > 0) {
            header("Location: signup.php?error=usernametaken");
            exit();
        } else {
            // Create User Record
            $insertSQL = "INSERT INTO `users` (`username`, `password`, `Name`) VALUES ('$username','$hashedpass','$name');";
            $result = $conn->query($insertSQL);
        }

    }


    // Create User Record
    $insertSQL = "INSERT INTO `users` (`username`, `password`, `Name`) VALUES ('$username','$hashedpass','$name');";
    $result = $conn->query($insertSQL);



    ?>

    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center is-align-items-center">
            <!--Process Box-->
            <div class="columns is-flex is-flex-direction-column box">
                <div class="column">

                    <?php



                    if (!$result) {
                        echo "<p>Signup Failed</p>";
                        echo "<br>";
                        echo "<div class='has-text-centered'>
<p class='button is-large is-success is-pulled-left><a href='signup.php' class='has-text-white'>Back to Sign Up</a>
</p>
</div>";
                    } else {
                        echo "<p>Signup Complete</p>";
                        echo "<br>";
                        echo "<div class='has-text-centered'>";
                        echo "<p class='button is-large is-success is-pulled-left'><a href='login.php' class='has-text-white'>Log In</a>
    </p>
</div>";
                    }
                    ?>
                </div>
            </div>
            <!--Sign Up Box End-->
        </div>



</body>

</html>