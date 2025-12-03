<?php
include "config/koneksi.php";

$news_items = [];
$mainNews = null;
$recentItems = [];

try {
    $stmt = $pdo->query("
        SELECT n.*, t.full_name as author_name 
        FROM news n 
        LEFT JOIN team_member t ON n.author_id = t.member_id 
        ORDER BY n.publish_date DESC
    ");
    $news_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($news_items)) {
        // berita pertama untuk main news
        $first = array_shift($news_items);
        $mainNews = [
            'title' => $first['title'],
            'image' => 'assets/uploads/' . $first['image_url'],
            'description' => $first['description'],
            'date' => date('d F Y', strtotime($first['publish_date'])),
            'author' => $first['author_name']
        ];

        // recent items
        foreach ($news_items as $item) {
            $recentItems[] = [
                'title' => $item['title'],
                'image' => 'assets/uploads/' . $item['image_url'],
                'location' => 'InLET Lab', 
                'date' => date('F Y', strtotime($item['publish_date']))
            ];
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

// Fungsi untuk generate recent item
function generateRecentItem($item) {
    $html = '<a href="#" class="recent-view-more">View More →</a>';
    $html .= '<div class="recent-item">';
    $html .= '<img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['title']) . '" class="recent-image">';
    $html .= '<div class="recent-info">';
    $html .= '<div class="recent-item-title">' . htmlspecialchars($item['title']) . '</div>';
    $html .= '<div class="recent-meta">' . htmlspecialchars($item['location']) . ' | ' . htmlspecialchars($item['date']) . '</div>';
    $html .= '</div>';
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

<div class="container">
    <div class="news-section">
        <?php if ($mainNews): ?>
        <!-- News utama - Left Side -->
        <div class="main-content">
            <div class="content-top">
                <img src="<?php echo htmlspecialchars($mainNews['image']); ?>" alt="<?php echo htmlspecialchars($mainNews['title']); ?>" class="main-image">
                <div class="main-text">
                    <h2 class="main-title"><?php echo htmlspecialchars($mainNews['title']); ?></h2>
                    <p class="main-description"><?php echo nl2br(htmlspecialchars($mainNews['description'])); ?></p>
                    <p class="text-muted small mt-2">
                        <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($mainNews['author'] ?? 'Admin'); ?> | 
                        <i class="fas fa-calendar-alt me-1"></i> <?php echo htmlspecialchars($mainNews['date']); ?>
                    </p>
                </div>
            </div>

        </div>
        <?php else: ?>
            <div class="main-content">
                <p>No news available.</p>
            </div>
        <?php endif; ?>

        <!-- Sidebar(recent news) - Right Side (Scroll) -->
        <div class="sidebar">
            <div class="sidebar-header">
                <span class="sidebar-title">Recent</span>
            </div>
            <div class="recent-items">
                <?php echo generateRecentItems($recentItems); ?>
            </div>
        </div>
    </div>
</div>