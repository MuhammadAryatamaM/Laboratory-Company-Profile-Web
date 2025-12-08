<div class="container">
    <?php
    include_once "config/koneksi.php";

    $view = $_GET['view'] ?? 'latest'; // default to latest
    $news_items = [];

    try {
        if ($view === 'oldest') {
            $stmt = $pdo->query("SELECT n.*, t.full_name as author_name FROM news n LEFT JOIN team_member t ON n.author_id = t.member_id ORDER BY n.publish_date DESC LIMIT 1000 OFFSET 4");
        } else {
            // Default: menampilkan top 4 (newest)
            $stmt = $pdo->query("SELECT n.*, t.full_name as author_name FROM news n LEFT JOIN team_member t ON n.author_id = t.member_id ORDER BY n.publish_date DESC LIMIT 4");
        }
        $news_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $news_items = [];
    }
    ?>

    <section class="news-list-section">

        <div class="news-list-header">
            <h1 class="news-list-title">News</h1>

            <div class="news-sort">
                <a href="?page=news&view=latest" class="sort-btn <?php echo ($view !== 'oldest') ? 'is-active' : ''; ?>">Terbaru</a>
                <a href="?page=news&view=oldest" class="sort-btn <?php echo ($view === 'oldest') ? 'is-active' : ''; ?>">Terlama</a>
            </div>
        </div>

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
                            <span class="news-card-readmore">Read more →</span>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-info">Belum ada berita.</div>
        <?php endif; ?>

    </section>
</div>
