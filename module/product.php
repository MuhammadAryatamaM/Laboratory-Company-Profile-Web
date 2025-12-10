<?php
include_once "config/koneksi.php";

$home_products = [];
try {
  $stmt = $pdo->query("SELECT * FROM product ORDER BY created_at ASC LIMIT 4");
  $home_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
}
?>

<style>
  .products-line {
    margin: 5px auto 30px auto !important;
    /* Center the line */
  }
</style>

<section class="products-section" id="products">
  <div class="products-container">
    <div class="products-heading" style="text-align: center;">
      <h2 class="products-title">Produk</h2>
      <div class="products-line"></div>
    </div>

    <?php if (!empty($home_products)): ?>
      <div class="products-row" style="justify-content: center;">
        <?php
        $top_row_count = min(2, count($home_products));
        for ($i = 0; $i < $top_row_count; $i++):
          $product = $home_products[$i];
        ?>
          <article class="product-card reveal" data-reveal-delay="<?php echo $i * 120; ?>">
            <div class="product-thumb">
              <img src="assets/uploads/<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
            </div>
            <div class="product-content">
              <h3 class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></h3>
              <p class="product-desc">
                <?php echo htmlspecialchars($product['description']); ?>
              </p>
              <a href="<?php echo htmlspecialchars($product['link_url']); ?>" class="product-cta">
                <span>Unduh Sekarang </span>
                <span class="product-cta-arrow">→</span>
              </a>
            </div>
          </article>
        <?php endfor; ?>
      </div>

      <?php if (count($home_products) > 2): ?>
        <div class="products-row products-row-bottom center-one">
          <?php
          for ($i = 2; $i < count($home_products); $i++):
            $product = $home_products[$i];
          ?>
            <article class="product-card reveal" data-reveal-delay="<?php echo $i * 120; ?>">
              <div class="product-thumb">
                <img src="assets/uploads/<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
              </div>
              <div class="product-content">
                <h3 class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></h3>
                <p class="product-desc">
                  <?php echo htmlspecialchars($product['description']); ?>
                </p>
                <a href="<?php echo htmlspecialchars($product['link_url']); ?>" class="product-cta">
                  <span>Unduh Sekarang</span>
                  <span class="product-cta-arrow">→</span>
                </a>
              </div>
            </article>
          <?php endfor; ?>
        </div>
      <?php endif; ?>

    <?php else: ?>
      <p style="text-align: center;">Belum ada produk yang ditampilkan.</p>
    <?php endif; ?>

    <div class="products-see-more-wrap reveal reveal-fade" data-reveal-delay="260">
      <a class="products-see-more" href="<?php echo $root; ?>pages/products.php">Selengkapnya</a>
    </div>
  </div>
</section>
