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
    
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css">
    
</head>


<body>
    
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    
    <!-- Navigation Bar-->
    <?php include 'navbar.php'; ?>
    <!-- End Navigation Bar-->
    
    
    <div class="wrapper">
        <div class="container-fluid">
            
            
            
            <div class="logo d-flex justify-content-center my-4">
                <h1>DATA TRANSAKSI</h1>
            </div>
            
            <?php if (isset($_SESSION['LoginInfo'])) { ?>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                
                                
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Jumlah Produk</th>
                                            <th>Total Harga</th>
                                            <th>Produk</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>2024</td>
                                            <td>5</td>
                                            <td>120.000</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <img src="media/blank_image.jpg" style="width:50px; height:50px;" alt="">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge badge-primary">Dipesan</span></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    
                                                    <div class="mx-1"></div>
                                                    <a href="#"
                                                    onclick=""
                                                    class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-close"></i> Batalkan
                                                </a>
                                            </div>
                                        </td>
                                    </tr>                                               
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <?php } else { ?>
                
                <div class="d-flex justify-content-center">
                    <a href="auth/login_page.php" class="btn btn-primary btn-lg w-25 ">Login Untuk Melihat</a>
                </div>
                
                <?php } ?>
                
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
        
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        
        <script>
            let table = new DataTable('#myTable');
        </script>
        
    </body>
    </html>