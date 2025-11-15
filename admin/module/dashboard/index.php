<?php $page_title = 'Dashboard'; ?>
<main class="main-content">
  <div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>
    <p class="text-muted mb-4">Welcome back! Here's what's happening with your CMS.</p>

    <!-- Stats Cards -->
    <div class="row mb-4">
      <!-- Make stat cards clickable and add proper click handlers, remove for Total Visitor -->
      <div class="col-md-3 mb-3">
        <div class="stat-card-new" onclick="window.location.href='?page=news'" style="border: 1px solid #e5e7eb; border-radius: 12px; padding: 32px; min-height: 200px;">
          <div class="stat-icon-box" style="background: #4f46e5; margin-bottom: 24px;">
            <i class="fas fa-newspaper"></i>
          </div>
          <h3 class="stat-label">Total News</h3>
          <p class="stat-value">248</p>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="stat-card-new" onclick="window.location.href='?page=product'" style="border: 1px solid #e5e7eb; border-radius: 12px; padding: 32px; min-height: 200px;">
          <div class="stat-icon-box" style="background: #7c3aed; margin-bottom: 24px;">
            <i class="fas fa-box"></i>
          </div>
          <h3 class="stat-label">Total Product</h3>
          <p class="stat-value">156</p>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="stat-card-new" onclick="window.location.href='?page=teams'" style="border: 1px solid #e5e7eb; border-radius: 12px; padding: 32px; min-height: 200px;">
          <div class="stat-icon-box" style="background: #06b6d4; margin-bottom: 24px;">
            <i class="fas fa-users"></i>
          </div>
          <h3 class="stat-label">Total Team Members</h3>
          <p class="stat-value">42</p>
        </div>
      </div>
      <!-- Total Visitor card without click handler as per requirements -->
      <div class="col-md-3 mb-3">
        <div class="stat-card-new" style="border: 1px solid #e5e7eb; border-radius: 12px; padding: 32px; min-height: 200px; cursor: default;">
          <div class="stat-icon-box" style="background: #a855f7; margin-bottom: 24px;">
            <i class="fas fa-eye"></i>
          </div>
          <h3 class="stat-label">Total Visitor</h3>
          <p class="stat-value">12.4K</p>
        </div>
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
</main>
