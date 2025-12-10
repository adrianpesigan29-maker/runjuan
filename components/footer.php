    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> RunJuan. All rights reserved.</p>
            <p>Made with <span class="heart">❤️</span> for charity runners</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
<script>
// MOBILE HAMBURGER MENU — 100% WORKING
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.nav-mobile');

    if (toggle && mobileNav) {
        toggle.addEventListener('click', function() {
            mobileNav.classList.toggle('active');
            toggle.classList.toggle('open');
        });

        // Close menu when clicking a link
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileNav.classList.remove('active');
                toggle.classList.remove('open');
            });
        });
    }
});
</script>

<!-- Hamburger animation -->
<script>
document.querySelectorAll('.menu-toggle').forEach(toggle => {
    toggle.addEventListener('click', function() {
        this.classList.toggle('open');
    });
});
</script>
</body>
</html>