<?php

session_start()

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    //import nav bar
    include "./navbar.html";
    ?>


    <!-- Create Form Action - POST -->
    <form action="processLogin.php" method="post">

        <!--Main Canvas-->
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Content Box-->
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">

                        <p>Main Content goes here for My Account Page</p>

                    </div>
                </div>
            </div>
        </div>
        <!--Content Box Box End-->
        <!--End of Main Canvas-->
    </form>

    <!--Footer-->
    <div class="footer">
        <?php include "./footer.html"; ?>
    </div>

</body>

</html>