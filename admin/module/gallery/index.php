<?php $page_title = 'Gallery Management'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Gallery</h1>
        <p class="text-muted">Upload and manage your photos</p>
      </div>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Photos
      </button>
    </div>

    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Team Event 2024</h6>
          <p class="text-muted small mb-3">3/15/2024</p>
          <div class="d-flex gap-2">
            <!-- Changed delete button to trigger confirmation modal -->
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Conference Workshop</h6>
          <p class="text-muted small mb-3">3/10/2024</p>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Research Presentation</h6>
          <p class="text-muted small mb-3">3/5/2024</p>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Lab Equipment</h6>
          <p class="text-muted small mb-3">2/28/2024</p>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Team Meeting</h6>
          <p class="text-muted small mb-3">2/20/2024</p>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="gallery-card">
          <div class="gallery-image" style="background: #e5e7eb; border-radius: 8px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
            <i class="fas fa-image text-muted" style="font-size: 40px;"></i>
          </div>
          <h6 class="mb-2">Graduation Ceremony</h6>
          <p class="text-muted small mb-3">2/15/2024</p>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Photos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Album Title</label>
            <input type="text" class="form-control" placeholder="Enter album title">
          </div>
          <div class="mb-3">
            <label class="form-label">Upload Photos</label>
            <div class="upload-area border-2 border-dashed rounded p-4 text-center">
              <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 40px; color: #9ca3af;"></i>
              <p class="text-muted mb-2">Drag and drop your photos here</p>
              <input type="file" class="form-control" multiple accept="image/*">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Upload</button>
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
        <p class="text-muted mb-4">This action cannot be undone. This will permanently delete the photo.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger px-4">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>
