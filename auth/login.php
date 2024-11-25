<?php
require_once '../controller/koneksi.php';

if (isset($_POST['id']) && isset($_POST['password'])) {
    $username = trim($_POST['id']);
    $password = trim($_POST['password']);

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['LoginInfo'] = $row;
            header('Location: ../index.php?status=success');
            exit();
        } else {
            // Password salah
            header('Location: login_page.php?status=error');
            exit();
        }
    } else {
        // Username tidak ditemukan
        header('Location: login_page.php?status=error');
        exit();
    }
} else {
    // Jika input tidak lengkap
    header('Location: login_page.php?status=error');
    exit();
}
?>
