<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InLET Laboratory - Gallery</title>
    <link rel="stylesheet" href="../assets/css/gallery.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">InLET Laboratory</a>
            <ul class="nav-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Research</a></li>
                <li><a href="#">Teams</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#" class="active">Gallery</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Gallery</h2>
            <div class="gallery-grid">
                <?php
                // Array gambar gallery
                $gallery = [
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
                foreach ($gallery as $image) {
                    echo '<div class="gallery-item">';
                    echo '<img src="' . $image . '" alt="Gallery Image" class="gallery-img">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-about">
                    <h3>About InLET</h3>
                    <p>InLET Laboratory is a leading research facility dedicated to innovation and technological advancement in various scientific fields.</p>
                </div>
                <div class="footer-section footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Teams</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section footer-contact">
                    <h3>Contact</h3>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <span>Portland, Nogot, Malang</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <span>info@inlet-lab.com</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <span>+62 123 456 789</span>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>InLET Laboratory, Portland, Nogot, Malang — All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>