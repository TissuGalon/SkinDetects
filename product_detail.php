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
        <!-- Title Section -->
        <div class="logo d-flex justify-content-center">
            <div class="text-center row">
                <a href="product.php" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i></a>
                <div class="mx-3"></div>
                <h1 class="m-0 p-0">PRODUCT DETAIL</h1>
                <!-- <h6>Koleksi Skincare Terbaik</h6> -->
            </div>
        </div>

        <br>

        <?php
        $id = $_GET['barcode'];
        $query = mysqli_query($conn, "SELECT * FROM product WHERE product_code = '$id'");
        if ($query) {
            $row = mysqli_fetch_array($query);
        }
        ?>

        <!-- Product Card Section -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm mb-4 border-0">
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
                        <a href="pemesanan.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary waves-effect waves-light">Beli</a>
                    </div>
                </div>
            </div>
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