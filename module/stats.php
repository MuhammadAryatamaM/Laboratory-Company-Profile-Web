<?php
include_once "config/koneksi.php";
$total_members = 0;
try {
  $stmt = $pdo->query("SELECT COUNT(*) FROM team_member");
  $total_members = $stmt->fetchColumn();
} catch (PDOException $e) {
  $total_members = 0;
}
?>
<section class="inlet-stats">
  <div class="stats-container">
    <div class="stat-box reveal" data-reveal-delay="0">
      <img src="<?php echo $root; ?>assets/img/home/icon/members.png" alt="Members Icon" class="stat-icon">
      <p class="stat-text"><span><?php echo $total_members; ?></span> Anggota aktif</p>
    </div>
    <div class="stat-box reveal" data-reveal-delay="100">
      <img src="<?php echo $root; ?>assets/img/home/icon/article.png" alt="Article Icon" class="stat-icon">
      <p class="stat-text"><span>50</span> Artikel terkait</p>
    </div>
    <div class="stat-box reveal" data-reveal-delay="200">
      <img src="<?php echo $root; ?>assets/img/home/icon/prototype.png" alt="Prototype Icon" class="stat-icon">
      <p class="stat-text"><span>5</span> Prototipe</p>
    </div>
    <div class="stat-box reveal" data-reveal-delay="300">
      <img src="<?php echo $root; ?>assets/img/home/icon/student.png" alt="Students Icon" class="stat-icon">
      <p class="stat-text"><span>&gt 50</span> Siswa terlibat</p>
    </div>
  </div>
</section>
