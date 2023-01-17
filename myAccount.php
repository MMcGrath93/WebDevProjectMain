<?php

session_start();

include("dbconn.php");
$accountid = $_SESSION['id'];
$readSQL = "SELECT * from `users` WHERE id=$accountid";



$result = $conn->query($readSQL);

if (!$result) {
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
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

</head>

<body>

    <?php
    //import nav bar
    include "./navbar.html";
    ?>

    <?php

    while ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
        $username = $row["username"];


    }

    ?>

    <!-- Create Form Action - PUT -->
    <form action="processEdit.php" method="put">

        <!--Main Canvas-->
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Content Box-->
                <div class="columns is-flex is-flex-direction-column box">

                    <h3 class="title has-text-black">My Account</h3>
                    <p class="subtitle has-text-black">Edit or Delete your Account below</p>
                    <?php

                    ?>
                    <br><br>

                    <!--Choice Buttons-->
                    <button id="edit-info-button" class="button is-primary">Edit Info</button>
                    <br>
                    <button id="delete-account-button" class="button is-danger">Delete Account</button>

                    <!--Edit Modal-->
                    <div id="edit-info-modal" class="modal">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Edit Account Information</p>
                                <button class="delete" aria-label="close"></button>
                            </header>
                            <section class="modal-card-body">
                                <form action="processEdit.php" method="put">
                                    <div class="field">
                                        <label for="name">Name</label>
                                        <div class="control">
                                            <input class="input is-primary" name="name" type="text" placeholder=""
                                                id="name" value="<?php echo $name; ?>">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label for="user">Email</label>
                                            <input class="input is-primary" name="user" type="email" placeholder="Email"
                                                id="user" value="<?php echo $username; ?>">
                                        </div>
                                    </div>

                                </form>
                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!--Content Box Box End-->
    <!--End of Main Canvas-->
    </form>

    <!--Footer-->
    <div class="footer">
        <?php include "./footer.html"; ?>
    </div>



</body>



</html>