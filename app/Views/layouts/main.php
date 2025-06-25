<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<?php
use App\Models\TanamanModel;
use App\Models\PanenModel;
use App\Models\KeuanganModel;

$session = session();
$userId = $session->get('user_id');

// Tanaman
$tanamanModel = new TanamanModel();
$jumlahTanaman = $tanamanModel->where('user_id', $userId)->countAllResults();

// Panen Total
$panenModel = new PanenModel();
$jumlahPanen = $panenModel->join('tanaman', 'tanaman.id = panen.tanaman_id')
                          ->where('tanaman.user_id', $userId)
                          ->selectSum('jumlah')
                          ->first()['jumlah'] ?? 0;

// Panen per Bulan
$panenPerBulan = $panenModel->select("MONTH(tanggal) AS bulan, SUM(jumlah) AS total")
    ->join('tanaman', 'tanaman.id = panen.tanaman_id')
    ->where('tanaman.user_id', $userId)
    ->groupBy('bulan')
    ->orderBy('bulan', 'ASC')
    ->findAll();

$labels = [];
$data = [];
$bulanIndo = [1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
foreach ($panenPerBulan as $row) {
    $bulanIndex = (int)$row['bulan'];
    if (isset($bulanIndo[$bulanIndex])) {
        $labels[] = $bulanIndo[$bulanIndex];
        $data[] = (int)$row['total'];
    }
}


// Keuangan
$keuanganModel = new KeuanganModel();
$totalPemasukan = $keuanganModel->where(['user_id' => $userId, 'jenis' => 'pemasukan'])->selectSum('nominal')->first()['nominal'] ?? 0;
$totalPengeluaran = $keuanganModel->where(['user_id' => $userId, 'jenis' => 'pengeluaran'])->selectSum('nominal')->first()['nominal'] ?? 0;
?>

<div class="container-fluid px-3 px-lg-4 mt-4">
  <h4 class="mb-3">Selamat datang kembali di <span class="text-success">AgriStock</span></h4>
  <p class="text-muted mb-4">Ringkasan aktivitas pertanian kamu:</p>

  <!-- Ringkasan Kartu -->
  <div class="row g-3">
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card bg-success text-white shadow-sm h-100">
        <div class="card-body text-center p-3">
          <i class="bi bi-flower1 fs-4 mb-2 d-block"></i>
          <div class="fw-semibold">Jumlah Tanaman</div>
          <div class="fs-5 fw-bold"><?= $jumlahTanaman ?></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card bg-primary text-white shadow-sm h-100">
        <div class="card-body text-center p-3">
          <i class="bi bi-basket fs-4 mb-2 d-block"></i>
          <div class="fw-semibold">Total Panen (kg)</div>
          <div class="fs-5 fw-bold"><?= $jumlahPanen ?></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card bg-info text-white shadow-sm h-100">
        <div class="card-body text-center p-3">
          <i class="bi bi-cash-stack fs-4 mb-2 d-block"></i>
          <div class="fw-semibold">Total Pemasukan</div>
          <div class="fs-5 fw-bold">Rp <?= number_format($totalPemasukan, 0, ',', '.') ?></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card bg-danger text-white shadow-sm h-100">
        <div class="card-body text-center p-3">
          <i class="bi bi-cash-coin fs-4 mb-2 d-block"></i>
          <div class="fw-semibold">Total Pengeluaran</div>
          <div class="fs-5 fw-bold">Rp <?= number_format($totalPengeluaran, 0, ',', '.') ?></div>
        </div>
      </div>
    </div>
  </div>

 <!-- Grafik Panen per Bulan -->
<div class="card mt-5 shadow-sm">
  <div class="card-header bg-light">
    <h5 class="mb-0">Grafik Panen per Bulan</h5>
  </div>
  <div class="card-body">
    <canvas id="grafikPanen" style="max-height: 220px; width: 100%;"></canvas>
  </div>
</div>

<!-- Grafik Keuangan -->
<div class="card mt-4 shadow-sm mb-5">
  <div class="card-header bg-light">
    <h5 class="mb-0">Grafik Perbandingan Pemasukan vs Pengeluaran</h5>
  </div>
  <div class="card-body">
    <canvas id="grafikKeuangan" style="max-height: 220px; width: 100%;"></canvas>
  </div>
</div>


<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Grafik Panen
  new Chart(document.getElementById('grafikPanen'), {
    type: 'bar',
    data: {
      labels: <?= json_encode($labels) ?>,
      datasets: [{
        label: 'Jumlah Panen (kg)',
        data: <?= json_encode($data) ?>,
        backgroundColor: 'rgba(40, 167, 69, 0.7)',
        borderRadius: 4
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { stepSize: 10 }
        }
      }
    }
  });

  // Grafik Keuangan
  new Chart(document.getElementById('grafikKeuangan'), {
    type: 'doughnut',
    data: {
      labels: ['Pemasukan', 'Pengeluaran'],
      datasets: [{
        data: [<?= $totalPemasukan ?>, <?= $totalPengeluaran ?>],
        backgroundColor: ['rgba(23, 162, 184, 0.8)', 'rgba(220, 53, 69, 0.8)'],
        borderColor: ['#fff', '#fff'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            boxWidth: 12,
            padding: 15
          }
        }
      }
    }
  });
</script>

<?= $this->endSection() ?>
