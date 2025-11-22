<?php
    $root = "/WEB_PROFILE_PBL/"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - InLET Laboratory</title>
    <link rel="stylesheet" href="../assets/css/produk.css">
</head>
<body>

    <?php include '../layouts/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">

    <?php
        // Data Produk - TAMBAHKAN FIELD 'image' DI SINI
        $products = [
            [
                'logo_type' => 'viat',
                'logo_text' => 'VIAT-map',
                'image' => '../assets/img/prodct1.png', 
                'title' => 'Viat Map Application',
                'description' => 'VIAT-map (Visual Arguments Toulmin) Application to help Reding Comprehension by using Toulmin Arguments Concept. We are trying to emphasise the logic behind a written text by adding the claim, ground and warrant following the Toulmin Argument Concept.',
                'features' => [
                    ['icon' => '📊', 'text' => 'Visual Argument Mapping'],
                    ['icon' => '🧠', 'text' => 'Toulmin Model Integration'],
                    ['icon' => '📖', 'text' => 'Reading Comprehension Support'],
                    ['icon' => '📈', 'text' => 'Data Visualization']
                ]
            ],
            [
                'logo_type' => 'pseudo',
                'logo_text' => 'PseudoLearn',
                'image' => '../assets/img/prodct2.png', 
                'title' => 'PseudoLearn Application',
                'description' => 'Sebuah media pembelajaran rekonstruksi algoritma pseudocode dengan menggunakan pendekatan Element Fill-in-Blank Problems di dalam pemrograman java.',
                'features' => [
                    ['icon' => '📋', 'text' => 'Algorithm Learning'],
                    ['icon' => '🔧', 'text' => 'Pseudocode Reconstruction'],
                    ['icon' => '☕', 'text' => 'Java Programming'],
                    ['icon' => '🎮', 'text' => 'Gamified Learning']
                ]
            ],
            [
                'logo_type' => 'codeasy',
                'logo_text' => 'Codeasy',
                'image' => '../assets/img/prodct3.png', 
                'title' => 'Codeasy',
                'description' => 'Codeasy adalah platform belajar Data Science berbasis Machine Learning yang membantu kamu menguasai Python dan Business Intelligence melalui sistem penilaian otomatis dan analisis kognitif cerdas berbasis Taksonomi Bloom',
                'features' => [
                    ['icon' => '⚙', 'text' => 'Machine Learning Based'],
                    ['icon' => '🐍', 'text' => 'Python Modules'],
                    ['icon' => '💼', 'text' => 'Business Intelligence'],
                    ['icon' => '📝', 'text' => 'Bloom Taxonomy Assessment']
                ]
            ]
        ];

        // Fungsi untuk generate logo - MODIFIKASI UNTUK MENGGUNAKAN GAMBAR
        function generateLogo($type, $text, $image = null) {
            $html = '<div class="product-logo">';
            
            // Jika ada gambar, tampilkan gambar
            if (!empty($image) && file_exists($image)) {
                $html .= '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($text) . '" class="product-image">';
            } else {
                // Jika tidak ada gambar, tampilkan logo default seperti sebelumnya
                if ($type === 'viat') {
                    $html .= '<div class="bracket-icon">[?]</div>';
                    $html .= '<div class="text">' . htmlspecialchars($text) . '</div>';
                } elseif ($type === 'pseudo') {
                    $html .= '<div style="font-size: 2rem;">⬛</div>';
                    $html .= '<div class="text">' . htmlspecialchars($text) . '</div>';
                } elseif ($type === 'codeasy') {
                    $html .= '<div class="codeasy-logo">';
                    $html .= '<div class="nav">Features | How it Works | Testimonials | Manual Book</div>';
                    $html .= '<div class="powered">Powered by Machine Learning</div>';
                    $html .= '<div class="title1">ence Learning Sy</div>';
                    $html .= '<div class="title2">iness Intelligence</div>';
                    $html .= '<div class="desc">Understanding of Python programming for Data Science<br>and automatic cognitive analysis based on Bloom\'s</div>';
                    $html .= '</div>';
                }
            }
            
            $html .= '</div>';
            return $html;
        }

        // Fungsi untuk generate features
        function generateFeatures($features) {
            $html = '<div class="product-features">';
            foreach ($features as $feature) {
                $html .= '<div class="feature-item">';
                $html .= '<span class="feature-icon">' . htmlspecialchars($feature['icon']) . '</span>';
                $html .= '<span>' . htmlspecialchars($feature['text']) . '</span>';
                $html .= '</div>';
            }
            $html .= '</div>';
            return $html;
        }

        // Fungsi untuk generate product card - TAMBAHKAN PARAMETER $image
        function generateProductCard($product) {
            $html = '<div class="product-card">';
            // Pass image ke fungsi generateLogo
            $image = isset($product['image']) ? $product['image'] : null;
            $html .= generateLogo($product['logo_type'], $product['logo_text'], $image);
            $html .= '<div class="product-content">';
            $html .= '<h2 class="product-title">' . htmlspecialchars($product['title']) . '</h2>';
            $html .= '<p class="product-description">' . htmlspecialchars($product['description']) . '</p>';
            $html .= '</div>';
            $html .= '<div class="product-right">';
            $html .= generateFeatures($product['features']);
            $html .= '<button class="try-now-btn">Try Now →</button>';
            $html .= '</div>';
            $html .= '</div>';
            return $html;
        }
    ?>

    <div class="container">
        <h1>Products</h1>
        
        <?php
        foreach ($products as $product) {
            echo generateProductCard($product);
        }
        ?>
    </div>

    <?php include '../layouts/footer.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">

</body>
</html>