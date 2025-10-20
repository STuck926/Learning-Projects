<?php
// logout.php file
// accessing the session to log out the user
session_start();
// clear all session variables and destroy the session
session_unset();
session_destroy();
// redirect the user back to the index page after logout
header("Location: index.php");
// stop script execution
exit();
?>