<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Catat Hasil Panen</h2>

<form method="post" action="<?= base_url('panen/simpan') ?>">
  <input type="hidden" name="tanaman_id" value="<?= $tanaman_id ?>">

  <div class="mb-3">
    <label>Tanggal Panen</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Jumlah Panen (kg)</label>
    <input type="number" name="jumlah" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Kualitas</label>
    <input type="text" name="kualitas" class="form-control">
  </div>

  <button class="btn btn-success">Simpan Panen</button>
</form>

<?= $this->endSection() ?>
