<?php
$root = "/Web_Profile_PBL/";
$page = $_GET['page'] ?? 'home';

$valid_pages = ['home','gallery','news','news_detail','products','teams'];
if (!in_array($page, $valid_pages)) $page = 'home';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- CSS global -->
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">

    <!-- CSS per halaman -->
    <?php if ($page === 'home'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/home.css">

    <?php elseif ($page === 'gallery'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/gallery.css">

    <?php elseif ($page === 'news'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/news.css">

    <?php elseif ($page === 'news_detail'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/news_detail.css">

    <?php elseif ($page === 'products'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/produk.css">

    <?php elseif ($page === 'teams'): ?>
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/teams.css">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/global.css">
</head>
<body>
    <?php include __DIR__ . "/layouts/header.php"; ?>

    <main>
        <?php include __DIR__ . "/pages/$page.php"; ?>
    </main>

    <?php include __DIR__ . "/layouts/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
