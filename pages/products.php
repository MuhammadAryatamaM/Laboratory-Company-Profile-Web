<?php
    include_once __DIR__ . '/../config/koneksi.php';

    try {
        $stmt = $pdo->query("SELECT * FROM product ORDER BY created_at DESC");
        $db_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $db_products = [];
    }

    $products = [];
    foreach ($db_products as $item) {
        // Parse PostgreSQL array format {"item1","item2"}
        $features = [];
        if (!empty($item['categories'])) {
            $cat_str = trim($item['categories'], '{}');
            if (!empty($cat_str)) {
                $cat_array = str_getcsv($cat_str);
                foreach ($cat_array as $cat) {
                    $features[] = ['text' => trim($cat)];
                }
            }
        }

        $products[] = [
            'logo_type' => 'custom', 
            'logo_text' => $item['product_name'],
            'image' => !empty($item['image_url']) ? 'assets/uploads/' . $item['image_url'] : null,
            'title' => $item['product_name'],
            'description' => $item['description'],
            'features' => $features,
            'link_url' => $item['link_url']
        ];
    }

    function generateLogo($type, $text, $image = null) {
        $html = '<div class="product-logo">';
        
        if (!empty($image) && file_exists(__DIR__ . '/../' . $image)) {
            $html .= '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($text) . '" class="product-image">';
        } else {
            // Fallback if no image or file not found
            $html .= '<div class="bracket-icon">?</div>';
            $html .= '<div class="text">' . htmlspecialchars($text) . '</div>';
        }
        
        $html .= '</div>';
        return $html;
    }
    
    function generateFeatures($features) {
        $html = '<div class="product-features">';
        foreach ($features as $feature) {
            $html .= '<div class="feature-item">';
            $html .= '<span>' . htmlspecialchars($feature['text']) . '</span>';
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }

    function generateProductCard($product) {
        $html = '<div class="product-card">';
        $image = isset($product['image']) ? $product['image'] : null;
        $html .= generateLogo($product['logo_type'], $product['logo_text'], $image);
        $html .= '<div class="product-content">';
        $html .= '<h2 class="product-title">' . htmlspecialchars($product['title']) . '</h2>';
        $html .= '<p class="product-description">' . htmlspecialchars($product['description']) . '</p>';
        $html .= '</div>';
        $html .= '<div class="product-right">';
        $html .= generateFeatures($product['features']);
        
        if (!empty($product['link_url'])) {
            $html .= '<a href="' . htmlspecialchars($product['link_url']) . '" class="try-now-btn" target="_blank" style="text-decoration:none; display:inline-block;">Try Now →</a>';
        } else {
            $html .= '<button class="try-now-btn">Try Now →</button>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
?>

<div class="container">
    <h1>Products</h1>
    
    <?php
    if (empty($products)) {
        echo '<p class="text-center">Belum ada produk yang tersedia.</p>';
    } else {
        foreach ($products as $product) {
            echo generateProductCard($product);
        }
    }
    ?>
</div>