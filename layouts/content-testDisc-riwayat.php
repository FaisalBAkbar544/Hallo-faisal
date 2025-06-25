<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include("../configs/connection.php");

if (!isset($_SESSION['U'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../pages/login.php';</script>";
    exit;
}

$username = $_SESSION['U'];
$user_query = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_assoc($user_query);
$id_user = $user['id_user'];

// Ambil riwayat DISC user (menggunakan kolom change_d s/d change_c)
$query = "SELECT id_result, change_d, change_i, change_s, change_c, created_at FROM disc_results WHERE id_user = '$id_user' ORDER BY created_at DESC";
$result = mysqli_query($connect, $query);

$data_chart = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data_chart[] = [
        'id_result' => $row['id_result'],
        'tanggal' => $row['created_at'],
        'D' => (int)$row['change_d'],
        'I' => (int)$row['change_i'],
        'S' => (int)$row['change_s'],
        'C' => (int)$row['change_c'],
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Tes DISC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class="container mt-4">
    <h3>Riwayat Tes DISC Anda</h3>

    <?php if (empty($data_chart)): ?>
        <div class="alert alert-info">Belum ada hasil tes DISC yang tersimpan.</div>
    <?php else: ?>

        <!-- Grafik -->
        <div id="disc_chart" style="width:100%; height: 500px;"></div>

        <!-- Tabel Riwayat -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Tanggal Tes</th>
                    <th>Dominance (D)</th>
                    <th>Influence (I)</th>
                    <th>Steadiness (S)</th>
                    <th>Compliance (C)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_chart as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                        <td><?= $row['D'] ?></td>
                        <td><?= $row['I'] ?></td>
                        <td><?= $row['S'] ?></td>
                        <td><?= $row['C'] ?></td>
                        <td>
                            <a href="testDisc-detail.php?id=<?= $row['id_result'] ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Google Chart Script -->
        <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tanggal');
            data.addColumn('number', 'D');
            data.addColumn('number', 'I');
            data.addColumn('number', 'S');
            data.addColumn('number', 'C');

            data.addRows([
                <?php foreach ($data_chart as $row): ?>
                    ['<?= date("d/m/Y H:i", strtotime($row['tanggal'])) ?>', <?= $row['D'] ?>, <?= $row['I'] ?>, <?= $row['S'] ?>, <?= $row['C'] ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Perkembangan Skor DISC Anda',
                curveType: 'function',
                legend: { position: 'bottom' },
                height: 500
            };

            var chart = new google.visualization.LineChart(document.getElementById('disc_chart'));
            chart.draw(data, options);
        }
        </script>

    <?php endif; ?>
</div>
</body>
</html>
