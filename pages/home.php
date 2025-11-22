<?php
    $root = "/Web_Profile_PBL/";
    $current_page = basename($_SERVER["SCRIPT_NAME"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InLET Laboratory</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400&family=Inter:wght@400;600&family=Markazi+Text:wght@600&display=swap" rel="stylesheet">

    <!-- CSS HALAMAN HOME -->
    <link rel="stylesheet" href="../assets/css/home.css">

    <!-- CSS FOOTER -->
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">
</head>
<body class="home-page">

<?php include '../helper/layouts/header.php'; ?>

<!-- ====================== HERO ======================= -->
<section class="hero-inlet">
    <img src="../assets/img/home/Hero1.png" class="hero-bg" alt="InLET">

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Information & Learning<br>Engineering Laboratory<br>(InLET)</h1>

        <p class="subtitle">
            Advancing Technology-Enhanced Learning<br>
            through Research, Innovation, and Collaboration.
        </p>

        <p class="desc">
            Sebagai bagian dari Jurusan Teknologi Informasi
            Politeknik Negeri Malang, Laboratorium InLET berfokus
            pada penelitian dan pengembangan sistem pembelajaran
            berbasis teknologi, kecerdasan buatan, serta analitik
            pembelajaran untuk meningkatkan kualitas pendidikan digital.
        </p>

        <a href="#about-section" class="more">
            Explore More <span class="arrow">→</span>
        </a>
    </div>
</section>

<!-- ====================== STATS ======================= -->
<section class="inlet-stats">
    <div class="stats-container">
        <div class="stat-box">
            <img src="../assets/img/home/icon/members.png" alt="Members Icon" class="stat-icon">
            <p class="stat-text"><span>11</span> active members</p>
        </div>

        <div class="stat-box">
            <img src="../assets/img/home/icon/article.png" alt="Article Icon" class="stat-icon">
            <p class="stat-text">&gt; 50 related articles</p>
        </div>

        <div class="stat-box">
            <img src="../assets/img/home/icon/prototype.png" alt="Prototype Icon" class="stat-icon">
            <p class="stat-text">5 prototypes</p>
        </div>

        <div class="stat-box">
            <img src="../assets/img/home/icon/student.png" alt="Students Icon" class="stat-icon">
            <p class="stat-text">&gt; 50 Students involved</p>
        </div>
    </div>
</section>

<!-- ====================== ABOUT ======================= -->
<section class="about-section" id="about-section">
    <div class="about-container">
        <div class="about-left">
            <h2 class="about-title">About Laboratory</h2>

            <p class="about-text">
                Laboratorium Teknologi Informasi dan Rekayasa Pembelajaran (InLET) merupakan bagian dari Departemen
                Teknologi Informasi, Politeknik Negeri Malang. Laboratorium ini berfokus pada penelitian dan
                pengembangan di bidang pembelajaran berbasis teknologi, kecerdasan buatan dalam pendidikan, dan
                analitik pembelajaran untuk meningkatkan kualitas pembelajaran digital dan inovasi dalam sistem
                pengajaran.
            </p>

            <p class="about-text">
                InLET berfungsi sebagai pusat kolaboratif bagi para peneliti, dosen, dan mahasiswa untuk mengeksplorasi
                lingkungan pembelajaran cerdas, melakukan penelitian interdisipliner, dan membina keunggulan akademik
                melalui solusi berbasis teknologi.
            </p>

            <ul class="about-list">
                <li>Research &amp; Development</li>
                <li>Academic Collaboration</li>
                <li>Innovation in Digital Education</li>
            </ul>

            <a href="#research-focus" class="about-btn">View Research Focus</a>
        </div>

        <div class="about-right">
            <img src="../assets/img/home/aboutIMG.png" alt="About Photo" class="about-img">
        </div>
    </div>
</section>

<!-- ==================== VISI & MISI ==================== -->
<section class="vm-section" id="visi-misi">
    <div class="vm-container">

        <div class="vm-card">
            <div class="vm-label">Visi</div>
            <div class="vm-content vm-content-visi">
                <p>
                    Menjadi laboratorium unggulan yang menghasilkan solusi
                    Sistem Informasi terapan untuk kebutuhan pendidikan,
                    bisnis, dan industri.
                </p>
            </div>
        </div>

        <div class="vm-card">
            <div class="vm-label">Misi</div>
            <div class="vm-content vm-content-misi">
                <ol>
                    <li>Mendukung praktikum &amp; pengembangan aplikasi SI (web, mobile, enterprise).</li>
                    <li>Melakukan riset terapan di basis data, proses bisnis, analitik data, dan integrasi SI.</li>
                    <li>Berkolaborasi dengan industri/lembaga untuk proyek SI dan layanan konsultasi.</li>
                    <li>Selaras dengan mandat pendidikan terapan Polinema &amp; kurikulum prodi TI.</li>
                </ol>
            </div>
        </div>

    </div>
</section>

<!-- ================= RESEARCH FOCUS ================= -->
<section id="research-focus" class="research-section">
    <div class="research-container">

        <!-- Heading -->
        <h2 class="research-title">Research Focus</h2>
        <div class="research-title-underline"></div>
        <p class="research-subtitle">
            Our research explores how technology, data, and 
            human-centered design shape the future of learning.
        </p>

        <!-- Cards -->
        <div class="research-grid">
            <!-- 1. AI & Learning Analytics -->
            <article class="research-card">
                <div class="research-card-text">
                    <h3 class="research-card-title">AI &amp; Learning Analytics</h3>
                    <p class="research-card-desc">
                        Analyzing learning patterns and performance using 
                        data-driven insights.
                    </p>
                </div>
                <div class="research-card-icon">
                    <img src="../assets/img/home/icon/AI.png" alt="AI &amp; Learning Analytics icon">
                </div>
            </article>

            <!-- 2. Intelligent Tutoring Systems -->
            <article class="research-card">
                <div class="research-card-text">
                    <h3 class="research-card-title">Intelligent Tutoring Systems</h3>
                    <p class="research-card-desc">
                        Developing adaptive and personalized learning technologies.
                    </p>
                </div>
                <div class="research-card-icon">
                    <img src="../assets/img/home/icon/inteligent.png" alt="Intelligent Tutoring Systems icon">
                </div>
            </article>

            <!-- 3. Human-Computer Interaction (HCI) -->
            <article class="research-card">
                <div class="research-card-text">
                    <h3 class="research-card-title">Human-Computer Interaction (HCI)</h3>
                    <p class="research-card-desc">
                        Designing interactive interfaces for effective learning experiences.
                    </p>
                </div>
                <div class="research-card-icon">
                    <img src="../assets/img/home/icon/human.png" alt="Human-Computer Interaction icon">
                </div>
            </article>

            <!-- 4. E-Learning Development -->
            <article class="research-card">
                <div class="research-card-text">
                    <h3 class="research-card-title">E-Learning Development</h3>
                    <p class="research-card-desc">
                        Building innovative digital learning platforms and simulations.
                    </p>
                </div>
                <div class="research-card-icon">
                    <img src="../assets/img/home/icon/E_learning.png" alt="E-Learning Development icon">
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ================= RESEARCH ROAD MAP ================= -->
<section class="inlet-roadmap" id="roadmap">
    <div class="inlet-roadmap-inner">

        <!-- LEFT: ROADMAP IMAGE -->
        <div class="roadmap-image-wrapper">
            <img 
                src="../assets/img/home/roadmap.png"
                alt="Road Map for Learning Engineering Technology Lab"
                class="roadmap-image"
            >
        </div>

        <!-- RIGHT: TEXT CONTENT -->
        <div class="roadmap-content">
            <h2 class="roadmap-title">Our Research Road Map</h2>
            <p class="roadmap-text">
                We are aiming to build a complete support system based on the learning behavior of students.
                Starting from the learning applications, learning analytics, multi-modal learning analytics,
                AI in education, adaptive support system, gamification, and management learning monitoring system.
            </p>
        </div>

    </div>
</section>

<!-- ====================== TEAM SECTION ======================= -->
<section id="team-section" class="team-section">
    <div class="team-container">

        <!-- Heading atas -->
        <div class="team-heading">
            <h2 class="team-title">Our Team</h2>
            <div class="team-line"></div>

            <a href="#" class="team-viewmore">View More →</a>
        </div>

        <!-- Layout: kiri Head, kanan Lab Team -->
        <div class="team-layout">
            <!-- KIRI: HEAD OF LABORATORY (statis, tidak scroll) -->
            <div class="team-head">
                <h3 class="team-subtitle team-subtitle-left">Head of Laboratory</h3>

                <div class="team-card head-card">
                    <div class="team-photo">
                        <img src="../assets/img/home/Teams/Banni.jpeg"
                             alt="Dr. Eng. Banni Satria Andoko">
                    </div>

                    <p class="team-name head-name">
                        Dr. Eng. Banni Satria Andoko,<br>
                        S.Kom., M.MSI.
                    </p>

<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                </div>
            </div>

            <!-- KANAN: LABORATORY TEAM (bisa scroll horizontal) -->
            <div class="team-lab">
                <h3 class="team-subtitle team-subtitle-center">Laboratory Team</h3>

                <div class="team-lab-scroll">
                    <div class="team-lab-track">
                        <!-- 1 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/vivin.jpeg"
                                     alt="Vivin Ayu Lestari">
                            </div>
                            <p class="team-name">
                                Vivin Ayu Lestari,<br>
                                S.Pd., M.Kom.
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                        <!-- 2 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/budi.png"
                                     alt="Budi Harijanto">
                            </div>
                            <p class="team-name">
                                Budi Harijanto, ST.,<br>
                                M.MKom.
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                        <!-- 3 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/irsyad.png"
                                     alt="Irsyad Arif Mashudi">
                            </div>
                            <p class="team-name">
                                Irsyad Arif Mashudi,<br>
                                S.Kom., M.Kom
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                        <!-- 4 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/indra.png"
                                     alt="Dr. Indra Dharma Wijaya">
                            </div>
                            <p class="team-name">
                                Dr. Indra Dharma Wijaya,<br>
                                ST., M.MT.
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                        <!-- 5 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/usman.png"
                                     alt="Usman Nurhasan">
                            </div>
                            <p class="team-name">
                                Usman Nurhasan,<br>
                                S.Kom., M.T.
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                        <!-- 6 -->
                        <div class="team-card">
                            <div class="team-photo">
                                <img src="../assets/img/home/Teams/agung.jpeg"
                                     alt="Agung Nugroho Pramudhita">
                            </div>
                            <p class="team-name">
                                Agung Nugroho<br>
                                Pramudhita,S.T., M.T.
                            </p>
<div class="team-social">
    <a href="#"><img src="../assets/img/home/icon/Twitter.png" alt="Twitter"></a>
    <a href="#"><img src="../assets/img/home/icon/Facebook.png" alt="Facebook"></a>
    <a href="#"><img src="../assets/img/home/icon/Instagram.png" alt="Instagram"></a>
</div>

                        </div>

                    </div><!-- .team-lab-track -->
                </div><!-- .team-lab-scroll -->
            </div><!-- .team-lab -->
        </div><!-- .team-layout -->

    </div>
</section>




<section class="products-section">
    <div class="products-container">

        <div class="products-heading">
            <h2 class="products-title">Products</h2>
            <div class="products-line"></div>
        </div>

        <!-- ROW 1 -->
        <div class="products-row">
            <!-- Card 1 -->
            <article class="product-card">
                <div class="product-thumb">
                    <img src="/WEB_PROFILE_PBL/assets/img/home/products/viat-map.png" alt="">
                </div>
                <div class="product-content">
                    <h3 class="product-name">Viat Map Application</h3>
                    <p class="product-desc">VIAT-map ...</p>
                    <a href="#" class="product-cta">
                        <span>Get it Now</span>
                        <span class="product-cta-arrow">→</span>
                    </a>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="product-card">
                <div class="product-thumb">
                    <img src="/WEB_PROFILE_PBL/assets/img/home/products/pseudolearn.png" alt="">
                </div>
                <div class="product-content">
                    <h3 class="product-name">PseudoLearn Application</h3>
                    <p class="product-desc">Sebuah media ...</p>
                    <a href="#" class="product-cta">
                        <span>Get it Now</span>
                        <span class="product-cta-arrow">→</span>
                    </a>
                </div>
            </article>
        </div>

        <!-- ROW 2 (jika 3 produk → center) -->
        <div class="products-row products-row-bottom center-one">
            <article class="product-card">
                <div class="product-thumb">
                    <img src="/WEB_PROFILE_PBL/assets/img/home/products/codeasy.png" alt="">
                </div>
                <div class="product-content">
                    <h3 class="product-name">Codeasy</h3>
                    <p class="product-desc">Codeasy adalah ...</p>
                    <a href="#" class="product-cta">
                        <span>Get it Now</span>
                        <span class="product-cta-arrow">→</span>
                    </a>
                </div>
            </article>
        </div>

        <div class="products-see-more-wrap">
            <a class="products-see-more" href="/WEB_PROFILE_PBL/pages/product.php">See More</a>
        </div>

    </div>
</section>




<section id="news-section" class="placeholder-section">
    <h2>Our News</h2>
</section>

<section id="gallery-section" class="placeholder-section">
    <h2>Gallery</h2>
</section>

<section id="partners-section" class="placeholder-section">
    <h2>Our Partner</h2>
</section>

<section id="contact-section" class="placeholder-section">
    <h2>Contact Us</h2>
</section>

<section id="guest-section" class="placeholder-section">
    <h2>Guest Book</h2>
</section>

<?php include '../helper/layouts/footer.php'; ?>

<script src="../assets/js/home.js"></script>

</body>
</html>
