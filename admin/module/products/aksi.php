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
if ($module == 'products' && $act == 'delete') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=product';</script>";
    exit();
  }

  $id = $_GET['id'];

  try {
    // Changed to product table, product_id
    $stmt = $pdo->prepare("SELECT image_url FROM product WHERE product_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data && !empty($data['image_url'])) {
      $file_path = "../../../assets/uploads/" . $data['image_url'];
      if (file_exists($file_path)) {
        unlink($file_path);
      }
    }

    $stmt = $pdo->prepare("DELETE FROM product WHERE product_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>alert('Produk berhasil dihapus.'); window.location='../../index.php?page=product';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menghapus produk: " . $e->getMessage() . "'); window.location='../../index.php?page=product';</script>";
  }
}

// TAMBAH
elseif ($module == 'products' && $act == 'input') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=product';</script>";
    exit();
  }

  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $link_url = $_POST['link_url'];
  $categories = $_POST['categories'];
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
      echo "<script>alert('Gagal mengunggah gambar.'); window.location='../../index.php?page=product&act=create';</script>";
      exit();
    }
  }

  try {
    // Changed to product_name, link_url
    $stmt = $pdo->prepare("INSERT INTO product (product_name, description, link_url, categories, image_url, created_at, updated_at) VALUES (:product_name, :description, :link_url, :categories, :image_url, NOW(), NOW())");
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':link_url', $link_url);
    $stmt->bindParam(':categories', $categories);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->execute();

    echo "<script>alert('Produk berhasil ditambahkan.'); window.location='../../index.php?page=product';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal menambahkan produk: " . $e->getMessage() . "'); window.location='../../index.php?page=product&act=create';</script>";
  }
}

// UPDATE
elseif ($module == 'products' && $act == 'update') {
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=product';</script>";
    exit();
  }

  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $link_url = $_POST['link_url'];
  $categories = $_POST['categories'];
  
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
      echo "<script>alert('Gagal mengunggah gambar baru.'); window.location='../../index.php?page=product&act=edit&id=$id';</script>";
      exit();
    }
  }

  try {
    $sql = "UPDATE product SET product_name = :product_name, description = :description, link_url = :link_url, categories = :categories, updated_at = NOW()";
    
    if ($update_image) {
      $sql .= ", image_url = :image_url";
    }
    
    $sql .= " WHERE product_id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':link_url', $link_url);
    $stmt->bindParam(':categories', $categories);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($update_image) {
      $stmt->bindParam(':image_url', $image_url);
    }

    $stmt->execute();

    echo "<script>alert('Produk berhasil diperbarui.'); window.location='../../index.php?page=product';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('Gagal memperbarui produk: " . $e->getMessage() . "'); window.location='../../index.php?page=product&act=edit&id=$id';</script>";
  }
}