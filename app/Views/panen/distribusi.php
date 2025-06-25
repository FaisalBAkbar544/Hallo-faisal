<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Distribusi Hasil Panen - Tanaman ID <?= $tanaman_id ?></h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th><th>Jumlah</th><th>Jual</th><th>Konsumsi</th><th>Simpan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($panen as $p): ?>
      <tr>
        <td><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
        <td><?= $p['jumlah'] ?> kg</td>
        <td><?= $p['distribusi_jual'] ?> kg</td>
        <td><?= $p['distribusi_konsumsi'] ?> kg</td>
        <td><?= $p['distribusi_simpan'] ?> kg</td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
