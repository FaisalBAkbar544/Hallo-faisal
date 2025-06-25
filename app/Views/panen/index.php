<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>Catat Hasil Panen</h2>
<form method="post" action="<?= base_url('panen/simpan') ?>">
  <input type="hidden" name="tanaman_id" value="<?= $tanaman_id ?>">
  <div class="mb-3"><label>Tanggal</label><input type="date" name="tanggal" class="form-control" required></div>
  <div class="mb-3"><label>Jumlah (kg)</label><input type="number" name="jumlah" class="form-control" required></div>
  <div class="mb-3"><label>Kualitas</label><input type="text" name="kualitas" class="form-control"></div>
  <div class="mb-3"><label>Estimasi Panen Berikutnya</label><input type="date" name="estimasi" class="form-control"></div>
  <div class="mb-3"><label>Distribusi Hasil Panen</label>
    <input type="number" name="jual" placeholder="Jual (kg)" class="form-control mb-2">
    <input type="number" name="konsumsi" placeholder="Konsumsi (kg)" class="form-control mb-2">
    <input type="number" name="simpan" placeholder="Simpan (kg)" class="form-control">
  </div>
  <button class="btn btn-success">Simpan</button>
</form>

<h3 class="mt-5">Riwayat Panen</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Tanggal</th><th>Jumlah</th><th>Kualitas</th><th>Estimasi Berikutnya</th><th>Distribusi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($panen as $p): ?>
      <tr>
        <td><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
        <td><?= $p['jumlah'] ?> kg</td>
        <td><?= esc($p['kualitas']) ?></td>
        <td><?= $p['estimasi_panen_berikut'] ? date('d/m/Y', strtotime($p['estimasi_panen_berikut'])) : '-' ?></td>
        <td>
          Jual: <?= $p['distribusi_jual'] ?> kg <br>
          Konsumsi: <?= $p['distribusi_konsumsi'] ?> kg <br>
          Simpan: <?= $p['distribusi_simpan'] ?> kg
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
