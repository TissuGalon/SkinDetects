<?php
require '../vendor/autoload.php'; // Pastikan path ke autoload benar

use Picqer\Barcode\BarcodeGeneratorPNG;

// Ambil kode produk dari query string
$product_code = $_GET['code'] ?? '000000';
$generator = new BarcodeGeneratorPNG();

// Buat barcode sebagai gambar PNG mentah
$barcode = $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 2, 50);

// Buat gambar kosong untuk background
$barcode_image = imagecreatefromstring($barcode);

// Ukuran barcode
$barcode_width = imagesx($barcode_image);
$barcode_height = imagesy($barcode_image);

// Tambahkan margin putih di sekitar barcode
$margin = 20; // Ukuran margin (bisa disesuaikan)
$canvas_width = $barcode_width + (2 * $margin);
$canvas_height = $barcode_height + (2 * $margin);

// Buat gambar baru dengan ukuran canvas
$canvas = imagecreatetruecolor($canvas_width, $canvas_height);

// Atur warna putih untuk latar belakang
$white = imagecolorallocate($canvas, 255, 255, 255);

// Isi background dengan warna putih
imagefilledrectangle($canvas, 0, 0, $canvas_width, $canvas_height, $white);

// Tempelkan gambar barcode ke tengah canvas
imagecopy($canvas, $barcode_image, $margin, $margin, 0, 0, $barcode_width, $barcode_height);

// Atur header sebagai gambar PNG
header('Content-Type: image/png');

// Output gambar
imagepng($canvas);

// Hapus gambar dari memori
imagedestroy($canvas);
imagedestroy($barcode_image);
?>
