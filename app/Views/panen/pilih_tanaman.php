<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h3>Pilih Tanaman untuk <?= ucfirst($fitur) ?> panen</h3>
<ul class="list-group">
  <?php foreach ($tanaman as $t): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <?= esc($t['nama']) ?>
      <a href="<?= base_url('panen/' . $fitur . '/' . $t['id']) ?>" class="btn btn-sm btn-primary">Lanjut</a>
    </li>
  <?php endforeach ?>
</ul>

<?= $this->endSection() ?>
