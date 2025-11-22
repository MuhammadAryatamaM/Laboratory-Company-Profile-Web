<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail - InLET Laboratory</title>
    <link rel="stylesheet" href="../assets/css/news.css">
</head>
<body>
    <!-- Header -->
    <?php include '../layouts/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">

    <?php
// Data Berita Utama
$mainNews = [
    'title' => 'ICCE 2023, Full Paper Presentation',
    'image' => 'https://via.placeholder.com/200x150/4a5568/ffffff?text=ICCE+2023',
    'description' => 'Kegiatan pemaparan makalah di ICCE 2023 di Matsue, Jepang merupakan ajang ilmiah internasional yang mempertemukan peneliti, pengajar, dan mahasiswa untuk mempresentasikan hasil penelitian di bidang teknologi pendidikan. Peserta yang lolos seleksi menyampaikan temuan mereka di hadapan para ahli, disertai sesi tanya jawab untuk memperoleh masukan. Melalui kegiatan ini, peneliti dapat memperkenalkan karya mereka secara global, membangun kolaborasi, dan meningkatkan kualitas penelitian di masa depan.'
];

// Data Recent Items (untuk scroll)
$recentItems = [
    [
        'title' => 'Visiting Scientist Program',
        'image' => 'https://via.placeholder.com/60x45/6b5b7a/ffffff?text=VSP',
        'location' => 'Japan',
        'date' => 'November 2023'
    ],
    [
        'title' => 'Monthly Research Discussion',
        'image' => 'https://via.placeholder.com/60x45/7a6b8a/ffffff?text=MRD',
        'location' => 'Politeknik',
        'date' => 'Januari 2024'
    ],
    [
        'title' => 'International Research Discussion Program',
        'image' => 'https://via.placeholder.com/60x45/8a7b9a/ffffff?text=IRDP',
        'location' => 'Japan',
        'date' => 'Desember 2023'
    ],
    [
        'title' => 'Workshop AI in Education',
        'image' => 'https://via.placeholder.com/60x45/5a4b6a/ffffff?text=WAI',
        'location' => 'Jakarta',
        'date' => 'Februari 2024'
    ],
    [
        'title' => 'Seminar Machine Learning',
        'image' => 'https://via.placeholder.com/60x45/4a3b5a/ffffff?text=SML',
        'location' => 'Surabaya',
        'date' => 'Maret 2024'
    ],
    [
        'title' => 'Conference Data Science',
        'image' => 'https://via.placeholder.com/60x45/6a5b7a/ffffff?text=CDS',
        'location' => 'Bandung',
        'date' => 'April 2024'
    ]
];

// Fungsi untuk generate recent item
function generateRecentItem($item) {
    $html = '<a href="#" class="recent-view-more">View More →</a>';
    $html .= '<div class="recent-item">';
    $html .= '<img src="' . $item['image'] . '" alt="' . $item['title'] . '" class="recent-image">';
    $html .= '<div class="recent-info">';
    $html .= '<div class="recent-item-title">' . $item['title'] . '</div>';
    $html .= '<div class="recent-meta">' . $item['location'] . ' | ' . $item['date'] . '</div>';
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}

// Fungsi untuk generate semua recent items
function generateRecentItems($items) {
    $html = '';
    foreach ($items as $item) {
        $html .= generateRecentItem($item);
    }
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Section</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="news-section">
            <!-- Main Content - Left Side -->
            <div class="main-content">
                <img src="<?php echo $mainNews['image']; ?>" alt="<?php echo $mainNews['title']; ?>" class="main-image">
                <div class="main-text">
                    <h2 class="main-title"><?php echo $mainNews['title']; ?></h2>
                    <p class="main-description"><?php echo $mainNews['description']; ?></p>
                </div>
            </div>

            <!-- Sidebar - Right Side (Scrollable) -->
            <div class="sidebar">
                <div class="sidebar-header">
                    <span class="sidebar-title">Recent</span>
                </div>
                <div class="recent-items">
                    <?php echo generateRecentItems($recentItems); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    <?php include '../layouts/footer.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">
    
    <script src="../js/news.js"></script>
</body>
</html>
