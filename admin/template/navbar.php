<?php
// Get unread message count
$unread_count = 0;
if (isset($pdo)) {
  try {
    $stmt = $pdo->query("SELECT new_message_count FROM v_new_messages_count");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $unread_count = $row['new_message_count'];
    }
  } catch (PDOException $e) {
    // Silent fail
  }
}
?>
<nav class="navbar navbar-light bg-white border-bottom shadow-sm sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Welcome to CMS Admin</h5>
    <div class="d-flex align-items-center gap-3">
      <div class="position-relative">
        <button class="btn btn-link position-relative text-dark">
          <i class="fas fa-bell"></i>
          <?php if ($unread_count > 0) : ?>
            <span class="badge bg-danger position-absolute notification-badge" id="unread-badge" style="top: -5px; right: -8px;"><?php echo $unread_count; ?></span>
          <?php endif; ?>
        </button>
      </div>
      <div class="dropdown">
        <button class="btn btn-link text-dark dropdown-toggle p-0" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle fs-5"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="?page=profile"><i class="fas fa-user me-2"></i> Profile</a></li>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
            <li><a class="dropdown-item" href="?page=settings"><i class="fas fa-cog me-2"></i> Settings</a></li>
          <?php endif; ?>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
