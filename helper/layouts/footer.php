<?php
// fallback kalau $root belum didefinisikan di file pemanggil
if (!isset($root)) {
    $root = "/WEB_PROFILE_PBL/"; // sesuaikan dengan nama folder project di localhost
}
?>

<footer class="inlet-footer">
    <div class="inlet-footer-inner">

        <!-- LEFT: ABOUT -->
        <div class="footer-col footer-about">
            <h3 class="footer-title">About InLET</h3>

            <div class="footer-logo-wrapper">
                <img src="<?php echo $root; ?>assets/img/Logo.png"
                     alt="InLET Logo"
                     class="footer-logo">
            </div>

            <p class="footer-about-text">
                Laboratorium Information &amp; Learning
                Engineering (InLET)<br>
                Jurusan Teknologi Informasi<br>
                Politeknik Negeri Malang
            </p>
        </div>

        <!-- CENTER: QUICK LINKS (2 columns) -->
        <div class="footer-col footer-links">
            <h3 class="footer-title">Quick Links</h3>

            <div class="footer-links-grid">
                <ul>
                    <li><a href="<?php echo $root; ?>index.php#home">Home</a></li>
                    <li><a href="<?php echo $root; ?>index.php#about">About</a></li>
                    <li><a href="<?php echo $root; ?>index.php#research">Research</a></li>
                    <li><a href="<?php echo $root; ?>index.php#teams">Teams</a></li>
                    <li><a href="<?php echo $root; ?>index.php#products">Products</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo $root; ?>index.php#gallery">Gallery</a></li>
                    <li><a href="<?php echo $root; ?>index.php#news">News</a></li>
                    <li><a href="<?php echo $root; ?>index.php#contact">Contact</a></li>
                    <li><a href="<?php echo $root; ?>index.php#guestbook">Guest Book</a></li>
                </ul>
            </div>
        </div>

        <!-- RIGHT: CONTACT (2 columns) -->
        <div class="footer-col footer-contact">
            <h3 class="footer-title">Contact</h3>

            <div class="footer-contact-grid">

                <!-- left side: phone, email, yt -->
                <div class="contact-left">

                    <a class="contact-item" href="tel:08001234567">
                        <img src="<?php echo $root; ?>assets/img/icon_footer/phone.png"
                             class="contact-icon"
                             alt="Phone">
                        <span>0 (800) 123 45 67</span>
                    </a>

                    <a class="contact-item" href="mailto:inLET@polinema.ac.id">
                        <img src="<?php echo $root; ?>assets/img/icon_footer/email.png"
                             class="contact-icon"
                             alt="Email">
                        <span>inLET@polinema.ac.id</span>
                    </a>

                    <a class="contact-item" href="https://www.youtube.com" target="_blank">
                        <img src="<?php echo $root; ?>assets/img/icon_footer/youtube.png"
                             class="contact-icon"
                             alt="YouTube">
                        <span>InLet Laboratory</span>
                    </a>
                </div>

                <!-- right side: address -->
                <a class="contact-right contact-item contact-address"
                   href="https://maps.app.goo.gl/3xyCzmLf8e6jpYAi7"
                   target="_blank">
                    <img src="<?php echo $root; ?>assets/img/icon_footer/address.png"
                         class="contact-icon"
                         alt="Address">
                    <span>
                        Jl. Soekarno Hatta No.9,<br>
                        Mojolangu, Kec. Lowokwaru,<br>
                        Jawa Timur 65141
                    </span>
                </a>

            </div>
        </div>

    </div>

    <!-- DIVIDER -->
    <div class="footer-divider"></div>

    <!-- COPYRIGHT -->
    <p class="footer-copy">
        © 2025 InLET Laboratory, Politeknik Negeri Malang — All Rights Reserved.
    </p>
</footer>
