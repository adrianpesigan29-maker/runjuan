<?php include 'components/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Create Account</h1>
        <p class="subtitle">Join the RunJuan community</p>

        <form class="auth-form">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" placeholder="Juan Dela Cruz" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" placeholder="juandelacruz" required>
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" placeholder="juan@example.com" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" placeholder="••••••••" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-primary full">Create Account</button>
        </form>

        <p class="auth-footer">
            Already have an account? <a href="login.php">Login here</a>
        </p>
        <p class="auth-footer">
            <a href="index.php">Back to Home</a>
        </p>
    </div>
</div>

<?php include 'components/footer.php'; ?>