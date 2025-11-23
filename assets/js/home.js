// Load ke hero
history.scrollRestoration = "manual";
window.scrollTo(0, 0);

// -------- Scroll Reveal --------
function initScrollReveal() {
    const revealEls = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || revealEls.length === 0) {
        revealEls.forEach(el => el.classList.add('reveal-visible'));
        return;
    }
    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const delay = el.dataset.revealDelay
                    ? parseInt(el.dataset.revealDelay, 10)
                    : 0;
                if (delay > 0) {
                    setTimeout(() => {
                        el.classList.add('reveal-visible');
                    }, delay);
                } else {
                    el.classList.add('reveal-visible');
                }
                obs.unobserve(el);
            });
        },
        {
            threshold: 0.2,
            rootMargin: '0px 0px -5% 0px'
        }
    );
    revealEls.forEach(el => observer.observe(el));
}

// Team animasi khusus untuk mobile dan tab
function initTeamWheel() {
    const scrollEl = document.querySelector('.team-lab-scroll');
    const track = scrollEl ? scrollEl.querySelector('.team-lab-track') : null;
    const cards = track ? track.querySelectorAll('.team-card') : null;
    if (!scrollEl || !cards || cards.length === 0) return;
    function updateActive() {
        if (window.innerWidth > 768) {
            cards.forEach(card => {
                card.classList.remove('team-card-center');
                card.style.transform = '';
                card.style.opacity = '';
                card.style.boxShadow = '';
            });
            return;
        }
        const center = scrollEl.scrollLeft + scrollEl.clientWidth / 2;
        let closestCard = null;
        let closestDist = Infinity;
        cards.forEach(card => {
            const cardCenter =
                card.offsetLeft + card.offsetWidth / 2;
            const dist = Math.abs(center - cardCenter);
            if (dist < closestDist) {
                closestDist = dist;
                closestCard = card;
            }
        });
        cards.forEach(card => {
            if (card === closestCard) {
                card.classList.add('team-card-center');
            } else {
                card.classList.remove('team-card-center');
            }
        });
    }
    const handleScroll = () => requestAnimationFrame(updateActive);
    scrollEl.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);
    updateActive();
}

// ON LOAD: PRELOADER + SCROLL REVEAL + TEAM WHEEL
window.addEventListener("load", () => {
    setTimeout(() => {
        const pre = document.getElementById("preloader");
        if (pre) pre.classList.add("hide");

        document.body.classList.add("loaded");

        initScrollReveal();
        initTeamWheel();
    }, 500);
});

// PARALLAX Hero
(function () {
    const bg = document.querySelector('.hero-bg');
    const overlay = document.querySelector('.hero-overlay');
    if (!bg || !overlay) return;
    const speed = 0.35;
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
    update();
})();

// Smooth scroll dan offset nav
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
        const id = this.getAttribute('href');
        if (!id || id === '#') return;
        const target = document.querySelector(id);
        if (!target) return;
        e.preventDefault();
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
