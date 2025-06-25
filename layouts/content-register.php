<?php
$notif = '';
if (isset($_GET['register'])) {
  switch ($_GET['register']) {
    case 'konfirmasi':
      $notif = '<div class="alert alert-warning text-center" role="alert">Konfirmasi password tidak cocok.</div>';
      break;
    case 'duplikat':
      $notif = '<div class="alert alert-warning text-center" role="alert">Username atau email sudah terdaftar.</div>';
      break;
    case 'berhasil':
      $notif = '<div class="alert alert-success text-center" role="alert">Pendaftaran berhasil! Silakan login.</div>';
      break;
    case 'gagal':
      $notif = '<div class="alert alert-danger text-center" role="alert">Pendaftaran gagal. Silakan coba lagi.</div>';
      break;
  }
}
?>

<div class="container mt-5" style="max-width: 400px;">
  <div class="card p-4 shadow">
    <h4 class="text-center mb-3">Daftar Akun Baru</h4>

    <!-- Notifikasi -->
    <?= $notif ?>

    <!-- Form Registrasi -->
    <form method="post" action="../configs/register-check.php" onsubmit="return validateRegister()">
      <div class="form-group">
        <input type="text" class="form-control mb-3" name="new_user" id="new_user" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control mb-3" name="new_email" id="new_email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control mb-3" name="new_pass" id="new_pass" placeholder="Kata Sandi (min 8 karakter)" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control mb-3" name="confirm_pass" id="confirm_pass" placeholder="Ulangi Kata Sandi" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Daftar</button>
    </form>

    <!-- Link ke Login -->
    <div class="text-center mt-3">
      <small>Sudah punya akun? <a href="login.php">Masuk di sini</a></small>
    </div>
  </div>
</div>

<script>
function validateRegister() {
  const pass = document.getElementById("new_pass").value;
  const confirm = document.getElementById("confirm_pass").value;

  if (pass.length < 8) {
    alert("Password minimal 8 karakter.");
    return false;
  }

  if (pass !== confirm) {
    alert("Konfirmasi password tidak cocok.");
    return false;
  }

  return true;
}
</script>
