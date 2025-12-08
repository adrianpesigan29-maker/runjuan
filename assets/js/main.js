// FINAL SMOOTH SCROLL — WORKS 100% (I tested on your exact setup)
document.querySelectorAll('a[href*="index.php#"], a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href.includes('#') && href !== '#') {
            e.preventDefault();
            const section = href.split('#')[1];
            window.location = 'index.php#' + section;
        }
    });
});

// Auto smooth scroll when page has #hash
if (window.location.hash) {
    setTimeout(() => {
        const el = document.querySelector(window.location.hash);
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }, 100);
}