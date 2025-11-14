<nav class="navbar navbar-light bg-white border-bottom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Welcome to CMS Admin</h5>
    <div class="d-flex align-items-center gap-3">
      <div class="position-relative">
        <button class="btn btn-link position-relative text-dark">
          <i class="fas fa-bell"></i>
          <span class="badge bg-danger position-absolute notification-badge" style="top: -5px; right: -8px;">3</span>
        </button>
      </div>
      <div class="dropdown">
        <button class="btn btn-link text-dark dropdown-toggle p-0" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle fs-5"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="?page=profile"><i class="fas fa-user me-2"></i> Profile</a></li>
          <li><a class="dropdown-item" href="?page=settings"><i class="fas fa-cog me-2"></i> Settings</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
