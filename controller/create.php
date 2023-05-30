<?php
include '../server/connection.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$warna = $_POST['warna'];

if (!empty($_FILES['photo']['tmp_name'])) {
    $temp = $_FILES['photo']['tmp_name'];
    $picture = str_replace(' ', '-', $nama) . ".png";
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture = str_replace(' ', '-', $nama) . ".png";
}

$query = "INSERT INTO mobil VALUES('','$nama',$harga,'$warna','$picture')";

mysqli_query($conn, $query);

header("location:../kelola.php");
die();
