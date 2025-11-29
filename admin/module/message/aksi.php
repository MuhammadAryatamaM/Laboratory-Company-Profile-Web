<?php
session_start();
include "../../../config/koneksi.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../../login.php?pesan=belum_login");
  exit();
}

$module = $_GET['module'];
$act = $_GET['act'];

// HAPUS
if ($module == 'message' && $act == 'delete') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=message';</script>";
    exit();
  }

  $id = $_GET['id'];
  $type = $_GET['type']; // 'contact' or 'guestbook'

  try {
    if ($type == 'contact') {
      $stmt = $pdo->prepare("DELETE FROM contact_message WHERE message_id = :id");
    } else {
      $stmt = $pdo->prepare("DELETE FROM guestbook_message WHERE message_id = :id");
    }
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>alert('Pesan berhasil dihapus.'); window.location='../../index.php?page=message';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menghapus pesan: " . $e->getMessage() . "'); window.location='../../index.php?page=message';</script>";
  }
}

// MARK AS READ (AJAX)
elseif ($module == 'message' && $act == 'mark_read') {
  $id = $_GET['id'];
  $type = $_GET['type'];

  try {
    if ($type == 'contact') {
      $stmt = $pdo->prepare("UPDATE contact_message SET is_read = TRUE WHERE message_id = :id");
    } else {
      $stmt = $pdo->prepare("UPDATE guestbook_message SET is_read = TRUE WHERE message_id = :id");
    }
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    http_response_code(200);
  } catch (PDOException $e) {
    http_response_code(500);
  }
}
