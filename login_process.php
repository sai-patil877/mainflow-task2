<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = trim($_POST['username_email']);
    $password = $_POST['password'];

    if (empty($username_email) || empty($password)) {
        $_SESSION['error'] = "Please fill all fields";
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_email, $username_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $stmt->close();
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Incorrect password";
            $stmt->close();
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "User not found";
        $stmt->close();
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
