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

    $stmtCount = $pdo->query("SELECT 
        (SELECT COUNT(*) FROM contact_message WHERE is_read = FALSE) + 
        (SELECT COUNT(*) FROM guestbook_message WHERE is_read = FALSE) as total_unread");
    $rowCount = $stmtCount->fetch(PDO::FETCH_ASSOC);
    $new_count = $rowCount['total_unread'] ? $rowCount['total_unread'] : 0;

    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'unread_count' => $new_count]);
    exit();

  } catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit();
  }
} 


elseif ($module == 'message' && $act == 'send_reply') {
    $to = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message_body = $_POST['reply_message'];

    // Include SimpleSMTP
    include_once '../../../helper/smtp.php';


    $stmtUser = "echenwijono@gmail.com"; 
    $stmtPass = "nkui xjxv tspy mtby";
    
    $smtp = new SimpleSMTP('smtp.gmail.com', 465, $stmtUser, $stmtPass);
    
    $fullMessage = "
    <html>
    <head><title>Reply</title></head>
    <body style='font-family: Arial, sans-serif;'>
        <h3>Hello " . htmlspecialchars($name) . ",</h3>
        <p>Thank you for contacting us. Here is our response:</p>
        <div style='background-color: #f0f4f8; padding: 15px; border-left: 4px solid #007bff; margin: 20px 0;'>
            $message_body
        </div>
        <p>Best regards,<br><b>Admin Web Profile</b></p>
    </body>
    </html>";

    if($smtp->send($to, $subject, $fullMessage, "Admin Web Profile")) {
        echo "<script>alert('Balasan berhasil dikirim ke $to.'); window.location='../../index.php?page=message';</script>";
    } else {
        $errorLog = json_encode($smtp->getLog());
        echo "<script>alert('Gagal mengirim email. Detail Error: ' + $errorLog); window.location='../../index.php?page=message';</script>";
    }
}
