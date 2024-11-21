<?php
require '../vendor/autoload.php'; // Pastikan path ke autoload benar

use Picqer\Barcode\BarcodeGeneratorPNG;

// Ambil kode produk dari query string
$product_code = $_GET['code'] ?? '000000';
$generator = new BarcodeGeneratorPNG();
header('Content-Type: image/png');
echo $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 2, 50);
?>