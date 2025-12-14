<?php
$page_title = 'Gallery Management';

$limit = 16;
$curr_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
if ($curr_page < 1) $curr_page = 1;
$offset = ($curr_page - 1) * $limit;

$gallery_items = [];
$total_pages = 1;

try {
  $stmtCount = $pdo->query("SELECT COUNT(*) FROM gallery_item");
  $total_items = $stmtCount->fetchColumn();
  $total_pages = ceil($total_items / $limit);

  $stmt = $pdo->prepare("SELECT * FROM gallery_item ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
  $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
  $stmt->execute();
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
      <a href="?page=gallery&act=create" class="btn btn-primary">
        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Photos
      </a>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
      <nav aria-label="Page navigation" class="mb-4">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo ($curr_page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=gallery&p=<?php echo $curr_page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($curr_page == $i) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=gallery&p=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?php echo ($curr_page >= $total_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=gallery&p=<?php echo $curr_page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    <?php endif; ?>

    <div class="row">
      <?php foreach ($gallery_items as $item) : ?>
        <div class="col-md-3 mb-4">
          <div class="card gallery-card h-100">
            <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px 8px 0 0; height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <?php if (!empty($item['image_url'])) : ?>
                <img src="../assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
              <?php else : ?>
                <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
              <?php endif; ?>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <h6 class="mb-2 text-break"><?php echo htmlspecialchars($item['title']); ?></h6>
              <p class="text-muted small mb-3 flex-grow-1"><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></p>
              <div class="d-flex gap-2">
                <a href="?page=gallery&act=edit&id=<?php echo $item['item_id']; ?>" class="btn btn-sm btn-outline-primary flex-grow-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="module/gallery/aksi.php?module=gallery&act=delete&id=<?php echo $item['item_id']; ?>" class="btn btn-sm btn-outline-danger flex-grow-1" onclick="return confirm('Are you sure you want to delete this photo?');">
                  <i class="fas fa-trash"></i> Delete
                </a>
              </div>
            </div>
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
