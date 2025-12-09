<?php
include "config/koneksi.php"; // Include your database connection

$page_title = 'Our Teams - InLET Laboratory';

$head_of_lab = null;
$team_members = [];

try {
  // Fetch the head of the lab
  $stmt_head = $pdo->prepare("SELECT * FROM team_member WHERE position = 'Kepala Laboratorium' LIMIT 1");
  $stmt_head->execute();
  $head_of_lab = $stmt_head->fetch(PDO::FETCH_ASSOC);

  // Fetch other team members
  $stmt_members = $pdo->prepare("SELECT * FROM team_member WHERE position != 'Kepala Laboratorium' ORDER BY full_name");
  $stmt_members->execute();
  $team_members = $stmt_members->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Database error: " . $e->getMessage();
}
?>

<!-- Hero Banner -->
<section class="hero-banner">
  <img src="assets/img/gallery14.png" alt="InLET Laboratory Team">
</section>

<!-- Main Content -->
<div class="teams-container">
  <!-- Page Title -->
  <h1 class="page-title">Anggota Tim</h1>

  <?php if ($head_of_lab) : ?>
    <!-- Head of Laboratory Section -->
    <section class="head-section">
      <h2 class="section-title">Kepala Laboratorium</h2>
      <a href="<?php echo !empty($head_of_lab['detail_url']) ? htmlspecialchars($head_of_lab['detail_url']) : '#'; ?>" class="profile-link" target="_blank">
        <div class="profile-card head-card">
          <div class="profile-photo">
            <img src="assets/uploads/<?php echo $head_of_lab['photo_url']; ?>" alt="<?php echo $head_of_lab['full_name']; ?>">
          </div>
          <div class="profile-info">
            <h3 class="member-name"><?php echo htmlspecialchars($head_of_lab['full_name']); ?></h3>
            <p class="member-nip">NIP: <?php echo htmlspecialchars($head_of_lab['nip']); ?></p>
            
            <div class="contact-info">
              <div class="profile-contact-item">
                <i class="far fa-envelope"></i>
                <span><?php echo htmlspecialchars($head_of_lab['email']); ?></span>
              </div>
              <?php if ($head_of_lab['phone_number']) : ?>
              <div class="profile-contact-item">
                <i class="fas fa-phone-alt"></i>
                <span><?php echo htmlspecialchars($head_of_lab['phone_number']); ?></span>
              </div>
              <?php endif; ?>
            </div>

            <?php if ($head_of_lab['facebook_url'] || $head_of_lab['instagram_url'] || $head_of_lab['google_scholar_url']) : ?>
            <div class="social-links mt-2">
              <?php if ($head_of_lab['facebook_url']) : ?><object><a href="<?php echo htmlspecialchars($head_of_lab['facebook_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a></object><?php endif; ?>
              <?php if ($head_of_lab['instagram_url']) : ?><object><a href="<?php echo htmlspecialchars($head_of_lab['instagram_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a></object><?php endif; ?>
              <?php if ($head_of_lab['google_scholar_url']) : ?><object><a href="<?php echo htmlspecialchars($head_of_lab['google_scholar_url']); ?>" target="_blank" class="social-icon"><i class="fas fa-graduation-cap"></i></a></object><?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </a>
    </section>
  <?php endif; ?>

  <!-- Laboratory Team Section -->
  <section class="team-section">
    <h2 class="section-title">Anggota Tim</h2>
    <div class="team-grid">
      <?php if (!empty($team_members)) : ?>
        <?php foreach ($team_members as $member) : ?>
          <a href="<?php echo !empty($member['detail_url']) ? htmlspecialchars($member['detail_url']) : '#'; ?>" class="profile-link" target="_blank">
            <div class="profile-card">
              <div class="profile-photo">
                <img src="assets/uploads/<?php echo $member['photo_url']; ?>" alt="<?php echo $member['full_name']; ?>">
              </div>
              <div class="profile-info">
                <h3 class="member-name"><?php echo htmlspecialchars($member['full_name']); ?></h3>
                <p class="member-nip">NIP: <?php echo htmlspecialchars($member['nip']); ?></p>
                
                <div class="contact-info">
                  <div class="profile-contact-item">
                    <i class="far fa-envelope"></i>
                    <span><?php echo htmlspecialchars($member['email']); ?></span>
                  </div>
                  <?php if ($member['phone_number']) : ?>
                  <div class="profile-contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span><?php echo htmlspecialchars($member['phone_number']); ?></span>
                  </div>
                  <?php endif; ?>
                </div>

                <?php if ($member['facebook_url'] || $member['instagram_url'] || $member['google_scholar_url']) : ?>
                <div class="social-links mt-2">
                  <?php if ($member['facebook_url']) : ?><object><a href="<?php echo htmlspecialchars($member['facebook_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a></object><?php endif; ?>
                  <?php if ($member['instagram_url']) : ?><object><a href="<?php echo htmlspecialchars($member['instagram_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a></object><?php endif; ?>
                  <?php if ($member['google_scholar_url']) : ?><object><a href="<?php echo htmlspecialchars($member['google_scholar_url']); ?>" target="_blank" class="social-icon"><i class="fas fa-graduation-cap"></i></a></object><?php endif; ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Tidak ada anggota tim yang ditemukan.</p>
      <?php endif; ?>
    </div>
  </section>
</div>
