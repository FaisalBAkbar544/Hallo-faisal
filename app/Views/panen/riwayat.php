<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Riwayat Panen Tanaman</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th><th>Jumlah</th><th>Kualitas</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($panen as $p): ?>
    <tr>
      <td><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
      <td><?= $p['jumlah'] ?> kg</td>
      <td><?= esc($p['kualitas']) ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
