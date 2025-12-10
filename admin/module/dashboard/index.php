<?php
$page_title = 'Dashboard';

try {
  $stmt_summary = $pdo->query("SELECT * FROM v_dashboard_summary LIMIT 1");
  $summary = $stmt_summary->fetch(PDO::FETCH_ASSOC);

  $stmt_visitors = $pdo->query("SELECT * FROM v_visitor_stats LIMIT 1");
  $visitor_stats = $stmt_visitors->fetch(PDO::FETCH_ASSOC);

  $stmt_news = $pdo->query("SELECT * FROM v_recent_news");
  $recent_news = $stmt_news->fetchAll(PDO::FETCH_ASSOC);

  $stmt_products = $pdo->query("SELECT * FROM v_recent_products");
  $recent_products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $summary = ['total_news' => 'N/A', 'total_product' => 'N/A', 'total_team_members' => 'N/A', 'total_visitor' => 'N/A'];
  $visitor_stats = ['visitors_last_7_days' => 'N/A', 'visitors_last_28_days' => 'N/A', 'visitors_last_60_days' => 'N/A', 'visitors_last_365_days' => 'N/A'];
  $recent_news = [];
  $recent_products = [];
  echo "<div class='alert alert-danger'>Failed to fetch dashboard data: " . $e->getMessage() . "</div>";
}
?>

<main class="main-content">
  <div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row mb-4">
      <div class="col-md-3 mb-3">
        <a href="?page=news" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #4f46e5;">
              <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
              <h3>Total News</h3>
              <p class="stat-number"><?php echo htmlspecialchars($summary['total_news']); ?></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="?page=products" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #7c3aed;">
              <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
              <h3>Total Product</h3>
              <p class="stat-number"><?php echo htmlspecialchars($summary['total_product']); ?></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="?page=teams" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #06b6d4;">
              <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
              <h3>Total Team Members</h3>
              <p class="stat-number"><?php echo htmlspecialchars($summary['total_team_members']); ?></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="#" id="visitor-stats-trigger" class="stat-card-link">
          <div class="stat-card card h-100">
            <div class="stat-icon" style="background: #a855f7;">
              <i class="fas fa-eye"></i>
            </div>
            <div class="stat-content">
              <h3>Total Visitor</h3>
              <p class="stat-number"><?php echo htmlspecialchars($summary['total_visitor']); ?></p>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>Recent News</h5>
            <a href="index.php?page=news" class="text-primary">View All</a>
          </div>
          <div class="card-body">
            <?php if (!empty($recent_news)) : ?>
              <?php foreach ($recent_news as $news_item) : ?>
                <div class="recent-item mb-3">
                  <h6><?php echo htmlspecialchars($news_item['title']); ?></h6>
                  <p class="text-muted small"><?php echo htmlspecialchars($news_item['publish_date']); ?> by <?php echo htmlspecialchars($news_item['author_name']); ?></p>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="text-muted">No recent news found.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-box me-2"></i>Recent Products</h5>
            <a href="index.php?page=product" class="text-primary">View All</a>
          </div>
          <div class="card-body">
            <?php if (!empty($recent_products)) : ?>
              <?php foreach ($recent_products as $product_item) : ?>
                <div class="recent-item mb-3">
                  <h6><?php echo htmlspecialchars($product_item['product_name']); ?></h6>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="text-muted">No recent products found.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="visitor-stats-modal" title="Visitor Statistics">
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 7 Days
        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($visitor_stats['visitors_last_7_days']); ?></span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 28 Days
        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($visitor_stats['visitors_last_28_days']); ?></span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 60 Days
        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($visitor_stats['visitors_last_60_days']); ?></span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Past 365 Days
        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($visitor_stats['visitors_last_365_days']); ?></span>
      </li>
    </ul>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
  $(function() {
    $("#visitor-stats-modal").dialog({
      autoOpen: false,
      modal: true,
      width: 500,
      show: {
        effect: "fade",
        duration: 200
      },
      hide: {
        effect: "fade",
        duration: 200
      },
      closeOnEscape: true
    });

    $("#visitor-stats-trigger").on("click", function(e) {
      e.preventDefault();
      $("#visitor-stats-modal").dialog("open");
    });

    $(document).on('click', '.ui-widget-overlay', function() {
      $("#visitor-stats-modal").dialog('close');
    });
  });
</script>
