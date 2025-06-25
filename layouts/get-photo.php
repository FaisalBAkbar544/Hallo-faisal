<?php
include("../configs/connection.php");

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit("Missing user ID.");
}

$id_user = intval($_GET['id']);

// Ambil nama file dari DB
$query = mysqli_query($connect, "
    SELECT photo FROM biography WHERE id_user = '$id_user' LIMIT 1
");

$data = mysqli_fetch_assoc($query);

// Path ke file
$path = "../assets/images/" . $data['photo'];

if (!empty($data['photo']) && file_exists($path)) {
    // Ambil ekstensi file
    $ext = pathinfo($data['photo'], PATHINFO_EXTENSION);
    $mime = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png",
        "gif" => "image/gif"
    ][$ext] ?? "application/octet-stream";

    header("Content-Type: $mime");
    readfile($path);
    exit;
} else {
    http_response_code(404);
    exit("Image not found.");
}
