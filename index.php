<?php
session_start();
include 'server/connection.php';

$q = 'SELECT * FROM mobil';
$r = mysqli_query($conn, $q);

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email']);
        header('location: login.php');
        exit;
    }
}

include 'layout/header.php'
?>
<main>
    <div class="container menu-list mt-5">
        <h1 class="fs-2 welcoming py-3">Daftar Mobil</h1>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($r)) : ?>
                <div class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div class="product">
                        <img class="rounded" src="images/<?= $row['picture'] ?>" alt="<?= $row['picture'] ?>">
                    </div>
                    <div class="py-1" name="nama_mobil"><?= $row['nama_mobil'] ?></div>
                    <div name="harga">Rp. <?= number_format($row['harga']) ?></div>
                    <div class="pb-1" name="warna"><?= $row['warna'] ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<?php
include 'layout/footer.php'
?>