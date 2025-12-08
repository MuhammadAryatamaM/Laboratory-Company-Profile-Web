<?php
include "config/koneksi.php";

$news_items  = [];
$mainNews    = null;
$recentItems = [];

$id = $_GET['id'] ?? 0;
    
    // Fetch main news
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
            
            // Bagi deskripsi jadi paragraf (dipisah dengan 1+ baris kosong)
            $paragraphs = preg_split('/\r?\n\r?\n+/', trim($description));
            $introParagraph = $paragraphs ? array_shift($paragraphs) : '';
            $restParagraphs = $paragraphs ? implode("\n\n", $paragraphs) : '';

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

        // Fetch recent items (exclude current)
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

// Fungsi untuk generate recent item
function generateRecentItem($item) {
    $html  = '<div class="recent-item">';
    $html .= '  <img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['title']) . '" class="recent-image">';
    $html .= '  <div class="recent-info">';
    $html .= '      <div class="recent-top-row">';
    $html .= '          <a href="?page=news_detail&id=' . htmlspecialchars($item['id']) . '" class="recent-view-more">View More →</a>';
    $html .= '      </div>';
    $html .= '      <div class="recent-item-title">' . htmlspecialchars($item['title']) . '</div>';
    $html .= '      <div class="recent-meta">' . htmlspecialchars($item['date']) . '</div>';
    $html .= '  </div>';
    $html .= '</div>';
    return $html;
}

// Fungsi untuk generate semua recent items
function generateRecentItems($items) {
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
                <div class="content-top">
                    <img
                        src="<?php echo htmlspecialchars($mainNews['image']); ?>"
                        alt="<?php echo htmlspecialchars($mainNews['title']); ?>"
                        class="main-image"
                    >

                    <div class="main-header">
                        <h2 class="main-title">
                            <?php echo htmlspecialchars($mainNews['title']); ?>
                        </h2>

                        <?php if (!empty($mainNews['intro'])): ?>
                            <p class="main-intro">
                                <?php echo nl2br(htmlspecialchars($mainNews['intro'])); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($mainNews['rest'])): ?>
                    <p class="main-description">
                        <?php echo nl2br(htmlspecialchars($mainNews['rest'])); ?>
                    </p>
                <?php endif; ?>

                <p class="main-meta">
                    <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($mainNews['author']); ?> 
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <i class="fas fa-calendar-alt me-1"></i>
                    <?php echo htmlspecialchars($mainNews['date']); ?>
                </p>
            </div>
        <?php else: ?>
            <div class="main-content">
                <p>No news available.</p>
            </div>
        <?php endif; ?>

        <!-- Sidebar (recent news) -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <span class="sidebar-title">Recent</span>
            </div>
            <div class="recent-items">
                <?php echo generateRecentItems($recentItems); ?>
            </div>
        </aside>
    </div>
</div>

<script src="<?php echo $root; ?>assets/js/news_detail.js"></script>