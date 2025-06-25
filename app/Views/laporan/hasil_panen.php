<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Laporan Hasil Panen</h2>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>Tanggal</th>
      <th>Nama Tanaman</th>
      <th>Jumlah (kg)</th>
      <th>Kualitas</th>
      <th>Estimasi Berikutnya</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($panen as $p): ?>
    <tr>
      <td><?= date('d/m/Y', strtotime($p->tanggal)) ?></td>
      <td><?= esc($p->nama_tanaman) ?></td>
      <td><?= esc($p->jumlah) ?></td>
      <td><?= esc($p->kualitas) ?></td>
      <td><?= $p->estimasi_panen_berikut ? date('d/m/Y', strtotime($p->estimasi_panen_berikut)) : '-' ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
