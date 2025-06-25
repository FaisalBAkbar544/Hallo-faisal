<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="container px-4">
  <!-- Profil dan Foto Samping -->
<div class="card border border-secondary shadow-sm mb-4">
  <div class="card-header bg-success text-white">
    <h5 class="mb-0">Profil</h5>
  </div>
  <div class="card-body">
    <div class="row align-items-center">
      <!-- Foto di kiri -->
      <div class="col-md-3 text-center mb-3 mb-md-0">
        <img src="<?= base_url('public/img/faisal.jpg') ?>" alt="Foto Profil" class="img-thumbnail shadow" style="width: 100%; max-width: 150px; height: auto; object-fit: cover;">
      </div>
      
      <!-- Informasi di kanan -->
      <div class="col-md-9">
        <ul class="list-unstyled mb-0">
          <li><strong>Nama:</strong> Muhammad Faisal Akbar</li>
          <li><strong>NIM:</strong> 2311016210023</li>
          <li><strong>Mahasiswa:</strong> Ilmu Komputer, Universitas Lambung Mangkurat (Angkatan 2023)</li>
          <li><strong>Email:</strong> <a href="mailto:2311016210023@mhs.ulm.ac.id">2311016210023@mhs.ulm.ac.id</a></li>
            <li><strong>Biografi:</strong> Manusia ambisius akan ilmu pengetahuan</li>
            <li><strong>Quotes:</strong> <em>"Stay foolish, stay hungry."</em></li>

        </ul>
      </div>
    </div>
  </div>
</div>


      <div class="card border border-secondary shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">Skill</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- Hard Skill -->
            <div class="col-md-6">
              <h6 class="text-success">Hard Skill</h6>
              <ul class="mb-3">
                <li>Pemrograman Web (HTML, CSS, JS, PHP)</li>
                <li>CodeIgniter 4, Bootstrap</li>
                <li>MySQL Database</li>
                <li>Pengolahan Citra (OpenCV, Python)</li>
                <li>Git & GitHub</li>
                <li>Video Editing (Short & Long-form)</li>
              </ul>
            </div>

            <!-- Soft Skill -->
             <div class="col-12">
              <h6 class="text-success">Soft Skill</h6>
              <ul class="mb-0">
                <li>Problem Solving</li>
                <li>Kreatif dan Inovatif</li>
                <li>Manajemen Waktu</li>
                <li>Kolaborasi Tim</li>
                <li>Kemampuan Komunikasi</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
