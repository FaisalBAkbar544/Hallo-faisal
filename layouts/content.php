<!-- content -->
<div id="mainContent" style="transition: margin-left 0.3s ease;">
    <div class="container">
        <div class="row">

            <!-- main content -->
            <div class="col-md-9 content">
                <?php
                    if($pageinfo == "Login"){
                        include("content-login.php");
                    }
                    if($pageinfo == "Test Disc"){
                        echo '<style>html { scroll-behavior: smooth; }</style>';
                        include("content-testDisc.php");
                    }
                     if($pageinfo == "Test Disc Riwayat"){
                        include("content-testDisc-riwayat.php");
                    }
                    if($pageinfo == "Detail Test Disc"){
                        include("testDisc-detail.php");
                    }
                    if($pageinfo == "Tentang Kami"){
                        include("content-tentang-kami.php");
                    }
                    if($pageinfo == "Tentang Faq"){
                        include("content-tentang-faq.php");
                    }
                    if($pageinfo == "Ini Kontak"){
                        include("content-kontak-kami.php");
                    }
                    if($pageinfo == "Register"){
                        include("content-register.php");
                    }
                    if($pageinfo == "User Management"){
                        include("content-user.php");
                    }
                    if($pageinfo == "User Management Form"){
                        include("content-user-form.php");
                    }
                    if ($pageinfo == "Profile") {
                        include("content-profilSaya.php");
                    }
                    if ($pageinfo == "Edit profile") {
                        include("content-editProfil.php");
                    }
                    if ($pageinfo == "Artikel") {
                        include("content-artikel.php");
                    }
                    if ($pageinfo == "Tentang Disc") {
                        include("content-tentang-disc.php");
                    }
                ?>
            </div>

            <!-- side navigation -->
            <div class="col-md-3">
                <?php if ($pageinfo == "Test Disc"): ?>
                    <div class="mb-4">
                        <h5 class="mb-3">Navigasi Tabel DISC</h5>
                        <div class="row row-cols-4 g-2">
                            <?php for ($i = 1; $i <= 24; $i++): ?>
                                <div class="col">
                                    <a href="#soal_<?= $i; ?>" id="navBtn_<?= $i; ?>" class="btn btn-sm btn-outline-secondary w-100">
                                        <?= $i; ?>
                                    </a>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div> <!-- end of #mainContent -->
