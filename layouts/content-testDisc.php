<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['U'])) {
    echo "<div style='color:red;'>Web terjadi error</div>";
} else {
    echo "<div style='color:green;'> Selamat datang, " . $_SESSION['U'] . "</div>";
}
include("../configs/connection.php");

if (!isset($_SESSION['U']) || empty($_SESSION['U'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../pages/login.php';</script>";
    exit;
}

$username = $_SESSION['U'];
$user_query = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' LIMIT 1");
$user = mysqli_fetch_assoc($user_query);

if (!$user) {
    echo "<script>alert('User tidak ditemukan. Silakan login ulang.'); window.location.href='../pages/login.php';</script>";
    exit;
}

$id_user = $user['id_user'];

$disc_data = [ 
    "Gampang gaul", "Mudah setuju", "Percaya", "Mudah percaya pada orang", 
    "Petualang", "Mengambil resiko", "Toleran", "Menghormati",
    "Lembut suara", "Pendiam", "Optimistik", "Visioner",
    "Pusat Perhatian", "Suka gaul", "Pendamai", "Membawa Harmoni",
    "Menyemangati orang", "Berusaha sempurna", "Bagian dari tim", "Ingin membuat tujuan",
    "Pemimpin alami", "Suka membantu", "Menyelesaikan tugas dengan cepat", "Dapat dipercaya",
    "Pekerja keras", "Penuh ide", "Berani", "Fokus",
    "Teliti", "Ramah", "Sopan", "Cerdas",
    "Suka tantangan", "Menghargai orang lain", "Optimis", "Penyabar",
    "Bertanggung jawab", "Bijaksana", "Adil", "Komunikatif",
    "Mandiri", "Suka berbagi", "Inovatif", "Berpikir kreatif",
    "Menjaga hubungan", "Penyelesaian masalah", "Peka terhadap lingkungan", "Suka berorganisasi",
    "Suka membantu orang lain", "Berfikir analitis", "Tegas", "Cepat belajar",
    "Berpikir positif", "Berfokus pada tujuan", "Menghargai waktu", "Berorientasi pada hasil",
    "Empati", "Fleksibel", "Mampu beradaptasi", "Berpikir luas",
    "Suka berbicara", "Suka bertindak", "Tenang dalam tekanan", "Mencari solusi",
    "Berani mengambil keputusan", "Bergairah", "Mampu bekerja sama", "Mendengarkan dengan baik",
    "Menjadi teladan", "Memotivasi diri", "Penuh perhatian", "Pemecah masalah",
    "Mampu memimpin", "Suka mengejar tujuan", "Peduli terhadap orang lain", "Kreatif dalam bekerja",
    "Suka berinovasi", "Bertanggung jawab pada pekerjaan", "Mudah beradaptasi", "Memiliki motivasi tinggi",
    "Menyukai perubahan", "Tangguh", "Mudah bergaul", "Cerdas dalam mengelola waktu",
    "Suka berkolaborasi", "Berpikir strategis", "Penuh antusiasme", "Bekerja dengan penuh dedikasi",
    "Bertindak dengan penuh keyakinan", "Menghargai kerja tim", "Mengikuti perkembangan teknologi",
    "Dapat mengelola konflik", "Dapat dipercaya", "Mampu memotivasi orang lain",
    "Menjaga keseimbangan hidup", "Mendukung tujuan bersama", "Mencapai tujuan dalam waktu singkat"
];
$labels = ['D', 'I', 'S', 'C'];
if (!isset($_SESSION['disc_answers'])) $_SESSION['disc_answers'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset']) && $_POST['reset'] == "1") {
    $_SESSION['disc_answers'] = [];
    header("Location: ?");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_all'])) {
    $valid = true;
    for ($i = 1; $i <= 24; $i++) {
        if (!isset($_POST["most_$i"]) || !isset($_POST["least_$i"])) {
            $valid = false;
            break;
        }
        $_SESSION['disc_answers'][$i] = [
            'most' => $_POST["most_$i"],
            'least' => $_POST["least_$i"]
        ];
    }

    if ($valid) {
        header("Location: ?result=1");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Harap isi semua jawaban sebelum submit.</div>";
    }
}

if (isset($_GET['result']) && count($_SESSION['disc_answers']) == 24) {
    $most_score = $least_score = $change_score = array_fill_keys($labels, 0);
    foreach ($_SESSION['disc_answers'] as $no => $answer) {
        $base = ($no - 1) * 4;
        foreach ($labels as $i => $label) {
            if ($answer['most'] === $disc_data[$base + $i]) $most_score[$label]++;
            if ($answer['least'] === $disc_data[$base + $i]) $least_score[$label]++;
        }
    }
    foreach ($labels as $l) $change_score[$l] = $most_score[$l] - $least_score[$l];

    $stmt = mysqli_prepare($connect, "
        INSERT INTO disc_results (
            id_user,
            most_d, most_i, most_s, most_c,
            least_d, least_i, least_s, least_c,
            change_d, change_i, change_s, change_c
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    mysqli_stmt_bind_param(
        $stmt,
        "iiiiiiiiiiiii",
        $id_user,
        $most_score['D'], $most_score['I'], $most_score['S'], $most_score['C'],
        $least_score['D'], $least_score['I'], $least_score['S'], $least_score['C'],
        $change_score['D'], $change_score['I'], $change_score['S'], $change_score['C']
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    function getDominantTrait($scores) {
        $max = max($scores);
        foreach ($scores as $key => $value) {
            if ($value == $max) return $key;
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


    <h3>Hasil Tes DISC</h3>
    <p>Grafik kepribadian Anda:</p>

    <div style="display:flex; gap:20px;">
        <div id="graph_most" style="width: 33%; height: 400px;"></div>
        <div id="graph_least" style="width: 33%; height: 400px;"></div>
        <div id="graph_change" style="width: 33%; height: 400px;"></div>
    </div>

    <h4>Deskripsi Dominan:</h4>
    <ul>
        <li><strong>Most (Public Self):</strong> <?= $descriptions[getDominantTrait($most_score)] ?></li>
        <li><strong>Least (Private Self):</strong> <?= $descriptions[getDominantTrait($least_score)] ?></li>
        <li><strong>Change (Perceived Self):</strong> <?= $descriptions[getDominantTrait($change_score)] ?></li>
    </ul>

    <form method="POST" style="margin-top: 20px;">
        <a href="?" class="btn btn-secondary">Ulangi Tes</a>
    </form>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(() => {
            function draw(id, title, dataPoints, color) {
                const data = google.visualization.arrayToDataTable([
                    ['Tipe', 'Skor'],
                    ['D', dataPoints['D']],
                    ['I', dataPoints['I']],
                    ['S', dataPoints['S']],
                    ['C', dataPoints['C']]
                ]);
                const options = { title, legend: 'none', colors: [color], curveType: 'function', height: 400 };
                new google.visualization.LineChart(document.getElementById(id)).draw(data, options);
            }
            draw('graph_most', 'MOST - Public Self', <?= json_encode($most_score) ?>, '#c0392b');
            draw('graph_least', 'LEAST - Private Self', <?= json_encode($least_score) ?>, '#e67e22');
            draw('graph_change', 'CHANGE - Perceived Self', <?= json_encode($change_score) ?>, '#2980b9');
        });
    </script>
    <?php
    unset($_SESSION['disc_answers']);
    exit;
}

if (!isset($_GET['start'])) {
    ?>
    <div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">
        <h4><strong>INSTRUKSI :</strong></h4>
        <p>Pada tiap nomor di bawah ini memuat 4 (empat) pernyataan. Anda harus:</p>
        <ol>
            <li>Memberi tanda <strong>[X]</strong> pada kolom <strong>[P]</strong> di samping kalimat yang <strong>PALING menggambarkan</strong> diri anda</li>
            <li>Memberi tanda <strong>[X]</strong> pada kolom <strong>[K]</strong> di samping kalimat yang <strong>PALING TIDAK menggambarkan</strong> diri anda</li>
        </ol>
        <p><strong>PERHATIKAN:</strong> <em>Setiap nomor hanya boleh ada 1 tanda [X] di kolom P dan 1 tanda [X] di kolom K.</em></p>
        <form method="get">
            <button type="submit" name="start" value="1" class="btn btn-primary">Mulai Tes</button>
        </form>
    </div>

    <hr>
    <h4>Riwayat Tes Anda</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Tanggal Tes</th>
                <th>D</th>
                <th>I</th>
                <th>S</th>
                <th>C</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $riwayat = mysqli_query($connect, "SELECT * FROM disc_results WHERE id_user = '$id_user' ORDER BY created_at DESC");
            if (mysqli_num_rows($riwayat) == 0) {
                echo "<tr><td colspan='5' class='text-center'>Belum ada riwayat tes.</td></tr>";
            } else {
                while ($r = mysqli_fetch_assoc($riwayat)) {
                    echo "<tr>
                        <td>{$r['created_at']}</td>
                        <td>{$r['change_d']}</td>
                        <td>{$r['change_i']}</td>
                        <td>{$r['change_s']}</td>
                        <td>{$r['change_c']}</td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <?php
    exit;
}
?>

<h4>DISC Test - Semua Soal</h4>
<form method="POST" id="discForm">
    <div style="max-height: 600px; overflow-y: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pernyataan</th>
                    <th>Most (P)</th>
                    <th>Least (K)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 24; $i++) {
                    $data = array_slice($disc_data, ($i - 1) * 4, 4);
                    foreach ($data as $idx => $item) {
                        echo "<tr";
                        if ($idx == 0) echo " id='soal_$i'";
                        echo ">";
                        if ($idx == 0) echo "<td rowspan='4'>$i</td>";
                        echo "<td>$item</td>
                              <td><input type='radio' name='most_$i' value='$item' class='most' data-no='$i' required></td>
                              <td><input type='radio' name='least_$i' value='$item' class='least' data-no='$i' required></td>
                          </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        <button type="submit" name="submit_all" class="btn btn-primary">Submit Jawaban</button>
        <button type="submit" name="reset" value="1" class="btn btn-danger">Reset Jawaban</button>
    </div>
</form>

<script>
    function updateNavButtonState() {
        for (let i = 1; i <= 24; i++) {
            const mostChecked = document.querySelector(`input[name="most_${i}"]:checked`);
            const leastChecked = document.querySelector(`input[name="least_${i}"]:checked`);
            const navBtn = document.querySelector(`#navBtn_${i}`);
            if (navBtn) {
                if (mostChecked && leastChecked) {
                    navBtn.classList.remove('btn-outline-secondary');
                    navBtn.classList.add('btn-success');
                } else {
                    navBtn.classList.remove('btn-success');
                    navBtn.classList.add('btn-outline-secondary');
                }
            }
        }
    }

    document.querySelectorAll('input[type=radio]').forEach(input => {
        input.addEventListener('change', updateNavButtonState);
    });

    window.addEventListener('DOMContentLoaded', updateNavButtonState);

    document.querySelector('button[name="reset"]').addEventListener('click', () => {
        document.querySelectorAll('input[type=radio]').forEach(radio => radio.checked = false);
        updateNavButtonState();
    });
</script>
