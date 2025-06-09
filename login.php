<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action="login_process.php" method="POST" novalidate>
        <h2>Login Form</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="message error">'.htmlspecialchars($_SESSION['error']).'</div>';
            unset($_SESSION['error']);
        }
        ?>
        <input type="text" name="username_email" placeholder="Username or Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
        <a href="signup.php">Don't have an account? Signup here</a>
    </form>
</body>
</html>
