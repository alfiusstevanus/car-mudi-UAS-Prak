<?php
include('../server/connection.php');

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$lahir = $_POST['lahir'];
$password = $_POST['password'];

$query = "INSERT INTO user VALUES('','$username','$email','$password','$name','$lahir')";

mysqli_query($conn, $query);

header("location:../register.php");
die();
