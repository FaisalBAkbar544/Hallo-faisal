<?php
    session_start();

    unset($_SESSION); // menggosongkan variabel
    session_destroy(); // menghilangkan variabel

    header("location:home.php");
?>