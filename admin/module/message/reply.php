<?php
$page_title = 'Reply Message';

// Get params
$id = isset($_GET['id']) ? $_GET['id'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$msg = null;
try {
  if ($type == 'contact') {
    $stmt = $pdo->prepare("SELECT * FROM contact_message WHERE message_id = :id");
  } else {
    $stmt = $pdo->prepare("SELECT * FROM guestbook_message WHERE message_id = :id");
  }
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $msg = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

if (!$msg) {
  echo "<script>alert('Message not found.'); window.location='?page=message';</script>";
  exit;
}
?>

<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=message" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Reply Message</h1>
        <p class="text-muted">Send an email reply to <?php echo htmlspecialchars($msg['full_name']); ?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Compose Reply</h5>

            <!-- Original Message  -->
            <div class="alert alert-secondary mb-4">
              <strong>Original Message from <?php echo htmlspecialchars($msg['full_name']); ?> (<?php echo htmlspecialchars($msg['email']); ?>):</strong><br>
              <em class="d-block mt-2">"<?php echo htmlspecialchars($msg['message_text']); ?>"</em>
            </div>

            <form method="POST" action="module/message/aksi.php?module=message&act=send_reply">
              <input type="hidden" name="email" value="<?php echo htmlspecialchars($msg['email']); ?>">
              <input type="hidden" name="name" value="<?php echo htmlspecialchars($msg['full_name']); ?>">
              
              <div class="mb-3">
                <label for="to" class="form-label">To</label>
                <input type="email" class="form-control" id="to" value="<?php echo htmlspecialchars($msg['email']); ?>" disabled>
              </div>

              <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="Re: Your message to WeProfile" required>
              </div>

              <div class="mb-4">
                <label for="reply_message" class="form-label">Message</label>
                <textarea class="form-control summernote" id="reply_message" name="reply_message" rows="10" required></textarea>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=message" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-paper-plane"></i> Send Reply
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
