<?php
$root = "/Web_Profile_PBL/";
$page = $_GET['page'] ?? 'home';

$valid_pages = ['home','gallery','news','products','teams'];
if (!in_array($page, $valid_pages)) $page = 'home';
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">

        <?php if ($page === 'home'): ?>
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/home.css">
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/home_responsif.css">
        <?php elseif ($page === 'gallery'): ?>
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/gallery.css">
        <?php elseif ($page === 'news'): ?>
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/news.css">
        <?php elseif ($page === 'products'): ?>
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/produk.css">
        <?php elseif ($page === 'teams'): ?>
            <link rel="stylesheet" href="<?php echo $root; ?>assets/css/teams.css">
        <?php endif; ?>
    </head>
    <body>
        <?php include __DIR__ . "/layouts/header.php"; ?>

        <main>
            <?php include __DIR__ . "/pages/$page.php"; ?>
        </main>

        <?php include __DIR__ . "/layouts/footer.php"; ?>
    </body>
</html>