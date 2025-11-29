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
if ($module == 'gallery' && $act == 'delete') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=gallery';</script>";
    exit();
  }

  $id = $_GET['id'];

  try {
    // Changed to gallery_item, image_url, item_id
    $stmt = $pdo->prepare("SELECT image_url FROM gallery_item WHERE item_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data && !empty($data['image_url'])) {
      $file_path = "../../../assets/uploads/" . $data['image_url'];
      if (file_exists($file_path)) {
        unlink($file_path);
      }
    }

    $stmt = $pdo->prepare("DELETE FROM gallery_item WHERE item_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>alert('Foto berhasil dihapus.'); window.location='../../index.php?page=gallery';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menghapus foto: " . $e->getMessage() . "'); window.location='../../index.php?page=gallery';</script>";
  }
}

// TAMBAH
elseif ($module == 'gallery' && $act == 'input') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=gallery';</script>";
    exit();
  }

  $title = $_POST['title'];
  $image_url = '';

  if (!empty($_FILES['image_url']['name'])) {
    $lokasi_file = $_FILES['image_url']['tmp_name'];
    $nama_file = $_FILES['image_url']['name'];
    $acak = rand(1, 99);
    $nama_file_unik = $acak . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nama_file);
    $folder = "../../../assets/uploads/";

    if (move_uploaded_file($lokasi_file, $folder . $nama_file_unik)) {
      $image_url = $nama_file_unik;
    } else {
      echo "<script>alert('Gagal mengunggah foto.'); window.location='../../index.php?page=gallery&act=create';</script>";
      exit();
    }
  }

  try {
    // Changed to gallery_item, item_date
    $stmt = $pdo->prepare("INSERT INTO gallery_item (title, image_url, item_date, created_at) VALUES (:title, :image_url, NOW(), NOW())");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->execute();

    echo "<script>alert('Foto berhasil ditambahkan.'); window.location='../../index.php?page=gallery';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menambahkan foto: " . $e->getMessage() . "'); window.location='../../index.php?page=gallery&act=create';</script>";
  }
}

// UPDATE
elseif ($module == 'gallery' && $act == 'update') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=gallery';</script>";
    exit();
  }

  $id = $_POST['id'];
  $title = $_POST['title'];
  
  $image_url = '';
  $update_image = false;

  if (!empty($_FILES['image_url']['name'])) {
    $lokasi_file = $_FILES['image_url']['tmp_name'];
    $nama_file = $_FILES['image_url']['name'];
    $acak = rand(1, 99);
    $nama_file_unik = $acak . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nama_file);
    $folder = "../../../assets/uploads/";

    if (move_uploaded_file($lokasi_file, $folder . $nama_file_unik)) {
      $image_url = $nama_file_unik;
      $update_image = true;
    } else {
      echo "<script>alert('Gagal mengunggah foto baru.'); window.location='../../index.php?page=gallery&act=edit&id=$id';</script>";
      exit();
    }
  }

  try {
    $sql = "UPDATE gallery_item SET title = :title";
    
    if ($update_image) {
      $sql .= ", image_url = :image_url";
    }
    
    $sql .= " WHERE item_id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($update_image) {
      $stmt->bindParam(':image_url', $image_url);
    }

    $stmt->execute();

    echo "<script>alert('Foto berhasil diperbarui.'); window.location='../../index.php?page=gallery';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal memperbarui foto: " . $e->getMessage() . "'); window.location='../../index.php?page=gallery&act=edit&id=$id';</script>";
  }
}
