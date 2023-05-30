<?php
include('../server/connection.php');
session_start();

$id = $_GET['id'];
$add = "SELECT * FROM mobil WHERE id_mobil = '$id'";
$q = mysqli_query($conn, $add);
$row = mysqli_fetch_object($q);

$_SESSION['cart'][$id] = [
    "nama" => $row->nama_mobil,
    "harga" => $row->harga,
    "jumlah" => 1
];
header("location: ../cart.php   ");
