<?php

session_start();

?>

<?php
//Get Inputs
$username = $_POST['user'];
$password = $_POST['pass'];


//API Details
$endpoint = "http://localhost/WebDevProject/accountapi.php?user=$username";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <?php
    //Save Stored Password from API
    foreach ($data as $row) {
        $storedPass = $row["password"];
        $storedid = $row["id"];
        $user = $row["Name"];

    }

    //Validate password matches
    $authenticated = password_verify($password, $storedPass);
    if ($authenticated) {
        $_SESSION['username'] = $username;
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $storedid;
        //Redirect to main page
        header("Location: main.php");

    } else {
        header("Location: login.php?error=invalidcredentials");
    }
    ?>

</body>

</html>