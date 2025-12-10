<?php
include_once "config/koneksi.php";

$head_lab = null;
$team_members = [];

try {
  $stmt = $pdo->query("SELECT * FROM team_member ORDER BY member_id ASC");
  $all_members = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($all_members as $member) {
    if (stripos($member['position'], 'Kepala') !== false && $head_lab === null) {
      $head_lab = $member;
    } else {
      $team_members[] = $member;
    }
  }
} catch (PDOException $e) {
}
?>

<style>
  .team-name {
    width: auto !important;
    margin: 0 auto 6px !important;
    min-height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .team-card {
    text-align: center;
  }

  .team-social {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
    min-height: 50px;
    align-items: center;
  }

  .team-social a {
    text-decoration: none;
    color: #213448;
    font-size: 24px;
    transition: transform 0.2s, color 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f0f4f8;
  }

  .team-social a:hover {
    color: #547792;
    transform: translateY(-3px);
    background-color: #e1e8ed;
  }
</style>

<section id="team-section" class="team-section">
  <div class="team-container">
    <div class="team-heading reveal reveal-fade">
      <h2 class="team-title">Tim Kami</h2>
      <div class="team-line"></div>
      <a href="index.php?page=teams" class="team-viewmore">Selengkapnya</a>
    </div>

    <div class="team-layout">
      <?php if ($head_lab): ?>
        <div class="team-head" style="margin-left: 0 !important;">
          <h3 class="team-subtitle" style="text-align: center; margin-bottom: 28px;">Kepala Lab</h3>
          <div class="team-card head-card" style="text-align: center;">
            <div class="team-photo">
              <img src="assets/uploads/<?php echo htmlspecialchars($head_lab['photo_url'] ?? 'default.jpg'); ?>"
                alt="<?php echo htmlspecialchars($head_lab['full_name']); ?>">
            </div>
            <p class="team-name head-name">
              <?php echo htmlspecialchars($head_lab['full_name']); ?>
            </p>
            <div class="team-social">
              <?php if (!empty($head_lab['google_scholar_url'])): ?>
                <a href="<?php echo htmlspecialchars($head_lab['google_scholar_url']); ?>" target="_blank" title="Google Scholar"><i class="fas fa-graduation-cap"></i></a>
              <?php endif; ?>
              <?php if (!empty($head_lab['facebook_url'])): ?>
                <a href="<?php echo htmlspecialchars($head_lab['facebook_url']); ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
              <?php endif; ?>
              <?php if (!empty($head_lab['instagram_url'])): ?>
                <a href="<?php echo htmlspecialchars($head_lab['instagram_url']); ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="team-lab">
        <h3 class="team-subtitle team-subtitle-center">Anggota Lab</h3>
        <div class="team-lab-scroll">
          <div class="team-lab-track">
            <?php if (!empty($team_members)): ?>
              <?php foreach ($team_members as $member): ?>
                <div class="team-card" style="text-align: center;">
                  <div class="team-photo">
                    <img src="assets/uploads/<?php echo htmlspecialchars($member['photo_url'] ?? 'default.jpg'); ?>"
                      alt="<?php echo htmlspecialchars($member['full_name']); ?>">
                  </div>
                  <p class="team-name">
                    <?php echo htmlspecialchars($member['full_name']); ?>
                  </p>
                  <div class="team-social">
                    <?php if (!empty($member['google_scholar_url'])): ?>
                      <a href="<?php echo htmlspecialchars($member['google_scholar_url']); ?>" target="_blank" title="Google Scholar"><i class="fas fa-graduation-cap"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($member['facebook_url'])): ?>
                      <a href="<?php echo htmlspecialchars($member['facebook_url']); ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($member['instagram_url'])): ?>
                      <a href="<?php echo htmlspecialchars($member['instagram_url']); ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>Belum ada anggota tim.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
