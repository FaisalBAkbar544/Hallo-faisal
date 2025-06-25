<?php
include("../configs/connection.php");

if (!isset($_SESSION['U'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../pages/login.php';</script>";
    exit;
}

$username = $_SESSION['U'];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'"));
$bio = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM biography WHERE id_user = '{$user['id_user']}'")) ?? [];

if (isset($_POST['saveProfile'])) {
    $newName = mysqli_real_escape_string($connect, $_POST['name']);
    $newUsername = mysqli_real_escape_string($connect, $_POST['username']);
    $newEmail = mysqli_real_escape_string($connect, $_POST['email']);
    $newBio = mysqli_real_escape_string($connect, $_POST['biography']);

    $updatePhoto = '';
    if (!empty($_FILES['photo']['name'])) {
        $filename = $_FILES['photo']['name'];
        $tmpname = $_FILES['photo']['tmp_name'];
        $folder = "../images/" . $filename;
        move_uploaded_file($tmpname, $folder);
        $updatePhoto = ", photo = '$filename'";
    }

    // Update tabel user
    mysqli_query($connect, "UPDATE user SET name='$newName', username='$newUsername', email='$newEmail' WHERE id_user='{$user['id_user']}'");

    // Cek jika biography belum ada
    $check = mysqli_query($connect, "SELECT * FROM biography WHERE id_user = '{$user['id_user']}'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($connect, "UPDATE biography SET biography='$newBio' $updatePhoto WHERE id_user='{$user['id_user']}'");
    } else {
        $photoVal = !empty($filename) ? "'$filename'" : "NULL";
        mysqli_query($connect, "INSERT INTO biography (id_user, biography, photo) VALUES ('{$user['id_user']}', '$newBio', $photoVal)");
    }

    // Perbarui session jika username diganti
    $_SESSION['U'] = $newUsername;
    echo "<script>alert('Profil berhasil diperbarui'); window.location.href='profile.php';</script>";
    exit;
}
?>

<div class="container mt-4">
    <h3>Edit Profil</h3>
    <hr>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
        </div>
        <div class="form-group mb-2">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
        </div>
        <div class="form-group mb-2">
            <label>Biografi</label>
            <textarea name="biography" class="form-control" rows="5"><?= htmlspecialchars($bio['biography'] ?? '') ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label>Ganti Foto Profil</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" name="saveProfile" class="btn btn-success">Simpan</button>
        <a href="profile.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
