<?php
session_start();
include "../../../config/koneksi.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../../login.php?pesan=belum_login");
  exit();
}

$module = $_GET['module'];
$act = $_GET['act'];

// UPDATE
if ($module == 'settings' && $act == 'update') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=settings';</script>";
    exit();
  }

  $settings = [
    'vision' => $_POST['vision'],
    'mission' => $_POST['mission'],
    'address' => $_POST['address'],
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'youtube' => $_POST['youtube']
  ];

  try {
    $pdo->beginTransaction();

    // Changed to site_settings
    $stmt = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value) VALUES (:key, :value) ON CONFLICT (setting_key) DO UPDATE SET setting_value = :value");

    foreach ($settings as $key => $value) {
      $stmt->execute([':key' => $key, ':value' => $value]);
    }

    $pdo->commit();
    echo "<script>alert('Pengaturan berhasil disimpan.'); window.location='../../index.php?page=settings';</script>";
  } catch (PDOException $e) {
    $pdo->rollBack();
    echo "<script>alert('Gagal menyimpan pengaturan: " . $e->getMessage() . "'); window.location='../../index.php?page=settings';</script>";
  }
}
