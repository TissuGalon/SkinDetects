<?php
// Pastikan file koneksi ada di folder 'controller'
require_once 'koneksi.php';

// Periksa apakah metode POST digunakan
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil data dari form
    $id = $_GET['id'];



    $sql = "DELETE FROM pemesanan WHERE id_pemesanan = $id";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Berhasil!');
            window.location.href = '../transaction.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
} else {
    echo "Metode tidak diizinkan!";
}
?>
