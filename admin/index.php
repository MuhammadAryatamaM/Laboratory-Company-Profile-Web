<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:login.php");
  exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page_title = '';
?>

<?php include 'template/header.php'; ?>
<?php include 'template/navbar.php'; ?>

<div class="wrapper">
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
          $act = isset($_GET['act']) ? $_GET['act'] : 'index';
          switch ($act) {
            case 'create':
              include 'module/news/create.php';
              break;
            case 'edit':
              include 'module/news/edit.php';
              break;
            default:
              include 'module/news/index.php';
              break;
          }
          break;
        case 'product':
          $act = isset($_GET['act']) ? $_GET['act'] : 'index';
          switch ($act) {
            case 'create':
              include 'module/products/create.php';
              break;
            case 'edit':
              include 'module/products/edit.php';
              break;
            default:
              include 'module/products/index.php';
              break;
          }
          break;
        case 'teams':
          $act = isset($_GET['act']) ? $_GET['act'] : 'index';
          switch ($act) {
            case 'create':
              include 'module/teams/create.php';
              break;
            case 'edit':
              include 'module/teams/edit.php';
              break;
            default:
              include 'module/teams/index.php';
              break;
          }
          break;
        case 'gallery':
          $act = isset($_GET['act']) ? $_GET['act'] : 'index';
          switch ($act) {
            case 'create':
              include 'module/gallery/create.php';
              break;
            case 'edit':
              include 'module/gallery/edit.php';
              break;
            default:
              include 'module/gallery/index.php';
              break;
          }
          break;
        case 'message':
          $act = isset($_GET['act']) ? $_GET['act'] : 'index';
          switch ($act) {
            case 'reply':
              include 'module/message/reply.php';
              break;
            default:
              include 'module/message/index.php';
              break;
          }
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
