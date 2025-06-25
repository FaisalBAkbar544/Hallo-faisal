<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Web Tes DISC</title>

  <link href='https://fonts.googleapis.com/css?family=MedievalSharp' rel='stylesheet' />
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />

  <style>
    body {
      margin: 0;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #343a40;
      transition: left 0.3s ease;
      z-index: 1000;
      overflow-y: auto;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 12px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .sidebar-toggle-btn {
      position: fixed;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      background-color: #343a40;
      color: white;
      border: none;
      padding: 8px 12px;
      font-size: 20px;
      cursor: pointer;
      border-radius: 0 4px 4px 0;
      z-index: 1500;
    }

    .sidebar-open .sidebar {
      left: 0;
    }

    .sidebar-open .sidebar-toggle-btn {
      left: 250px;
      border-radius: 4px 0 0 4px;
    }

    @keyframes marquee {
      0% {
        transform: translateX(100%);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    .marquee-container {
      color: white;
      white-space: nowrap;
      overflow: hidden;
      padding: 10px 20px;
      box-sizing: border-box;
      border-bottom: 1px solid #495057;
    }

    .marquee-text {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 10s linear infinite;
      font-weight: bold;
    }

    .logo-container {
      text-align: center;
      padding: 15px 0;
      border-bottom: 1px solid #495057;
    }

    .logo-container img {
      max-width: 120px;
      height: auto;
    }

    #mainContent {
      transition: margin-left 0.3s ease;
    }

    .sidebar-open #mainContent {
      margin-left: 250px;
    }

    /* Kontainer toggle switch di sidebar */
    .theme-toggle {
      margin-top: 20px;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    /* Label teks di samping switch */
    .theme-label {
      margin-left: 10px;
      color: inherit;
      font-size: 16px;
      font-family: 'IM Fell English SC', serif;
    }

    /* Switch dasar */
    .theme-switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    .theme-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .theme-switch .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 24px;
    }

    .theme-switch .slider:before {
      position: absolute;
      content: "";
      height: 20px;
      width: 20px;
      left: 2px;
      bottom: 2px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    .theme-switch input:checked+.slider {
      background-color: #4f46e5;
      /* Ungu indigo */
    }

    .theme-switch input:checked+.slider:before {
      transform: translateX(26px);
    }
  </style>
</head>

<body>

  <!-- Tombol toggle -->
  <button class="sidebar-toggle-btn" onclick="toggleSidebar()">→</button>

  <!-- Sidebar -->
  <div id="mySidebar" class="sidebar">

    <!-- Logo tepat di atas tombol menu -->
    <div class="logo-container">
      <img src="../assets/images/logo.jpeg" alt="Logo">
    </div>

    <!-- Marquee -->
    <div class="marquee-container">
      <div class="marquee-text">Selamat Datang di Website Test DISC ( Dominance, Influence, Steadiness, Conscientiousness). </div>
    </div>

    <!-- Menu -->
    <a href="../pages/home.php">Home</a>
    <a href="../pages/testDisc.php">Tes DISC</a>
    <a href="../pages/testDisc-riwayat.php">Riwayat Tes</a>

    <a href="#tentangSubmenu" onclick="toggleSubmenu('tentangSubmenu')">Tentang ▾</a>
    <div id="tentangSubmenu" style="display:none; padding-left: 20px;">
      <a href="../pages/tentang-disc.php">Tes DISC</a>
      <a href="../pages/tentangKami.php">Tentang Kami</a>
      <a href="../pages/faq.php">FAQ</a>
    </div>

    <a href="../pages/kontak.php">Kontak</a>
    <a href="../pages/artikel.php">Artikel</a>

    <!-- Toggle Tema -->
    <div class="theme-toggle">
      <label class="theme-switch" title="Ganti tema">
        <input type="checkbox" id="toggle-switch" />
        <span class="slider"></span>
      </label>
      <span class="theme-label">Dark Mode</span>
    </div>

    <?php
    if (!isset($_SESSION['U']) && !isset($_SESSION['P'])) {
      echo '<a href="../pages/login.php">Login</a>';
    } else {
      echo '
        <a href="#akunSubmenu" onclick="toggleSubmenu(\'akunSubmenu\')">Akun ▾</a>
        <div id="akunSubmenu" style="display:none; padding-left: 20px;">
          <a href="../pages/profile.php">Profil Saya</a>
          <a href="../pages/logout.php">Logout</a>
        </div>
      ';
    }
    ?>
  </div>

  <div id="mainContent">
    <!-- Konten utama -->
  </div>

  <script>
    function toggleSidebar() {
      document.body.classList.toggle('sidebar-open');
      const btn = document.querySelector('.sidebar-toggle-btn');
      btn.innerHTML = document.body.classList.contains('sidebar-open') ? '←' : '→';
    }

    function toggleSubmenu(id) {
      var el = document.getElementById(id);
      el.style.display = (el.style.display === 'none') ? 'block' : 'none';
    }
  </script>

</body>

</html>

<?php
ob_end_flush(); // di akhir file
?>