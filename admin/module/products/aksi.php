<?php
session_start();
include "../../../config/koneksi.php";
include "../../../helper/antiinjection.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../../login.php");
    exit();
}

$module = $_GET['module'];
$act = $_GET['act'];

// HAPUS
if ($module == 'products' && $act == 'delete') {
    echo "<script>alert('Data produk berhasil dihapus'); window.location='../../index.php?module=products';</script>";
}

// TAMBAH
elseif ($module == 'products' && $act == 'input') {
    $nama_produk = anti_injection($koneksi, $_POST['nama_produk']);
    $deskripsi = anti_injection($koneksi, $_POST['deskripsi']);
    $harga = anti_injection($koneksi, $_POST['harga']);
    
    // Logika upload gambar nanti
    
    echo "<script>alert('Data produk berhasil disimpan'); window.location='../../index.php?module=products';</script>";
}

// UPDATE
elseif ($module == 'products' && $act == 'update') {
    $id = $_POST['id'];
    $nama_produk = anti_injection($koneksi, $_POST['nama_produk']);
    $deskripsi = anti_injection($koneksi, $_POST['deskripsi']);
    $harga = anti_injection($koneksi, $_POST['harga']);

    echo "<script>alert('Data produk berhasil diubah'); window.location='../../index.php?module=products';</script>";
}
?>