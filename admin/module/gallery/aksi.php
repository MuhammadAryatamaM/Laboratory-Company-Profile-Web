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
if ($module == 'gallery' && $act == 'delete') {
    echo "<script>alert('Foto berhasil dihapus dari galeri'); window.location='../../index.php?module=gallery';</script>";
}

// TAMBAH
elseif ($module == 'gallery' && $act == 'input') {
    $judul = anti_injection($koneksi, $_POST['judul']);
    $keterangan = anti_injection($koneksi, $_POST['keterangan']);
    
    echo "<script>alert('Foto berhasil ditambahkan ke galeri'); window.location='../../index.php?module=gallery';</script>";
}

// UPDATE
elseif ($module == 'gallery' && $act == 'update') {
    $id = $_POST['id'];
    $judul = anti_injection($koneksi, $_POST['judul']);
    $keterangan = anti_injection($koneksi, $_POST['keterangan']);

    echo "<script>alert('Info galeri berhasil diperbarui'); window.location='../../index.php?module=gallery';</script>";
}
?>