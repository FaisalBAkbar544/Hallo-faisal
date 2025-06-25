<style>
  #sidebarArtikel {
    position: absolute;
    top: 280;
    right: 0;
    width: 300px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    z-index: 1000;
  }

  /* Jika container utama ada, beri padding kanan agar sidebar tidak tumpang tindih */
  .container {
    position: relative;
    padding-right: 320px;
  }
</style>

<div id="sidebarArtikel" class="card">
    <div class="card-header bg-primary text-white">
        Artikel Terbaru
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="artikel.php?id=2">Pentingnya Rasa Syukur untuk Kesehatan Mental</a>
            <img align="right" src="../assets/images/icon1.jpeg" alt="Olahraga" width="30">
        </li>
        <li class="list-group-item">
            <a href="artikel.php?id=4">Mengatasi Overthinking dengan Mindfulness</a>
            <img align="right" src="../assets/images/icon2.jpeg" alt="Belajar" width="30">
        </li>
        <li class="list-group-item">
            <a href="artikel.php?id=10">Menjaga Kesehatan Jantung Sejak Dini</a>
            <img align="right" src="../assets/images/icon3.jpeg" alt="Mental Health" width="30">
        </li>
        <li class="list-group-item">
            <a href="artikel.php?id=8">Pentingnya Aktivitas Fisik Rutin</a>
            <img align="right" src="../assets/images/icon4.jpeg" alt="Teknologi" width="30">
        </li>
        <li class="list-group-item">
            <a href="artikel.php?id=9">Gizi Seimbang untuk Energi Harian</a>
            <img align="right" src="../assets/images/icon5.jpeg" alt="Air Putih" width="30">
        </li>
    </ul>
</div>
