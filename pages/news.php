<div class="container">
    <?php
    include_once "config/koneksi.php";

    $view = $_GET['view'] ?? 'latest'; // default to latest
    $news_items = [];

    try {
        if ($view === 'oldest') {
            // Fetch everything AFTER the first 4, oldest means "older items"
            // Use a large limit to get "the rest"
            $stmt = $pdo->query("SELECT * FROM news ORDER BY publish_date DESC LIMIT 1000 OFFSET 4");
        } else {
            // Default: Fetch top 4 (newest)
            $stmt = $pdo->query("SELECT * FROM news ORDER BY publish_date DESC LIMIT 4");
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
                                <span class="news-tag"><?php echo htmlspecialchars($news['tag'] ?? 'General'); ?></span>
                                <h2 class="news-card-title">
                                    <?php echo htmlspecialchars($news['title']); ?>
                                </h2>
                                <p class="news-card-excerpt">
                                    <?php echo substr(htmlspecialchars(strip_tags($news['description'])), 0, 150) . '...'; ?>
                                </p>
                                <p class="news-card-meta">
                                    <?php echo htmlspecialchars($news['place'] ?? ''); ?> · <?php echo date('d F Y', strtotime($news['publish_date'])); ?>
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
