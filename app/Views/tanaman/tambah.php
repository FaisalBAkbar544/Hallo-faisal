<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Tanaman</h2>

<form method="post" action="<?= base_url('tanaman/simpan') ?>">
  <div class="mb-3">
    <label>Nama Tanaman</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control">
  </div>
  <div class="mb-3">
    <label>Varietas</label>
    <input type="text" name="varietas" class="form-control">
  </div>
  <div class="mb-3">
    <label>Lokasi</label>
    <input type="text" name="lokasi" class="form-control">
  </div>
  <div class="mb-3">
    <label>Tanggal Tanam</label>
    <input type="date" name="tanggal_tanam" class="form-control">
  </div>
  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
      <option value="tumbuh">Tumbuh</option>
      <option value="siap panen">Siap Panen</option>
      <option value="rusak">Rusak</option>
    </select>
  </div>
  <div class="d-flex justify-content-between">
    <a href="<?= base_url('tanaman') ?>" class="btn btn-secondary">← Kembali</a>
    <button class="btn btn-success">Simpan</button>
  </div>
</form>

<?= $this->endSection() ?>
