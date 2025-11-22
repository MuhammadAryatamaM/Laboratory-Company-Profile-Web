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
if ($module == 'teams' && $act == 'delete') {
  // Permission Check
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=teams';</script>";
    exit();
  }

  $member_id = $_GET['id'];
  $admin_id = null;

  $pdo->beginTransaction();
  try {
    // Find admin_id associated with the team member
    $stmt = $pdo->prepare("SELECT admin_id FROM team_member WHERE member_id = :member_id");
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      $admin_id = $result['admin_id'];
    }

    // Delete team_member
    $stmt = $pdo->prepare("DELETE FROM team_member WHERE member_id = :member_id");
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();

    // Delete associated admin account if it exists
    if ($admin_id) {
      $stmt = $pdo->prepare("DELETE FROM admin WHERE admin_id = :admin_id");
      $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
      $stmt->execute();
    }

    $pdo->commit();
    echo "<script>alert('Anggota tim berhasil dihapus.'); window.location='../../index.php?page=teams';</script>";
  } catch (PDOException $e) {
    $pdo->rollBack();
    echo "<script>alert('Gagal menghapus anggota tim: " . $e->getMessage() . "'); window.location='../../index.php?page=teams';</script>";
  }
}

// TAMBAH
elseif ($module == 'teams' && $act == 'input') {
  // Permission Check
  if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
    echo "<script>alert('Anda tidak memiliki izin untuk melakukan aksi ini.'); window.location='../../index.php?page=teams';</script>";
    exit();
  }

  // Form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $full_name = $_POST['full_name'];
  $nip = $_POST['nip'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $position = $_POST['position'];
  $facebook_url = $_POST['facebook_url'];
  $instagram_url = $_POST['instagram_url'];
  $google_scholar_url = $_POST['google_scholar_url'];
  $photo_url = '';

  // Hash password
  $password_hash = password_hash($password, PASSWORD_BCRYPT);

  // Handle file upload
  if (!empty($_FILES['photo_url']['name'])) {
    $lokasi_file = $_FILES['photo_url']['tmp_name'];
    $nama_file = $_FILES['photo_url']['name'];
    $acak = rand(1, 99);
    $nama_file_unik = $acak . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nama_file);
    $folder = "../../../assets/uploads/";

    if (move_uploaded_file($lokasi_file, $folder . $nama_file_unik)) {
      $photo_url = $nama_file_unik;
    } else {
      echo "<script>alert('Gagal mengunggah foto.'); window.location='../../index.php?page=teams&act=create';</script>";
      exit();
    }
  }

  $pdo->beginTransaction();
  try {
    // 1. Insert into admin table
    $stmt_admin = $pdo->prepare("INSERT INTO admin (username, password_hash) VALUES (:username, :password_hash)");
    $stmt_admin->bindParam(':username', $username);
    $stmt_admin->bindParam(':password_hash', $password_hash);
    $stmt_admin->execute();
    $admin_id = $pdo->lastInsertId();

    // 2. Insert into team_member table
    $stmt_member = $pdo->prepare(
      "INSERT INTO team_member (admin_id, full_name, nip, phone_number, email, position, facebook_url, instagram_url, google_scholar_url, photo_url, created_at, updated_at)
             VALUES (:admin_id, :full_name, :nip, :phone_number, :email, :position, :facebook_url, :instagram_url, :google_scholar_url, :photo_url, NOW(), NOW())"
    );
    $stmt_member->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
    $stmt_member->bindParam(':full_name', $full_name);
    $stmt_member->bindParam(':nip', $nip);
    $stmt_member->bindParam(':phone_number', $phone_number);
    $stmt_member->bindParam(':email', $email);
    $stmt_member->bindParam(':position', $position);
    $stmt_member->bindParam(':facebook_url', $facebook_url);
    $stmt_member->bindParam(':instagram_url', $instagram_url);
    $stmt_member->bindParam(':google_scholar_url', $google_scholar_url);
    $stmt_member->bindParam(':photo_url', $photo_url);
    $stmt_member->execute();

    $pdo->commit();
    echo "<script>alert('Anggota tim berhasil ditambahkan.'); window.location='../../index.php?page=teams';</script>";
  } catch (PDOException $e) {
    $pdo->rollBack();
    echo "<script>alert('Gagal menambahkan anggota tim: " . $e->getMessage() . "'); window.location='../../index.php?page=teams&act=create';</script>";
  }
}

// UPDATE
elseif ($module == 'teams' && $act == 'update') {
  $member_id = $_POST['member_id'];

  // Permission Check
  $is_kepala = isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium';
  $is_own_profile = isset($_SESSION['member_id']) && $_SESSION['member_id'] == $member_id;

  if (!$is_kepala && !$is_own_profile) {
    echo "<script>alert('Anda tidak memiliki izin untuk mengedit profil ini.'); window.location='../../index.php?page=teams';</script>";
    exit();
  }

  // Form data
  $full_name = $_POST['full_name'];
  $nip = $_POST['nip'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $position = $_POST['position'];
  $facebook_url = $_POST['facebook_url'];
  $instagram_url = $_POST['instagram_url'];
  $google_scholar_url = $_POST['google_scholar_url'];

  $photo_url = '';
  $update_photo = false;

  // Handle file upload
  if (!empty($_FILES['photo_url']['name'])) {
    $lokasi_file = $_FILES['photo_url']['tmp_name'];
    $nama_file = $_FILES['photo_url']['name'];
    $acak = rand(1, 99);
    $nama_file_unik = $acak . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nama_file);
    $folder = "../../../assets/uploads/";

    if (move_uploaded_file($lokasi_file, $folder . $nama_file_unik)) {
      $photo_url = $nama_file_unik;
      $update_photo = true;
    } else {
      echo "<script>alert('Gagal mengunggah foto baru.'); window.location='../../index.php?page=teams&act=edit&id=$member_id';</script>";
      exit();
    }
  }

  $pdo->beginTransaction();
  try {
    // Update admin table if user is Kepala Laboratorium and fields are set
    if ($is_kepala && (isset($_POST['username']) || !empty($_POST['password']))) {
      // Get admin_id from team_member
      $stmt_get_admin = $pdo->prepare("SELECT admin_id FROM team_member WHERE member_id = :member_id");
      $stmt_get_admin->bindParam(':member_id', $member_id, PDO::PARAM_INT);
      $stmt_get_admin->execute();
      $admin_data = $stmt_get_admin->fetch(PDO::FETCH_ASSOC);

      if ($admin_data) {
        $admin_id = $admin_data['admin_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $update_admin_sql_parts = [];
        $params = [];

        if (!empty($username)) {
          $update_admin_sql_parts[] = "username = :username";
          $params[':username'] = $username;
        }

        if (!empty($password)) {
          $password_hash = password_hash($password, PASSWORD_BCRYPT);
          $update_admin_sql_parts[] = "password_hash = :password_hash";
          $params[':password_hash'] = $password_hash;
        }

        if (!empty($params)) {
          $update_admin_sql = "UPDATE admin SET " . implode(", ", $update_admin_sql_parts) . " WHERE admin_id = :admin_id";
          $params[':admin_id'] = $admin_id;

          $stmt_admin_update = $pdo->prepare($update_admin_sql);
          $stmt_admin_update->execute($params);
        }
      }
    }

    // Update team_member table
    $sql = "UPDATE team_member SET 
                full_name = :full_name, 
                nip = :nip, 
                phone_number = :phone_number, 
                email = :email, 
                position = :position,
                facebook_url = :facebook_url,
                instagram_url = :instagram_url,
                google_scholar_url = :google_scholar_url,
                updated_at = NOW()";

    if ($update_photo) {
      $sql .= ", photo_url = :photo_url";
    }

    $sql .= " WHERE member_id = :member_id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
    $stmt->bindParam(':nip', $nip, PDO::PARAM_STR);
    $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':facebook_url', $facebook_url, PDO::PARAM_STR);
    $stmt->bindParam(':instagram_url', $instagram_url, PDO::PARAM_STR);
    $stmt->bindParam(':google_scholar_url', $google_scholar_url, PDO::PARAM_STR);
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    if ($update_photo) {
      $stmt->bindParam(':photo_url', $photo_url, PDO::PARAM_STR);
    }

    $stmt->execute();

    $pdo->commit();
    echo "<script>alert('Data anggota tim berhasil diubah.'); window.location='../../index.php?page=teams';</script>";
  } catch (PDOException $e) {
    $pdo->rollBack();
    echo "<script>alert('Gagal memperbarui anggota tim: " . $e->getMessage() . "'); window.location='../../index.php?page=teams&act=edit&id=$member_id';</script>";
  }
}

