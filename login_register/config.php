<?php
// starting the php config file

// specifying database connection parameters
// host stores database server address, in this case localhost
$host = "localhost";
// user stores the username to access the database
$user = "root";
// password stores the password for the database user
$password = "";
// database stores the name of the database to connect to
$database = "users_db";

// creating a connection to the database, this is a mysqli connection
$conn = mysqli_connect($host, $user, $password, $database);

// tell program to die if connection fails
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
?>
