<?php
require_once '../controller/koneksi.php';
session_start();
require '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Product</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/plugins/morris/morris.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Left Sidebar -->
        <?php include 'component/sidebar.php'; ?>

        <!-- Content -->
        <div class="content-page">
            <div class="content">

                <!-- Header -->
                <?php include 'component/header.php'; ?>

             



                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- Page Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Users</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                      <!--   <a href="#" data-toggle="modal" data-target="#ModalTambah"
                                            class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah Users</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="myTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Username</th>
                                                        <th>Username</th>
                                                        <th>Ditambahkan pada</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query = mysqli_query($conn, "SELECT * FROM users");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php echo $no++; ?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <img src="../media/users/<?php echo $row['photo_profile']; ?>"
                                                                                                                    class="rounded" alt="Product Image"
                                                                                                                    style="width: 80px; height: 80px;"
                                                                                                                    onerror="this.onerror=null; this.src='../media/blank_image.jpg';">
                                                                                                               
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $row['username']; ?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $row['fullname']; ?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $row['created_at']; ?>
                                                                                                            </td>                                                                       
                                                                                  
                                                                                                        </tr>
                                                    <?php } ?>
                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
            </div>
            <footer class="footer">© 2024</footer>



        </div>
        <!-- Content -->

    </div>
    <!-- Begin page -->




    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
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


    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>


</body>

</html>