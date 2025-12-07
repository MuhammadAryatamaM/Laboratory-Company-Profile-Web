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
      $stmt = $pdo->prepare("UPDATE contact_message SET is_read = 1 WHERE message_id = :id");
    } else {
      $stmt = $pdo->prepare("UPDATE guestbook_message SET is_read = 1 WHERE message_id = :id");
    }
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    http_response_code(200);
  } catch (PDOException $e) {
    http_response_code(500);
  }
// SEND REPLY
elseif ($module == 'message' && $act == 'send_reply') {
    $to = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message_body = $_POST['reply_message'];

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Admin <no-reply@yourdomain.com>" . "\r\n"; // Customize this

    // HTML Email 
    $htmlContent = "
    <html>
    <head>
    <title>Reply from Admin</title>
    </head>
    <body>
        <h2>Hello $name,</h2>
        <p>Thank you for contacting us. Here is our response:</p>
        <div style='background-color: #f9f9f9; padding: 15px; border-left: 4px solid #007bff; margin: 20px 0;'>
            $message_body
        </div>
        <p>Best regards,<br>The Team</p>
    </body>
    </html>";

    // Send email
    if(mail($to, $subject, $htmlContent, $headers)) {
        echo "<script>alert('Balasan berhasil dikirim ke $to.'); window.location='../../index.php?page=message';</script>";
    } else {
        echo "<script>alert('Gagal mengirim email. Pastikan server email terkonfigurasi (sendmail/SMTP).'); window.location='../../index.php?page=message';</script>";
    }
}
