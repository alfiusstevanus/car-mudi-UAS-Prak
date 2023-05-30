<?php
session_start();
include 'server/connection.php';

$q_produk = 'SELECT * FROM mobil';
$r_produk = mysqli_query($conn, $q_produk);
include 'layout/header.php';
?>

<div class="container menu-list mt-5">
    <div class="d-flex row align-items-center">
        <div class="col-md-4 ">
            <h1 class="fs-2 welcoming py-3">Kelola Mobil</h1>
        </div>
        <div class="col-md-4 ">
            <a class="btn btn-sm btn-primary bg-success border-0 float-right p-2" data-bs-toggle="modal" data-bs-target="#tambahMobil" role=" button">
                Add Mobil
            </a>
        </div>
    </div>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($r_produk)) : ?>
            <div class="col-lg-4 col-sm-6 product-item my-3">
                <div class="product">
                    <img src="images/<?= $row['picture'] ?>" alt="<?= $row['picture'] ?>" class="rounded">
                </div>
                <div>
                    <input type="text" name="nama" class="form-control text-center border-0" value="<?= $row['nama_mobil'] ?>" readonly>
                </div>
                <div>
                    <input type="text" name="warna" class="form-control text-center border-0" value="<?= $row['warna'] ?>" readonly>
                </div>
                <div>
                    <input type="text" name="harga" class="form-control text-center border-0" value="Rp. <?= number_format($row['harga']) ?>" readonly>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <a class="btn btn-sm bg-success border-0 d-flex justify-content-center py-3 text-light" data-bs-toggle="modal" data-bs-target="#editMobil<?= $row['id_mobil'] ?>" role=" button">Update</a>
                    </div>
                    <div class="col-lg-4">
                        <a class="btn btn-sm btn-danger border-0 d-flex justify-content-center py-3" data-bs-toggle="modal" data-bs-target="#deleteMobil<?= $row['id_mobil'] ?>" role="button">Delete</a>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-sm btn-warning border-0 d-flex justify-content-center py-3" href="controller/add-cart.php?id=<?= $row['id_mobil'] ?>" role="button"><img src="images/cart.png" width="20px"></a>
                    </div>
                </div>
            </div>
            <!-- modals start -->
            <div class="modal fade" id="editMobil<?= $row['id_mobil'] ?>" tabindex="-1" aria-labelledby="editMobilLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMobilLabel">Update Mobil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="controller/update.php?id=<?= $row['id_mobil'] ?>" enctype="multipart/form-data">
                                <div class="container">
                                    <div>
                                        <h5>Nama Mobil:</h5>
                                        <input type="text" name="nama" class="form-control my-3" value="<?= $row['nama_mobil'] ?>" required>
                                        <input type="text" name="namaOld" class="form-control my-3" value="<?= $row['nama_mobil'] ?>" required hidden>
                                    </div>
                                    <div>
                                        <h5>Harga:</h5>
                                        <input type="text" name="harga" class="form-control my-3" value="<?= $row['harga'] ?>" required>
                                    </div>
                                    <div>
                                        <h5>Warna:</h5>
                                        <input type="text" name="warna" class="form-control my-3" value="<?= $row['warna'] ?>" required>
                                    </div>
                                    <div>
                                        <h5>Photo:</h5>
                                        <input type="file" name="photo" class="form-control my-3">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary btn-success mt-3" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteMobil<?= $row['id_mobil'] ?>" tabindex="-1" aria-labelledby="deleteMobilLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteMobilLabel">Delete Mobil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Anda yakin ingin menghapus Mobil "<?= $row['nama_mobil'] ?>"</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                            <a role="submit" class="btn btn-danger btn-success mt-3" href="controller/delete.php?id=<?= $row['id_mobil'] ?>&nama=<?= $row['nama_mobil'] ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="modal fade" id="tambahMobil" tabindex="-1" aria-labelledby="tambahMobilLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahMobilLabel">Add New Mobil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="controller/create.php" enctype="multipart/form-data">
                            <div class="container">
                                <div>
                                    <h5>Nama:</h5>
                                    <input type="text" name="nama" class="form-control my-3" placeholder="Nama Mobil" required>
                                </div>
                                <div>
                                    <h5>Harga:</h5>
                                    <input type="text" name="harga" class="form-control my-3" placeholder="Harga Mobil" required>
                                </div>
                                <div>
                                    <h5>Warna:</h5>
                                    <input type="text" name="warna" class="form-control my-3" placeholder="Warna Mobil" required>
                                </div>
                                <div>
                                    <h5>Photo Mobil:</h5>
                                    <input type="file" name="photo" class="form-control my-3" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary btn-success mt-3" value="Tambah">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>