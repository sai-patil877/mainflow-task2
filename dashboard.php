<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body style="text-align: center; padding: 50px;">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <a href="logout.php" style="display:inline-block; margin-top: 20px; font-weight: 600; color:#007BFF; text-decoration:none;">Logout</a>
</body>
</html>
