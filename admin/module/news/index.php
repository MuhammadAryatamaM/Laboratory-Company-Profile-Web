<?php
$page_title = 'News Management';

$items_per_page = 9;
$current_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$offset = ($current_page - 1) * $items_per_page;

try {
  $count_stmt = $pdo->query("SELECT COUNT(*) FROM news");
  $total_items = $count_stmt->fetchColumn();
  $total_pages = ceil($total_items / $items_per_page);

  $stmt = $pdo->prepare("
    SELECT n.*, t.full_name as author_name 
    FROM news n 
    LEFT JOIN team_member t ON n.author_id = t.member_id 
    ORDER BY n.publish_date DESC
    LIMIT :limit OFFSET :offset
  ");

  $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
  $stmt->execute();

  $news_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $news_items = [];
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">News Management</h1>
        <p class="text-muted">Create and manage news articles</p>
      </div>
      <a href="?page=news&act=create" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New News
      </a>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
      <nav aria-label="Page navigation" class="mb-4">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=news&p=<?php echo $current_page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=news&p=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=news&p=<?php echo $current_page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    <?php endif; ?>

    <div class="row">
      <?php foreach ($news_items as $item) : ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-img-top" style="height: 200px; background: #e5e7eb; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <?php if (!empty($item['image_url'])) : ?>
                <img src="../assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
              <?php else : ?>
                <i class="fas fa-newspaper text-muted" style="font-size: 40px;"></i>
              <?php endif; ?>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h5>
              <p class="card-text text-muted small mb-2">
                <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($item['author_name'] ?? 'Unknown'); ?> &bull;
                <i class="fas fa-calendar-alt ms-1 me-1"></i> <?php echo date('d M Y', strtotime($item['publish_date'])); ?>
              </p>
              <p class="card-text flex-grow-1"><?php echo htmlspecialchars(substr(strip_tags($item['description']), 0, 100)) . '...'; ?></p>

              <div class="d-flex gap-2 mt-3">
                <a href="?page=news&act=edit&id=<?php echo $item['news_id']; ?>" class="btn btn-outline-primary btn-sm flex-grow-1">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <a href="module/news/aksi.php?module=news&act=delete&id=<?php echo $item['news_id']; ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Are you sure you want to delete this news?');">
                  <i class="fas fa-trash"></i> Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($news_items)) : ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            No news articles found.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
