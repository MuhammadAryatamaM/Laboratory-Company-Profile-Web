<?php
$page_title = 'Gallery Management';

// Fetch all gallery items
try {
  // Changed table to gallery_item
  $stmt = $pdo->query("SELECT * FROM gallery_item ORDER BY created_at DESC");
  $gallery_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $gallery_items = [];
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Gallery</h1>
        <p class="text-muted">Upload and manage your photos</p>
      </div>
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
        <a href="?page=gallery&act=create" class="btn btn-primary">
          <i class="fas fa-cloud-upload-alt me-2"></i>Upload Photos
        </a>
      <?php endif; ?>
    </div>

    <div class="row">
      <?php foreach ($gallery_items as $item) : ?>
        <div class="col-md-3 mb-4">
          <div class="gallery-card h-100">
            <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; overflow: hidden;">
              <?php if (!empty($item['image_url'])) : ?>
                <img src="../assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
              <?php else : ?>
                <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
              <?php endif; ?>
            </div>
            <h6 class="mb-2"><?php echo htmlspecialchars($item['title']); ?></h6>
            <p class="text-muted small mb-3"><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></p>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
              <div class="d-flex gap-2">
                <a href="?page=gallery&act=edit&id=<?php echo $item['item_id']; ?>" class="btn btn-sm btn-outline-primary flex-grow-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="module/gallery/aksi.php?module=gallery&act=delete&id=<?php echo $item['item_id']; ?>" class="btn btn-sm btn-outline-danger flex-grow-1" onclick="return confirm('Are you sure you want to delete this photo?');">
                  <i class="fas fa-trash"></i> Delete
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($gallery_items)) : ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            No photos found in the gallery.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
