function syncSidebarHeight() {
    const main = document.querySelector('.main-content');
    const sidebar = document.querySelector('.sidebar');
    const recent = document.querySelector('.recent-items');
    const header = document.querySelector('.sidebar-header');

    if (!main || !sidebar || !recent || !header) return;

    if (window.innerWidth <= 992) {
        sidebar.style.maxHeight = '';
        recent.style.maxHeight = '';
        return;
    }

    const mainHeight = main.offsetHeight;
    sidebar.style.maxHeight = mainHeight + 'px';

    const available = mainHeight - header.offsetHeight;
    if (available > 0) {
        recent.style.maxHeight = available + 'px';
    }
}

window.addEventListener('load', syncSidebarHeight);
window.addEventListener('resize', syncSidebarHeight);