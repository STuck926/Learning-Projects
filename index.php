<?php 
// start or continue the session to access session variables
session_start();

// error array to hold any error messages
$errors = [
    // ?? is tne null coalescing operator, it checks if the session variable is set, if not it returns an empty string
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

// active form variable to determine which form to show, defaults to 'login' if not set
$activeForm = $_SESSION['active_form'] ?? 'login';

// session_unset() clears all session variables without destroying the session
session_unset();

// function to display error messages using a p element
function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>": '';
}

// function to determine if a form should be active based on the active form variable
function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<!--Website designed to learn more html, css, php, and sql from Codehal youtube channel-->

<!--Setting up the tab name and giving the style sheet-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<!--Creating the main body of the page, this will swap between the login and register forms-->
<body>
    <!--This container will be centered and hold the elements-->
    <div class="container">
        <!--This form-box begins active as we want it to be the first one you see, this is done by the default php argument being this one-->
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

        <!--This form-box is inactive and hidden at first, done by it not being the default php argument-->
        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Select Role--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>