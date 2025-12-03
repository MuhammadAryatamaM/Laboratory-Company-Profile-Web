<?php
include_once "config/koneksi.php";

$home_gallery = [];
try {
    $stmt = $pdo->query("SELECT * FROM gallery_item ORDER BY created_at DESC LIMIT 6");
    $home_gallery = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Silent fail
}
?>

<section id="gallery" class="gallery-section">
    <div class="gallery-container">
        <div class="gallery-heading reveal reveal-fade">
            <h2 class="gallery-title">Gallery</h2>
            <div class="gallery-line"></div>
        </div>

        <div class="gallery-grid">
            <?php if (!empty($home_gallery)) : ?>
                <?php foreach ($home_gallery as $item) : ?>
                    <div class="gallery-item reveal reveal-fade">
                        <img src="assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No gallery items.</p>
            <?php endif; ?>
        </div>
        <div class="gallery-more-wrapper reveal reveal-fade" data-reveal-delay="220">
            <a href="<?php echo $root; ?>pages/gallery.php" class="gallery-more-btn">
                <span>View More</span>
                <span class="gallery-arrow">→</span>
            </a>
        </div>
    </div>
</section>