<?php
if (session_status() === PHP_SESSION_NONE) session_start();

include("../configs/connection.php");

if (!isset($_SESSION['U'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../pages/login.php';</script>";
    exit;
}

$username = $_SESSION['U'];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'"));
$id_user = $user['id_user'];

// Validasi id_result
if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    echo "<div class='alert alert-warning'>ID hasil tidak valid atau tidak tersedia.</div>";
    exit;
}

$id_result = (int)$_GET['id'];

// Ambil data hasil DISC dari database
$result = mysqli_query($connect, "SELECT * FROM disc_results WHERE id_user = $id_user AND id_result = $id_result LIMIT 1");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan untuk hasil tes ini.</div>";
    exit;
}

// Ambil skor dari DB sesuai kolom
$most = [
    'D' => (int)($data['most_d'] ?? 0),
    'I' => (int)($data['most_i'] ?? 0),
    'S' => (int)($data['most_s'] ?? 0),
    'C' => (int)($data['most_c'] ?? 0)
];

$least = [
    'D' => (int)($data['least_d'] ?? 0),
    'I' => (int)($data['least_i'] ?? 0),
    'S' => (int)($data['least_s'] ?? 0),
    'C' => (int)($data['least_c'] ?? 0)
];

$change = [
    'D' => (int)($data['change_d'] ?? 0),
    'I' => (int)($data['change_i'] ?? 0),
    'S' => (int)($data['change_s'] ?? 0),
    'C' => (int)($data['change_c'] ?? 0)
];

function getDominantTrait($scores) {
    $max = max($scores);
    foreach ($scores as $key => $val) {
        if ($val == $max) return $key;
    }
}


$descriptions = [
  'D' => <<<EOD
<h2>Dominance (D)</h2>
<strong>Potret diri:</strong>
<ul>
  <li>Bersaing</li>
  <li>Cepat bertindak</li>
  <li>Berani mengambil risiko</li>
  <li>Menuntut sesuatu</li>
  <li>Memerintah</li>
  <li>Pemrotes</li>
  <li>Rasional</li>
  <li>Berorientasi pada tugas</li>
  <li>Formal</li>
  <li>Bergaya bisnis</li>
  <li>Mandiri / tertutup</li>
  <li>Disiplin</li>
</ul>
<strong>Kelebihan:</strong>
<ul>
  <li>To the Point (langsung)</li>
  <li>Cepat membuat keputusan</li>
  <li>Menyukai perubahan</li>
  <li>Menetapkan banyak sasaran</li>
  <li>Berani mengambil risiko</li>
  <li>Inovatif, kompetitif, efisien</li>
  <li>Menghargai waktu</li>
  <li>Memiliki inisiatif</li>
  <li>Mendobrak status quo</li>
  <li>Berprinsip</li>
</ul>
<strong>Kekurangan:</strong>
<ul>
  <li>Suka melawan</li>
  <li>Tergesa-gesa</li>
  <li>Melanggar peraturan</li>
  <li>Melebihi wewenang</li>
  <li>Tidak sabar</li>
  <li>Kurang mendengar</li>
  <li>Mengambil alih</li>
  <li>Kurang taktis</li>
  <li>Fokus pada tugas</li>
  <li>Kurang perhatian sosial</li>
</ul>
<strong>Kecenderungan:</strong>
<ul>
  <li>Ingin hasil cepat</li>
  <li>Tindakan cepat</li>
  <li>Menyukai tantangan</li>
  <li>Keputusan cepat</li>
  <li>Anti status quo</li>
  <li>Memegang tanggung jawab</li>
  <li>Memecahkan masalah</li>
</ul>
<strong>Lingkungan/Posisi yang Cocok:</strong>
<ul>
  <li>Kekuasaan dan kewenangan</li>
  <li>Tantangan</li>
  <li>Pengembangan diri</li>
  <li>Operasional luas</li>
  <li>Jawaban langsung</li>
  <li>Kebebasan bertindak</li>
  <li>Aktivitas baru</li>
</ul>
<strong>Pengembangan:</strong>
<ul>
  <li>Mempertimbangkan risiko</li>
  <li>Belajar fakta</li>
  <li>Hati-hati mengambil keputusan</li>
  <li>Belajar kerja tim</li>
  <li>Menerima pendapat lain</li>
  <li>Relaksasi dan menikmati hidup</li>
</ul>
EOD,

  'I' => <<<EOD
<h2>Influence (I)</h2>
<strong>Potret diri:</strong>
<ul>
  <li>Antusias</li>
  <li>Percaya diri</li>
  <li>Optimis</li>
  <li>Persuasif</li>
  <li>Spontan</li>
  <li>Ekspresif</li>
  <li>Populer</li>
  <li>Suka bicara</li>
  <li>Terbuka</li>
  <li>Impulsif</li>
</ul>
<strong>Kelebihan:</strong>
<ul>
  <li>Mudah bergaul</li>
  <li>Memotivasi orang lain</li>
  <li>Kreatif</li>
  <li>Persuasif</li>
  <li>Mudah beradaptasi</li>
  <li>Suka bekerja sama</li>
  <li>Spontan dan menyenangkan</li>
</ul>
<strong>Kekurangan:</strong>
<ul>
  <li>Terlalu optimis</li>
  <li>Tidak sabaran</li>
  <li>Mudah bosan</li>
  <li>Kurang fokus</li>
  <li>Kurang detail</li>
  <li>Terkadang kurang konsisten</li>
</ul>
<strong>Kecenderungan:</strong>
<ul>
  <li>Menyukai pengakuan</li>
  <li>Mencari penerimaan sosial</li>
  <li>Suka berinteraksi</li>
  <li>Ekspresif</li>
</ul>
<strong>Lingkungan/Posisi yang Cocok:</strong>
<ul>
  <li>Hubungan sosial terbuka</li>
  <li>Peran yang interaktif</li>
  <li>Posisi public speaking</li>
  <li>Lingkungan yang dinamis</li>
  <li>Perlu apresiasi dan pujian</li>
</ul>
<strong>Pengembangan:</strong>
<ul>
  <li>Belajar fokus</li>
  <li>Mengatur waktu</li>
  <li>Melatih konsistensi</li>
  <li>Belajar mendengar</li>
  <li>Mengendalikan emosi</li>
</ul>
EOD,

  'S' => <<<EOD
<h2>Steadiness (S)</h2>
<strong>Potret diri:</strong>
<ul>
  <li>Setia</li>
  <li>Pendengar yang baik</li>
  <li>Stabil</li>
  <li>Sabar</li>
  <li>Tenang</li>
  <li>Ramah</li>
  <li>Suka mendukung</li>
  <li>Kooperatif</li>
</ul>
<strong>Kelebihan:</strong>
<ul>
  <li>Stabil dalam tekanan</li>
  <li>Bisa diandalkan</li>
  <li>Loyal</li>
  <li>Team player</li>
  <li>Empati tinggi</li>
</ul>
<strong>Kekurangan:</strong>
<ul>
  <li>Terlalu pasif</li>
  <li>Kurang berinisiatif</li>
  <li>Sulit berkata tidak</li>
  <li>Mudah dimanfaatkan</li>
  <li>Kurang ekspresif</li>
</ul>
<strong>Kecenderungan:</strong>
<ul>
  <li>Menghindari konflik</li>
  <li>Menyukai kestabilan</li>
  <li>Butuh waktu beradaptasi</li>
</ul>
<strong>Lingkungan/Posisi yang Cocok:</strong>
<ul>
  <li>Lingkungan yang tenang</li>
  <li>Pekerjaan rutin dan stabil</li>
  <li>Peran pendukung</li>
  <li>Kerja tim</li>
</ul>
<strong>Pengembangan:</strong>
<ul>
  <li>Melatih keberanian</li>
  <li>Belajar berkata tidak</li>
  <li>Berani tampil di depan</li>
  <li>Berani ambil risiko</li>
</ul>
EOD,

  'C' => <<<EOD
<h2>Compliance (C)</h2>
<strong>Potret diri:</strong>
<ul>
  <li>Perfeksionis</li>
  <li>Teliti</li>
  <li>Logis</li>
  <li>Sistematis</li>
  <li>Analitis</li>
  <li>Berorientasi pada kualitas</li>
</ul>
<strong>Kelebihan:</strong>
<ul>
  <li>Detail-oriented</li>
  <li>Standar tinggi</li>
  <li>Berorientasi hasil berkualitas</li>
  <li>Teliti dan hati-hati</li>
</ul>
<strong>Kekurangan:</strong>
<ul>
  <li>Sering menunda keputusan</li>
  <li>Terlalu kritis</li>
  <li>Sulit menerima kesalahan</li>
  <li>Kaku</li>
</ul>
<strong>Kecenderungan:</strong>
<ul>
  <li>Suka kepastian dan aturan</li>
  <li>Menghindari risiko</li>
  <li>Butuh waktu lama untuk membuat keputusan</li>
</ul>
<strong>Lingkungan/Posisi yang Cocok:</strong>
<ul>
  <li>Lingkungan terstruktur</li>
  <li>Pekerjaan dengan SOP jelas</li>
  <li>Posisi kontrol kualitas</li>
  <li>Riset dan analisis</li>
</ul>
<strong>Pengembangan:</strong>
<ul>
  <li>Belajar fleksibilitas</li>
  <li>Berani ambil keputusan cepat</li>
  <li>Menerima ketidaksempurnaan</li>
  <li>Menghargai opini berbeda</li>
</ul>
EOD,
];
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Hasil DISC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div class="container mt-4">
    <h3>Grafik kepribadian Anda:</h3>

    <div style="display: flex; gap: 20px;">
        <div id="graph_most" style="width: 33%; height: 400px;"></div>
        <div id="graph_least" style="width: 33%; height: 400px;"></div>
        <div id="graph_change" style="width: 33%; height: 400px;"></div>
    </div>

    <h4 class="mt-4">Deskripsi Dominan:</h4>
    <ul>
        <li><strong>Most (Public Self):</strong> <?= $descriptions[getDominantTrait($most)] ?></li>
        <li><strong>Least (Private Self):</strong> <?= $descriptions[getDominantTrait($least)] ?></li>
        <li><strong>Change (Perceived Self):</strong> <?= $descriptions[getDominantTrait($change)] ?></li>
    </ul>

    <a href="testDisc-riwayat.php" class="btn btn-secondary mt-3">← Kembali ke Riwayat</a>
</div>

<script>
google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
    function drawChart(elementId, title, dataPoints, color) {
        if (!dataPoints || Object.values(dataPoints).every(v => v === 0)) {
            document.getElementById(elementId).innerHTML = "<p class='text-muted'>Data tidak tersedia.</p>";
            return;
        }

        const data = google.visualization.arrayToDataTable([
            ['Tipe', 'Skor'],
            ['D', dataPoints.D],
            ['I', dataPoints.I],
            ['S', dataPoints.S],
            ['C', dataPoints.C]
        ]);

        const options = {
            title,
            curveType: 'function',
            legend: 'none',
            height: 400,
            pointSize: 6,
            colors: [color],
            vAxis: { gridlines: { count: 5 }, minValue: -8, maxValue: 15 }
        };

        new google.visualization.LineChart(document.getElementById(elementId)).draw(data, options);
    }

    drawChart('graph_most', 'MOST - Public Self', <?= json_encode($most) ?>, '#c0392b');
    drawChart('graph_least', 'LEAST - Private Self', <?= json_encode($least) ?>, '#e67e22');
    drawChart('graph_change', 'CHANGE - Perceived Self', <?= json_encode($change) ?>, '#2980b9');
}
</script>

</body>
</html>
