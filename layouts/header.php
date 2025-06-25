<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!-- header selain home -->
<div class="jumbotron jubotron-fluid <?php
                if($pageinfo == "Biography"){
                    echo "jumbotron-bio";
                }
                if($pageinfo == "Biography Form"){
                    echo "jumbotron-bio-form";
                }
                if($pageinfo == "Portofolio"){
                    echo "jumbotron-porto";
                }
                if($pageinfo == "Portofolio Form"){
                    echo "jumbotron-porto-form";
                }
                if($pageinfo == "Contact"){
                    echo "jumbotron-contact";
                }
                if($pageinfo == "Contact Form"){
                    echo "jumbotron-contact-form";
                }
                if($pageinfo == "Login"){
                    echo "jumbotron-login";
                }
                if($pageinfo == "User Management" || $pageinfo == "User Management Form" ){
                    echo "jumbotron-user";
                }
                            if ($pageinfo == "Login") {
                include("jumbotron-login.php");
            }
            if ($pageinfo == "Test Disc") {
                echo '<style>html { scroll-behavior: smooth; }</style>';
                include("jumbotron-testDisc.php");
            }
            if ($pageinfo == "Tentang Kami") {
                include("jumbotron-tentang-kami.php");
            }
            if ($pageinfo == "Tentang Faq") {
                include("jumbotron-tentang-faq.php");
            }
            if ($pageinfo == "Ini Kontak") {
                include("jumbotron-kontak-kami.php");
            }
            if ($pageinfo == "Register") {
                include("jumbotron-register.php");
            }
            if ($pageinfo == "User Management") {
                include("jumbotron-user.php");
            }
            if ($pageinfo == "User Management Form") {
                include("jumbotron-user-form.php");
            }
            if ($pageinfo == "Profile") {
                include("jumbotron-profilSaya.php");
            }
            if ($pageinfo == "Edit profile") {
                include("jumbotron-editProfil.php");
            }
            if ($pageinfo == "Artikel") {
                include("jumbotron-artikel.php");
            }
            if ($pageinfo == "Tentang Disc") {
                include("jumbotron-tentang-disc.php");
            }
            if ($pageinfo == "Test Disc Riwayat") {
                include("jumbotron-testDisc-riwayat.php");
            }
            
            ?>">
    <div class="container">
        <h1 class="display-4"><b><?php echo $pageinfo; ?></b></h1>
        <p><?php echo $description ?></p>
    </div>
</div>