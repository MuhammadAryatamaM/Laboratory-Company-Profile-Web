<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InLET Laboratory</title>
    <link rel="stylesheet" href="../assets/css/gallery.cs>
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
                    '../assets/img/gallery1.png',
                    '../assets/img/gallery2.png',
                    '../assets/img/gallery3.png',
                    '../assets/img/gallery4.png',
                    '../assets/img/gallery5.png',
                    '../assets/img/gallery6.png',
                    '../assets/img/gallery7.png',
                    '../assets/img/gallery8.png',
                    '../assets/img/gallery9.png',
                    '../assets/img/gallery10.png',
                    '../assets/img/gallery11.png',
                    '../assets/img/gallery12.png',
                    '../assets/img/gallery13.png',
                    '../assets/img/gallery14.png'
                ];

                // Loop untuk menampilkan setiap gambar
                foreach ($galleryImages as $image) {
                    echo '<div class="gallery-item">';
                    echo '<img src="' . $image . '" alt="Gallery Image">';
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