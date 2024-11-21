// Inisialisasi elemen video dan status
const videoElement = document.getElementById("videoInput");
const statusElement = document.getElementById("status");
const skinStatusElement = document.getElementById("skinStatus");

// Memulai video stream dari webcam
async function startVideo() {
    const stream = await navigator.mediaDevices.getUserMedia({
        video: true
    });
    videoElement.srcObject = stream;
}


// Memuat model face-api.js
async function loadFaceApiModel() {
    // Pastikan path '/models' sesuai dengan lokasi model kamu
    await faceapi.nets.ssdMobilenetv1.loadFromUri('models/ssdMobilenetv1');
    await faceapi.nets.faceLandmark68Net.loadFromUri('models/faceLandmark68Net');
    await faceapi.nets.faceRecognitionNet.loadFromUri('models/faceRecognitionNet');
    console.log("Model berhasil dimuat");
}


// Fungsi deteksi wajah dengan face-api.js
async function detectFace() {
    statusElement.textContent = "Status: Mendeteksi wajah...";
    
    videoElement.onplay = async () => {
        const detections = await faceapi.detectAllFaces(videoElement)
            .withFaceLandmarks()
            .withFaceDescriptors();

        if (detections.length > 0) {
            statusElement.textContent = "Status: Wajah terdeteksi!";
            console.log("Wajah terdeteksi:", detections);

            // Ambil gambar wajah yang terdeteksi
            const faceCanvas = faceapi.createCanvasFromMedia(videoElement);
            const faceImage = faceCanvas.getContext('2d').getImageData(
                detections[0].detection._box.x, detections[0].detection._box.y, 
                detections[0].detection._box.width, detections[0].detection._box.height
            );

            // Kirim wajah yang terdeteksi untuk analisis kulit
            analyzeSkinIssues(faceImage);
        } else {
            statusElement.textContent = "Status: Tidak ada wajah terdeteksi.";
        }

        // Deteksi wajah secara berulang
        setTimeout(detectFace, 100);
    };
}

// Fungsi untuk menganalisis masalah kulit (menggunakan model TensorFlow.js)
async function analyzeSkinIssues(faceImage) {
    // Menggunakan model yang sudah dilatih (misalnya model analisis kulit)
    const model = await tf.loadLayersModel('C:\Users\asusr\Downloads\skin\skin\models');  // Ganti dengan path model yang sesuai
    
    // Preprocessing gambar wajah untuk model (resize dan normalisasi)
    let inputTensor = tf.browser.fromPixels(faceImage).resizeNearestNeighbor([224, 224]).toFloat().expandDims(0);
    
    // Analisis wajah untuk mendeteksi masalah kulit (jerawat, komedo, dll.)
    const prediction = model.predict(inputTensor);

    prediction.array().then(array => {
        console.log("Analisis Masalah Kulit:", array);
        
        // Berdasarkan hasil model, tampilkan status kulit
        if (array[0][0] > 0.5) {
            skinStatusElement.textContent = "Status Kulit: Jerawat terdeteksi!";
        } else {
            skinStatusElement.textContent = "Status Kulit: Kulit sehat!";
        }
    });
}

// Mulai video dan setup saat halaman dimuat
startVideo().then(setup);
