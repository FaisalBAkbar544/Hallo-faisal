<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Ubah Akun</h2>

<?php if (session()->getFlashdata('message')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('/akun/ubah') ?>">
  <div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Password (biarkan kosong jika tidak diubah)</label>
    <input type="password" name="password" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
