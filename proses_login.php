<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Ganti dengan username dan password yang benar
$adminUsername = 'admin';
$adminPassword = 'password';

if ($username == $adminUsername && $password == $adminPassword) {
    $_SESSION['username'] = $username;
    header("Location: admin.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>
