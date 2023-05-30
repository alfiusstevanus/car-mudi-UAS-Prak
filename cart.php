<?php
session_start();
include('server/connection.php');
include('layout/header.php');
?>
<div class="container menu-list mt-5">
    <div class="border-3 mb-3 welcoming py-3">
        <div class="d-flex row align-items-center">
            <h1 class="fs-2 mb-3">Cart</h1>
            <?php
            if (!empty($_SESSION['cart'])) {
            ?>

                <table class="table" border="1">
                    <tr>
                        <th class="text-center my-3">Nama Mobil</th>
                        <th class="text-center my-3">Harga</th>
                        <th class="text-center my-3">Jumlah</th>
                        <th class="text-center my-3">Subtotal</th>
                        <th class="text-center my-3">Hapus</th>
                    </tr>
                    <?php
                    $no = 1;
                    $grandtotal = 0;
                    foreach ($_SESSION['cart'] as $cart => $val) {
                        $subtotal = $val["harga"] * $val["jumlah"];
                    ?>
                        <tr>
                            <td> <input type="text" name="nama" class="form-control text-center my-3" value="<?php echo $val["nama"] ?>" readonly></td>
                            <td> <input type="text" name="harga" class="form-control text-center my-3" value="Rp. <?= number_format($val["harga"]); ?>" readonly></td>
                            <td> <input type="text" name="jumlah" class="form-control text-center my-3" value="<?php echo $val["jumlah"] ?>" readonly></td>
                            <td> <input type="text" name="subtotal" class="form-control text-center my-3" value="Rp. <?= number_format($subtotal); ?>" readonly></td>
                            <td>
                                <a class="btn btn-danger my-3" href="controller/hapus-cart.php?id=<?php echo $cart ?>" role="button">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $grandtotal += $subtotal;
                    }
                    ?>
                    <th colspan="3">Grand Total</th>
                    <th>Rp. <?= number_format($grandtotal); ?></th>
                    <th>&nbsp;</th>
                </table>
                <a class="btn btn-primary" href="index.php">Checkout</a>
            <?php
            } else {
                header('location:kelola.php');
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>