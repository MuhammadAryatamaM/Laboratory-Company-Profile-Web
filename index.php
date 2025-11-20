<?php include 'helper/layouts/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InLET Lab</title>

    <!-- CSS Kamu -->
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>

    <!-- ===== HERO SECTION (DUMMY) ===== -->
    <section style="
        height: 60vh;
        background:#547792; 
        color:white; 
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        text-align:center;
        padding:20px;">
        
        <h1 style="font-size:48px; margin:0;">Welcome to InLET Laboratory</h1>
        <p style="font-size:20px; margin-top:10px; max-width:600px;">
            This is a dummy hero section to test your header and footer layout.
        </p>
    </section>

    <!-- ===== ABOUT (DUMMY) ===== -->
    <section style="padding:60px 70px;">
        <h2 style="font-size:32px; margin-bottom:15px;">About Section Dummy</h2>
        <p style="font-size:18px; max-width:700px; line-height:1.5;">
            This section is only for testing layout spacing between header and footer.
            You can replace this content later with your real homepage content.
        </p>
    </section>

    <!-- ===== CONTENT BLOCKS ===== -->
    <section style="padding:60px 70px; background:#e6eef3;">
        <h2 style="font-size:32px; margin-bottom:25px;">Content Blocks Dummy</h2>

        <div style="display:flex; gap:20px;">
            <div style="flex:1; padding:20px; background:white; border-radius:10px;">
                <h3>Block 1</h3>
                <p>Placeholder content for testing.</p>
            </div>

            <div style="flex:1; padding:20px; background:white; border-radius:10px;">
                <h3>Block 2</h3>
                <p>Placeholder content for testing.</p>
            </div>

            <div style="flex:1; padding:20px; background:white; border-radius:10px;">
                <h3>Block 3</h3>
                <p>Placeholder content for testing.</p>
            </div>
        </div>
    </section>

<?php include 'helper/layouts/footer.php'; ?>

</body>
</html>
