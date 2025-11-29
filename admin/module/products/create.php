<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
  echo "<script>alert('You do not have permission to access this page.'); window.location.href = 'index.php?page=products';</script>";
  exit();
}
$page_title = 'Create Product';
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=products" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Create New Product</h1>
        <p class="text-muted">Fill in the details below</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Product Details</h5>

            <form method="POST" action="module/products/aksi.php?module=products&act=input" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="product-name" name="product_name" placeholder="Enter product name" required>
              </div>

              <div class="mb-4">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter product description" required></textarea>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                  <input type="url" class="form-control" id="link" name="link_url" placeholder="https://example.com" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Image Upload</label>
                  <div class="upload-area-product" style="cursor: pointer; border: 2px dashed #d1d5db; border-radius: 12px; padding: 24px 16px; text-align: center; background: #f9fafb; transition: all 0.3s ease;">
                    <i class="fas fa-image text-muted mb-2 d-block" style="font-size: 24px;"></i>
                    <p class="mb-0 small">Upload Image</p>
                    <small class="text-muted d-block mt-1 file-name-display" style="display: none;"></small>
                    <input type="file" class="form-control d-none" id="product-image" name="image_url" accept="image/*">
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label">Categories (Up to 4)</label>
                <div class="input-group mb-2">
                  <input type="text" class="form-control" id="category-input" placeholder="Enter category" />
                  <button class="btn btn-outline-primary" type="button" id="add-category">Add</button>
                </div>
                <div id="categories-list"></div>
                <input type="hidden" name="categories" id="categories-hidden">
                <small class="text-muted d-block mt-2"><span id="category-count">0</span>/4 categories added</small>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=products" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Create Product
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  document.querySelector('.upload-area-product').addEventListener('click', function() {
    document.getElementById('product-image').click();
  });

  document.getElementById('product-image').addEventListener('change', function() {
    if (this.files.length > 0) {
      const fileName = this.files[0].name;
      const fileNameDisplay = document.querySelector('.file-name-display');
      fileNameDisplay.textContent = 'Selected: ' + fileName;
      fileNameDisplay.style.display = 'block';
    }
  });

  let categoryCount = 0;
  const categories = [];

  function updateHiddenInput() {
    document.getElementById('categories-hidden').value = categories.join(',');
  }

  document.getElementById('add-category').addEventListener('click', function() {
    const input = document.getElementById('category-input');
    const value = input.value.trim();
    
    if (value && categoryCount < 4) {
      categories.push(value);
      updateHiddenInput();

      const tag = document.createElement('span');
      tag.className = 'badge bg-primary me-2 mb-2';
      tag.innerHTML = value + ' <i class="fas fa-times ms-1" style="cursor:pointer;"></i>';
      
      tag.querySelector('i').addEventListener('click', function() {
        const index = categories.indexOf(value);
        if (index > -1) {
          categories.splice(index, 1);
          updateHiddenInput();
        }
        tag.remove();
        categoryCount--;
        document.getElementById('category-count').textContent = categoryCount;
      });

      document.getElementById('categories-list').appendChild(tag);
      input.value = '';
      categoryCount++;
      document.getElementById('category-count').textContent = categoryCount;
    }
  });
</script>
