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
    <h2>Laporan Keuangan</h2>
    <table>
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
            <tr>
                <td><?= date('d/m/Y', strtotime($k['tanggal'])) ?></td>
                <td><?= ucfirst($k['jenis']) ?></td>
                <td><?= $k['kategori'] ?></td>
                <td><?= number_format($k['nominal'], 0, ',', '.') ?></td>
                <td><?= $k['keterangan'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
