<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Kepala Laboratorium') {
  echo "<script>alert('You do not have permission to access this page.'); window.location.href = 'index.php?page=teams';</script>";
  exit();
}
$page_title = 'Add Team Member';
?>
<main class="main-content">
  <div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
      <a href="?page=teams" class="btn btn-link text-dark p-0 me-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <div>
        <h1 class="mb-1">Add New Team Member</h1>
        <p class="text-muted">Fill in the details below</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Member Details</h5>

            <form method="POST" action="module/teams/aksi.php?module=teams&act=input" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="full-name" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="full-name" name="full_name" placeholder="Enter full name" required>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="nip" class="form-label">NIP (Employee ID) <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="EMP001" required>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone" name="phone_number" placeholder="+1 234 567 8900" required>
                </div>
              </div>

              <div class="mb-4">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@company.com" required>
              </div>

              <hr class="my-4">
              <h5 class="card-title mb-4">Login Credentials</h5>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
              </div>

              <hr class="my-4">


              <div class="mb-4">
                <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                <select class="form-control" id="position" name="position" required>
                  <option value="">Select Position</option>
                  <option value="Kepala Laboratorium">Kepala Laboratorium</option>
                  <option value="Anggota">Anggota</option>
                </select>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="facebook" class="form-label">Facebook URL</label>
                  <input type="url" class="form-control" id="facebook" name="facebook_url" placeholder="https://facebook.com/username">
                </div>
                <div class="col-md-6">
                  <label for="instagram" class="form-label">Instagram URL</label>
                  <input type="url" class="form-control" id="instagram" name="instagram_url" placeholder="https://instagram.com/username">
                </div>
              </div>

              <div class="mb-4">
                <label for="scholar" class="form-label">Google Scholar URL</label>
                <input type="url" class="form-control" id="scholar" name="google_scholar_url" placeholder="https://scholar.google.com/citations?user=username">
              </div>

              <div class="mb-4">
                <label class="form-label">Photo</label>
                <div class="upload-area-member border-2 border-dashed rounded-3 p-5 text-center" style="cursor: pointer; border-color: #e0e0e0;">
                  <i class="fas fa-cloud-upload-alt fs-1 text-muted mb-3 d-block"></i>
                  <p class="mb-2">Drag & drop photo or</p>
                  <button type="button" class="btn btn-sm btn-outline-primary">Upload Photo</button>
                  <input type="file" class="form-control d-none" id="member-photo" name="photo_url" accept="image/*">
                  <span id="file-name-display" class="text-muted mt-2 d-block"></span>
                </div>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <a href="?page=teams" class="btn btn-light border">Cancel</a>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-user-plus"></i> Add Member
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
  document.querySelector('.upload-area-member').addEventListener('click', function() {
    document.getElementById('member-photo').click();
  });

  document.getElementById('member-photo').addEventListener('change', function() {
    const fileName = this.files.length > 0 ? this.files[0].name : 'No file chosen';
    document.getElementById('file-name-display').textContent = 'Selected: ' + fileName;
  });
</script>
