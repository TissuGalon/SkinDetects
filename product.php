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
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group mt-2">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                            <input type="text" id="example-input1-group2" name="example-input1-group2"
                            class="form-control" placeholder="Search">
                        </div>
                        <!-- Cart Button -->
                        <a href="#" class="btn btn-sm btn-primary m-2">
                            <i class="mdi mdi-cart me-2"></i>
                            <span>0 Produk</span>
                        </a>
                    </div>
                </div>
            </div>
            
            
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
                                                        <img 
                                                            src="media/<?php echo $row['image']; ?>" 
                                                            alt="Card image cap" 
                                                            class="card-img-top object-fit-cover" 
                                                            onError="this.onerror=null; this.src='media/blank_image.jpg';"
                                                        >
                                                    </div>
                                
                                                    <div class="card-body text-center">
                                                        <h4 class="card-title font-20 mt-0"><?php echo $row['product_name']; ?></h4>
                                                        <p class="card-text"><?php echo $row['description']; ?>.</p>
                                                        <a href="#" class="btn btn-primary waves-effect waves-light">Beli</a>
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