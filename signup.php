<?php

session_start()



    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Create Form Action - POST -->
    <form action="processSignUp.php" method="post">

        <!--Main Canvas-->
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Sign Up Box-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <h3 class="title has-text-black">Sign Up</h3>
                        <p class="subtitle has-text-black">Sign up to Mood Tracker by filling the form below</p>
                        <p class="subtitle has-text-black">Your username will be your email</p>

                        <?php
                        //display errors
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "erroremptyfields") {
                                echo '<p class="e">Please fill in all the fields</p>';
                            } elseif ($_GET['error'] == "passwordsdontmatch") {
                                echo '<p class="e">The passwords you entered do not match</p>';
                            } elseif ($_GET['error'] == "usernametaken") {
                                echo '<p class="e">The username selected is already taken</p>';
                            }


                        }

                        ?>
                        <!--Signup Entry Form-->
                        <div class="field">
                            <label for="name">Name</label>
                            <div class="control">
                                <input class="input is-primary" name="name" type="text" placeholder="" id="pass">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="user">Email</label>
                                <input class="input is-primary" name="user" type="email" placeholder="Email" id="user">
                            </div>

                            <div class="field">
                                <label for="pass">Password</label>
                                <div class="control">
                                    <input class="input is-primary" name="pass" type="password" placeholder="Password"
                                        id="pass">
                                </div>
                            </div>

                            <div class="field">
                                <label for="pass">Confirm Password</label>
                                <div class="control">
                                    <input class="input is-primary" name="confirmpass" type="password"
                                        placeholder="Password" id="pass">
                                </div>
                            </div>
                            <!--Submit Button-->

                            <div class="columns">
                                <div class="column">
                                    <input class="button is-success is-block" type="submit" value="Submit">
                                </div>
                                <div class="column">
                                    <a href=login.php class="button is-danger">
                                        <strong>Back</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Sign Up Box End-->
                    </div>
                </div>
                <!--End of Main Canvas-->

</body>

</html>