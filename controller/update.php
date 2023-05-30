<?php
session_start();
include '../server/connection.php';
$id = $_GET['id'];

$nama = $_POST['nama'];
$namaOld = $_POST['namaOld'];
$harga = $_POST['harga'];
$warna = $_POST['warna'];

$temp = $_FILES['photo']['tmp_name'];
$picture = str_replace(' ', '-', $namaOld) . ".png";
$path = '../images/' . $picture;
if (!empty($_FILES['photo']['tmp_name'])) {
    if (file_exists($path)) {
        unlink($path);
    }
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture =  $picture;
}

$query = "UPDATE mobil SET nama_mobil = '$nama', harga = $harga, warna = '$warna', picture = '$picture' WHERE id_mobil = '$id'";
mysqli_query($conn, $query);

header("location:../kelola.php");
die();
