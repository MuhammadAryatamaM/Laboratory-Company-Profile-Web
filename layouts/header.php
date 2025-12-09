<nav class="navbar navbar-expand-lg navbar-light inlet-navbar">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $root; ?>index.php?page=home">
            <img src="<?php echo $root; ?>assets/img/Logo.png" class="inlet-logo" alt="InLET Logo">
        </a>

        <button class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarInlet"
                aria-controls="navbarInlet"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="toggler-bar"></span>
            <span class="toggler-bar"></span>
            <span class="toggler-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarInlet">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'home') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=home">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'teams') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=teams">
                        Tim
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'products') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=products">
                        Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'news' || $page === 'news_detail') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=news">
                        Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'gallery') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=gallery">
                        Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link contact-trigger" href="#">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
