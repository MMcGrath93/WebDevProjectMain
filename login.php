<?php

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
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Create Form Action - POST -->
    <form action="processLogin.php" method="post">

        <!--Main Canvas-->
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Log In Box-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <h3 class="title has-text-black">Mood Tracker</h3>
                        <p class="subtitle has-text-black">Log in to record how you feel</p>

<?php
                        //display errors
                        if (isset($_GET['error'])) {
                            
                                echo '<p class="e">Username or Password is incorrect</p>';
                

                        }
                        else{
    echo '<br>';
                
                        }

                        ?>
                        <!--Login Entry Form-->
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
                            <!--Log In Button-->
                            <div class="field">
                                <input class="button is-success is-block" type="submit" value="Log In">
                            </div>
                            <!--Sign Up-->
                            <div class="has-text-centered">
                                <p class="is-size-7"><a href="signup.php" class="has-text-primary">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Log In Box End-->

                <!--Image if required-->
                <div class="column is-5">
                    <img
                        src="images/logo.png">
                </div>
            </div>
        </div>

        

        

        <!--End of Main Canvas-->

        <!--Footer-->
        <div class="footer">
        <?php include "./footer.html"; ?>
    </div>

    

</body>

</html>