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

    <!--Main Canvas-->
    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center is-align-items-center">
            <!--Content Box-->
            <div class="columns is-flex is-flex-direction-column box">

                <h3 class="title has-text-black">My Account</h3>
                <p class="subtitle has-text-black">Edit or Delete your Account below</p>
                <p class="subtitle has-text-black">You me need to log out for changes to take effect</p>
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
                            <form action="processAccountEdit.php" method="put">
                                <div class="field">
                                    <label for="name">Name</label>
                                    <div class="control">
                                        <input class="input is-primary" name="name" type="text" placeholder="" id="name"
                                            value="<?php echo $name; ?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="user">Email</label>
                                        <input class="input is-primary" name="user" type="email" placeholder="Email"
                                            id="user" value="<?php echo $username; ?>">
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <!-- Create Form Action - POST -->
                                        <form action="processAccountEdit.php" method="post">
                                            <input class="button is-success is-block" type="submit" value="Submit">
                                    </div>
                                    <div class="column" align="right">
                                        <a href=myAccount.php class="button is-danger">
                                            <strong>Back</strong>
                                        </a>
                                    </div>
                                </div>

                            </form>
                        </section>
                    </div>
                </div>

                <!--Delete Modal-->
                <div id="delete-account-modal" class="modal" style="display: none;">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Delete Account</p>
                            <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <p>Are you sure you want to delete your account?</p>
                            <form action="processAccountDelete.php" method="post">
                                <input type="hidden" name="accountid" value="<?php echo $accountid; ?>">
                                <div class="columns">
                                    <div class="column">
                                        <input class="button is-danger is-block" type="submit" value="Delete">
                                    </div>
                                    <div class="column" align="right">
                                        <a href="myAccount.php" class="button is-success">
                                            <strong>Back</strong>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Content Box Box End-->
    <!--End of Main Canvas-->

    <!--Footer-->
    <div class="footer">
        <?php include "./footer.html"; ?>
    </div>



    <!--Edit Modal Script-->
    <script>
        // Get the modal
        var modal = document.getElementById("edit-info-modal");
        // Get the button that opens the modal
        var btn = document.getElementById("edit-info-button");
        // Get the x element that closes the modal
        var span = document.getElementsByClassName("delete")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.classList.add("is-active");
        }

        // When the user clicks on x, close the modal
        span.onclick = function () {
            modal.classList.remove("is-active");
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.classList.remove("is-active");
            }
        }


    </script>

    <!--Delete Modal Script-->
    <script>
        // Get the delete modal
        var deleteModal = document.getElementById("delete-account-modal");

        // Get the delete button
        var deleteBtn = document.getElementById("delete-account-button");

        // Get the x element that closes the modal
        var closeDeleteBtn = document.getElementsByClassName("delete")[1];

        // When the user clicks the button, open the modal 
        deleteBtn.onclick = function () {
            deleteModal.style.display = "flex";
        }

        // When the user clicks on x, close the modal
        closeDeleteBtn.onclick = function () {
            deleteModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }
    </script>
</body>



</html>