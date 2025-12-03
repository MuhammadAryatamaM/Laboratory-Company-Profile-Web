<?php
include "config/koneksi.php";

$gallery_items = [];

try {
    $stmt = $pdo->query("SELECT * FROM gallery_item ORDER BY created_at DESC");
    $gallery_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

<section class="gallery-section">
    <div class="container">
        <h2 class="section-title">Gallery</h2>
        <div class="gallery-grid">
            <?php if (!empty($gallery_items)) : ?>
                <?php foreach ($gallery_items as $item) : ?>
                    <div class="gallery-item">
                        <img src="assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="gallery-img">
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No photos in gallery.</p>
            <?php endif; ?>
        </div>
    </div>
</section>