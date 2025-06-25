<?php
include("../configs/connection.php");

if (!isset($_SESSION['U'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../pages/login.php';</script>";
    exit;
}

$username = $_SESSION['U'];
$sql_user = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_assoc($sql_user);

// Tetap jalan meskipun biography belum ada
$bio = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM biography WHERE id_user = '{$user['id_user']}'")) ?? [];

?>

<div class="container mt-4">
    <h3>Profil Saya</h3>
    <hr>

    <div class="row">
        <div class="col-md-4 text-center">
            <img src="../layouts/get-photo.php?id=<?= $user['id_user'] ?>" class="img-thumbnail mb-3" alt="Foto Profil" style="width: 200px; height: 200px; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= htmlspecialchars($user['name'] ?? '-') ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($user['email'] ?? '-') ?></td>
                </tr>
                <tr>
                    <th>Biografi</th>
                    <td><?= nl2br(htmlspecialchars($bio['biography'] ?? '-')) ?></td>
                </tr>
            </table>

            <a href="..\pages\editProfile.php" class="btn btn-primary mt-3">Edit Profil</a>
        </div>
    </div>
</div>
