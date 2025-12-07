<?php
$page_title = 'Messages';

// Fetch all messages from both tables
try {
  // Fetch Contact Messages
  $stmt = $pdo->query("SELECT message_id as id, full_name as name, email, message_text as message, is_read, received_at as created_at, 'contact' as type, NULL as institution, NULL as phone_number FROM contact_message");
  $contact_messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Fetch Guestbook Messages
  $stmt = $pdo->query("SELECT message_id as id, full_name as name, email, message_text as message, is_read, received_at as created_at, 'guestbook' as type, institution, phone_number FROM guestbook_message");
  $guestbook_messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Merge and Sort
  $messages = array_merge($contact_messages, $guestbook_messages);
  usort($messages, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
  });

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $messages = [];
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Messages</h1>
        <p class="text-muted">Manage contact form and guestbook messages</p>
      </div>
    </div>

    <div class="row">
      <?php foreach ($messages as $msg) : ?>
        <div class="col-md-6 mb-3">
          <div class="message-card <?php echo $msg['is_read'] ? 'message-read' : 'message-unread'; ?> h-100" 
               data-bs-toggle="modal" 
               data-bs-target="#messageModal" 
               data-id="<?php echo $msg['id']; ?>"
               data-message-type="<?php echo htmlspecialchars($msg['type']); ?>" 
               data-message-name="<?php echo htmlspecialchars($msg['name']); ?>" 
               data-message-email="<?php echo htmlspecialchars($msg['email']); ?>" 
               data-message-institution="<?php echo htmlspecialchars($msg['institution'] ?? ''); ?>" 
               data-message-phone="<?php echo htmlspecialchars($msg['phone_number'] ?? ''); ?>" 
               data-message-date="<?php echo date('d/m/Y', strtotime($msg['created_at'])); ?>" 
               data-message-text="<?php echo htmlspecialchars($msg['message']); ?>" 
               data-is-read="<?php echo $msg['is_read'] ? 'true' : 'false'; ?>">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                <h5 class="<?php echo $msg['is_read'] ? 'text-dark' : 'text-danger'; ?>">
                  <span class="message-name"><?php echo htmlspecialchars($msg['name']); ?></span> 
                  <?php if (!$msg['is_read']) : ?>
                    <span class="badge bg-danger new-badge">New</span>
                  <?php endif; ?>
                </h5>
                <p class="text-muted small mb-0"><?php echo htmlspecialchars($msg['email']); ?></p>
              </div>
              <span class="badge bg-dark"><?php echo ucfirst($msg['type']); ?></span>
            </div>
            <p class="card-text"><?php echo substr(htmlspecialchars($msg['message']), 0, 100) . '...'; ?></p>
            <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> <?php echo date('d/m/Y', strtotime($msg['created_at'])); ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($messages)) : ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            No messages found.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<!-- Message Details Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted small">View the full message and reply if needed.</p>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="text-muted small">Full Name</label>
            <p class="fw-600" id="modalMessageName"></p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Email</label>
            <p class="fw-600" id="modalMessageEmail"></p>
          </div>
        </div>

        <div class="row mb-4" id="guestbookFields" style="display: none;">
          <div class="col-md-6">
            <label class="text-muted small">Institution</label>
            <p class="fw-600" id="modalMessageInstitution"></p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Phone Number</label>
            <p class="fw-600" id="modalMessagePhone"></p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="text-muted small">Type</label>
            <p><span class="badge bg-dark" id="modalMessageType"></span></p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Date</label>
            <p class="fw-600" id="modalMessageDate"></p>
          </div>
        </div>

        <div class="mb-4">
          <label class="text-muted small">Message</label>
          <p id="modalMessageText"></p>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <a href="#" id="replyMessageBtn" class="btn btn-primary">
          <i class="fas fa-reply me-2"></i> Reply
        </a>
        <a href="#" id="deleteMessageBtn" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?');">
          <i class="fas fa-trash me-2"></i> Delete
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('messageModal').addEventListener('show.bs.modal', function(event) {
    const trigger = event.relatedTarget;
    const id = trigger.getAttribute('data-id');
    const messageType = trigger.getAttribute('data-message-type');
    const messageName = trigger.getAttribute('data-message-name');
    const messageEmail = trigger.getAttribute('data-message-email');
    const messageInstitution = trigger.getAttribute('data-message-institution');
    const messagePhone = trigger.getAttribute('data-message-phone');
    const messageDate = trigger.getAttribute('data-message-date');
    const messageText = trigger.getAttribute('data-message-text');
    const isRead = trigger.getAttribute('data-is-read') === 'true';

    // Update modal content
    document.getElementById('modalMessageName').textContent = messageName;
    document.getElementById('modalMessageEmail').textContent = messageEmail;
    document.getElementById('modalMessageDate').textContent = messageDate;
    document.getElementById('modalMessageText').textContent = messageText;
    document.getElementById('modalMessageType').textContent = messageType === 'guestbook' ? 'Guestbook' : 'Contact Us';
    
    // delete 
    document.getElementById('deleteMessageBtn').href = 'module/message/aksi.php?module=message&act=delete&id=' + id + '&type=' + messageType;
    
    // reply 
    document.getElementById('replyMessageBtn').href = '?page=message&act=reply&id=' + id + '&type=' + messageType;

    // Show/hide guestbook fields
    const guestbookFields = document.getElementById('guestbookFields');
    if (messageType === 'guestbook') {
      guestbookFields.style.display = 'flex';
      document.getElementById('modalMessageInstitution').textContent = messageInstitution || 'N/A';
      document.getElementById('modalMessagePhone').textContent = messagePhone || 'N/A';
    } else {
      guestbookFields.style.display = 'none';
    }

    if (!isRead) {
      fetch('module/message/aksi.php?module=message&act=mark_read&id=' + id + '&type=' + messageType + '&t=' + new Date().getTime())
        .then(response => {
          if (response.ok) {
            trigger.classList.remove('message-unread');
            trigger.classList.add('message-read');
            trigger.setAttribute('data-is-read', 'true');

            const newBadge = trigger.querySelector('.new-badge');
            if (newBadge) {
              newBadge.remove();
            }

            const h5 = trigger.querySelector('h5');
            if (h5) {
              h5.classList.remove('text-danger');
              h5.classList.add('text-dark');
            }
          }
        });
    }
  });
</script>
