<?php
session_start();

// Fungsi untuk cek apakah user sudah login
function checkLogin() {
    if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
        header("location:../login.php?pesan=belum_login");
        exit();
    }
}abs
?>