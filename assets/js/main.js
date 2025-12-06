// Mobile menu toggle
document.querySelector('.menu-toggle').addEventListener('click', () => {
    document.querySelector('.nav-mobile').classList.toggle('active');
    document.body.classList.toggle('menu-open');
});

// Close menu when clicking a link
document.querySelectorAll('.nav-mobile a').forEach(link => {
    link.addEventListener('click', () => {
        document.querySelector('.nav-mobile').classList.remove('active');
        document.body.classList.remove('menu-open');
    });
});

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});