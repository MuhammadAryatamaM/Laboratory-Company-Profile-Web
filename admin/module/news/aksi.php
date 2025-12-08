<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "../../../config/koneksi.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../../login.php?pesan=belum_login");
  exit();
}

$module = $_GET['module'];
$act = $_GET['act'];

// HAPUS
if ($module == 'news' && $act == 'delete') {
  $id = $_GET['id'];

  try {
    $stmt = $pdo->prepare("SELECT image_url FROM news WHERE news_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data && !empty($data['image_url'])) {
      $file_path = "../../../assets/uploads/" . $data['image_url'];
      if (file_exists($file_path)) {
        unlink($file_path);
      }
    }

    $stmt = $pdo->prepare("DELETE FROM news WHERE news_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>alert('Berita berhasil dihapus.'); window.location='../../index.php?page=news';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menghapus berita: " . $e->getMessage() . "'); window.location='../../index.php?page=news';</script>";
  }
}

// TAMBAH
elseif ($module == 'news' && $act == 'input') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $author_id = $_POST['author_id']; 
  $publish_date = $_POST['publish_date'];
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
      echo "<script>alert('Gagal mengunggah gambar.'); window.location='../../index.php?page=news&act=create';</script>";
      exit();
    }
  }

  try {
    $stmt = $pdo->prepare("INSERT INTO news (title, description, author_id, place, tag, publish_date, image_url, created_at, updated_at) VALUES (:title, :description, :author_id, :place, :tag, :publish_date, :image_url, NOW(), NOW())");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':author_id', $author_id);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->execute();

    echo "<script>alert('Berita berhasil ditambahkan.'); window.location='../../index.php?page=news';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menambahkan berita: " . $e->getMessage() . "'); window.location='../../index.php?page=news&act=create';</script>";
  }
}

elseif ($module == 'news' && $act == 'update') {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $author_id = !empty($_POST['author_id']) ? $_POST['author_id'] : null;
  $publish_date = $_POST['publish_date'];

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
      echo "<script>alert('Gagal mengunggah gambar baru.'); window.location='../../index.php?page=news&act=edit&id=$id';</script>";
      exit();
    }
  }

  try {
    $sql = "UPDATE news SET title = :title, description = :description, author_id = :author_id, place = :place, tag = :tag, publish_date = :publish_date, updated_at = NOW()";

    if ($update_image) {
      $sql .= ", image_url = :image_url";
    }

    $sql .= " WHERE news_id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':author_id', $author_id);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($update_image) {
      $stmt->bindParam(':image_url', $image_url);
    }

    $stmt->execute();

    echo "<script>alert('Berita berhasil diperbarui.'); window.location='../../index.php?page=news';</script>";
  } catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
  }
}
