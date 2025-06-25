<?php
    $pageinfo = "Test Disc";
    $description = "Ini halaman Test Disc";
    
    // include("../configs/session-check.php"); 
    ob_start();
    include("../layouts/navbarKiri.php");
    include("../layouts/header.php");
    include("../layouts/content.php");
    include("../layouts/footer.php");
?>