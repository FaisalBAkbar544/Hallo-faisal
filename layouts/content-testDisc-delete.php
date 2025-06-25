<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
        header("location:../pages/login.php");
    }
    include("../configs/connection.php");

    $id = $_GET['id']; //mengambil variabel 'id' di url

    $sql = mysqli_query($connect, "delete from portofolio where id_port = '$id' ");
    header("location:../pages/porto.php");
?>