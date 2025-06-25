<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h3>Riwayat Perawatan</h3>

<form action="<?= base_url('perawatan/simpan') ?>" method="post" class="mb-4">
  <input type="hidden" name="tanaman_id" value="<?= $tanaman_id ?>">
  <div class="mb-2"><input type="date" name="tanggal" class="form-control" required></div>
  <div class="mb-2"><input type="text" name="kegiatan" class="form-control" placeholder="Kegiatan (contoh: penyiraman)" required></div>
  <div class="mb-2"><textarea name="catatan" class="form-control" placeholder="Catatan tambahan"></textarea></div>
  <button class="btn btn-success">Tambah Riwayat</button>
</form>

<table class="table table-bordered">
  <thead><tr><th>Tanggal</th><th>Kegiatan</th><th>Catatan</th></tr></thead>
  <tbody>
    <?php foreach ($perawatan as $p): ?>
    <tr>
      <td><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
      <td><?= esc($p['kegiatan']) ?></td>
      <td><?= esc($p['catatan']) ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<a href="<?= base_url('tanaman') ?>" class="btn btn-secondary mt-3">Kembali</a>

<?= $this->endSection() ?>
