<?php $page_title = 'Product Management'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Product Management</h1>
        <p class="text-muted">Create and manage products</p>
      </div>
      <a href="?page=product-add" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Product
      </a>
    </div>

    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card product-card h-100">
          <div class="product-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Premium Wireless Headphones</h5>
            <div class="mb-2">
              <span class="badge bg-light text-dark">Electronics</span>
              <span class="badge bg-light text-dark">Audio</span>
            </div>
            <p class="card-text text-muted small flex-grow-1">High-quality wireless headphones with noise cancellation and...</p>
            <a href="#" class="text-primary text-decoration-none mb-3 d-block">View Product</a>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#productModal">
                <i class="fas fa-edit me-1"></i>Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash me-1"></i>Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card product-card h-100">
          <div class="product-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Smart Fitness Watch</h5>
            <div class="mb-2">
              <span class="badge bg-light text-dark">Wearables</span>
              <span class="badge bg-light text-dark">Fitness</span>
            </div>
            <p class="card-text text-muted small flex-grow-1">Track your fitness goals with advanced health monitoring...</p>
            <a href="#" class="text-primary text-decoration-none mb-3 d-block">View Product</a>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#productModal">
                <i class="fas fa-edit me-1"></i>Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash me-1"></i>Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card product-card h-100">
          <div class="product-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Ergonomic Office Chair</h5>
            <div class="mb-2">
              <span class="badge bg-light text-dark">Furniture</span>
              <span class="badge bg-light text-dark">Office</span>
            </div>
            <p class="card-text text-muted small flex-grow-1">Comfortable office chair designed for long working hours</p>
            <a href="#" class="text-primary text-decoration-none mb-3 d-block">View Product</a>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#productModal">
                <i class="fas fa-edit me-1"></i>Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash me-1"></i>Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Product Modal - Edit Only -->
<div class="modal fade" id="productModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Product Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter product name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4" placeholder="Enter product description" required></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Link <span class="text-danger">*</span></label>
              <input type="url" class="form-control" placeholder="https://example.com" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Image Upload</label>
              <div class="upload-area border-2 border-dashed rounded-3 p-3 text-center" style="cursor: pointer; border-color: #e0e0e0;">
                <i class="fas fa-image text-muted mb-2 d-block"></i>
                <p class="mb-0 small">Upload Image</p>
                <input type="file" class="form-control d-none" accept="image/*">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Categories (Up to 4)</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Enter category" />
              <button class="btn btn-outline-primary" type="button">Add</button>
            </div>
            <div id="categories-list-modal"></div>
            <small class="text-muted d-block mt-2"><span id="category-count-modal">0</span>/4 categories added</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center pt-5">
        <h5 class="mb-3">Are you sure?</h5>
        <p class="text-muted mb-4">This action cannot be undone. This will permanently delete the product.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger px-4">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>
