<?php $page_title = 'Dashboard'; ?>

<main class="main-content">  <div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>
    <p class="text-muted mb-4">Welcome back! Here's what's happening with your CMS.</p>

    <!-- Stats Cards -->
    <div class="row mb-4">
      <div class="col-md-3 mb-3">
        <a href="?page=news" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #4f46e5;">
              <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
              <h3>Total News</h3>
              <p class="stat-number">248</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="?page=products" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #7c3aed;">
              <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
              <h3>Total Product</h3>
              <p class="stat-number">156</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="?page=teams" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #06b6d4;">
              <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
              <h3>Total Team Members</h3>
              <p class="stat-number">42</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="#" id="visitor-stats-trigger" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #a855f7;">
              <i class="fas fa-eye"></i>
            </div>
            <div class="stat-content">
              <h3>Total Visitor</h3>
              <p class="stat-number">12.4K</p>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>Recent News</h5>
            <a href="index.php?page=news" class="text-primary">View All</a>
          </div>
          <div class="card-body">
            <div class="recent-item mb-3">
              <h6>New Product Launch Announcement</h6>
              <p class="text-muted small">11/5/2025</p>
            </div>
            <div class="recent-item mb-3">
              <h6>Company Reaches 10,000 Customers</h6>
              <p class="text-muted small">11/1/2025</p>
            </div>
            <div class="recent-item">
              <h6>Partnership with Global Tech Leader</h6>
              <p class="text-muted small">10/28/2025</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-box me-2"></i>Recent Products</h5>
            <a href="index.php?page=product" class="text-primary">View All</a>
          </div>
          <div class="card-body">
            <div class="recent-item mb-3">
              <h6>Premium Wireless Headphones</h6>
              <p class="text-muted small">Electronics • Audio</p>
            </div>
            <div class="recent-item mb-3">
              <h6>Smart Fitness Watch</h6>
              <p class="text-muted small">Wearables • Fitness</p>
            </div>
            <div class="recent-item">
              <h6>Ergonomic Office Chair</h6>
              <p class="text-muted small">Furniture • Office</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Visitor Stats Modal -->
  <div id="visitor-stats-modal" title="Visitor Statistics">
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 7 Days
        <span class="badge bg-primary rounded-pill">1,234</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 28 Days
        <span class="badge bg-primary rounded-pill">5,678</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 60 Days
        <span class="badge bg-primary rounded-pill">12,345</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 365 Days
        <span class="badge bg-primary rounded-pill">145,678</span>
      </li>
    </ul>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
$(function() {
  // Initialize the dialog
  $("#visitor-stats-modal").dialog({
    autoOpen: false,
    modal: true,
    width: 500,
    show: {
      effect: "fade",
      duration: 200 // Shorter animation
    },
    hide: {
      effect: "fade",
      duration: 200 // Shorter animation
    },
    closeOnEscape: true // Close on ESC key
  });

  // Open the dialog on click
  $("#visitor-stats-trigger").on("click", function(e) {
    e.preventDefault();
    $("#visitor-stats-modal").dialog("open");
  });

  // Close dialog when clicking outside the modal (on the overlay)
  $(document).on('click', '.ui-widget-overlay', function() {
    $("#visitor-stats-modal").dialog('close');
  });
});
</script>

