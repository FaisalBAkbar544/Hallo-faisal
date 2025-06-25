<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Laporan Keuangan</h2>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>Jenis</th>
      <th>Kategori</th>
      <th>Nominal (Rp)</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($keuangan as $k): ?>
    <tr class="<?= $k['jenis'] === 'pengeluaran' ? 'table-danger' : 'table-success' ?>">
      <td><?= date('d/m/Y', strtotime($k['tanggal'])) ?></td>
      <td><?= ucfirst($k['jenis']) ?></td>
      <td><?= esc($k['kategori']) ?></td>
      <td><?= number_format($k['nominal'], 0, ',', '.') ?></td>
      <td><?= esc($k['keterangan']) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
