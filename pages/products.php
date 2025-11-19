<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - InLET Laboratory</title>
    <link rel="stylesheet" href="../assets/css/produk.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <div class="logo-icon">IL</div>
                <div class="logo-text">
                    <h1>INFORMATION AND LEARNING</h1>
                    <p>Engineering Technology</p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="research.php">Research</a></li>
                    <li><a href="teams.php">Teams</a></li>
                    <li><a href="products.php" class="active">Products</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Products</h1>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <?php
        // Data produk bisa disimpan dalam array untuk kemudahan pengelolaan
        $products = array(
            array(
                'id' => 1,
                'name' => 'Viat Map Application',
                'image' => '../assets/img/prodct1.png',
                'description' => 'VIAT-map (Visual Arguments Toulmin) Application to help Reading Comprehension by using Toulmin Arguments Concept. We are trying to emphasise the logic behind a written text by adding the claim, ground and warrant following the Toulmin Argument Concept.',
                'features' => array(
                    array('icon' => '📊', 'text' => 'Visual Argument Mapping'),
                    array('icon' => '⚖', 'text' => 'Toulmin Model Integration'),
                    array('icon' => '📖', 'text' => 'Reading Comprehension Support'),
                    array('icon' => '💡', 'text' => 'Data Visualization')
                ),
                'has_button' => true
            ),
            array(
                'id' => 2,
                'name' => 'PseudoLearn Application',
                'image' => '../assets/img/prodct2.png',
                'description' => 'Sebuah media pembelajaran rekonstruksi algoritma pseudocode dengan menggunakan pendekatan Element Fill-in-Blank Problems di dalam pemrograman java.',
                'features' => array(
                    array('icon' => '🧠', 'text' => 'Algorithm Learning'),
                    array('icon' => '🔄', 'text' => 'Pseudocode Reconstruction'),
                    array('icon' => '💻', 'text' => 'Java Programming'),
                    array('icon' => '🎮', 'text' => 'Gamified Learning')
                ),
                'has_button' => true
            ),
            array(
                'id' => 3,
                'name' => 'Codeasy',
                'image' => '../assets/img/prodct3.png',
                'description' => 'Codeasy adalah platform belajar Data Science berbasis Machine Learning yang membantu kamu menguasai Python dan Business Intelligence melalui sistem penilaian otomatis dan analisis kognitif cerdas berbasis Taksonomi Bloom',
                'features' => array(
                    array('icon' => '🤖', 'text' => 'Machine Learning Based'),
                    array('icon' => '🐍', 'text' => 'Python Modules'),
                    array('icon' => '📈', 'text' => 'Business Intelligence'),
                    array('icon' => '✅', 'text' => 'Bloom Taxonomy Assessment')
                ),
                'has_button' => false
            )
        );

        // Loop untuk menampilkan setiap produk
        foreach ($products as $product) {
            echo '<div class="product-item">';
            echo '    <div class="product-content">';
            echo '        <div class="product-image">';
            echo '            <img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
            echo '        </div>';
            echo '        <div class="product-details">';
            echo '            <div class="product-info">';
            echo '                <h2>' . $product['name'] . '</h2>';
            echo '                <p>' . $product['description'] . '</p>';
            echo '            </div>';
            echo '            <div class="product-features">';
            
            // Loop untuk menampilkan fitur produk
            foreach ($product['features'] as $feature) {
                echo '                <div class="feature-item">';
                echo '                    <div class="feature-icon">' . $feature['icon'] . '</div>';
                echo '                    <div class="feature-text">' . $feature['text'] . '</div>';
                echo '                </div>';
            }
            
            // Tombol Try Now hanya untuk produk tertentu
            if ($product['has_button']) {
                echo '                <a href="#" class="btn-try">Try Now</a>';
            }
            
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <div class="footer-logo">
                    <div class="footer-logo-icon">IL</div>
                    <div class="footer-logo-text">
                        <h3>INFORMATION AND LEARNING</h3>
                        <p>Engineering Technology</p>
                    </div>
                </div>
                <p>Laboratorium Information & Learning Engineering (InLET)<br>
                Jurusan Teknologi Informasi<br>
                Politeknik Negeri Malang</p>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="research.php">Research</a></li>
                    <li><a href="teams.php">Teams</a></li>
                    <li><a href="products.php">Products</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Resources</h4>
                <ul>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="guestbook.php">Guest Book</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contact</h4>
                <div class="contact-item">
                    <span class="contact-icon">📞</span>
                    <span>0 (800) 123 45 67</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">✉</span>
                    <span>inLET@polinema.ac.id</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">📍</span>
                    <span>Jl. Soekarno Hatta No.9, Mojolangu, Kec. Lowokwaru, Jawa Timur 65141</span>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© <?php echo date("Y"); ?> InLET Laboratory, Politeknik Negeri Malang — All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>