<?php $page_title = 'Team Management'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-2">Team Management</h1>
        <p class="text-muted">Manage your team members</p>
      </div>
      <a href="?page=teams-add" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Member
      </a>
    </div>

    <!-- Your Profile Section -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-3">
          <span class="badge bg-primary">Your Profile</span>
          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#teamModal">
            <i class="fas fa-edit me-1"></i>Edit My Profile
          </button>
        </div>
        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="avatar-lg mb-3">
              <div style="width: 100px; height: 100px; background: #bfdbfe; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <h4>Admin User</h4>
            <p class="text-muted mb-2">System Administrator</p>
            <p class="mb-1"><small><strong>NIP:</strong> ADM001</small></p>
            <p class="mb-1"><small><i class="fas fa-envelope"></i> admin@company.com</small></p>
            <p><small><i class="fas fa-phone"></i> +1 234 567 8900</small></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Members -->
    <h5 class="mb-3">Team Members</h5>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column">
            <div style="width: 80px; height: 80px; background: #bfdbfe; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 20px;">
              <i class="fas fa-user"></i>
            </div>
            <h5>John Anderson</h5>
            <p class="text-primary small mb-2">NIP: EMP001</p>
            <p class="text-muted mb-3"><small><i class="fas fa-envelope"></i> john.anderson@company.com</small></p>
            <p class="text-muted mb-3"><small><i class="fas fa-phone"></i> +1 234 567 8901</small></p>
            <div class="mb-3 flex-grow-1">
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-facebook"></i> Facebook</a><br>
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-instagram"></i> Instagram</a><br>
              <a href="#" class="text-primary text-decoration-none small"><i class="fas fa-graduation-cap"></i> Scholar</a>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#teamModal">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash"></i> Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column">
            <div style="width: 80px; height: 80px; background: #bfdbfe; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 20px;">
              <i class="fas fa-user"></i>
            </div>
            <h5>Sarah Mitchell</h5>
            <p class="text-primary small mb-2">NIP: EMP002</p>
            <p class="text-muted mb-3"><small><i class="fas fa-envelope"></i> sarah.mitchell@company.com</small></p>
            <p class="text-muted mb-3"><small><i class="fas fa-phone"></i> +1 234 567 8902</small></p>
            <div class="mb-3 flex-grow-1">
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-facebook"></i> Facebook</a><br>
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-instagram"></i> Instagram</a><br>
              <a href="#" class="text-primary text-decoration-none small"><i class="fas fa-graduation-cap"></i> Scholar</a>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#teamModal">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash"></i> Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column">
            <div style="width: 80px; height: 80px; background: #bfdbfe; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 20px;">
              <i class="fas fa-user"></i>
            </div>
            <h5>Michael Chen</h5>
            <p class="text-primary small mb-2">NIP: EMP003</p>
            <p class="text-muted mb-3"><small><i class="fas fa-envelope"></i> michael.chen@company.com</small></p>
            <p class="text-muted mb-3"><small><i class="fas fa-phone"></i> +1 234 567 8903</small></p>
            <div class="mb-3 flex-grow-1">
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-facebook"></i> Facebook</a><br>
              <a href="#" class="text-primary text-decoration-none small me-2"><i class="fab fa-instagram"></i> Instagram</a><br>
              <a href="#" class="text-primary text-decoration-none small"><i class="fas fa-graduation-cap"></i> Scholar</a>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#teamModal">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="fas fa-trash"></i> Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Team Modal - Edit Only -->
<div class="modal fade" id="teamModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Changed title to "Edit Team Member" since it's only for editing -->
        <h5 class="modal-title">Edit Team Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter full name" required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">NIP (Employee ID) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Enter NIP" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Phone Number <span class="text-danger">*</span></label>
              <input type="tel" class="form-control" placeholder="Enter phone number" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address <span class="text-danger">*</span></label>
            <input type="email" class="form-control" placeholder="Enter email address" required>
          </div>
          <!-- Added social media URLs: Facebook, Instagram, Google Scholar -->
          <div class="mb-3">
            <label class="form-label">Facebook URL</label>
            <input type="url" class="form-control" placeholder="https://facebook.com/username">
          </div>
          <div class="mb-3">
            <label class="form-label">Instagram URL</label>
            <input type="url" class="form-control" placeholder="https://instagram.com/username">
          </div>
          <div class="mb-3">
            <label class="form-label">Google Scholar URL</label>
            <input type="url" class="form-control" placeholder="https://scholar.google.com/citations?user=username">
          </div>
          <!-- Added photo upload field -->
          <div class="mb-3">
            <label class="form-label">Photo</label>
            <div class="upload-area border-2 border-dashed rounded-3 p-3 text-center" style="cursor: pointer; border-color: #d1d5db; background: #f9fafb;">
              <i class="fas fa-image text-muted mb-2 d-block" style="font-size: 24px;"></i>
              <p class="mb-0 small">Upload Photo</p>
              <small class="text-muted d-block mt-1 file-name-display" style="display: none;"></small>
              <input type="file" class="form-control d-none upload-photo-input" accept="image/*">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Member</button>
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
        <p class="text-muted mb-4">This action cannot be undone. This will permanently delete the team member.</p>
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
      const fileInput = this.querySelector('.upload-photo-input');
      if (fileInput) {
        fileInput.click();
      }
    });

    const fileInput = uploadArea.querySelector('.upload-photo-input');
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
