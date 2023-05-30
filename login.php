<?php
session_start();
include 'server/connection.php';

if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = ? AND password = ? LIMIT 1";
    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {

        $stmt_login->bind_result(
            $id_user,
            $username,
            $email,
            $password,
            $nama,
            $tanggal_lahir
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {

            $stmt_login->fetch();

            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['nama'] = $nama;
            $_SESSION['tanggal_lahir'] = $tanggal_lahir;
            $_SESSION['logged_in'] = true;
            header("location: index.php?login=1");
        } else {
            $message = "Email atau Password salah!";
            header("location: login.php?error=$message");
        }
    } else {
        $message = "Email atau Password salah!";
        header("location: login.php?error=$message");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR MUDI | Login</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container w-75">
        <h1 class="my-5 text-center">Login</h1>
        <form method="post">
            <div class="container">
                <div>
                    <h5>Masukan Email:</h5>
                    <input type="text" name="email" class="form-control my-3" placeholder="Email" required>
                </div>
                <div>
                    <h5>Masukan Password:</h5>
                    <input type="password" name="password" class="form-control my-3" placeholder="Password" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary btn-success mt-3" name="submit" value="Login">
                </div><br>
                <p>Belum punya akun? <a href="register.php">Register!</a></p>
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