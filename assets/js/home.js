// ===================== PARALLAX HERO INLET (ala C&F) =====================
(function () {
    const bg = document.querySelector('.hero-bg');
    const overlay = document.querySelector('.hero-overlay');

    if (!bg || !overlay) return;

    const speed = 0.35;   // makin kecil = gerak makin pelan
    let ticking = false;

    function update() {
        const y = window.pageYOffset * speed;
        bg.style.transform = `translateY(${y}px)`;
        overlay.style.transform = `translateY(${y}px)`;
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    });

    // posisi awal
    update();
})();
// ===================== SMOOTH SCROLL + OFFSET NAVBAR =====================
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
        const id = this.getAttribute('href'); // contoh: #about-section
        if (!id || id === '#') return;

        const target = document.querySelector(id);
        if (!target) return;

        e.preventDefault();

        // tinggi navbar (sesuaikan selector kalau beda)
        const nav = document.querySelector('.inlet-navbar');
        const navH = nav ? nav.offsetHeight : 90;

        const top =
            target.getBoundingClientRect().top +
            window.pageYOffset -
            navH;

        window.scrollTo({
            top,
            behavior: 'smooth'
        });
    });
});
