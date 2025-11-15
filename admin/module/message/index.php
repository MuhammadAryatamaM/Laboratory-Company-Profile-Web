<?php $page_title = 'Messages'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Messages</h1>
        <p class="text-muted">Manage contact form and guestbook messages</p>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-12">
        <div class="d-flex gap-3 mb-4">
          <input type="text" class="form-control search-input" placeholder="Search messages...">
          <button class="btn btn-outline-secondary">
            <i class="fas fa-filter"></i>
          </button>
          <select class="form-select" style="max-width: 150px;">
            <option>All Messages</option>
            <option>Contact</option>
            <option>Guestbook</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Updated inline styles to better spacing with more padding -->
      <div class="col-md-6 mb-3">
        <div class="message-card message-unread h-100" data-bs-toggle="modal" data-bs-target="#messageModal" data-message-type="contact" data-message-name="Alice Johnson" data-message-email="alice.johnson@email.com" data-message-date="11/9/2025" data-message-text="Hi, I would like to know more about your pricing plans for enterprise customers. Could you provide detailed information?" data-is-read="false">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h5 class="text-danger"><span class="message-name">Alice Johnson</span> <span class="badge bg-danger new-badge">New</span></h5>
              <p class="text-muted small mb-0">alice.johnson@email.com</p>
            </div>
            <span class="badge bg-dark">Contact</span>
          </div>
          <p class="card-text">Hi, I would like to know more about your pricing plans for enterprise customers. Could you provide detailed...</p>
          <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> 11/9/2025</p>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="message-card message-unread h-100" data-bs-toggle="modal" data-bs-target="#messageModal" data-message-type="guestbook" data-message-name="Bob Smith" data-message-email="bob.smith@email.com" data-message-institution="Tech Solutions Inc." data-message-phone="+1 (555) 123-4567" data-message-date="11/8/2025" data-message-text="Great website! Really impressed with your services. Keep up the good work!" data-is-read="false">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h5 class="text-danger"><span class="message-name">Bob Smith</span> <span class="badge bg-danger new-badge">New</span></h5>
              <p class="text-muted small mb-0">bob.smith@email.com</p>
            </div>
            <span class="badge bg-dark">Guestbook</span>
          </div>
          <p class="card-text">Great website! Really impressed with your services. Keep up the good work!</p>
          <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> 11/8/2025</p>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="message-card message-unread h-100" data-bs-toggle="modal" data-bs-target="#messageModal" data-message-type="contact" data-message-name="Carol White" data-message-email="carol.white@email.com" data-message-date="11/7/2025" data-message-text="I represent a company that would like to explore partnership opportunities with your organization. Can we discuss this further?" data-is-read="false">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h5 class="text-danger"><span class="message-name">Carol White</span> <span class="badge bg-danger new-badge">New</span></h5>
              <p class="text-muted small mb-0">carol.white@email.com</p>
            </div>
            <span class="badge bg-dark">Contact</span>
          </div>
          <p class="card-text">I represent a company that would like to explore partnership opportunities with your organization. Can w...</p>
          <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> 11/7/2025</p>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="message-card message-read h-100" data-bs-toggle="modal" data-bs-target="#messageModal" data-message-type="contact" data-message-name="David Brown" data-message-email="david.brown@email.com" data-message-date="11/6/2025" data-message-text="I am experiencing issues with your platform. The login page is not loading properly. Please assist." data-is-read="true">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h5 class="text-dark"><span class="message-name">David Brown</span></h5>
              <p class="text-muted small mb-0">david.brown@email.com</p>
            </div>
            <span class="badge bg-dark">Contact</span>
          </div>
          <p class="card-text">I am experiencing issues with your platform. The login page is not loading properly. Please assist.</p>
          <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> 11/6/2025</p>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="message-card message-read h-100" data-bs-toggle="modal" data-bs-target="#messageModal" data-message-type="guestbook" data-message-name="Emma Davis" data-message-email="emma.davis@email.com" data-message-institution="Creative Agency Co." data-message-phone="+1 (555) 987-6543" data-message-date="11/5/2025" data-message-text="Wonderful experience using your products. Thank you for excellent customer service!" data-is-read="true">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h5 class="text-dark"><span class="message-name">Emma Davis</span></h5>
              <p class="text-muted small mb-0">emma.davis@email.com</p>
            </div>
            <span class="badge bg-dark">Guestbook</span>
          </div>
          <p class="card-text">Wonderful experience using your products. Thank you for excellent customer service!</p>
          <p class="text-muted small mb-0"><i class="fas fa-calendar"></i> 11/5/2025</p>
        </div>
      </div>
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

        <!-- Fixed field alignment with proper grid layout -->
        <div class="row mb-4">
          <div class="col-md-6">
            <label class="text-muted small">Full Name</label>
            <p class="fw-600" id="modalMessageName">Alice Johnson</p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Email</label>
            <p class="fw-600" id="modalMessageEmail">alice.johnson@email.com</p>
          </div>
        </div>

        <!-- Institution and Phone now properly aligned in grid -->
        <div class="row mb-4" id="guestbookFields" style="display: none;">
          <div class="col-md-6">
            <label class="text-muted small">Institution</label>
            <p class="fw-600" id="modalMessageInstitution">N/A</p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Phone Number</label>
            <p class="fw-600" id="modalMessagePhone">N/A</p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="text-muted small">Type</label>
            <p><span class="badge bg-dark" id="modalMessageType">Contact Us</span></p>
          </div>
          <div class="col-md-6">
            <label class="text-muted small">Date</label>
            <p class="fw-600" id="modalMessageDate">11/9/2025</p>
          </div>
        </div>

        <div class="mb-4">
          <label class="text-muted small">Message</label>
          <p id="modalMessageText">Hi, I would like to know more about your pricing plans for enterprise customers. Could you provide detailed information?</p>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal" data-bs-dismiss="modal">
          <i class="fas fa-reply me-2"></i> Reply via Email
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Reply to Message Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="replyModalLabel">Reply to Alice Johnson</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted small">Send a reply to this message via email.</p>

        <div class="mb-4">
          <label class="form-label text-muted small">To: <span id="replyToEmail">alice.johnson@email.com</span></label>
        </div>

        <div class="mb-4">
          <label class="form-label">Your Reply</label>
          <textarea class="form-control" rows="6" placeholder="Type your reply here..."></textarea>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">
          <i class="fas fa-paper-plane me-2"></i> Send Reply
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('messageModal').addEventListener('show.bs.modal', function(event) {
    const trigger = event.relatedTarget;
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

    // Show/hide guestbook fields
    const guestbookFields = document.getElementById('guestbookFields');
    if (messageType === 'guestbook') {
      guestbookFields.style.display = 'grid';
      document.getElementById('modalMessageInstitution').textContent = messageInstitution || 'N/A';
      document.getElementById('modalMessagePhone').textContent = messagePhone || 'N/A';
    } else {
      guestbookFields.style.display = 'none';
    }

    if (!isRead) {
      trigger.classList.remove('message-unread');
      trigger.classList.add('message-read');
      trigger.setAttribute('data-is-read', 'true');

      // Remove New badge
      const newBadge = trigger.querySelector('.new-badge');
      if (newBadge) {
        newBadge.remove();
      }

      // Change text color from red to black
      const nameSpan = trigger.querySelector('.message-name');
      const h5 = trigger.querySelector('h5');
      if (h5) {
        h5.classList.remove('text-danger');
        h5.classList.add('text-dark');
      }

      const notificationBadge = document.querySelector('.notification-badge');
      if (notificationBadge) {
        let count = parseInt(notificationBadge.textContent);
        if (count > 0) {
          count--;
          if (count > 0) {
            notificationBadge.textContent = count;
          } else {
            notificationBadge.remove();
          }
        }
      }
    }
  });

  document.getElementById('replyModal').addEventListener('show.bs.modal', function(event) {
    const messageModal = document.getElementById('messageModal');
    const messageName = document.getElementById('modalMessageName').textContent;
    const messageEmail = document.getElementById('modalMessageEmail').textContent;

    document.getElementById('replyModalLabel').textContent = 'Reply to ' + messageName;
    document.getElementById('replyToEmail').textContent = messageEmail;
  });
</script>
