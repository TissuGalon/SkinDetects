<?php
// Koneksi ke database
include '../../controller/koneksi.php'; // Ganti dengan path file koneksi Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Cek apakah file gambar diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Path untuk menyimpan gambar
        $uploadDir = '../../media/';
        $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // Ekstensi file yang diperbolehkan
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            // Buat nama file acak dengan ekstensi asli
            $randomName = uniqid('img_', true) . '.' . $fileType;
            $targetFilePath = $uploadDir . $randomName;

            // Upload file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                // Simpan data awal tanpa product_code
                $imagePath = $randomName;
                $query = "INSERT INTO product (product_name, description, image) 
                          VALUES ('$product_name', '$description', '$imagePath')";

                if (mysqli_query($conn, $query)) {
                    // Dapatkan ID yang baru saja dimasukkan
                    $lastId = mysqli_insert_id($conn);

                    // Buat product_code dengan format PRD-(auto_increment)
                    $product_code = 'PRD-' . $lastId;

                    // Update product_code ke dalam database
                    $updateQuery = "UPDATE product SET product_code = '$product_code' WHERE product_id = $lastId";

                    if (mysqli_query($conn, $updateQuery)) {
                        // Redirect dengan pesan sukses
                        header('Location: ../product.php?status=success');
                    } else {
                        // Redirect dengan pesan error saat update
                        header('Location: ../product.php?status=update_error');
                    }
                } else {
                    // Redirect dengan pesan error database saat insert
                    header('Location: ../product.php?status=db_error');
                }
            } else {
                // Redirect dengan pesan error upload
                header('Location: ../product.php?status=upload_error');
            }
        } else {
            // Redirect dengan pesan error format file
            header('Location: ../product.php?status=invalid_file');
        }
    } else {
        // Redirect dengan pesan error file tidak ditemukan
        header('Location: ../product.php?status=file_error');
    }
} else {
    // Redirect jika akses langsung tanpa POST
    header('Location: ../product.php');
}

?>
