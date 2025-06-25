<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Laporan Keuangan Bulanan</h2>

<form method="get" class="row g-2 mb-4">
  <div class="col-md-4">
    <input type="text" name="keyword" class="form-control" placeholder="Cari kategori atau keterangan..." value="<?= esc($_GET['keyword'] ?? '') ?>">
  </div>
  <div class="col-md-3">
    <select name="sort" class="form-select">
      <option value="tanggal" <?= ($_GET['sort'] ?? '') == 'tanggal' ? 'selected' : '' ?>>Sortir berdasarkan Tanggal</option>
      <option value="nominal_asc" <?= ($_GET['sort'] ?? '') == 'nominal_asc' ? 'selected' : '' ?>>Nominal Terkecil</option>
      <option value="nominal_desc" <?= ($_GET['sort'] ?? '') == 'nominal_desc' ? 'selected' : '' ?>>Nominal Terbesar</option>
    </select>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary w-100">Cari & Urutkan</button>
  </div>
  <div class="col-md-3 text-end">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary w-100">← Kembali</a>
  </div>
</form>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>Tanggal</th>
      <th>Jenis</th>
      <th>Kategori</th>
      <th>Nominal (Rp)</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($keuangan)): ?>
      <tr>
        <td colspan="5" class="text-center text-muted">Tidak ada data keuangan ditemukan.</td>
      </tr>
    <?php else: ?>
      <?php foreach ($keuangan as $item): ?>
        <tr class="<?= $item['jenis'] == 'pengeluaran' ? 'table-danger' : 'table-success' ?>">
          <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
          <td><?= ucfirst($item['jenis']) ?></td>
          <td><?= esc($item['kategori']) ?></td>
          <td><?= number_format($item['nominal'], 0, ',', '.') ?></td>
          <td><?= esc($item['keterangan']) ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
