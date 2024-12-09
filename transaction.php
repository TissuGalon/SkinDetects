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
                                
                                
                                                                   <?php
                                                                   // Pastikan file koneksi ada
                                                                   require_once 'controller/koneksi.php';

                                                                   // Query untuk mengambil data dari tabel `pemesanan`
                                                                   $sql = "SELECT * 
        FROM pemesanan p 
        JOIN product pr ON p.id_product = pr.product_id 
        ";

                                                                   $result = mysqli_query($conn, $sql);
                                                                   ?>

                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Jumlah Produk</th>
                                                <th>Total Harga</th>
                                                <th>Produk</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                $no = 1; // Untuk membuat penomoran urut
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                                                                                                <tr>
                                                                                                                                    <th scope="row"><?php echo $no++; ?></th>                                                                                                            
                                                                                                                                    <td><?php echo $row['qty']; ?></td>
                                                                                                                                    <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                                                                                                                    <td>
                                                                                                                                        <ul>
                                                                                                                                            <li>
                                                                                                                                                <img 
                                                                                                                                                    src="media/<?php echo $row['image']; ?>" 
                                                                                                                                                    style="width:50px; height:50px;" 
                                                                                                                                                    alt="Gambar Produk" 
                                                                                                                                                    onerror="this.onerror=null; this.src='media/blank_image.jpg';"
                                                                                                                                                >
                                                                                                                                                <br><?php echo $row['product_name']; ?>
                                                                                                                                            </li>
                                                                                                                                        </ul>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <?php
                                                                                                                                        if ($row['status'] == 'dipesan') {
                                                                                                                                            echo '<span class="badge badge-primary">Dipesan</span>';
                                                                                                                                        } elseif ($row['status'] == 'dikirim') {
                                                                                                                                            echo '<span class="badge badge-success">Dikirim</span>';
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div class="d-flex gap-2">
                                                                                                                                            <a href="controller/batalkan_pemesanan.php?id=<?php echo $row['id_pemesanan']; ?>" 
                                                                                                                                               class="btn btn-sm btn-danger"
                                                                                                                                               onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                                                                                                                                <i class="mdi mdi-close"></i> Batalkan
                                                                                                                                            </a>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr> 
                                                                                                                        <?php
                                                }
                                            } else {
                                                ?>
                                                                                        <tr>
                                                                                            <td colspan="7" class="text-center">Belum ada data pemesanan</td>
                                                                                        </tr>
                                                                                <?php
                                            }
                                            ?>
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