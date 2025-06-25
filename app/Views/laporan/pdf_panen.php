<!DOCTYPE html>
<html>
<head>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Hasil Panen</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>ID Tanaman</th>
                <th>Jumlah (kg)</th>
                <th>Kualitas</th>
                <th>Estimasi Berikutnya</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($panen as $p): ?>
            <tr>
                <td><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
                <td><?= $p['tanaman_id'] ?></td>
                <td><?= $p['jumlah'] ?></td>
                <td><?= $p['kualitas'] ?></td>
                <td><?= $p['estimasi_panen_berikut'] ?? '-' ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
