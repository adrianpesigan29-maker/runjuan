<?php include 'components/header.php'; ?>

<!-- 1. PARALLAX HERO SECTION -->
<section class="hero-parallax" id="home">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>RunJuan</h1>
        <p class="tagline">Run for Fun. Run for Charity. Run with Juan!</p>
        <a href="#register" class="btn-primary">Join the Next Run</a>
    </div>
    <div class="scroll-down">
        <span>Scroll down</span>
        <div class="chevron"></div>
    </div>
</section>

<!-- 2. ABOUT RUNJUAN -->
<section class="section" id="about">
    <div class="container">
        <h2>About RunJuan</h2>
        <p>We are a community of runners who believe every step can make a difference. From fun runs to charity marathons, we run together — with passion, purpose, and Juan!</p>
    </div>
</section>

<!-- 3. FEATURES -->
<section class="section bg-light" id="features">
    <div class="container">
        <h2>Why Run with Us?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>Walking & Running</h3>
                <p>All levels welcome — from casual walkers to marathon runners.</p>
            </div>
            <div class="feature-card">
                <h3>Community First</h3>
                <p>Make friends, join group runs, and grow together.</p>
            </div>
            <div class="feature-card">
                <h3>Run for Charity</h3>
                <p>Every event supports local causes and communities.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. CALL TO ACTION -->
<section class="section cta-section">
    <div class="container">
        <h2>Ready to Start Running?</h2>
        <div class="cta-buttons">
    <a href="#register" class="btn-primary">Join the Community</a>
    <a href="microblog-list.php" class="btn-secondary">Read Microblogs</a>
</div>
    </div>
</section>
<!-- ==================== EVENTS SECTION ==================== -->
<section class="section" id="events">
    <div class="container">
        <h2>Upcoming Events</h2>
        <p>Join us and run for a cause!</p>

        <div class="events-grid">
            <div class="event-card">
                <div class="event-date">MAR 15</div>
                <h3>Run for Education 2026</h3>
                <p><strong>Location:</strong> Manila Bay</p>
                <p><strong>Distances:</strong> 5K • 10K • 21K</p>
                <p>Help send 500 kids to school this year.</p>
                <a href="#register" class="btn-primary">Register Now</a>
            </div>

            <div class="event-card">
                <div class="event-date">JUN 20</div>
                <h3>Charity Night Run</h3>
                <p><strong>Location:</strong> BGC, Taguig</p>
                <p><strong>Distance:</strong> 3K Fun Run</p>
                <p>Glow sticks, music, and good vibes!</p>
                <a href="#register" class="btn-primary">Register Now</a>
            </div>

            <div class="event-card">
                <div class="event-date">SEP 10</div>
                <h3>Run for Clean Water</h3>
                <p><strong>Location:</strong> Quezon City Circle</p>
                <p><strong>Distances:</strong> 3K • 5K • 10K</p>
                <p>Every kilometer = 1 liter of clean water donated.</p>
                <a href="#register" class="btn-primary">Register Now</a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CONTACT SECTION ==================== -->
<section class="section bg-light" id="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <p>We’re here to help you start running for good.</p>

        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>Get in Touch</h3>
                <p><strong>Email:</strong> hello@runjuan.ph</p>
                <p><strong>Phone:</strong> +63 917 123 4567</p>
                <p><strong>Address:</strong> Manila, Philippines</p>
                
                <div class="social-links">
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Strava</a>
                </div>
            </div>

            <form class="contact-form">
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <textarea rows="6" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>