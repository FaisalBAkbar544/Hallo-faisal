<?php
$pageinfo = "Detail Test Disc"; // Harus sama persis dengan yang dicek di layouts/content.php
$description = "Ini halaman Detail Test Disc";

ob_start();
include("../layouts/sidebar-artikel.php");
include("../layouts/navbarKiri.php");
include("../layouts/header.php");
include("../layouts/content.php"); // Akan memuat berdasarkan $pageinfo
include("../layouts/footer.php");
