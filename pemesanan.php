<?php
require_once 'controller/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Glow Skincare</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/plugins/morris/morris.css" rel="stylesheet">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        #scanner-container {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            /* Mencegah overflow */
            border: 1px solid #ddd;
            background: #000;
            /* Tambahkan latar belakang hitam untuk fokus */
        }

        #scanner-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Agar video menyesuaikan container */
        }
    </style>



</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container-fluid">

            <?php
            $userData = $_SESSION['LoginInfo'];
            $id = $_GET['product_id'];
            $query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $id");
            $produk = mysqli_fetch_array($query);
            ?>

            <!-- FORM -->
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Form Pemesanan Produk</h1>
                    </div>
                    <div class="card-body">
                        <form action="controller/proses_pemesanan.php" method="POST">

                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama_pemesan" class="form-control"
                                    placeholder="Masukkan nama Anda"
                                    value="<?php echo !empty($userData['fullname']) ? $userData['fullname'] : $userData['username'] ?>"
                                    required>
                            </div>

                            <!-- Input Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Pengiriman</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="4"
                                    placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>

                            <!-- Tampilkan Produk -->
                            <div class="mb-3">
                                <div class="card shadow-sm border-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="ratio ratio-1x1">
                                                <img src="media/<?php echo $produk['image']; ?>" alt="Gambar Produk"
                                                    class="card-img-top object-fit-cover"
                                                    onerror="this.onerror=null; this.src='media/blank_image.jpg';">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body text-start">
                                                <h4 class="card-title font-20 mt-0">
                                                    <?php echo $produk['product_name']; ?>
                                                </h4>
                                                <p class="card-text">
                                                    <?php echo $produk['description']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Produk yang Dipesan -->
                            <div class="mb-3">
                                <label for="produk" class="form-label">Produk yang Dipesan</label>
                                <input type="text" class="form-control" value="<?php echo $produk['product_name']; ?>"
                                    disabled>
                                <input type="hidden" name="id_product" value="<?php echo $produk['product_id']; ?>">
                                <input type="hidden" name="produk" value="<?php echo $produk['product_name']; ?>">
                            </div>

                            <!-- Harga Produk -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" value="<?php echo $produk['harga']; ?>"
                                    disabled>
                                <input type="hidden" name="harga" value="<?php echo $produk['harga']; ?>">
                            </div>

                            <!-- Input Jumlah Produk -->
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Pemesanan</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control"
                                    placeholder="Masukkan jumlah produk" min="1" required>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Pesan Sekarang
                                </button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <!-- FORM -->


        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- End Footer -->


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <script src="assets/plugins/skycons/skycons.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>

    <script src="assets/pages/dashborad.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
        /* BEGIN SVG WEATHER ICON */
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons(
                { "color": "#fff" },
                { "resizeClear": true }
            ),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for (i = list.length; i--;)
                icons.set(list[i], list[i]);
            icons.play();
        };

        // scroll

        $(document).ready(function () {

            $("#boxscroll").niceScroll({ cursorborder: "", cursorcolor: "#cecece", boxzoom: true });
            $("#boxscroll2").niceScroll({ cursorborder: "", cursorcolor: "#cecece", boxzoom: true });

        });
    </script>



</body>

</html>