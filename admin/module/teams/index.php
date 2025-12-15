<?php
$page_title = 'Team Management';

$current_user_profile = null;
if (isset($_SESSION['admin_id'])) {
  try {
    $stmt = $pdo->prepare("SELECT tm.*, a.username FROM team_member tm JOIN admin a ON tm.admin_id = a.admin_id WHERE tm.admin_id = :admin_id");
    $stmt->bindParam(':admin_id', $_SESSION['admin_id'], PDO::PARAM_INT);
    $stmt->execute();
    $current_user_profile = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
  }
}

try {
  $stmt = $pdo->query("SELECT * FROM team_member ORDER BY position, full_name");
  $team_members = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $team_members = [];
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Team Management</h1>
        <p class="text-muted">
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
            Manage your team members
          <?php else : ?>
            See your other lab members
          <?php endif; ?>
        </p>
      </div>
      <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Kepala Laboratorium' || $_SESSION['role'] == 'superadmin')) : ?>
        <a href="?page=teams&act=create" class="btn btn-primary">
          <i class="fas fa-plus me-2"></i>Add New Member
        </a>
      <?php endif; ?>
    </div>

    <?php if ($current_user_profile) : ?>
      <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-primary">Your Profile</span>
            <a href="?page=teams&act=edit&id=<?php echo $current_user_profile['member_id']; ?>" class="btn btn-primary btn-sm">
              <i class="fas fa-edit me-1"></i>Edit My Profile
            </a>
          </div>
          <div class="row align-items-center">
            <div class="col-md-3 d-flex justify-content-center">
              <div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; margin: 0 auto 15px; background-color: #e5e7eb;">
                <?php if (!empty($current_user_profile['photo_url'])) : ?>
                  <img src="../assets/uploads/<?php echo htmlspecialchars($current_user_profile['photo_url']); ?>" alt="<?php echo htmlspecialchars($current_user_profile['full_name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                <?php else : ?>
                  <i class="fas fa-user" style="font-size: 48px; color: #9ca3af;"></i>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-9">
              <h4><?php echo htmlspecialchars($current_user_profile['full_name']); ?></h4>
              <p class="text-muted mb-2"><?php echo htmlspecialchars($current_user_profile['position']); ?></p>
              <p class="mb-1"><small><strong>NIP:</strong> <?php echo htmlspecialchars($current_user_profile['nip']); ?></small></p>
              <p class="mb-1"><small><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($current_user_profile['email']); ?></small></p>
              <p><small><i class="fas fa-phone"></i> <?php echo htmlspecialchars($current_user_profile['phone_number']); ?></small></p>
            </div>
          </div>
        </div>
      </div>
    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'superadmin') : ?>
      <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-danger">System Administrator</span>
          </div>
          <div class="row align-items-center">
            <div class="col-md-3 d-flex justify-content-center">
              <div class="avatar-lg mb-3">
                <div style="width: 100px; height: 100px; background: #f8d7da; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                  <i class="fas fa-user-shield"></i>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <h4><?php echo htmlspecialchars($_SESSION['username']); ?></h4>
              <p class="text-muted mb-2">This is the root administrator account. It does not have a public team profile.</p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <h5 class="mb-3">Team Members</h5>
    <div class="row">
      <?php foreach ($team_members as $member) : ?>
        <?php
        if (isset($_SESSION['member_id']) && $_SESSION['member_id'] == $member['member_id']) {
          continue;
        }
        ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center d-flex flex-column">
              <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; margin: 0 auto 15px; background-color: #e5e7eb;">
                <?php if (!empty($member['photo_url'])) : ?>
                  <img src="../assets/uploads/<?php echo htmlspecialchars($member['photo_url']); ?>" alt="<?php echo htmlspecialchars($member['full_name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                <?php else : ?>
                  <i class="fas fa-user" style="font-size: 24px; color: #9ca3af;"></i>
                <?php endif; ?>
              </div>
              <h5><?php echo htmlspecialchars($member['full_name']); ?></h5>
              <p class="text-primary small mb-2"><?php echo htmlspecialchars($member['position']); ?></p>
              <p class="text-primary small mb-2"><small>NIP: <?php echo htmlspecialchars($member['nip']); ?></small></p>
              <p class="text-muted mb-3"><small><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($member['email']); ?></small></p>
              <p class="text-muted mb-3"><small><i class="fas fa-phone"></i> <?php echo htmlspecialchars($member['phone_number']); ?></small></p>
              <div class="mb-3 flex-grow-1">
                <?php if ($member['facebook_url']) : ?><a href="<?php echo $member['facebook_url']; ?>" class="text-primary text-decoration-none small me-2" target="_blank"><i class="fab fa-facebook"></i> Facebook</a><br><?php endif; ?>
                <?php if ($member['instagram_url']) : ?><a href="<?php echo $member['instagram_url']; ?>" class="text-primary text-decoration-none small me-2" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br><?php endif; ?>
                <?php if ($member['google_scholar_url']) : ?><a href="<?php echo $member['google_scholar_url']; ?>" class="text-primary text-decoration-none small" target="_blank"><i class="fas fa-graduation-cap"></i> Scholar</a><?php endif; ?>
              </div>
              <div class="d-flex gap-2">
                <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Kepala Laboratorium' || $_SESSION['role'] == 'superadmin' || (isset($_SESSION['member_id']) && $_SESSION['member_id'] == $member['member_id']))) : ?>
                  <a href="?page=teams&act=edit&id=<?php echo $member['member_id']; ?>" class="btn btn-outline-primary btn-sm flex-grow-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                <?php endif; ?>
                <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Kepala Laboratorium' || $_SESSION['role'] == 'superadmin')) : ?>
                  <a href="module/teams/aksi.php?module=teams&act=delete&id=<?php echo $member['member_id']; ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Are you sure you want to delete this member?');">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($team_members)) : ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            No team members found.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
