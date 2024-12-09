<?php
// Pastikan file koneksi ada di folder 'controller'
require_once 'koneksi.php';

// Periksa apakah metode POST digunakan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $id_product = (int) $_POST['id_product'];
    $nama_produk = mysqli_real_escape_string($conn, $_POST['produk']);
    $harga = (int) $_POST['harga'];
    $jumlah = (int) $_POST['jumlah'];

    // Hitung total harga
    $total_harga = $harga * $jumlah;

    // Masukkan data ke database
    $sql = "INSERT INTO pemesanan 
        (nama_pesanan, user_id, id_product, qty, total_harga, nama_pemesan, alamat, status) 
        VALUES 
        ('$nama_produk', 1, '$id_product', '$jumlah', '$total_harga', '$nama_pemesan', '$alamat', 'dipesan')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Pemesanan berhasil!');
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
