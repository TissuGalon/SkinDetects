<?php
session_start();
if (isset($_SESSION['LoginInfo'])) {
    $logininfo = $_SESSION['LoginInfo'];
    if ($logininfo['role'] == '1') {
        header('location:admin/index.php');
    }
    if ($logininfo['role'] == '2') {
        header('location:dashboard.php');
    } else {
        header('location:dashboard.php');
    }
} else {
    header('location:dashboard.php');
}

?>