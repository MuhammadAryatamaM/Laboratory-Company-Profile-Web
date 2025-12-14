<div class="container">
  <?php
  include_once "config/koneksi.php";

  $view = $_GET['view'] ?? 'latest';
  $curr_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
  if ($curr_page < 1) $curr_page = 1;
  $limit = 9;
  $offset = ($curr_page - 1) * $limit;

  $news_items = [];
  $total_pages = 1;

  try {
    $stmtCount = $pdo->query("SELECT COUNT(*) FROM news");
    $total_items = $stmtCount->fetchColumn();
    $total_pages = ceil($total_items / $limit);

    $sql = "SELECT n.*, t.full_name as author_name 
                FROM news n 
                LEFT JOIN team_member t ON n.author_id = t.member_id ";

    if ($view === 'oldest') {
      $sql .= "ORDER BY n.publish_date ASC ";
    } else {
      $sql .= "ORDER BY n.publish_date DESC ";
    }

    $sql .= "LIMIT :limit OFFSET :offset";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $news_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    $news_items = [];
  }
  ?>

  <section class="news-list-section">

    <div class="news-list-header">
      <h1 class="news-list-title">Berita</h1>

      <div class="news-sort">
        <a href="?page=news&view=latest" class="sort-btn <?php echo ($view !== 'oldest') ? 'is-active' : ''; ?>">Terbaru</a>
        <a href="?page=news&view=oldest" class="sort-btn <?php echo ($view === 'oldest') ? 'is-active' : ''; ?>">Terlama</a>
      </div>
    </div>

    <?php if ($total_pages > 1): ?>
      <nav aria-label="Page navigation" class="mb-4">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo ($curr_page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=news&view=<?php echo $view; ?>&p=<?php echo $curr_page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($curr_page == $i) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=news&view=<?php echo $view; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?php echo ($curr_page >= $total_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=news&view=<?php echo $view; ?>&p=<?php echo $curr_page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    <?php endif; ?>

    <?php if (!empty($news_items)) : ?>
      <?php foreach ($news_items as $news) : ?>
        <article class="news-card">
          <a href="?page=news_detail&id=<?php echo $news['news_id']; ?>" class="news-card-link">
            <img src="assets/uploads/<?php echo htmlspecialchars($news['image_url']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>" class="news-card-image" style="object-fit: cover;">
            <div class="news-card-body">
              <div class="news-card-top">
                <h2 class="news-card-title">
                  <?php echo htmlspecialchars($news['title']); ?>
                </h2>
                <p class="news-card-excerpt">
                  <?php echo substr(htmlspecialchars(strip_tags($news['description'])), 0, 150) . '...'; ?>
                </p>
                <p class="news-card-meta">
                  <?php echo date('d F Y', strtotime($news['publish_date'])); ?>
                  <br>
                  <span class="news-author text-muted" style="font-size: 0.9em;">
                    <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($news['author_name'] ?? 'Admin'); ?>
                  </span>
                </p>
              </div>
              <span class="news-card-readmore">Selengkapnya →</span>
            </div>
          </a>
        </article>
      <?php endforeach; ?>

    <?php else : ?>
      <div class="alert alert-info">Belum ada berita.</div>
    <?php endif; ?>

  </section>
</div>
