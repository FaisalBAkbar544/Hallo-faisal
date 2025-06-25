<?php
include("connection.php");

$username = $_POST['new_user'];
$email = $_POST['new_email'];
$password = $_POST['new_pass'];
$confirm = $_POST['confirm_pass'];

if ($password != $confirm) {
    echo "<script>alert('Konfirmasi password tidak cocok!'); window.location.href='../pages/register.php';</script>";
    exit;
}

// Cek apakah username atau email sudah ada
$check = mysqli_prepare($connect, "SELECT id_user FROM user WHERE username = ? OR email = ?");
mysqli_stmt_bind_param($check, "ss", $username, $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    echo "<script>alert('Username atau Email sudah terdaftar!'); window.location.href='../pages/register.php';</script>";
    exit;
}
mysqli_stmt_close($check);

// Hash password dengan aman
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$stmt = mysqli_prepare($connect, "INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
$save = mysqli_stmt_execute($stmt);

if ($save) {
    echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='../pages/login.php';</script>";
} else {
    echo "<script>alert('Pendaftaran gagal!'); window.location.href='../pages/register.php';</script>";
}

mysqli_stmt_close($stmt);
?>
