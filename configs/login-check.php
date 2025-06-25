<?php
include("connection.php");

$usr = $_POST['user'];
$pss = $_POST['pass'];

// Cek user berdasarkan username ATAU email
$sql = mysqli_prepare($connect, "SELECT username, password FROM user WHERE username = ? OR email = ?");
mysqli_stmt_bind_param($sql, "ss", $usr, $usr);
mysqli_stmt_execute($sql);
mysqli_stmt_bind_result($sql, $db_user, $db_pass);
mysqli_stmt_fetch($sql);
mysqli_stmt_close($sql);

// Verifikasi password
if ($db_user) {
    if (password_verify($pss, $db_pass) || md5($pss) === $db_pass) {
        session_start();
        $_SESSION['U'] = $db_user;
        $_SESSION['P'] = $db_pass;
        header("location:../pages/home.php");
        exit;
    }
}

// Jika gagal login
header("location:../pages/login.php?login=gagal");
exit;
?>
