<?php
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR MUDI!</title>
    <link rel="icon" href="images/Aventador.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header class="sticky sticky-top">
        <nav class="navbar navbar-expand-lg bg-blue border-2 mb-3 border-bottom border-dark">
            <div class="container">
                <a class="navbar-brand mr-10" href="index.php">CAR MUDI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="kelola.php">Kelola</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item float-right justify-content-end">
                            <a class="nav-link" href="cart.php" role="button">
                                <img width="25px" src="images/cart.png">
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item float-right justify-content-end">
                            <a role="button" data-bs-toggle="modal" data-bs-target="#logout">
                                <img class="side my-btn" width="30" src="images/logout.png" alt="Exit" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="modal fade z-index-9" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutLabel">Logout!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Anda yakin ingin Logout?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Tidak</button>
                    <a role="submit" class="btn btn-success mt-3" href="index.php?logout=1">Ya</a>
                </div>
            </div>
        </div>
    </div>