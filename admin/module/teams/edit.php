<?php
$page_title = 'Edit Team Member';

$member_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$member = null;

if ($member_id > 0) {
  try {
    $stmt = $pdo->prepare("SELECT * FROM team_member WHERE member_id = :member_id");
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    $member = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

if (!$member) {
  echo "<script>alert('Team member not found.'); window.location='index.php?page=teams';</script>";
  exit();
}

// Permission Check
$can_edit = false;
if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') {
  $can_edit = true;
} elseif (isset($_SESSION['member_id']) && $_SESSION['member_id'] == $member_id) {
  $can_edit = true;
}

if (!$can_edit) {
  echo "<script>alert('You do not have permission to edit this profile.'); window.location.href = 'index.php?page=teams';</script>";
  exit();
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=teams" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Edit Team Member</h1>
        <p class="text-muted">Update the details below</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Member Details</h5>

            <form method="POST" action="module/teams/aksi.php?module=teams&act=update" enctype="multipart/form-data">
              <input type="hidden" name="member_id" value="<?php echo $member['member_id']; ?>">
              <div class="mb-4">
                <label for="full-name" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="full-name" name="full_name" placeholder="Enter full name" value="<?php echo htmlspecialchars($member['full_name']); ?>" required>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="nip" class="form-label">NIP (Employee ID) <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="EMP001" value="<?php echo htmlspecialchars($member['nip']); ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone" name="phone_number" placeholder="+1 234 567 8900" value="<?php echo htmlspecialchars($member['phone_number']); ?>" required>
                </div>
              </div>

              <div class="mb-4">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@company.com" value="<?php echo htmlspecialchars($member['email']); ?>" required>
              </div>

              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
                <hr class="my-4">
                <h5 class="card-title mb-4">Login Credentials & Role</h5>
                <?php
                // Fetch username
                $username = '';
                if ($member['admin_id']) {
                  $stmt = $pdo->prepare("SELECT username FROM admin WHERE admin_id = :admin_id");
                  $stmt->bindParam(':admin_id', $member['admin_id'], PDO::PARAM_INT);
                  $stmt->execute();
                  $admin_user = $stmt->fetch(PDO::FETCH_ASSOC);
                  if ($admin_user) {
                    $username = $admin_user['username'];
                  }
                }
                ?>
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter username">
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current">
                  </div>
                </div>

                <div class="mb-4">
                  <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                  <select class="form-control" id="position" name="position" required>
                    <option value="">Select Position</option>
                    <option value="Kepala Laboratorium" <?php echo ($member['position'] == 'Kepala Laboratorium') ? 'selected' : ''; ?>>Kepala Laboratorium</option>
                    <option value="Anggota" <?php echo ($member['position'] == 'Anggota') ? 'selected' : ''; ?>>Anggota</option>
                  </select>
                </div>
              <?php else : ?>
                <input type="hidden" name="position" value="<?php echo htmlspecialchars($member['position']); ?>">
              <?php endif; ?>
              <hr class="my-4">


              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="facebook" class="form-label">Facebook URL</label>
                  <input type="url" class="form-control" id="facebook" name="facebook_url" placeholder="https://facebook.com/username" value="<?php echo htmlspecialchars($member['facebook_url'] ?? ''); ?>">
                </div>
                <div class="col-md-6">
                  <label for="instagram" class="form-label">Instagram URL</label>
                  <input type="url" class="form-control" id="instagram" name="instagram_url" placeholder="https://instagram.com/username" value="<?php echo htmlspecialchars($member['instagram_url'] ?? ''); ?>">
                </div>
              </div>

              <div class="mb-4">
                <label for="scholar" class="form-label">Google Scholar URL</label>
                <input type="url" class="form-control" id="scholar" name="google_scholar_url" placeholder="https://scholar.google.com/citations?user=username" value="<?php echo htmlspecialchars($member['google_scholar_url'] ?? ''); ?>">
              </div>

              <div class="mb-4">
                <label class="form-label">Photo</label>
                <div class="upload-area-member border-2 border-dashed rounded-3 p-5 text-center" style="cursor: pointer; border-color: #e0e0e0;">
                  <i class="fas fa-cloud-upload-alt fs-1 text-muted mb-3 d-block"></i>
                  <p class="mb-2">Drag & drop photo or</p>
                  <button type="button" class="btn btn-sm btn-outline-primary">Upload Photo</button>
                  <input type="file" class="form-control d-none" id="member-photo" name="photo_url" accept="image/*">
                  <span id="file-name-display" class="text-muted mt-2 d-block"></span>
                  <?php if ($member['photo_url']) : ?>
                    <p class="mt-2">Current photo: <a href="../assets/uploads/<?php echo $member['photo_url']; ?>" target="_blank"><?php echo $member['photo_url']; ?></a></p>
                  <?php endif; ?>
                </div>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=teams" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-user-edit"></i> Update Member
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  document.querySelector('.upload-area-member').addEventListener('click', function() {
    document.getElementById('member-photo').click();
  });

  document.getElementById('member-photo').addEventListener('change', function() {
    const fileName = this.files.length > 0 ? this.files[0].name : 'No file chosen';
    document.getElementById('file-name-display').textContent = 'Selected: ' + fileName;
  });
</script>
