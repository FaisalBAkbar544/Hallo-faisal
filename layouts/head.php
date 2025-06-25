<?php
session_start();
include("../configs/connection.php");

$user = $_SESSION['U'] ?? null;
$userdata = null;

if ($user) {
    $query = mysqli_query($connect, "
        SELECT u.id_user, u.name, b.photo 
        FROM user u
        LEFT JOIN biography b ON u.id_user = b.id_user
        WHERE u.username = '" . mysqli_real_escape_string($connect, $user) . "'
        LIMIT 1
    ");
    if (mysqli_num_rows($query) > 0) {
        $userdata = mysqli_fetch_assoc($query);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Faisal Akbar</title>

    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .sidebar-open #mainContent {
            margin-left: 400px;
        }
        .sidebar-toggle-btn {
            position: fixed;
            top: 20px;
            left: 10px;
            z-index: 1100;
            background-color: #343a40;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<?php include("navbarKiri.php"); ?>

<div id="mainContent" style="transition: margin-left 0.3s ease;">

<?php if ($userdata): ?>
    <div class="alert alert-info m-3 d-flex align-items-center" style="gap: 15px;">
        <img src="../layouts/get-photo.php?id=<?= $userdata['id_user'] ?>" alt="Foto Profil" width="50" height="50" style="object-fit: cover; border-radius: 50%;">
        <div>
            <strong><?= htmlspecialchars($userdata['name']) ?></strong><br>
            <small>ID: <?= $userdata['id_user'] ?></small>
        </div>
    </div>
<?php endif; ?>
