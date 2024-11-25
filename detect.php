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
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>

    <style>
        #scanner-container {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            background: #000;
        }

        #scanner-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #results {
            margin-top: 20px;
        }

        #start-button {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #start-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
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
                    <h1>Face Detect - Real-Time Acne Detection</h1>
                </div>
            </div>

            <br>

            <div class="container">
                <!-- Webcam Feed -->
                <div id="scanner-container">
                    <video id="video" width="100%" height="auto" autoplay></video>
                </div>

                <br>
                <!-- Start Button -->
                <button id="start-button" onclick="startDetection()">Start Deteksi Jerawat</button>

                <br>
                <div id="results">
                    <h4>Hasil Deteksi:</h4>
                    <p id="detection-result">Menunggu deteksi...</p>
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
        let model;
        let videoStream;

        // Memuat model deteksi objek COCO-SSD
        async function loadModel() {
            model = await cocoSsd.load();
            console.log("Model loaded successfully!");
        }

        // Fungsi untuk memulai deteksi jerawat setelah tombol Start diklik
        async function startDetection() {
            // Nonaktifkan tombol untuk mencegah klik ganda
            document.getElementById("start-button").disabled = true;

            // Mengakses webcam dan menampilkan video
            const video = document.getElementById("video");
            videoStream = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            video.srcObject = videoStream;

            // Setelah video dimulai, deteksi objek setiap frame
            detectVideo(video);
        }

        // Fungsi untuk mendeteksi jerawat pada video secara real-time
        async function detectVideo(videoElement) {
            const predictions = await model.detect(videoElement);

            // Menampilkan hasil deteksi
            if (predictions.length > 0) {
                document.getElementById("detection-result").innerText = "Jerawat Terdeteksi!";
                // Bisa menambahkan logika untuk deteksi jerawat berdasarkan prediksi
            } else {
                document.getElementById("detection-result").innerText = "Tidak ada jerawat yang terdeteksi.";
            }

            // Melakukan deteksi lagi pada frame berikutnya
            requestAnimationFrame(() => detectVideo(videoElement));
        }

        // Memuat model saat halaman dimuat
        window.onload = loadModel;
    </script>

</body>

</html>
