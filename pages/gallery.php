<?php
include "config/koneksi.php";

$limit = 12;
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
  echo "Database error: " . $e->getMessage();
}
?>

<section class="gallery-section">
  <div class="gallery-container">
    <h2 class="section-title">Galeri</h2>

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

    <?php if (!empty($gallery_items)) : ?>
      <div class="gallery-grid">
        <?php foreach ($gallery_items as $item) : ?>
          <article class="gallery-card">
            <div class="gallery-img-wrapper">
              <img
                src="assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>"
                alt="<?php echo htmlspecialchars($item['title']); ?>"
                class="gallery-img"
                loading="lazy">
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
      <div class="gallery-empty">Tidak ada gambar di galeri</div>
    <?php endif; ?>
  </div>
</section>
