        <?php

        $page_title = 'Edit Gallery Photo';

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $item = null;

        if ($id > 0) {
          try {
            // Changed table to gallery_item and id to item_id
            $stmt = $pdo->prepare("SELECT * FROM gallery_item WHERE item_id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        }

        if (!$item) {
          echo "<script>alert('Gallery item not found.'); window.location='index.php?page=gallery';</script>";
          exit();
        }
        ?>
        <main class="main-content">
          <div class="container-fluid">
            <div class="d-flex align-items-center mb-4">
              <a href="?page=gallery" class="btn btn-link text-dark p-0 me-3">
                <i class="fas fa-arrow-left"></i>
              </a>
              <div>
                <h1 class="mb-1">Edit Photo</h1>
                <p class="text-muted">Update photo details</p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title mb-4">Photo Details</h5>

                    <form method="POST" action="module/gallery/aksi.php?module=gallery&act=update" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $item['item_id']; ?>">

                      <div class="mb-4">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter photo title" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                      </div>

                      <div class="mb-4">
                        <label class="form-label">Photo</label>
                        <div class="upload-area-gallery border-2 border-dashed rounded-3 p-5 text-center" style="cursor: pointer; border-color: #e0e0e0;">
                          <i class="fas fa-cloud-upload-alt fs-1 text-muted mb-3 d-block"></i>
                          <p class="mb-2">Drag & drop to replace photo or</p>
                          <button type="button" class="btn btn-sm btn-outline-primary">Upload New Photo</button>
                          <input type="file" class="form-control d-none" id="gallery-photo" name="image_url" accept="image/*">
                          <span id="file-name-display" class="text-muted mt-2 d-block"></span>
                          <?php if ($item['image_url']) : ?>
                            <p class="mt-2">Current photo: <a href="../assets/uploads/<?php echo $item['image_url']; ?>" target="_blank"><?php echo $item['image_url']; ?></a></p>
                            <img src="../assets/uploads/<?php echo $item['image_url']; ?>" alt="Current Photo" style="max-height: 100px; margin-top: 10px;">
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="d-grid gap-2 d-sm-flex">
                        <a href="?page=gallery" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                          <i class="fas fa-save"></i> Update Photo
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
