<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Estimasi Panen Berikutnya</h2>

<form method="post" action="<?= base_url('panen/simpan_estimasi') ?>">
  <input type="hidden" name="tanaman_id" value="<?= $tanaman_id ?>">

  <div class="mb-3">
    <label>Estimasi Panen Berikut (tanggal)</label>
    <input type="date" name="estimasi_panen_berikut" class="form-control" required>
  </div>

  <button class="btn btn-primary">Simpan Estimasi</button>
</form>

<?= $this->endSection() ?>
