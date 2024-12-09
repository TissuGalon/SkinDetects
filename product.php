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


            <br>
            <div class="logo d-flex justify-content-center">
                <div class="text-center">
                    <h1>PRODUCT KAMI</h1>
                    <h6>Koleksi Skincare Terbaik</h6>
                </div>
            </div>

            <br>

            <div class="card shadow-none rounded">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-center align-items-center">

                        <!-- Cart Button -->
                        <a href="#" data-toggle="modal" data-target="#ModalScan" class="btn btn-lg btn-primary w-25">
                            <i class="mdi mdi-qrcode-scan me-4"></i>
                            <span>Scan Product</span>
                        </a>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

            <!-- MODAL SCAN -->

            <div id="ModalScan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalScanLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="ModalScanLabel">Scan Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <!-- Area Kamera -->
                            <div id="scanner-container"></div>
                            <!-- Hasil Scan -->
                            <div class="mt-3">
                                <label for="barcode-result">Scanned Barcode:</label>
                                <input type="text" id="barcode-result" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"
                                onclick="stopScanner()">Close</button>
                            <button class="btn btn-primary" onclick="startScanner()">
                                Start Scan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL SCAN -->

            <!-- Load jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- Load QuaggaJS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>


            <script>
                // Inisialisasi scanner saat modal dibuka
                document.getElementById('ModalScan').addEventListener('shown.bs.modal', function () {
                    startScanner();
                });


                // Fungsi memulai scanner
                function startScanner() {
                    Quagga.init({
                        inputStream: {
                            type: "LiveStream",
                            target: document.querySelector("#scanner-container"),
                            constraints: {
                                facingMode: "environment"
                            }
                        },
                        decoder: {
                            readers: [
                                "code_128_reader" // Pastikan pembaca untuk Code 128 aktif
                            ]
                        },
                        locator: {
                            patchSize: "medium", // Pilihan: "x-small", "small", "medium", "large", "x-large"
                            halfSample: true
                        },
                        locate: true, // Deteksi barcode secara otomatis
                    }, function (err) {
                        if (err) {
                            console.error(err);
                            alert("Failed to start scanner.");
                            return;
                        }
                        Quagga.start();
                    });


                    // Tangkap hasil scan
                    Quagga.onDetected(function (result) {
                        const code = result.codeResult.code;
                        document.getElementById("barcode-result").value = code;
                        stopScanner();

                        // Redirect ke halaman baru dengan parameter barcode
                        window.location.href = "product_detail.php?barcode=" + encodeURIComponent(code);

                        $('#ModalScan').modal('hide');
                    });

                }



                // Fungsi menghentikan scanner
                function stopScanner() {
                    Quagga.stop();
                }
            </script>

            <br>

            <div class="row">
                <?php
            $query = mysqli_query($conn, "SELECT * FROM product");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="col-6 col-xl-3">
                    <div class="card shadow-sm m-b-30 border-0">
                        <!-- Image with 1:1 aspect ratio and fallback -->
                        <div class="ratio ratio-1x1">
                            <img src="media/<?php echo $row['image']; ?>" alt="Card image cap"
                                class="card-img-top object-fit-cover"
                                onError="this.onerror=null; this.src='media/blank_image.jpg';">
                        </div>

                        <div class="card-body text-center">
                            <h4 class="card-title font-20 mt-0">
                                <?php echo $row['product_name']; ?>
                            </h4>
                            <p class="card-text">
                                <?php echo $row['description']; ?>.
                            </p>
                            <?php if (isset($_SESSION['LoginInfo'])) { ?>
                            <a href="pemesanan.php?product_id=<?php echo $row['product_id']; ?>"
                                class="btn btn-primary waves-effect waves-light">Beli</a>
                            <?php }else{ ?>
                            <a href="auth/login_page.php" class="btn btn-primary waves-effect waves-light">Beli</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <?php } ?>

                <br>

            </div>


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