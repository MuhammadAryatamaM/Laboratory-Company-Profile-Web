<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Teams - InLET Laboratory</title>
    <link rel="stylesheet" href="style.css">
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

    <!-- Hero Banner -->
    <section class="hero-banner">
        <img src="images/gallery14.png" alt="InLET Laboratory Team">
    </section>

    <!-- Main Content -->
    <main class="teams-container">
        <!-- Page Title -->
        <h1 class="page-title">Our Teams</h1>

        <?php
        // Data Kepala Laboratorium
        $head_of_lab = array(
            'name' => 'Dr. Eng. Banni Satria Andoko, S.Kom.',
            'photo' => 'images/Banni.jpeg',
            'nip' => '198108062201021002',
            'email' => '-',
            'phone' => '081350889181'
        );

        // Data Tim Laboratorium
        $team_members = array(
            array(
                'name' => 'Vivin Ayu Lestari, S.Pd., M.Kom.',
                'photo' => 'images/vivin.jpeg',
                'nip' => '199106212019032020',
                'email' => 'vivin@polinema.ac.id',
                'phone' => '082143984396'
            ),
            array(
                'name' => 'Agung Nugroho Pramudhita, S.T., M.T.',
                'photo' => 'images/agung.jpeg',
                'nip' => '198108092010121002',
                'email' => 'agung.pramudhita@polinema.ac.id',
                'phone' => '081334699967'
            ),
            array(
                'name' => 'Budi Harijanto, ST., M.MKom.',
                'photo' => 'images/budi.png',
                'nip' => '196201051990031002',
                'email' => 'budi.hijet@gmail.com',
                'phone' => '-'
            ),
            array(
                'name' => 'Irsyad Arif Mashudi, S.Kom., M.Kom',
                'photo' => 'images/irsyad.png',
                'nip' => '198902012019031009',
                'email' => 'irsyad.arif@polinema.ac.id',
                'phone' => '-'
            ),
            array(
                'name' => 'Dr. Indra Dharma Wijaya, ST., M.MT.',
                'photo' => 'images/indra.png',
                'nip' => '197305102008011010',
                'email' => 'indra.dharma@polinema.ac.id',
                'phone' => '-'
            ),
            array(
                'name' => 'Usman Nurhasan, S.Kom., MT.',
                'photo' => 'images/usman.png',
                'nip' => '198609232015041001',
                'email' => 'usmannurhasan@polinema.ac.id',
                'phone' => '-'
            )
        );
        ?>

        <!-- Head of Laboratory Section -->
        <section class="head-section">
            <h2 class="section-title">Head of Laboratory</h2>
            <div class="profile-card head-card">
                <div class="profile-photo">
                    <img src="<?php echo $head_of_lab['photo']; ?>" alt="<?php echo $head_of_lab['name']; ?>">
                </div>
                <div class="profile-info">
                    <div class="info-item">
                        <span class="info-label">Nama</span>
                        <span class="info-value"><?php echo $head_of_lab['name']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">NIP</span>
                        <span class="info-value"><?php echo $head_of_lab['nip']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo $head_of_lab['email']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">No. HP</span>
                        <span class="info-value"><?php echo $head_of_lab['phone']; ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Laboratory Team Section -->
        <section class="team-section">
            <h2 class="section-title">Laboratory Team</h2>
            <div class="team-grid">
                <?php
                // Loop untuk menampilkan setiap anggota tim
                foreach ($team_members as $member) {
                    echo '<div class="profile-card">';
                    echo '    <div class="profile-photo">';
                    echo '        <img src="' . $member['photo'] . '" alt="' . $member['name'] . '">';
                    echo '    </div>';
                    echo '    <div class="profile-info">';
                    echo '        <div class="info-item">';
                    echo '            <span class="info-label">Nama</span>';
                    echo '            <span class="info-value">' . $member['name'] . '</span>';
                    echo '        </div>';
                    echo '        <div class="info-item">';
                    echo '            <span class="info-label">NIP</span>';
                    echo '            <span class="info-value">' . $member['nip'] . '</span>';
                    echo '        </div>';
                    echo '        <div class="info-item">';
                    echo '            <span class="info-label">Email</span>';
                    echo '            <span class="info-value">' . $member['email'] . '</span>';
                    echo '        </div>';
                    echo '        <div class="info-item">';
                    echo '            <span class="info-label">No. HP</span>';
                    echo '            <span class="info-value">' . $member['phone'] . '</span>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>

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