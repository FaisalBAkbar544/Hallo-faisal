<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Grafik Untung / Rugi Bulanan</h2>

<div class="mb-3">
  <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>

<div class="card shadow-sm mb-5">
  <div class="card-body">
    <div id="chart-keuangan" style="height: 300px;"></div>
  </div>
</div>

<!-- ApexCharts Script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  fetch("<?= base_url('keuangan/data-grafik') ?>")
    .then(response => response.json())
    .then(data => {
      const bulan = data.map(item => "Bulan " + item.bulan);
      const pemasukan = data.map(item => parseInt(item.total_pemasukan));
      const pengeluaran = data.map(item => parseInt(item.total_pengeluaran));

      const options = {
        chart: { type: 'bar', height: 300 },
        series: [
          { name: 'Pemasukan', data: pemasukan },
          { name: 'Pengeluaran', data: pengeluaran }
        ],
        xaxis: {
          categories: bulan,
          labels: { rotate: -45 }
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
            columnWidth: '50%'
          }
        },
        colors: ['#28a745', '#dc3545'],
        dataLabels: { enabled: false },
        legend: {
          position: 'top',
          horizontalAlign: 'center'
        }
      };

      new ApexCharts(document.querySelector("#chart-keuangan"), options).render();
    });
</script>

<?= $this->endSection() ?>
