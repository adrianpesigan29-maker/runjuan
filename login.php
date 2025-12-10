<?php include 'components/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Welcome Back</h1>
        <p class="subtitle">Log in to your RunJuan account</p>

        <form class="auth-form">
            <div class="input-group">
                <label>Email or Username</label>
                <input type="text" placeholder="juan@example.com" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" placeholder="••••••••" required>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="btn-primary full">Log In</button>
        </form>

        <p class="auth-footer">
            Don’t have an account? <a href="register.php">Create one</a>
        </p>
        <p class="auth-footer">
            <a href="index.php">Back to Home</a>
        </p>
    </div>
</div>

<?php include 'components/footer.php'; ?>