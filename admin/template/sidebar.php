<aside class="sidebar bg-light border-end">
  <div class="sidebar-nav p-3">

    <a href="index.php?page=dashboard" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'dashboard' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-th-large fa-fw"></i>
      <span>Dashboard</span>
    </a>

    <a href="index.php?page=news" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'news' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-newspaper fa-fw"></i>
      <span>News</span>
    </a>

    <a href="index.php?page=product" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'product' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-box fa-fw"></i>
      <span>Product</span>
    </a>

    <a href="index.php?page=teams" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'teams' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-users fa-fw"></i>
      <span>Teams</span>
    </a>

    <a href="index.php?page=gallery" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'gallery' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-images fa-fw"></i>
      <span>Gallery</span>
    </a>

    <a href="index.php?page=message" class="nav-item d-flex align-items-center gap-3 px-4 py-3 rounded mb-2 text-decoration-none <?php echo $page == 'message' ? 'bg-primary text-white' : 'text-dark'; ?>">
      <i class="fas fa-envelope fa-fw"></i>
      <span>Message</span>
    </a>

  </div>
</aside>
