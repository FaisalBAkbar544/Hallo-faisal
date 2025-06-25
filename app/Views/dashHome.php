<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<main class="app-main">
  <div class="container-lg px-1 mx-auto">

    <!-- Heading -->
    <h1 class="mt-4">Selamat Datang di <span class="text-success">AgriStock</span></h1>
    <p class="lead">Sistem Inventaris Tanaman dan Manajemen Usaha Pertanian</p>

    <!-- Highlight Section -->
    <div class="card my-4 text-white border border-secondary"
         style="background-image: url('<?= base_url('public/img/bg-petani.jpeg') ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 300px;
                position: relative;
                overflow: hidden;">
      <div class="card-body bg-dark bg-opacity-50 rounded p-4">
        <p class="fs-5 fw-semibold">
          Aplikasi ini membantu kamu mencatat dan memantau aktivitas pertanian, mulai dari pengelolaan tanaman hingga pencatatan panen dan keuangan.
        </p>
        <p class="fs-6">
          Silakan gunakan menu di sidebar untuk mengakses fitur-fitur utama.
        </p>
      </div>
    </div>

    <!-- Shortcut Menu -->
  <div class="row g-4">
    <!-- Manajemen Tanaman -->
    <div class="col-md-3">
        <div class="card text-center h-100 shadow-sm border border-secondary">
        <div class="card-body">
            <i class="bi bi-flower1 display-4 text-success"></i>
            <h5 class="card-title mt-3">Manajemen Tanaman</h5>
            <a href="<?= base_url('tanaman') ?>" class="btn btn-outline-success btn-sm mt-2">Masuk</a>
        </div>
        </div>
    </div>

    <!-- Panen & Produksi -->
    <div class="col-md-3">
        <div class="card text-center h-100 shadow-sm border border-secondary">
        <div class="card-body">
            <i class="bi bi-basket display-4 text-primary"></i>
            <h5 class="card-title mt-3">Panen & Produksi</h5>
            <a href="<?= base_url('panen/pilih/catat') ?>" class="btn btn-outline-primary btn-sm mt-2">Masuk</a>
        </div>
        </div>
    </div>

    <!-- Keuangan -->
    <div class="col-md-3">
        <div class="card text-center h-100 shadow-sm border border-secondary">
        <div class="card-body">
            <i class="bi bi-cash-coin display-4 text-danger"></i>
            <h5 class="card-title mt-3">Keuangan</h5>
            <a href="<?= base_url('keuangan/laporan') ?>" class="btn btn-outline-danger btn-sm mt-2">Masuk</a>
        </div>
        </div>
    </div>

    <!-- Pengaturan Akun -->
    <div class="col-md-3">
        <div class="card text-center h-100 shadow-sm border border-secondary">
        <div class="card-body">
            <i class="bi bi-person-gear display-4 text-dark"></i>
            <h5 class="card-title mt-3">Pengaturan Akun</h5>
            <a href="<?= base_url('akun/profil') ?>" class="btn btn-outline-dark btn-sm mt-2">Masuk</a>
        </div>
        </div>
    </div>
    </div>


    <!-- Testimoni Section -->
    <div class="card my-5 shadow-sm border border-secondary">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Apa Kata Petani?</h5>
      </div>
      <div class="card-body">
        <div class="row g-4">

          <div class="col-md-4">
            <div class="card h-100 border border-secondary shadow-sm">
              <div class="card-body text-center">
                <img src="<?= base_url('public/img/petani1.jpeg') ?>" class="rounded-circle mb-3" width="80" height="80" alt="Petani 1">
                <p class="fw-semibold mb-1">Pak Muzadi</p>
                <small class="text-muted">Petani Sayur, Banjar</small>
                <p class="mt-3">“Sejak pakai AgriStock, saya bisa mencatat hasil panen dan keuangan dengan mudah. Sangat membantu!”</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card h-100 border border-secondary shadow-sm">
              <div class="card-body text-center">
                <img src="<?= base_url('public/img/petani2.jpeg') ?>" class="rounded-circle mb-3" width="80" height="80" alt="Petani 2">
                <p class="fw-semibold mb-1">Bu Sari</p>
                <small class="text-muted">Petani Padi, Hulu Sungai</small>
                <p class="mt-3">“Fitur pencatatan panen dan laporan sangat mudah digunakan, cocok untuk petani seperti saya.”</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card h-100 border border-secondary shadow-sm">
              <div class="card-body text-center">
                <img src="<?= base_url('public/img/petani3.jpeg') ?>" class="rounded-circle mb-3" width="80" height="80" alt="Petani 3">
                <p class="fw-semibold mb-1">Pak Joko</p>
                <small class="text-muted">Petani Cabai, Barito</small>
                <p class="mt-3">“Aplikasinya ringan dan tampilan mudah dipahami. Saya tidak lagi repot mencatat manual.”</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- FAQ Section -->
    <div class="card my-5 shadow-sm border border-secondary">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Pertanyaan yang Sering Diajukan (FAQ)</h5>
      </div>
      <div class="card-body">
        <div class="accordion" id="faqAccordion">

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq1Heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                Apa itu AgriStock?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faq1Heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                AgriStock adalah sistem manajemen inventaris pertanian yang memudahkan pengguna mencatat tanaman, panen, dan keuangan usaha pertanian.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2Heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                Apakah data saya aman?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2Heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Ya. AgriStock menyimpan data pengguna secara lokal dan terenkripsi sesuai standar keamanan aplikasi berbasis web.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq3Heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                Bagaimana cara mencatat tanaman baru?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3Heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Gunakan menu "Manajemen Tanaman" di sidebar, lalu klik "Tambah Tanaman" untuk mulai mencatat tanaman baru.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</main>

<?= $this->endSection() ?>
