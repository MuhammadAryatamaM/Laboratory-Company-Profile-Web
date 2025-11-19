<?php
    $root = "/WEB_PROFILE_PBL/";
    $current_page = basename($_SERVER["SCRIPT_NAME"]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light inlet-navbar">
            <div class="container-fluid px-4">
                <a class="navbar-brand d-flex align-items-center" href="<?php echo $root; ?>index.php">
                    <img src="<?php echo $root; ?>assets/img/Logo.png" class="inlet-logo" alt="InLET Logo">
                </a>

                <!-- Hamburger -->
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

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarInlet">
                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'home.php' || $current_page == 'index.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/home.php">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'teams.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/teams.php">
                                Teams
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/products.php">
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'news.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/news.php">
                                News
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'gallery.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/gallery.php">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>"href="<?php echo $root; ?>pages/contact.php">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>