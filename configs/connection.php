<?php 
    $servername = "localhost:3307"; // boleh menggunakan IP 127.0.0.1
    $dbuser = "root";
    $dbpassword ="admin123";
    $dbname ="psikotes";

    $connect = mysqli_connect($servername, $dbuser, $dbpassword);

    $connect_error ="Koneksi gagal atau Database tidak ada";
    mysqli_select_db($connect, $dbname) or die($connect_error);
?>