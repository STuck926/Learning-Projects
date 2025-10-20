<?php 
// starting the session and including the database configuration file
session_start();
require_once "config.php";

// handling register form submission
if (isset($_POST['register'])){
    // setting up name, email, password hash, and role variables from the form input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // checking if the email is already registered in the database
    $checkEmail = $conn->query("SELECT email FROM users WHERE email='$email'");
    if($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = "Email is already registered!";
        $_SESSSION['active_form'] = 'register';

    } else{
        // inserting the new user into the database
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }
    // redirecting back to index after registration
    header("Location: index.php");
    exit();
}
// handling login form submission
if(isset ($_POST['login'])){
    // setting up email and password variables from the form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // querying the database for the user with the provided email
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    // verifying that the email exists
    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        // verifying the password
        if(password_verify($password, $user['password'])){
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // redirecting based on user role
            if($user['role'] === 'admin'){
                header("Location: admin_page.php");
            }
            else{
                header("Location: user_page.php");
            }
            exit();
        }
    }

    // setting error message and redirecting back to index if login fails
    $_SESSION['login_error'] = "Invalid email or password";
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}
?>