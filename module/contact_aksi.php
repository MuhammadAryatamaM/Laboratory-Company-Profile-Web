<?php
session_start();
include "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check which form was submitted
    if (isset($_POST['type']) && $_POST['type'] == 'contact') {
        // CONTACT FORM
        $full_name = htmlspecialchars($_POST['full_name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        try {
            $stmt = $pdo->prepare("INSERT INTO contact_message (full_name, email, message_text, is_read, received_at) VALUES (:name, :email, :message, FALSE, NOW())");
            $stmt->bindParam(':name', $full_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            
            echo "<script>alert('Pesan Anda telah terkirim! Terima kasih.'); window.location='../index.php#contact';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Gagal mengirim pesan: " . $e->getMessage() . "'); window.location='../index.php#contact';</script>";
        }

    } elseif (isset($_POST['type']) && $_POST['type'] == 'guestbook') {
        // GUESTBOOK FORM
        $name = htmlspecialchars($_POST['name']);
        $institution = htmlspecialchars($_POST['institution']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        try {
            $stmt = $pdo->prepare("INSERT INTO guestbook_message (full_name, institution, phone_number, email, message_text, is_read, received_at) VALUES (:name, :inst, :phone, :email, :message, FALSE, NOW())");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':inst', $institution);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            echo "<script>alert('Terima kasih telah mengisi buku tamu!'); window.location='../index.php#guest';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Gagal mengirim data: " . $e->getMessage() . "'); window.location='../index.php#guest';</script>";
        }
    } else {
         header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
?>
