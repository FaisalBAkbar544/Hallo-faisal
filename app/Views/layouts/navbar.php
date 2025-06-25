<!--begin::Sidebar-->
<aside class="app-sidebar shadow" style="background-color: #2e7d32;" data-bs-theme="dark">
  <div class="sidebar-brand text-center py-3">
    <!-- Logo -->
   <img src="<?= base_url('../../public/img/logo.jpeg') ?>" alt="Logo AgriStock" class="img-fluid" style="max-height: 50px; border-radius: 50%;">
    
    <!-- Nama Brand -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link d-block mt-2 text-white">
      <span class="brand-text fw-light">AgriStock</span>
    </a>
  </div>

  <!-- Marquee Text -->
  <div class="px-3 py-2">
    <marquee behavior="scroll" direction="left" scrollamount="4" class="fw-bold fs-5" style="color: #c8e6c9;">
      Selamat datang di AgriStock - Sistem Informasi Pertanian Terpadu
    </marquee>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item border-bottom border-light-subtle py-2">
          <a href="<?= base_url('dashboard') ?>" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-speedometer2 me-2"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!-- Manajemen Tanaman -->
        <li class="nav-item border-bottom border-light-subtle py-2 has-treeview">
          <a href="#" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-flower1 me-2"></i>
            <span>Manajemen Tanaman</span> <i class="nav-arrow bi bi-chevron-right float-end"></i>
          </a>
          <ul class="nav nav-treeview ms-3">
            <li class="nav-item py-1"><a href="<?= base_url('tanaman') ?>" class="nav-link text-white">Daftar Tanaman</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('tanaman/tambah') ?>" class="nav-link text-white">Tambah/Edit Tanaman</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('perawatan/1') ?>" class="nav-link text-white">Riwayat Perawatan</a></li>
          </ul>
        </li>

        <!-- Panen dan Produksi -->
        <li class="nav-item border-bottom border-light-subtle py-2 has-treeview">
          <a href="#" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-basket me-2"></i>
            <span>Panen & Produksi</span> <i class="nav-arrow bi bi-chevron-right float-end"></i>
          </a>
          <ul class="nav nav-treeview ms-3">
            <li class="nav-item py-1"><a href="<?= base_url('panen/pilih/catat') ?>" class="nav-link text-white">Catat Hasil Panen</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('panen/pilih/riwayat') ?>" class="nav-link text-white">Riwayat Panen</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('panen/pilih/estimasi') ?>" class="nav-link text-white">Estimasi Panen Berikutnya</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('panen/pilih/distribusi') ?>" class="nav-link text-white">Distribusi Hasil Panen</a></li>
          </ul>
        </li>

        <!-- Pencatatan Keuangan -->
        <li class="nav-item border-bottom border-light-subtle py-2 has-treeview">
          <a href="#" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-cash-coin me-2"></i>
            <span>Pencatatan Keuangan</span> <i class="nav-arrow bi bi-chevron-right float-end"></i>
          </a>
          <ul class="nav nav-treeview ms-3">
            <li class="nav-item py-1"><a href="<?= base_url('keuangan/pengeluaran') ?>" class="nav-link text-white">Catat Pengeluaran</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('keuangan/pemasukan') ?>" class="nav-link text-white">Catat Pemasukan</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('keuangan/laporan') ?>" class="nav-link text-white">Laporan Bulanan</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('keuangan/grafik') ?>" class="nav-link text-white">Grafik Untung/Rugi</a></li>
          </ul>
        </li>

        <!-- Laporan -->
        <li class="nav-item border-bottom border-light-subtle py-2 has-treeview">
          <a href="#" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-clipboard-data me-2"></i>
            <span>Laporan</span> <i class="nav-arrow bi bi-chevron-right float-end"></i>
          </a>
          <ul class="nav nav-treeview ms-3">
            <li class="nav-item py-1"><a href="<?= base_url('laporan/hasil-panen') ?>" class="nav-link text-white">Laporan Hasil Panen</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('laporan/keuangan') ?>" class="nav-link text-white">Laporan Keuangan</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('laporan/cetak-pdf/panen') ?>" target="_blank" class="nav-link text-white">Cetak PDF Panen</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('laporan/cetak-pdf/keuangan') ?>" target="_blank" class="nav-link text-white">Cetak PDF Keuangan</a></li>
          </ul>
        </li>

        <!-- Pengaturan & Akun -->
        <li class="nav-item border-bottom border-light-subtle py-2 has-treeview">
          <a href="#" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-person-gear me-2"></i>
            <span>Pengaturan & Akun</span> <i class="nav-arrow bi bi-chevron-right float-end"></i>
          </a>
          <ul class="nav nav-treeview ms-3">
            <li class="nav-item py-1"><a href="<?= base_url('akun/ubah') ?>" class="nav-link text-white">Ubah Akun</a></li>
            <li class="nav-item py-1"><a href="<?= base_url('akun/profil') ?>" class="nav-link text-white">Ubah Profil</a></li>
          </ul>
        </li>
        <!-- Log Out -->
        <li class="nav-item border-top border-light-subtle py-2">
          <a href="<?= base_url('login') ?>" class="nav-link text-white px-3 rounded-start">
            <i class="nav-icon bi bi-box-arrow-right me-2"></i>
            <span>Log Out</span>
          </a>
        </li>
        
      </ul>
    </nav>
  </div>


</aside>
<!--end::Sidebar-->

<!-- Hover effect tambahan -->
<style>
  .nav-link:hover {
    background-color: #256d27 !important;
  }
</style>
