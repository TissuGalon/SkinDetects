<?php
require_once '../controller/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validasi input
    if (empty($username) || empty($password) || empty($confirm_password)) {
        header('location:register_page.php?status=error&message=empty_fields');
        exit;
    }

    if ($password !== $confirm_password) {
        header('location:register_page.php?status=error&message=password_mismatch');
        exit;
    }

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        header('location:register_page.php?status=error&message=user_exists');
        exit;
    }
    $stmt->close();

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Simpan data pengguna ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $stmt->close();
        header('location:login_page.php?status=success&message=registered');
        exit;
    } else {
        $stmt->close();
        header('location:register_page.php?status=error&message=registration_failed');
        exit;
    }
} else {
    header('location:register_page.php?status=error&message=invalid_request');
    exit;
}
