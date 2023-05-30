<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR MUDI | Register</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container w-75 my-5">
        <h1 class="my-5 text-center">Register</h1>
        <form method="post" action="controller/register.php">
            <div class="my-5">
                <div>
                    <h5>Masukan Nama:</h5>
                    <input type="text" name="name" class="form-control my-3" placeholder="Nama" required>
                </div>
                <div>
                    <h6>Masukan Username:</h6>
                    <input type="text" name="username" class="form-control my-3" placeholder="Username" required>
                </div>
                <div>
                    <h6>Masukan Email:</h6>
                    <input type="text" name="email" class="form-control my-3" placeholder="Email" required>
                </div>
                <div>
                    <h6>Masukan Tanggal Lahir:</h6>
                    <input type="date" name="lahir" class="form-control my-3" required>
                </div>
                <div>
                    <h6>Masukan Password:</h6>
                    <input type="password" name="password" class="form-control my-3" placeholder="Password" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary btn-success mt-3" name="submit" value="Register">
                </div><br>
                <p>Sudah punya akun? <a href="login.php">Login!</a></p>
                <?php if (isset($_GET['error'])) ?>
                <div class="error text-danger">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="assets/js/bootstrap.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

</html>