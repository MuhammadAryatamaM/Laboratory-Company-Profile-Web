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
    'image' => '../assets/img/news/gallery7.png',
    'description' => 'Kegiatan pemaparan makalah di ICCE 2023 di Matsue, Jepang merupakan ajang ilmiah internasional yang mempertemukan peneliti, pengajar, dan mahasiswa untuk mempresentasikan hasil penelitian di bidang teknologi pendidikan. Peserta yang lolos seleksi menyampaikan temuan mereka di hadapan para ahli, disertai sesi tanya jawab untuk memperoleh masukan. Melalui kegiatan ini, peneliti dapat memperkenalkan karya mereka secara global, membangun kolaborasi, dan meningkatkan kualitas penelitian di masa depan.'
];

// Data Recent Items (untuk scroll)
$recentItems = [
    [
        'title' => 'Visiting Scientist Program',
        'image' => '../assets/img/news/gallery8.png',
        'location' => 'Japan',
        'date' => 'November 2023'
    ],
    [
        'title' => 'Monthly Research Discussion',
        'image' => '../assets/img/news/gallery9.png',
        'location' => 'Polinema',
        'date' => 'Januari 2024'
    ],
    [
        'title' => 'International Research Discussion Program',
        'image' => '../assets/img/news/gallery10.png',
        'location' => 'Japan',
        'date' => 'Desember 2023'
    ],
    [
        'title' => 'ICCE 2023, Full Paper Presentation',
        'image' => '../assets/img/news/gallery6.png',
        'location' => 'Japan',
        'date' => 'November 2023'
    ],
    [
        'title' => 'Best Overall Paper Award',
        'image' => '../assets/img/news/gallery5.png',
        'location' => 'Jaoan',
        'date' => 'November 2023'
    ],
    [
        'title' => 'POLINEMA Research EXPO 2024',
        'image' => '../assets/img/news/gallery4.png',
        'location' => 'Polinema',
        'date' => 'November 2023'
    ],
    [
        'title' => 'ICAST 2024 Bandung',
        'image' => '../assets/img/news/gallery3.png',
        'location' => 'Indonesia',
        'date' => 'November 2023'
    ],
    [
        'title' => 'ICCE 2024 Atteneo University',
        'image' => '../assets/img/news/gallery2.png',
        'location' => 'Phillipines',
        'date' => 'November 2023'
    ],
    [
        'title' => 'ECTEL 2024 Krems',
        'image' => '../assets/img/news/gallery1.png',
        'location' => 'Austria',
        'date' => 'November 2023'
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
