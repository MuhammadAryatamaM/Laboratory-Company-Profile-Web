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
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'teams') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=teams">
                        Teams
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'products') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=products">
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'news') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=news">
                        News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'gallery') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=gallery">
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page === 'contact') ? 'active' : ''; ?>"
                        href="<?php echo $root; ?>index.php?page=contact">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
