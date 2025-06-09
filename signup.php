<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action="signup_process.php" method="POST" novalidate>
        <h2>Signup Form</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="message error">'.htmlspecialchars($_SESSION['error']).'</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="message success">'.htmlspecialchars($_SESSION['success']).'</div>';
            unset($_SESSION['success']);
        }
        ?>
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit">Sign Up</button>
        <a href="login.php">Already have an account? Login here</a>
    </form>
</body>
</html>
