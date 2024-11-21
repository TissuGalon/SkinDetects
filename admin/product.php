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

                <?php
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    $title = '';
                    $message = '';
                    $alertType = 'success'; // Default alert type
                
                    // Tentukan pesan dan jenis alert berdasarkan status
                    if ($status == 'success') {
                        $title = 'Berhasil';
                        $message = 'Data berhasil ditambahkan.';
                        $alertType = 'success';
                    } elseif ($status == 'db_error') {
                        $title = 'Gagal';
                        $message = 'Terjadi kesalahan pada database.';
                        $alertType = 'error';
                    } elseif ($status == 'upload_error') {
                        $title = 'Gagal';
                        $message = 'Gagal mengunggah file.';
                        $alertType = 'error';
                    } elseif ($status == 'invalid_file') {
                        $title = 'Gagal';
                        $message = 'Format file tidak valid.';
                        $alertType = 'warning';
                    } elseif ($status == 'file_error') {
                        $title = 'Gagal';
                        $message = 'File gambar tidak ditemukan.';
                        $alertType = 'error';
                    } elseif ($status == 'success_delete') {
                        $title = 'Berhasil';
                        $message = 'Data berhasil dihapus.';
                        $alertType = 'success';
                    } elseif ($status == 'failed_delete') {
                        $title = 'Gagal';
                        $message = 'Data gagal dihapus.';
                        $alertType = 'error';
                    } elseif ($status == 'update_success') {
                        $title = 'Berhasil';
                        $message = 'Data berhasil diperbarui.';
                        $alertType = 'success';
                    } elseif ($status == 'update_failed') {
                        $title = 'Gagal';
                        $message = 'Data gagal diperbarui.';
                        $alertType = 'error';
                    }


                    if ($message !== '') {
                        // Script untuk menampilkan SweetAlert
                        echo "        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '$alertType',
                    title: '$title',
                    text: '$message',
                    timer: 3000, // Durasi notifikasi dalam milidetik
                    timerProgressBar: true
                }).then(() => {
                    // Hapus parameter status dari URL
                    const url = new URL(window.location.href);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                });

                // Hapus parameter jika pengguna klik sembarang tempat
                Swal.getContainer().addEventListener('click', () => {
                    const url = new URL(window.location.href);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                });
            });
        </script>";
                    }
                }
                ?>


                <!-- MODAL TAMBAH -->
                <div id="ModalTambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalTambahLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="ModalTambahLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="controller/tambah_product.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name"
                                            placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                            placeholder="Enter product description" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- MODAL TAMBAH -->


                <!-- MODAL UPDATE -->
                <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalUpdateLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="ModalUpdateLabel">Update Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="controller/edit_product.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" id="update_product_id" name="product_id">
                                    <div class="form-group">
                                        <label for="update_image">Product Image</label>
                                        <input type="file" class="form-control" id="update_image" name="image"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="update_product_name">Product Name</label>
                                        <input type="text" class="form-control" id="update_product_name"
                                            name="product_name" placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="update_description">Description</label>
                                        <textarea class="form-control" id="update_description" name="description"
                                            rows="3" placeholder="Enter product description" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- MODAL UPDATE -->



                <script>
                    function editProduct(idProduct, namaProduct, description) {
                        var myModal = new bootstrap.Modal(document.getElementById('ModalUpdate'));
                        myModal.show();

                        var update_product_id = document.getElementById('update_product_id');
                        var update_product_name = document.getElementById('update_product_name');
                        var update_description = document.getElementById('update_description');

                        update_product_id.value = idProduct;
                        update_product_name.value = namaProduct;
                        update_description.value = description;

                    }
                    function deleteProduct(idProduct) {
                        Swal.fire({
                            icon: "warning",
                            title: "Hapus Product ini?",
                            text: "Product akan dihapus permanen",
                            showCancelButton: true,
                            confirmButtonText: "Hapus",
                            confirmButtonColor: "#ec344c",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Arahkan ke URL untuk menghapus produk
                                window.location.href = `controller/hapus_product.php?id=${idProduct}`;
                            }
                        });
                    }
                    
                    
                    function viewImage(ImageUrl){
                        Swal.fire({                    
                            imageUrl: `${ImageUrl}`,  // URL gambar barcode
                            imageAlt: 'Product Image',  // Alt text untuk gambar
                            imageWidth: 400,  // Lebar gambar
                            imageHeight: 400,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonText: "Close"
                        }).then((result) => {
                        });
                    }

                </script>



                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- Page Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Product</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" data-toggle="modal" data-target="#ModalTambah"
                                            class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah Product</a>
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
                                                        <th>Product Name</th>
                                                        <th>Description</th>
                                                        <th>Ditambahkan pada</th>
                                                        <th>Product Code</th>
                                                        <th>Barcode</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query = mysqli_query($conn, "SELECT * FROM product");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $product_code = $row['product_code'];
                                                        ?>
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <?php echo $no++; ?>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <img src="../media/<?php echo $row['image']; ?>"
                                                                                                                                    class="rounded" alt="Product Image"
                                                                                                                                    style="width: 80px; height: 80px; cursor:Pointer;"
                                                                                                                                    onclick="viewImage('../media/<?php echo $row['image']; ?>')"
                                                                                                                                    onerror="this.onerror=null; this.src='../media/blank_image.jpg';">
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <?php echo $row['product_name']; ?>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <?php echo $row['description']; ?>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <?php echo $row['created_at']; ?>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <?php echo $product_code; ?>
                                                                                                                            </td>
                                                                                                                            <td>
                                                        <img src="../controller/generate_barcode.php?code=<?php echo urlencode($product_code); ?>" 
                                                             alt="Barcode">
                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <a href="../controller/generate_barcode.php?code=<?php echo urlencode($product_code); ?>" 
                                                                   download="barcode_<?php echo $product_code; ?>.png" 
                                                                   class="btn btn-sm btn-primary w-100"> 
                                                                   <i class="mdi mdi-download"></i> Simpan Barcode
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                                                                                            <td>
                                                                                                                                <div class="d-flex gap-2">
                                                                                                                                    <a href="#"
                                                                                                                                        onclick="editProduct('<?php echo $row['product_id']; ?>', '<?php echo $row['product_name']; ?>', '<?php echo $row['description']; ?>')"
                                                                                                                                        class="btn btn-sm btn-warning">
                                                                                                                                        <i class="mdi mdi-pencil"></i>
                                                                                                                                    </a>
                                                                                                                                    <div class="mx-1"></div>
                                                                                                                                    <a href="#"
                                                                                                                                        onclick="deleteProduct('<?php echo $row['product_id']; ?>')"
                                                                                                                                        class="btn btn-sm btn-danger">
                                                                                                                                        <i class="mdi mdi-delete"></i>
                                                                                                                                    </a>
                                                                                                                                </div>
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