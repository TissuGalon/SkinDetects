<?php
// Koneksi ke database
include '../../controller/koneksi.php'; // Ganti dengan path file koneksi Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $product_id = intval($_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $imageUpdated = false;

    // Path untuk menyimpan gambar
    $uploadDir = '../../media/';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Ekstensi file yang diperbolehkan
        $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            // Buat nama file acak dengan ekstensi asli
            $randomName = uniqid('img_', true) . '.' . $fileType;
            $targetFilePath = $uploadDir . $randomName;

            // Upload file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $imageUpdated = true;

                // Hapus file gambar lama jika ada
                $oldImageQuery = "SELECT image FROM product WHERE product_id = $product_id";
                $result = mysqli_query($conn, $oldImageQuery);
                if ($result && mysqli_num_rows($result) > 0) {
                    $oldImage = mysqli_fetch_assoc($result)['image'];
                    $oldImagePath = $uploadDir . $oldImage;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                // Redirect jika gagal upload file
                header('Location: ../product.php?status=upload_error');
                exit();
            }
        } else {
            // Redirect jika format file tidak valid
            header('Location: ../product.php?status=invalid_file');
            exit();
        }
    }

    // Update data ke database
    if ($imageUpdated) {
        $updateQuery = "UPDATE product SET 
                        product_name = '$product_name', 
                        description = '$description', 
                        image = '$randomName' 
                        WHERE product_id = $product_id";
    } else {
        $updateQuery = "UPDATE product SET 
                        product_name = '$product_name', 
                        description = '$description' 
                        WHERE product_id = $product_id";
    }

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect dengan pesan sukses
        header('Location: ../product.php?status=update_success');
    } else {
        // Redirect dengan pesan error database
        header('Location: ../product.php?status=update_failed');
    }
} else {
    // Redirect jika akses langsung tanpa POST
    header('Location: ../product.php');
}
?>
