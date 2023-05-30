<?php
session_start();
include '../server/connection.php';

$id = $_GET["id"];
$nama = $_GET["nama"];

//menghapus foto di folder images
$path = "../images/" . str_replace(' ', '-', $nama) . ".png";
if (file_exists($path)) {
    unlink($path);
}

$query = "DELETE FROM mobil WHERE id_mobil = '$id'";
if (mysqli_query($conn, $query)) {
    header("location:../kelola.php");
}
die();
