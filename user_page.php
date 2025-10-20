<?php
// starting the session and checking if the user is logged in
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #fff;">

    <div class="box">
        <h1>Welcome to the User Page, <span><?= $_SESSION['name']; ?></span></h1>
        <p>This page is accessible only to users with the <span>user</span> role.</p>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>

</body>
</html>