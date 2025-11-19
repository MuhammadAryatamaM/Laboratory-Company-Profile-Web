<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InLET Laboratory</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h2>InLET Lab</h2>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="teams.php">Teams</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="section">
        <div class="container">
            <div class="gallery-grid">
                <?php
                // Daftar gambar gallery
                $galleryImages = [
                    'gallery1.png',
                    'gallery1.png', 
                    'gallery3.png',
                    'gallery4.png',
                    'gallery5.png',
                    'gallery6.png',
                    'gallery7.png',
                    'gallery8.png',
                    'gallery9.png',
                    'gallery10.png',
                    'gallery11.png',
                    'gallery12.png',
                    'gallery13.png',
                    'gallery14.png'
                ];

                // Loop untuk menampilkan setiap gambar
                foreach ($galleryImages as $image) {
                    echo '<div class="gallery-item">';
                    echo '<img src="images/' . $image . '" alt="Gallery Image">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> InLET Laboratory - All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>