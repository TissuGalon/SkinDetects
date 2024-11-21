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
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <?php include 'navbar.php'; ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- CAROUSEL -->
                <div class="col-lg-12 mt-2">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="gambar/somethink.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="gambar/somethink2.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="gambar/haul.jpeg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CAROUSEL -->

                <div class="logo d-flex justify-content-center">
                    <h1>NEW FAVORITE BEAUTIES</h1>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img class="d-block img-fluid rounded" src="gambar/skintific.jpeg" alt="First slide">
                                        <h4 class="mt-3">Skintific 5X Ceramide Serum</h4>
                                        <p class="text-secondary">Serum dengan kandungan 5 jenis ceramide untuk memperbaiki dan menjaga skin barrier.</p>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img class="d-block img-fluid rounded" src="gambar/somethink.jpg" alt="First slide">
                                        <h4 class="mt-3">Somethinc Niacinamide + Moisture Sabi Beet Serum</h4>
                                        <p class="text-secondary">Serum dengan Niacinamide untuk mencerahkan dan mengurangi noda hitam pada kulit.</p>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img class="d-block img-fluid rounded" src="gambar/somethink2.jpg" alt="First slide">
                                        <h4 class="mt-3">Somethinc Hyaluronic B5 Serum</h4>
                                        <p class="text-secondary">Serum yang membantu menjaga kelembapan kulit dengan kandungan Hyaluronic Acid dan Vitamin B5.</p>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

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
            if (typeof Skycons !== 'undefined'){
           var icons = new Skycons(
               {"color": "#fff"},
               {"resizeClear": true}
               ),
                   list  = [
                       "clear-day", "clear-night", "partly-cloudy-day",
                       "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                       "fog"
                   ],
                   i;

               for(i = list.length; i--; )
               icons.set(list[i], list[i]);
               icons.play();
           };

       // scroll

       $(document).ready(function() {
       
       $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
       $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
       
       });
       </script>



    </body>
</html>