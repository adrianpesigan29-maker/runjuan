<?php 
session_start();
include 'config.php'; 
include 'components/header.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login'] ?? ''); // email or username
    $password = $_POST['password'] ?? '';

    if (empty($login)) $errors[] = "Email or Username is required";
    if (empty($password)) $errors[] = "Password is required";

    if (empty($errors)) {
        // Find user by email OR username
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // SUCCESS — start session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'] ?? $user['full_name']; // adjust if column is full_name
            $_SESSION['logged_in'] = true;

            // REDIRECT TO MICROBLOG AFTER LOGIN
            header("Location: microblog-list.php");
            exit();
        } else {
            $errors[] = "Invalid email/username or password";
        }
    }
}
?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Login</h1>
        <p class="subtitle">Welcome back to RunJuan</p>

        <?php if (!empty($errors)): ?>
            <div style="background:#f8d7da;color:#721c24;padding:20px;border-radius:12px;margin:20px 0;">
                <?php foreach ($errors as $error): ?>
                    <p style="margin:10px 0;"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form class="auth-form" method="POST">
            <div class="input-group">
                <label>Email or Username</label>
                <input type="text" name="login" placeholder="juan@example.com or juan123" value="<?= isset($login) ? htmlspecialchars($login) : '' ?>" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-primary full">Login</button>
        </form>

        <p class="auth-footer">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
        <p class="auth-footer">
            <a href="index.php">Back to Home</a>
        </p>
    </div>
</div>

<?php include 'components/footer.php'; ?>