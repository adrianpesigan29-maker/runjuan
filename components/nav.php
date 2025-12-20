<header class="site-header">
    <div class="container nav-container">

        <!-- LOGO -->
        <div class="logo">
            <a href="index.php">Run<span>Juan</span></a>
        </div>

        <!-- DESKTOP NAV -->
        <nav class="nav-desktop">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#events">Events</a></li>
                <li><a href="register.php" class="nav-cta">Register</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li><a href="microblog-list.php">Microblog</a></li>
            </ul>
        </nav>

        <!-- USER INFO -->
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <div class="user-menu">
                <span class="user-name">
                    Hi, <?= htmlspecialchars($_SESSION['user_name']) ?>
                </span>
                <a href="profile.php" class="profile-link">Profile</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        <?php endif; ?>

        <!-- HAMBURGER -->
        <div class="menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>

    <!-- MOBILE NAV -->
    <nav class="nav-mobile" id="navMobile">
        <a href="index.php">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#events">Events</a>
        <a href="register.php">Register</a>
        <a href="index.php#contact">Contact</a>
        <a href="microblog-list.php">Microblog</a>

        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <a href="profile.php">My Profile</a>
            <a href="logout.php" class="mobile-logout">Logout</a>
        <?php endif; ?>
    </nav>
</header>
