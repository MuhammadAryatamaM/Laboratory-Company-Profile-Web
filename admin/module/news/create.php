<?php $page_title = 'Create News'; ?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=news" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Create New News</h1>
        <p class="text-muted">Fill in the details below</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">News Details</h5>

            <form method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title" required>
              </div>

              <div class="mb-4">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter news description" required></textarea>
              </div>

              <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <div class="upload-area border-2 border-dashed rounded-3 p-5 text-center" style="cursor: pointer; border-color: #e0e0e0; transition: all 0.3s;">
                  <i class="fas fa-cloud-upload-alt fs-1 text-muted mb-3 d-block"></i>
                  <p class="mb-2">Drag & drop your image here or</p>
                  <button type="button" class="btn btn-sm btn-outline-primary">Upload Image</button>
                  <input type="file" class="form-control d-none" id="image" name="image" accept="image/*">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4">
                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4">
                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" required>
                  </div>
                </div>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=news" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Create News
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
  document.querySelector('.upload-area').addEventListener('click', function() {
    document.getElementById('image').click();
  });

  document.getElementById('image').addEventListener('change', function(e) {
    if (e.target.files[0]) {
      alert('Image selected: ' + e.target.files[0].name);
    }
  });
</script>
