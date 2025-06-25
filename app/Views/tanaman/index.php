<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Daftar Tanaman</h2>

<a href="<?= base_url('tanaman/tambah') ?>" class="btn btn-success mb-3">+ Tambah Tanaman</a>

<!-- Filter Form -->
<form method="get" action="<?= base_url('tanaman/filter') ?>" class="row mb-3 g-2">
  <div class="col-md-3"><input type="text" name="jenis" class="form-control" placeholder="Jenis"></div>
  <div class="col-md-3"><input type="text" name="lokasi" class="form-control" placeholder="Lokasi"></div>
  <div class="col-md-3">
    <select name="status" class="form-select">
      <option value="">-- Status --</option>
      <option value="tumbuh">Tumbuh</option>
      <option value="siap panen">Siap Panen</option>
      <option value="rusak">Rusak</option>
    </select>
  </div>
  <div class="col-md-3"><button class="btn btn-primary w-100">Filter</button></div>
</form>

<table class="table table-bordered table-hover">
  <thead class="table-secondary">
    <tr>
      <th>Nama</th>
      <th>Jenis</th>
      <th>Varietas</th>
      <th>Lokasi</th>
      <th>Tanggal Tanam</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tanaman as $t): ?>
    <tr>
      <td><?= esc($t['nama']) ?></td>
      <td><?= esc($t['jenis']) ?></td>
      <td><?= esc($t['varietas']) ?></td>
      <td><?= esc($t['lokasi']) ?></td>
      <td><?= date('d/m/Y', strtotime($t['tanggal_tanam'])) ?></td>
      <td><span class="badge bg-<?= $t['status'] === 'rusak' ? 'danger' : ($t['status'] === 'siap panen' ? 'success' : 'info') ?>">
        <?= esc($t['status']) ?>
      </span></td>
      <td>
        <a href="<?= base_url('tanaman/edit/' . $t['id']) ?>" class="btn btn-sm btn-warning">Edit</a>

        <!-- Tombol Hapus -->
        <form action="<?= base_url('tanaman/delete/' . $t['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
          <?= csrf_field() ?>
          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
