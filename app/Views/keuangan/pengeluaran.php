<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Catat Pengeluaran</h2>

<form action="<?= base_url('keuangan/simpan_pengeluaran') ?>" method="post">
  <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Contoh: Beli Pupuk" required>
  </div>
  <div class="mb-3">
    <label for="nominal" class="form-label">Nominal (Rp)</label>
    <input type="number" name="nominal" id="nominal" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
  </div>

  <div class="d-flex justify-content-between">
    <a href="<?= base_url('keuangan/pengeluaran') ?>" class="btn btn-secondary">← Kembali</a>
    <button type="submit" class="btn btn-danger">Simpan Pengeluaran</button>
  </div>
</form>

<?= $this->endSection() ?>
