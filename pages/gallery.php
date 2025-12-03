<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/gallery.css">

    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Gallery</h2>
            <div class="gallery-grid">
                <?php
                
                $gallery = [
                    'assets/img/gallery1.png',
                    'assets/img/gallery2.png',
                    'assets/img/gallery3.png',
                    'assets/img/gallery4.png',
                    'assets/img/gallery5.png',
                    'assets/img/gallery6.png',
                    'assets/img/gallery7.png',
                    'assets/img/gallery8.png',
                    'assets/img/gallery9.png',
                    'assets/img/gallery10.png',
                    'assets/img/gallery11.png',
                    'assets/img/gallery12.png',
                    'assets/img/gallery13.png',
                    'assets/img/gallery14.png'
                ];

                foreach ($gallery as $image) {
                    echo '<div class="gallery-item">';
                    echo '<img src="' . $image . '" alt="Gallery Image" class="gallery-img">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">

</body>
</html>