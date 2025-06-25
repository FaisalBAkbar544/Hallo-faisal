<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Edit Tanaman</h2>

<form method="post" action="<?= base_url('tanaman/update/' . $tanaman['id']) ?>">
  <div class="mb-3">
    <label>Nama Tanaman</label>
    <input type="text" name="nama" value="<?= esc($tanaman['nama']) ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Jenis</label>
    <input type="text" name="jenis" value="<?= esc($tanaman['jenis']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Varietas</label>
    <input type="text" name="varietas" value="<?= esc($tanaman['varietas']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Lokasi</label>
    <input type="text" name="lokasi" value="<?= esc($tanaman['lokasi']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Tanggal Tanam</label>
    <input type="date" name="tanggal_tanam" value="<?= esc($tanaman['tanggal_tanam']) ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
      <option value="tumbuh" <?= $tanaman['status'] == 'tumbuh' ? 'selected' : '' ?>>Tumbuh</option>
      <option value="siap panen" <?= $tanaman['status'] == 'siap panen' ? 'selected' : '' ?>>Siap Panen</option>
      <option value="rusak" <?= $tanaman['status'] == 'rusak' ? 'selected' : '' ?>>Rusak</option>
    </select>
  </div>
  <div class="d-flex justify-content-between">
    <a href="<?= base_url('tanaman') ?>" class="btn btn-secondary">← Kembali</a>
    <button class="btn btn-primary">Update</button>
  </div>
</form>

<?= $this->endSection() ?>
