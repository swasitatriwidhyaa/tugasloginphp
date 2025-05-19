<?php
session_start();

include 'koneksi/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Lindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Password salah
        header("Location: index.php?error=password");
        exit();
    }
} else {
    // Username tidak ditemukan
    header("Location: index.php?error=username");
    exit();
}
?>
