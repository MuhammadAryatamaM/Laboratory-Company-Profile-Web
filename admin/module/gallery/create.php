<?php
$page_title = 'Add Gallery Photo';
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=gallery" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Add New Photo</h1>
        <p class="text-muted">Upload a photo to the gallery</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Photo Details</h5>

            <form method="POST" action="module/gallery/aksi.php?module=gallery&act=input" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter photo title" required>
              </div>

              <!-- Description removed as it's not in gallery_item table -->

              <div class="mb-4">
                <label class="form-label">Photo <span class="text-danger">*</span></label>
                <div class="upload-area-gallery border-2 border-dashed rounded-3 p-5 text-center" style="cursor: pointer; border-color: #e0e0e0;">
                  <i class="fas fa-cloud-upload-alt fs-1 text-muted mb-3 d-block"></i>
                  <p class="mb-2">Drag & drop photo or</p>
                  <button type="button" class="btn btn-sm btn-outline-primary">Upload Photo</button>
                  <input type="file" class="form-control d-none" id="gallery-photo" name="image_url" accept="image/*" required>
                  <span id="file-name-display" class="text-muted mt-2 d-block"></span>
                </div>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=gallery" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Save Photo
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
  document.querySelector('.upload-area-gallery').addEventListener('click', function() {
    document.getElementById('gallery-photo').click();
  });

  document.getElementById('gallery-photo').addEventListener('change', function() {
    const fileName = this.files.length > 0 ? this.files[0].name : 'No file chosen';
    document.getElementById('file-name-display').textContent = 'Selected: ' + fileName;
  });
</script>
