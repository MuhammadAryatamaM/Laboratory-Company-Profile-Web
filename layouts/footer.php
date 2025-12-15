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
      <h3 class="footer-title">Tentang InLET</h3>

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
          <li><a href="<?php echo $root; ?>index.php#hero">Beranda</a></li>
          <li><a href="<?php echo $root; ?>index.php#about-section">Tentang</a></li>
          <li><a href="<?php echo $root; ?>index.php#research-focus">Riset</a></li>
          <li><a href="<?php echo $root; ?>index.php#team-section">Tim</a></li>
          <li><a href="<?php echo $root; ?>index.php#products">Produk</a></li>
        </ul>
        <ul>
          <li><a href="<?php echo $root; ?>index.php#news-home">Berita</a></li>
          <li><a href="<?php echo $root; ?>index.php#gallery">Galeri</a></li>
          <li><a class="contact-trigger" href="<?php echo $root; ?>index.php#contact-guest-section">Kontak</a></li>
          <li><a href="<?php echo $root; ?>index.php#contact-guest-section">Buku Tamu</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-col footer-contact">
      <h3 class="footer-title">Kontak</h3>
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
            <span>InLet Laboratorium</span>
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
    © 2025 InLET Laboratorium, Politeknik Negeri Malang — Hak Cipta Dilindungi.
</footer>

<!-- CONTACT -->
<div id="contactOverlay" class="contact-overlay">
    <div class="contact-dialog">
      <button type="button" class="contact-close" aria-label="Close contact form">
        &times;
      </button>

      <h2 class="contact-dialog-title">Hubungi Kami</h2>

      <form class="contact-modal-form" action="<?php echo $root; ?>module/contact_aksi.php" method="post">
        <input type="hidden" name="type" value="contact">
        
        <div class="contact-field">
          <label for="modal-fullname">Nama Lengkap</label>
          <input type="text" id="modal-fullname" name="full_name" required>
        </div>

        <div class="contact-field">
          <label for="modal-email">E-mail</label>
          <input type="email" id="modal-email" name="email" required>
        </div>

        <div class="contact-field">
          <label for="modal-message">Pesan</label>
          <textarea id="modal-message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="contact-submit-btn">
          Submit <span class="btn-icon">✈</span>
        </button>
      </form>
    </div>
</div>
