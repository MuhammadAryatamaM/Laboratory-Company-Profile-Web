<?php $page_title = 'News Management'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">News Management</h1>
        <p class="text-muted">Create and manage news articles</p>
      </div>
      <a href="?page=news-add" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New News
      </a>
    </div>

    <div class="row">
      <div class="col-md-4 mb-4">
        <!-- Added hover transition effects to news cards -->
        <div class="card news-card h-100">
          <div class="news-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">New Product Launch Announcement</h5>
            <p class="card-text flex-grow-1">We are excited to announce the launch of our latest product line featuring innovative solutions...</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <small class="text-muted"><i class="fas fa-calendar me-1"></i>11/5/2025 • John Doe</small>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#newsModal">
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
        <div class="card news-card h-100">
          <div class="news-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Company Reaches 10,000 Customer Milestone</h5>
            <p class="card-text flex-grow-1">A major achievement as we celebrate serving our 10,000th customer this month...</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <small class="text-muted"><i class="fas fa-calendar me-1"></i>11/1/2025 • Jane Smith</small>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#newsModal">
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
        <div class="card news-card h-100">
          <div class="news-image"></div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Partnership with Global Tech Leader</h5>
            <p class="card-text flex-grow-1">Strategic partnership announced to expand our reach in international markets...</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <small class="text-muted"><i class="fas fa-calendar me-1"></i>10/28/2025 • Mike Johnson</small>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#newsModal">
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

<!-- News Modal - Edit Only -->
<div class="modal fade" id="newsModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Changed title to "Edit News" since it's only for editing -->
        <h5 class="modal-title">Edit News</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter news title" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="5" placeholder="Enter news content" required></textarea>
          </div>
          <!-- Added image upload field for editing -->
          <div class="mb-3">
            <label class="form-label">Image</label>
            <div class="upload-area border-2 border-dashed rounded-3 p-3 text-center" style="cursor: pointer; border-color: #d1d5db; background: #f9fafb;">
              <i class="fas fa-image text-muted mb-2 d-block" style="font-size: 24px;"></i>
              <p class="mb-0 small">Upload Image</p>
              <small class="text-muted d-block mt-1 file-name-display" style="display: none;"></small>
              <input type="file" class="form-control d-none upload-image-input" accept="image/*">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Author <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Enter author name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Date <span class="text-danger">*</span></label>
              <input type="date" class="form-control" required>
            </div>
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
        <p class="text-muted mb-4">This action cannot be undone. This will permanently delete the news article.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger px-4">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.upload-area').forEach(uploadArea => {
    uploadArea.addEventListener('click', function() {
      const fileInput = this.querySelector('.upload-image-input');
      if (fileInput) {
        fileInput.click();
      }
    });

    const fileInput = uploadArea.querySelector('.upload-image-input');
    if (fileInput) {
      fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
          const fileName = this.files[0].name;
          const fileNameDisplay = uploadArea.querySelector('.file-name-display');
          fileNameDisplay.textContent = 'Selected: ' + fileName;
          fileNameDisplay.style.display = 'block';
        }
      });
    }
  });
</script>
