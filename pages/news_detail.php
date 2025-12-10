<?php
include "config/koneksi.php";

$news_items  = [];
$mainNews    = null;
$recentItems = [];

$id = $_GET['id'] ?? 0;

try {
  $stmt = $pdo->prepare("
            SELECT n.*, t.full_name as author_name 
            FROM news n
            LEFT JOIN team_member t ON n.author_id = t.member_id 
            WHERE n.news_id = :id
        ");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $first = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($first) {
    $description = $first['description'] ?? '';
    $splitPos = strpos($description, '</p>');

    if ($splitPos !== false) {
      $introParagraph = substr($description, 0, $splitPos + 4);
      $restParagraphs = substr($description, $splitPos + 4);
    } else {
      $introParagraph = $description;
      $restParagraphs = '';
    }

    $mainNews = [
      'title'  => $first['title'],
      'image'  => 'assets/uploads/' . $first['image_url'],
      'intro'  => $introParagraph,
      'rest'   => $restParagraphs,
      'date'   => date('d F Y', strtotime($first['publish_date'])),
      'tag'    => $first['tag'] ?? 'General',
      'place'  => $first['place'] ?? '',
      'author' => $first['author_name'] ?? 'Admin'
    ];
  }

  $stmt = $pdo->prepare("SELECT * FROM news WHERE news_id != :id ORDER BY publish_date DESC LIMIT 5");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $recent_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($recent_items as $item) {
    $recentItems[] = [
      'id'       => $item['news_id'],
      'title'    => $item['title'],
      'image'    => 'assets/uploads/' . $item['image_url'],
      'location' => $item['place'] ?? 'InLET Lab',
      'date'     => date('F Y', strtotime($item['publish_date']))
    ];
  }
} catch (PDOException $e) {
  echo "Database error: " . $e->getMessage();
}

function generateRecentItem($item)
{
  $html  = '<div class="recent-item">';
  $html .= '  <img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['title']) . '" class="recent-image">';
  $html .= '  <div class="recent-info">';
  $html .= '      <div class="recent-top-row">';
  $html .= '          <a href="?page=news_detail&id=' . htmlspecialchars($item['id']) . '" class="recent-view-more">Selengkapnya →</a>';
  $html .= '      </div>';
  $html .= '      <div class="recent-item-title">' . htmlspecialchars($item['title']) . '</div>';
  $html .= '      <div class="recent-meta">' . htmlspecialchars($item['date']) . '</div>';
  $html .= '  </div>';
  $html .= '</div>';
  return $html;
}

function generateRecentItems($items)
{
  $html = '';
  foreach ($items as $item) {
    $html .= generateRecentItem($item);
  }
  return $html;
}
?>

<div class="container news-detail-container">
  <div class="news-section">
    <?php if ($mainNews): ?>
      <div class="main-content">
        <div class="main-header mb-4">
          <h2 class="main-title mb-2">
            <?php echo htmlspecialchars($mainNews['title']); ?>
          </h2>
          <p class="main-meta text-muted small">
            <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($mainNews['author']); ?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <i class="fas fa-calendar-alt me-1"></i>
            <?php echo htmlspecialchars($mainNews['date']); ?>
          </p>
        </div>

        <div class="article-body">
          <img
            src="<?php echo htmlspecialchars($mainNews['image']); ?>"
            alt="<?php echo htmlspecialchars($mainNews['title']); ?>"
            class="main-image-float"
            style="float: left; width: 40%; margin-right: 25px; margin-bottom: 15px; border-radius: 8px; object-fit: cover;">

          <div class="intro-text">
            <?php echo $mainNews['intro']; ?>
          </div>

          <div style="clear: both;"></div>

          <?php if (!empty($mainNews['rest'])): ?>
            <div class="rest-text mt-3">
              <?php echo $mainNews['rest']; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="main-content">
        <p>Tidak ada berita.</p>
      </div>
    <?php endif; ?>

    <aside class="sidebar">
      <div class="sidebar-header">
        <span class="sidebar-title"> Berita terbaru</span>
      </div>
      <div class="recent-items">
        <?php echo generateRecentItems($recentItems); ?>
      </div>
    </aside>
  </div>
</div>

<script src="<?php echo $root; ?>assets/js/news_detail.js"></script>
