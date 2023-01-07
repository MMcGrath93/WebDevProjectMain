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
    <form action="processSignUp.php" method="put">

        <!--Main Canvas-->
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <!--Content Box-->
                <div class="columns is-flex is-flex-direction-column box">

                    <h3 class="title has-text-black">My Account</h3>
                    <p class="subtitle has-text-black">Edit or Delete your Account below</p>
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
                    <br><br>

<p class="subtitle has-text-black">Edit Account Information</p>
                    <div class="column">

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
                                <input class="input is-primary" name="user" type="email" placeholder="Email" id="user"
                                    value="<?php echo $username; ?>">
                            </div>

                            <br><br>
                            <p class="subtitle has-text-black">Change Password</p>
                            <div class="field">
                                <label for="oldpass">Old Password</label>
                                <div class="control">
                                    <input class="input is-primary" name="oldpass" type="password"
                                        placeholder="Password" id="oldpass">
                                </div>
                            </div>

                            <div class="field">
                                <label for="newpass"> New Password</label>
                                <div class="control">
                                    <input class="input is-primary" name="newpass" type="password"
                                        placeholder="Password" id="newpass">
                                </div>
                            </div>

                            <div class="field">
                                <label for="confirmpass">Confirm New Password</label>
                                <div class="control">
                                    <input class="input is-primary" name="confirmpass" type="password"
                                        placeholder="Password" id="confirmpass">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <input class="button is-success is-block" type="submit" value="Submit">
                                </div>
                                <div class="column" align="right">
                                    <a href=processAccountDelete.php class="button is-danger">
                                        <strong>Delete</strong>
                                    </a>
                                </div>
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