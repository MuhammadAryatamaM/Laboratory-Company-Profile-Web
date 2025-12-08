// assets/js/global.js
document.addEventListener('DOMContentLoaded', function () {
    const overlay  = document.getElementById('contactOverlay');
    const triggers = document.querySelectorAll('.contact-trigger');
    const closeBtn = overlay ? overlay.querySelector('.contact-close') : null;

    if (!overlay) return;

    function openContact(e) {
        if (e) e.preventDefault();
        overlay.classList.add('is-visible');
    }

    function closeContact() {
        overlay.classList.remove('is-visible');
    }
    // Buka navbar
    triggers.forEach(btn => btn.addEventListener('click', openContact));
    // Tombol X
    if (closeBtn) {
        closeBtn.addEventListener('click', closeContact);
    }
    // Klik area
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) {
            closeContact();
        }
    });
    // Tekan ESC
    document.addEventListener('keyup', function (e) {
        if (e.key === 'Escape' && overlay.classList.contains('is-visible')) {
            closeContact();
        }
    });
});
