<?php session_start(); ?>
<?php include 'components/header.php'; ?>

<section class="hero-runkeeper" id="home">
    <img src="./assets/img/running.webp" class="hero-bg-img" alt="Running background">

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>
            Together, we<br>
            <span>run for Juan.</span>
        </h1>

        <p>
            Join RunJuan — a Filipino running community focused on
            fitness, friendship, and charity runs.
        </p>

        <div class="hero-buttons">
            <a href="register.php" class="btn primary">Join the Community</a>
            <a href="#events" class="btn secondary">View Events</a>
        </div>
    </div>
</section>




<!-- ABOUT SECTION — ULTRA MINIMALIST & PROFESSIONAL -->
<section class="about-minimal" id="about">
    <div class="container">
        <div class="about-content-minimal">
            <h2>About RunJuan</h2>
            <p class="lead">
                We run not just for ourselves — we run for every Juan.
            </p>

            <div class="about-body">
                <p>
                    RunJuan started with one simple belief: <strong>every Filipino who loves to run can also help someone who needs it the most.</strong>
                </p>
                <p>
                    Whether you’re a student doing your first 3K fun run, an office worker chasing a new 10K PR, or a lola walking with her apo — 
                    every kilometer you finish with us becomes school supplies for kids in far-flung barrios, clean water for a community, or medicine for a nanay fighting cancer.
                </p>
                <p>
                    Since 2025, more than <strong>5,000 runners</strong> from Manila to Mindanao have joined us. 
                    Together we’ve raised over <strong>₱2.8 million pesos</strong> and completed <strong>50+ charity runs</strong> nationwide.
                </p>
            </div>

            <div class="stats-minimal">
                <div class="stat">
                    <div class="number">5,000+</div>
                    <div class="label">Runners Joined</div>
                </div>
                <div class="stat">
                    <div class="number">₱2.8M+</div>
                    <div class="label">Raised for Charity</div>
                </div>
                <div class="stat">
                    <div class="number">50+</div>
                    <div class="label">Events Completed</div>
                </div>
            </div>

            <div class="about-cta-minimal">
                <p>Your next run can change someone’s life.</p>
                <a href="register.php" class="btn-minimal">Join the Next Run</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION — PURE COLOR, NO IMAGE, STILL LOOKS $100K -->
<section class="cta-pure">
    <div class="cta-container">
        <h2>Ready to Start Running?</h2>
        <p class="cta-subtitle">
            Join thousands of Filipinos turning every step into hope
        </p>
        <div class="cta-buttons">
            <a href="register.php" class="btn-cta primary">Join the Community</a>
            <a href="microblog-list.php" class="btn-cta secondary">Read Microblogs</a>
        </div>
    </div>
</section>
<!-- EVENTS SECTION — PROFESSIONAL & RUNJUAN THEMED -->
<section class="section events-pro" id="events">
    <div class="container">
        <div class="section-header">
            <h2>Upcoming Charity Runs</h2>
            <p class="section-subtitle">
                Every step you take helps someone in need
            </p>
        </div>

        <div class="events-grid">
            <!-- Event Card 1 -->
            <div class="event-card">
                <div class="event-date">
                    <span class="date-day">15</span>
                    <span class="date-month">MAR</span>
                </div>
                <div class="event-content">
                    <h3>Run for Education 2026</h3>
                    <p class="event-location">
                        <strong>Location:</strong> Manila Bay
                    </p>
                    <p class="event-distance">
                        5K • 10K • 21K
                    </p>
                    <p class="event-cause">
                        Help send 500 kids to school this year
                    </p>
                    <a href="#register" class="btn-event">Register Now</a>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="event-card">
                <div class="event-date">
                    <span class="date-day">26</span>
                    <span class="date-month">JUN</span>
                </div>
                <div class="event-content">
                    <h3>Charity Night Run</h3>
                    <p class="event-location">
                        <strong>Location:</strong> BGC, Taguig
                    </p>
                    <p class="event-distance">
                        3K Fun Run • 10K
                    </p>
                    <p class="event-cause">
                        Support medical missions in provinces
                    </p>
                    <a href="#register" class="btn-event">Register Now</a>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="event-card">
                <div class="event-date">
                    <span class="date-day">12</span>
                    <span class="date-month">SEP</span>
                </div>
                <div class="event-content">
                    <h3>Run for Clean Water</h3>
                    <p class="event-location">
                        <strong>Location:</strong> Cebu City
                    </p>
                    <p class="event-distance">
                        5K • 16K
                    </p>
                    <p class="event-cause">
                        Build water stations in remote barangays
                    </p>
                    <a href="#register" class="btn-event">Register Now</a>
                </div>
            </div>
        </div>

        <div class="events-cta">
            <p>Want to organize a run in your province?</p>
            <a href="#contact" class="btn-secondary large">Partner with Us</a>
        </div>
    </div>
</section>

<!-- CONTACT SECTION — ULTRA CLEAN MINIMALIST (LIKE ZENDESK/ASANA) -->
<section class="contact-clean" id="contact">
    <div class="container">
        <div class="contact-header">
            <h2>Get in Touch</h2>
            <p class="contact-subtitle">
                We're here to help you start running for good.
            </p>
        </div>

        <div class="contact-body">
            <div class="contact-form-side">
                <form class="contact-form-minimal">
                    <div class="form-group">
                        <input type="text" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="8" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn-send">Send Message</button>
                </form>
            </div>

            <div class="contact-info-side">
                <div class="info-block">
                    <h4>Email</h4>
                    <p><a href="mailto:hello@runjuan.ph">hello@runjuan.ph</a></p>
                </div>
                <div class="info-block">
                    <h4>Phone</h4>
                    <p><a href="tel:+639304335759">+63 930 433 5759</a></p>
                </div>
                <div class="info-block">
                    <h4>Address</h4>
                    <p>San Juan, Batangas<br>Philippines</p>
                </div>

                <div class="social-minimal">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Instagram</a>
                    <a href="#" class="social-link">Strava</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>