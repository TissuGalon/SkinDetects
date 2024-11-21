<?php
include '../../controller/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM product WHERE product_id = $id");
    if ($query) {
        header('location: ../product.php?status=success_delete');
    } else {
        header('location: ../product.php?status=failed_delete');
    }
}

?>