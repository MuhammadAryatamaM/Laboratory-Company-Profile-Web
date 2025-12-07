<?php
$root = "/Web_Profile_PBL/";
$current_page = basename($_SERVER["SCRIPT_NAME"]);

if (!isset($pdo)) {
    $koneksi_path = __DIR__ . '/../config/koneksi.php';
    if (file_exists($koneksi_path)) {
        include_once $koneksi_path;
    }
}

// Fetch settings
$site_settings = [];
if (isset($pdo)) {
    try {
        $stmt = $pdo->query("SELECT * FROM settings");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $site_settings[$row['setting_key']] = $row['setting_value'];
        }
    } catch (PDOException $e) {
    }
}

// Defaults
$phone = $site_settings['phone'] ?? '0 (800) 123 45 67';
$email = $site_settings['email'] ?? 'inLET@polinema.ac.id';
$youtube = $site_settings['youtube'] ?? 'https://www.youtube.com';
$address = $site_settings['address'] ?? 'Jl. Soekarno Hatta No.9, Mojolangu, Kec. Lowokwaru, Jawa Timur 65141';

?>

<footer class="inlet-footer">
  <div class="inlet-footer-inner">

    <!-- LEFT: ABOUT -->
    <div class="footer-col footer-about">
      <h3 class="footer-title">About InLET</h3>

      <div class="footer-logo-wrapper">
        <img src="<?php echo $root; ?>assets/img/Logo.png" alt="InLET Logo" class="footer-logo">
      </div>

      <p class="footer-about-text">
        Laboratorium Information &amp; Learning
        Engineering (InLET)<br>
        Jurusan Teknologi Informasi<br>
        Politeknik Negeri Malang
      </p>
    </div>

    <div class="footer-col footer-links">
      <h3 class="footer-title">Quick Links</h3>

      <div class="footer-links-grid">
        <ul>
          <li><a href="<?php echo $root; ?>index.php#hero">Home</a></li>
          <li><a href="<?php echo $root; ?>index.php#about-section">About</a></li>
          <li><a href="<?php echo $root; ?>index.php#research-focus">Research</a></li>
          <li><a href="<?php echo $root; ?>index.php#team-section">Teams</a></li>
          <li><a href="<?php echo $root; ?>index.php#products">Products</a></li>
        </ul>
        <ul>
          <li><a href="<?php echo $root; ?>index.php#news-home">News</a></li>
          <li><a href="<?php echo $root; ?>index.php#gallery">Gallery</a></li>
          <li><a href="<?php echo $root; ?>index.php#contact-guest-section">Contact</a></li>
          <li><a href="<?php echo $root; ?>index.php#contact-guest-section">Guest Book</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-col footer-contact">
      <h3 class="footer-title">Contact</h3>
      <div class="footer-contact-grid">
        <div class="contact-left">

          <a class="contact-item" href="tel:<?php echo htmlspecialchars($phone); ?>">
            <img src="<?php echo $root; ?>assets/img/icon_footer/Phone.png" class="contact-icon" alt="Phone">
            <span><?php echo htmlspecialchars($phone); ?></span>
          </a>

          <a class="contact-item" href="mailto:<?php echo htmlspecialchars($email); ?>">
            <img src="<?php echo $root; ?>assets/img/icon_footer/Email.png" class="contact-icon" alt="Email">
            <span><?php echo htmlspecialchars($email); ?></span>
          </a>

          <a class="contact-item" href="<?php echo htmlspecialchars($youtube); ?>" target="_blank">
            <img src="<?php echo $root; ?>assets/img/icon_footer/YouTube.png" class="contact-icon" alt="YouTube">
            <span>InLet Laboratory</span>
          </a>
        </div>

        <a class="contact-right contact-item contact-address"
          href="https://maps.google.com/?q=<?php echo urlencode($address); ?>"
          target="_blank">
          <img src="<?php echo $root; ?>assets/img/icon_footer/Address.png" class="contact-icon" alt="Address">
          <span>
            <?php echo nl2br(htmlspecialchars($address)); ?>
          </span>
        </a>

      </div>
    </div>

  </div>
  <div class="footer-divider"></div>
  <p class="footer-copy">
    © 2025 InLET Laboratory, Politeknik Negeri Malang — All Rights Reserved.
  </p>
</footer>
