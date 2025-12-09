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
    <div class="gallery-container">
        <h2 class="section-title">Galeri</h2>

        <?php if (!empty($gallery_items)) : ?>
            <div class="gallery-grid">
                <?php foreach ($gallery_items as $item) : ?>
                    <article class="gallery-card">
                        <div class="gallery-img-wrapper">
                            <img
                                src="assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>"
                                alt="<?php echo htmlspecialchars($item['title']); ?>"
                                class="gallery-img"
                                loading="lazy"
                            >
                            <div class="gallery-overlay">
                                <h3 class="gallery-title">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </h3>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="gallery-empty">Tidak ada gambar di galeri</p>
        <?php endif; ?>
    </div>
</section>
