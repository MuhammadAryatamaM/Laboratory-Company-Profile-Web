<?php
include_once "config/koneksi.php";

$home_news = [];
try {
  $stmt = $pdo->query("SELECT * FROM news ORDER BY publish_date DESC LIMIT 3");
  $home_news = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
}
?>

<section class="news-section" id="news-home">
  <div class="news-box reveal reveal-fade">
    <h2 class="news-heading">Berita Kami</h2>

    <div class="news-cards">
      <?php if (!empty($home_news)) : ?>
        <?php foreach ($home_news as $news) : ?>
          <article class="news-card">
            <div class="news-img-wrap">
              <img src="assets/uploads/<?php echo htmlspecialchars($news['image_url']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>">
            </div>
            <div class="news-heading-block">
              <h3 class="news-title"><?php echo htmlspecialchars($news['title']); ?></h3>
              <div class="news-title-line"></div>
            </div>
            <p class="news-desc">
              <?php echo substr(htmlspecialchars($news['description']), 0, 100) . '...'; ?>
            </p>
          </article>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Belum ada berita.</p>
      <?php endif; ?>
    </div>

    <div class="news-btn-wrap">
      <a href="index.php?page=news" class="news-more-btn">
        Selengkapnya
      </a>
    </div>
  </div>
</section>
