<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
  echo "<script>alert('You do not have permission to access this page.'); window.location.href = 'index.php?page=gallery';</script>";
  exit();
}

$page_title = 'Settings';

// Fetch settings from site_settings table
$settings = [];
try {
  $stmt = $pdo->query("SELECT * FROM settings");
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $settings[$row['setting_key']] = $row['setting_value'];
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Helper function to get setting safely
function get_setting($key, $settings)
{
  return isset($settings[$key]) ? htmlspecialchars($settings[$key]) : '';
}
?>
<main class="main-content">
  <div class="container-fluid">
    <h1 class="mb-4">Settings</h1>
    <p class="text-muted mb-4">Manage your website's vision, mission, and contact information</p>

    <div class="row">
      <div class="col-md-8">
        <form method="POST" action="module/settings/aksi.php?module=settings&act=update">
          <!-- Vision & Mission Section -->
          <div class="card mb-4">
            <div class="card-header bg-light border-bottom">
              <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Vision & Mission</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label"><strong>Vision</strong></label>
                <textarea class="form-control" name="vision" rows="3" placeholder="Enter your company vision"><?php echo get_setting('vision', $settings); ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>Mission</strong></label>
                <textarea class="form-control summernote" name="mission" rows="3" placeholder="Enter your company mission"><?php echo get_setting('mission', $settings); ?></textarea>
              </div>
            </div>
          </div>

          <!-- Contact Information Section -->
          <div class="card mb-4">
            <div class="card-header bg-light border-bottom">
              <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Contact Information</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label"><strong>Address</strong></label>
                <input type="text" class="form-control" name="address" value="<?php echo get_setting('address', $settings); ?>">
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label"><strong>Phone Number</strong></label>
                  <input type="tel" class="form-control" name="phone" value="<?php echo get_setting('phone', $settings); ?>">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label"><strong>Email Address</strong></label>
                  <input type="email" class="form-control" name="email" value="<?php echo get_setting('email', $settings); ?>">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>YouTube Channel</strong></label>
                <input type="text" class="form-control" name="youtube" value="<?php echo get_setting('youtube', $settings); ?>">
              </div>
            </div>
          </div>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-1"></i>Save All Settings
            </button>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</main>
