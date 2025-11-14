<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page_title = '';
?>

<?php include 'template/header.php'; ?>
<?php include 'template/navbar.php'; ?>

<div class="wrapper d-flex">
  <!-- Sidebar -->
  <?php include 'template/sidebar.php'; ?>

  <!-- Main Content -->
  <div class="main-content flex-grow-1">
    <!-- Page Content -->
    <main class="page-content p-4">
      <?php
      switch ($page) {
        case 'dashboard':
          include 'module/dashboard/index.php';
          break;
        case 'news':
          include 'module/news/index.php';
          break;
        case 'news-add':
          include 'module/news/create.php';
          break;
        case 'product':
          include 'module/products/index.php';
          break;
        case 'product-add':
          include 'module/products/create.php';
          break;
        case 'teams':
          include 'module/teams/index.php';
          break;
        case 'teams-add':
          include 'module/teams/create.php';
          break;
        case 'gallery':
          include 'module/gallery/index.php';
          break;
        case 'message':
          include 'module/message/index.php';
          break;
        case 'settings':
          include 'module/settings/index.php';
          break;
        default:
          include 'module/dashboard/index.php';
      }
      ?>
    </main>
  </div>
</div>

<?php include 'template/footer.php'; ?>
