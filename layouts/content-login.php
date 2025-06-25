<?php
$login_error = '';
if (isset($_GET['login']) && $_GET['login'] === 'gagal') {
  $login_error = '<div class="alert alert-danger text-center" role="alert">Username atau kata sandi salah.</div>';
}
?>

<div class="container mt-5" style="max-width: 400px;">
  <div class="card p-4 shadow">
    <h4 class="text-center mb-3">Login ke Aplikasi</h4>

    <!-- Alert wajib login -->
    <div class="alert alert-warning text-center" role="alert">
      Anda harus login untuk melanjutkan.
    </div>

    <!-- Alert jika login gagal -->
    <?= $login_error ?>

    <!-- Login Form -->
    <form method="post" action="../configs/login-check.php">
      <div class="form-group">
        <input type="text" class="form-control mb-3" name="user" placeholder="Email atau Username" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control mb-3" name="pass" placeholder="Kata Sandi" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <!-- Link Register -->
    <div class="text-center mt-3">
      <small><a href="register.php">Daftar Akun Baru</a></small>
    </div>
  </div>
</div>
