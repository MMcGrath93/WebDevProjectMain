<?php

session_start();
$currentuser = $_SESSION["user"];

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>




    <?php
    //import nav bar
    include "./navbar.html";
    ?>

<?php
if(!isset($_SESSION['id'])){
    header('Location: login.php');

}



?>
    <!-- Create Form Action - POST -->
    <form action="processLogin.php" method="post">

        <!--Container-->
        <div class="container">

            <!--Main Canvas-->
            <div class="hero is-large">
                <div class="hero-body is-justify-content-center is-align-items-center pt-25= pb-25">
                    <!--Content Box-->
                    <div class="columns is-flex is-flex-direction-column box">
                        <div class="column">

                            <?php
                            $Name = $_SESSION["user"];

                            ?>
                            <h1 class="h1"> Hello <?php echo $Name; ?></h1>
                            <h1 class="h1"> What would you like to do today?</h1>
                            <br>


                            <a href='viewMoods.php' class="button is-large is-responsive"> View my Mood Log</a>
                            <a href='recordMood.php' class="button is-large is-responsive"> Record a New Mood</a>

                        </div>
                    </div>
                    <!--Content Box Box End-->
                    <!--End of Main Canvas-->
                </div>
            </div>
        </div>
    </form>
    <br><br><br><br><br>

    <!--Footer-->
    <div class="footer ">
        <?php include "./footer.html"; ?>
    </div>


</body>

</html>