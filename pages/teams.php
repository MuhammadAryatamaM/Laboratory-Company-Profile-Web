<?php
include "../config/koneksi.php"; // Include your database connection

$page_title = 'Our Teams - InLET Laboratory';

$head_of_lab = null;
$team_members = [];

try {
    // Fetch the head of the lab
    $stmt_head = $pdo->prepare("SELECT * FROM team_member WHERE position = 'Kepala Laboratorium' LIMIT 1");
    $stmt_head->execute();
    $head_of_lab = $stmt_head->fetch(PDO::FETCH_ASSOC);

    // Fetch other team members
    $stmt_members = $pdo->prepare("SELECT * FROM team_member WHERE position != 'Kepala Laboratorium' ORDER BY full_name");
    $stmt_members->execute();
    $team_members = $stmt_members->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    // You might want to handle this more gracefully in a production environment
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../assets/css/teams.css">
</head>
<body>
        <!-- Header -->
    <?php include '../layouts/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/header.css">

    <!-- Hero Banner -->
    <section class="hero-banner">
        <img src="../assets/img/gallery14.png" alt="InLET Laboratory Team">
    </section>

    <!-- Main Content -->
    <main class="teams-container">
        <!-- Page Title -->
        <h1 class="page-title">Our Teams</h1>

        <?php if ($head_of_lab) : ?>
        <!-- Head of Laboratory Section -->
        <section class="head-section">
            <h2 class="section-title">Head of Laboratory</h2>
            <div class="profile-card head-card">
                <div class="profile-photo">
                    <img src="../assets/uploads/<?php echo $head_of_lab['photo_url']; ?>" alt="<?php echo $head_of_lab['full_name']; ?>">
                </div>
                <div class="profile-info">
                    <div class="info-item">
                        <span class="info-label">Nama</span>
                        <span class="info-value"><?php echo htmlspecialchars($head_of_lab['full_name']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Posisi</span>
                        <span class="info-value"><?php echo htmlspecialchars($head_of_lab['position']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">NIP</span>
                        <span class="info-value"><?php echo htmlspecialchars($head_of_lab['nip']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo htmlspecialchars($head_of_lab['email']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">No. HP</span>
                        <span class="info-value"><?php echo htmlspecialchars($head_of_lab['phone_number']); ?></span>
                    </div>
                    <div class="info-item social-links">
                        <?php if ($head_of_lab['facebook_url']) : ?><a href="<?php echo htmlspecialchars($head_of_lab['facebook_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                        <?php if ($head_of_lab['instagram_url']) : ?><a href="<?php echo htmlspecialchars($head_of_lab['instagram_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a><?php endif; ?>
                        <?php if ($head_of_lab['google_scholar_url']) : ?><a href="<?php echo htmlspecialchars($head_of_lab['google_scholar_url']); ?>" target="_blank" class="social-icon"><i class="fas fa-graduation-cap"></i></a><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Laboratory Team Section -->
        <section class="team-section">
            <h2 class="section-title">Laboratory Team</h2>
            <div class="team-grid">
                <?php if (!empty($team_members)) : ?>
                    <?php foreach ($team_members as $member) : ?>
                        <div class="profile-card">
                            <div class="profile-photo">
                                <img src="../assets/uploads/<?php echo $member['photo_url']; ?>" alt="<?php echo $member['full_name']; ?>">
                            </div>
                            <div class="profile-info">
                                <div class="info-item">
                                    <span class="info-label">Nama</span>
                                    <span class="info-value"><?php echo htmlspecialchars($member['full_name']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Posisi</span>
                                    <span class="info-value"><?php echo htmlspecialchars($member['position']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">NIP</span>
                                    <span class="info-value"><?php echo htmlspecialchars($member['nip']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Email</span>
                                    <span class="info-value"><?php echo htmlspecialchars($member['email']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">No. HP</span>
                                    <span class="info-value"><?php echo htmlspecialchars($member['phone_number']); ?></span>
                                </div>
                                <div class="info-item social-links">
                                    <?php if ($member['facebook_url']) : ?><a href="<?php echo htmlspecialchars($member['facebook_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                                    <?php if ($member['instagram_url']) : ?><a href="<?php echo htmlspecialchars($member['instagram_url']); ?>" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a><?php endif; ?>
                                    <?php if ($member['google_scholar_url']) : ?><a href="<?php echo htmlspecialchars($member['google_scholar_url']); ?>" target="_blank" class="social-icon"><i class="fas fa-graduation-cap"></i></a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No other team members found.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <?php include '../layouts/footer.php'; ?>
    <link rel="stylesheet" href="<?php echo $root; ?>assets/css/footer.css">
    
</body>
</html>