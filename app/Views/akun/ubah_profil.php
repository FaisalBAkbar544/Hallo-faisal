<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Ubah Profil</h2>

<?php if (session()->getFlashdata('message')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('/akun/profil') ?>">
  <div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Simpan Profil</button>
</form>

<?= $this->endSection() ?>
