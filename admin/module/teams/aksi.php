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
if ($module == 'teams' && $act == 'delete') {
    echo "<script>alert('Anggota tim berhasil dihapus'); window.location='../../index.php?module=teams';</script>";
}

// TAMBAH
elseif ($module == 'teams' && $act == 'input') {
    $nama = anti_injection($koneksi, $_POST['nama']);
    $jabatan = anti_injection($koneksi, $_POST['jabatan']);
    $deskripsi = anti_injection($koneksi, $_POST['deskripsi']);
    
    echo "<script>alert('Anggota tim berhasil ditambahkan'); window.location='../../index.php?module=teams';</script>";
}

// UPDATE
elseif ($module == 'teams' && $act == 'update') {
    $id = $_POST['id'];
    $nama = anti_injection($koneksi, $_POST['nama']);
    $jabatan = anti_injection($koneksi, $_POST['jabatan']);
    $deskripsi = anti_injection($koneksi, $_POST['deskripsi']);

    echo "<script>alert('Data anggota tim berhasil diubah'); window.location='../../index.php?module=teams';</script>";
}
?>