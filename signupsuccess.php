<?php

include("dbconn.php");
session_start();

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


    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center is-align-items-center">
            <!--Process Box-->
            <div class="columns is-flex is-flex-direction-column box">
                <div class="column">


                    <p>Signup Complete</p>
                    <br>
                    <div class='has-text-centered'>
                        <p class='button is-large is-success is-pulled-left'><a href='login.php'
                                class='has-text-white'>Log In</a>
                        </p>
                    </div>

                </div>
            </div>
            <!--Sign Up Box End-->
        </div>



</body>

</html>