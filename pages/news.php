<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail - InLET Laboratory</title>
    <link rel="stylesheet" href="../assets/css/news.css">
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
                    <li><a href="teams.php" class="active">Teams</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Main Article -->
        <div class="main-article">
            <div class="article-image">
                ICCE 2023 Conference
            </div>
            <div class="article-content">
                <h1 class="article-title">ICCE 2023, Full Paper Presentation</h1>
                <div class="article-meta">
                    <span class="date">December 5, 2023</span>
                    <span class="location">Matsue, Japan</span>
                </div>
                <div class="article-text">
                    <p>Kegiatan pemaparan makalah di ICCE 2023 di Matsue, Jepang merupakan ajang ilmiah internasional yang mempertemukan peneliti, pengajar, dan mahasiswa untuk mempresentasikan hasil penelitian di bidang teknologi pendidikan. Peserta yang lolos seleksi menyampaikan temuan mereka di hadapan para ahli, disertai sesi tanya jawab untuk memperoleh masukan.</p>
                    <p>Melalui kegiatan ini, peneliti dapat memperkenalkan karya mereka secara global, membangun kolaborasi, dan meningkatkan kualitas penelitian di masa depan. Acara ini juga menjadi platform untuk bertukar ide dan pengalaman dalam penerapan teknologi dalam pendidikan.</p>
                    <p>Konferensi ini dihadiri oleh lebih dari 300 peserta dari 25 negara, dengan berbagai sesi paralel yang membahas topik-topik terkini seperti pembelajaran adaptif, analitik pembelajaran, dan teknologi untuk pendidikan inklusif.</p>
                </div>
            </div>
        </div>

        <!-- Recent News Sidebar -->
        <div class="recent-sidebar">
            <h2 class="sidebar-title">Recent</h2>
            <?php
            // Data berita recent dari array PHP
            $recent_news = array(
                array(
                    "title" => "Visiting Scientist Program",
                    "location" => "Japan",
                    "date" => "November 2023",
                    "thumbnail" => "VSP"
                ),
                array(
                    "title" => "Monthly Research Discussion",
                    "location" => "Pritemaa",
                    "date" => "Januari 2024",
                    "thumbnail" => "MRD"
                ),
                array(
                    "title" => "International Research Discussion Program",
                    "location" => "Japan",
                    "date" => "December 2023",
                    "thumbnail" => "IRDP"
                ),
                array(
                    "title" => "Workshop on Educational Technology",
                    "location" => "Malang",
                    "date" => "February 2024",
                    "thumbnail" => "WET"
                ),
                array(
                    "title" => "Collaboration Meeting with Industry Partners",
                    "location" => "Surabaya",
                    "date" => "March 2024",
                    "thumbnail" => "CMIP"
                )
            );

            // Loop untuk menampilkan berita
            foreach ($recent_news as $news) {
                echo '
                <div class="news-card">
                    <div class="news-thumbnail">' . $news["thumbnail"] . '</div>
                    <div class="news-content">
                        <h3 class="news-title">' . $news["title"] . '</h3>
                        <div class="news-meta">' . $news["location"] . ' | ' . $news["date"] . '</div>
                        <a href="#" class="view-more">View More →</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

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

    <script src="../js/news.js"></script>
</body>
</html>