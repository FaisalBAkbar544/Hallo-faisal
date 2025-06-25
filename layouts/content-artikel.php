<?php
// Daftar artikel
$articles = [
    1 => ["title" => "Mengelola Stres di Era Modern", "date" => "2025-06-01"],
    2 => ["title" => "Pentingnya Rasa Syukur untuk Kesehatan Mental", "date" => "2025-06-03"],
    3 => ["title" => "Cara Meningkatkan Rasa Percaya Diri", "date" => "2025-06-05"],
    4 => ["title" => "Mengatasi Overthinking dengan Mindfulness", "date" => "2025-06-07"],
    5 => ["title" => "Kekuatan Self-Talk Positif dalam Kehidupan", "date" => "2025-06-09"],
    6 => ["title" => "Manfaat Tidur Berkualitas bagi Tubuh", "date" => "2025-06-11"],
    7 => ["title" => "Air Putih: Cairan Ajaib untuk Hidup Sehat", "date" => "2025-06-13"],
    8 => ["title" => "Pentingnya Aktivitas Fisik Rutin", "date" => "2025-06-15"],
    9 => ["title" => "Gizi Seimbang untuk Energi Harian", "date" => "2025-06-17"],
    10 => ["title" => "Menjaga Kesehatan Jantung Sejak Dini", "date" => "2025-06-19"],
];

$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'date';
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'asc';

function sort_articles(&$articles, $sort_by, $sort_order) {
    uasort($articles, function($a, $b) use ($sort_by, $sort_order) {
        if ($sort_by === 'title') {
            $cmp = strcasecmp($a['title'], $b['title']);
        } else {
            $cmp = strcmp($a['date'], $b['date']);
        }
        return $sort_order === 'asc' ? $cmp : -$cmp;
    });
}

if (!$article_id) {
    if ($search !== '') {
        $articles = array_filter($articles, function($article) use ($search) {
            return stripos($article['title'], $search) !== false;
        });
    }
    sort_articles($articles, $sort_by, $sort_order);
}
?>

<!-- Tambahkan link Bootstrap 5 CSS (pastikan sudah include di layout utama jika ada) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-3">

<?php if ($article_id && isset($articles[$article_id])): ?>
    <h2><?= htmlspecialchars($articles[$article_id]['title']) ?></h2>
    <small class="text-muted">Dipublikasikan: <?= htmlspecialchars($articles[$article_id]['date']) ?></small>
    <hr>
    <?php
    $file = __DIR__ . "/artikel/artikel-$article_id.php";
    if (file_exists($file)) {
        include($file);
    } else {
        echo "<div class='alert alert-warning'>Konten artikel tidak ditemukan.</div>";
    }
    ?>
    <hr>
    <a href="?">← Kembali ke daftar artikel</a>

<?php else: ?>
    <h2>Daftar Artikel</h2>

    <!-- Form pencarian dan sorting -->
    <form method="get" class="row g-2 align-items-center mb-3">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Cari judul artikel..." value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-3">
            <select name="sort_by" class="form-select">
                <option value="date" <?= $sort_by === 'date' ? 'selected' : '' ?>>Urutkan berdasarkan tanggal</option>
                <option value="title" <?= $sort_by === 'title' ? 'selected' : '' ?>>Urutkan berdasarkan judul</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort_order" class="form-select">
                <option value="asc" <?= $sort_order === 'asc' ? 'selected' : '' ?>>Naik (A-Z / Terlama)</option>
                <option value="desc" <?= $sort_order === 'desc' ? 'selected' : '' ?>>Turun (Z-A / Terbaru)</option>
            </select>
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Cari & Urutkan</button>
        </div>
    </form>

    <?php if (empty($articles)): ?>
        <div class="alert alert-info">Tidak ditemukan artikel dengan kriteria tersebut.</div>
    <?php else: ?>
        <ul class="list-group">
        <?php foreach ($articles as $id => $article): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="?id=<?= $id ?>"><?= htmlspecialchars($article['title']) ?></a>
                <small class="text-muted"><?= htmlspecialchars($article['date']) ?></small>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<?php endif; ?>
</div>
