<?php
$page_title = 'Product Management';

// Fetch all products
try {
  // Changed to product table
  $stmt = $pdo->query("SELECT * FROM product ORDER BY created_at DESC");
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  $products = [];
}
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Product Management</h1>
        <p class="text-muted">Create and manage products</p>
      </div>
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
        <a href="?page=product&act=create" class="btn btn-primary">
          <i class="fas fa-plus me-2"></i>Create New Product
        </a>
      <?php endif; ?>
    </div>

    <div class="row">
      <?php foreach ($products as $item) : ?>
        <div class="col-md-4 mb-4">
          <div class="card product-card h-100">
            <div class="product-image" style="height: 200px; background: #e5e7eb; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <?php if (!empty($item['image_url'])) : ?>
                <img src="../assets/uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
              <?php else : ?>
                <i class="fas fa-box text-muted" style="font-size: 40px;"></i>
              <?php endif; ?>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($item['product_name']); ?></h5>
              <div class="mb-2">
                <?php
                if (!empty($item['categories'])) {
                  $cats = explode(',', $item['categories']);
                  foreach ($cats as $cat) {
                    echo '<span class="badge bg-light text-dark me-1">' . htmlspecialchars(trim($cat)) . '</span>';
                  }
                }
                ?>
              </div>
              <p class="card-text text-muted small flex-grow-1"><?php echo substr(htmlspecialchars($item['description']), 0, 100) . '...'; ?></p>
              <a href="<?php echo htmlspecialchars($item['link_url']); ?>" class="text-primary text-decoration-none mb-3 d-block" target="_blank">View Product</a>
              
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Kepala Laboratorium') : ?>
                <div class="d-flex gap-2">
                  <a href="?page=product&act=edit&id=<?php echo $item['product_id']; ?>" class="btn btn-outline-primary btn-sm flex-grow-1">
                    <i class="fas fa-edit me-1"></i>Edit
                  </a>
                  <a href="module/products/aksi.php?module=products&act=delete&id=<?php echo $item['product_id']; ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Are you sure you want to delete this product?');">
                    <i class="fas fa-trash me-1"></i>Delete
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($products)) : ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            No products found.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
