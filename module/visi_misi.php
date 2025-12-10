<?php
include_once "config/koneksi.php";

$visi = "Visi belum diatur.";
$misi = "Misi belum diatur.";

try {
  $stmt = $pdo->prepare("SELECT setting_key, setting_value FROM settings WHERE setting_key IN ('vision', 'mission')");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

  if (isset($results['vision'])) {
    $visi = $results['vision'];
  }
  if (isset($results['mission'])) {
    $misi = $results['mission'];
  }
} catch (PDOException $e) {
}
?>

<section class="vm-section" id="visi-misi">
  <div class="vm-container">
    <div class="vm-card reveal" data-reveal-delay="0">
      <div class="vm-label">Visi</div>
      <div class="vm-content vm-content-visi">
        <p>
          <?php echo $visi; ?>
        </p>
      </div>
    </div>
    <div class="vm-card reveal" data-reveal-delay="150">
      <div class="vm-label">Misi</div>
      <div class="vm-content vm-content-misi">
        <?php echo $misi; ?>
      </div>
    </div>

  </div>
</section>
