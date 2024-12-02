<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Glow Skincare - OpenCV.js Acne Detection</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        #scanner-container {
            width: 100%;
            height: 600px;
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
    <div class="container">
        <div id="scanner-container">
            <video id="video" autoplay></video>
            <canvas id="canvas-output" style="display:none;"></canvas>
        </div>
        <button id="start-button" onclick="startDetection()">Start Deteksi Jerawat</button>
        <div id="results">
            <h4>Hasil Deteksi:</h4>
            <p id="detection-result">Menunggu deteksi...</p>
        </div>
    </div>

    <!-- OpenCV.js -->
    <script async src="https://docs.opencv.org/4.x/opencv.js"></script>

    <script>
        let videoStream;
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas-output');
        const ctx = canvas.getContext('2d');

        cv['onRuntimeInitialized'] = () => {
            console.log("OpenCV.js is ready!");
        };

        async function startDetection() {
            document.getElementById("start-button").disabled = true;

            try {
                videoStream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = videoStream;
                video.onloadeddata = processVideo;
            } catch (error) {
                console.error("Error accessing webcam:", error);
                document.getElementById("detection-result").innerText = "Gagal mengakses webcam.";
            }
        }

        function processVideo() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Pastikan gambar dari canvas valid
            let src = cv.imread(canvas);
            if (src.empty()) {
                console.error("Failed to read image from canvas.");
                return;
            }

            let dst = new cv.Mat();

            // Membuat matriks untuk rentang warna
            let low = new cv.Mat(src.rows, src.cols, src.type(), [0, 50, 80, 0]);  // Rentang warna bawah
            let high = new cv.Mat(src.rows, src.cols, src.type(), [35, 255, 255, 0]); // Rentang warna atas

            try {
                // Konversi ke ruang warna HSV
                cv.cvtColor(src, src, cv.COLOR_RGB2HSV);

                // Deteksi warna
                cv.inRange(src, low, high, dst); // Deteksi warna berdasarkan rentang low-high

                let contours = new cv.MatVector();
                let hierarchy = new cv.Mat();
                cv.findContours(dst, contours, hierarchy, cv.RETR_CCOMP, cv.CHAIN_APPROX_SIMPLE);

                if (contours.size() > 0) {
                    document.getElementById("detection-result").innerText = "Jerawat Terdeteksi!";
                    captureImage(); // Menangkap gambar saat jerawat terdeteksi
                } else {
                    document.getElementById("detection-result").innerText = "Tidak Ada Jerawat Terdeteksi.";
                }

                contours.delete();
                hierarchy.delete();
            } catch (error) {
                console.error("Error in OpenCV processing:", error);
            }

            src.delete();
            dst.delete();
            low.delete();
            high.delete();

            requestAnimationFrame(processVideo); // Memproses frame berikutnya
        }

        function captureImage() {
            // Menangkap gambar ketika jerawat terdeteksi
            let capturedImage = canvas.toDataURL("image/png");
            let imgWindow = window.open('', '_blank');
            imgWindow.document.write('<img src="' + capturedImage + '" />');
        }



        function captureImage() {
            const imageUrl = canvas.toDataURL("image/png");
            window.location.href = `detection-result.html?image=${encodeURIComponent(imageUrl)}`;
        }
    </script>
</body>

</html>