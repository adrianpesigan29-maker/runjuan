<?php 
session_start();
include 'config.php'; 
include 'components/header.php'; 

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    // Validation
    if (empty($name)) $errors[] = "Full Name is required";
    if (empty($username)) $errors[] = "Username is required";
    if (empty($email)) $errors[] = "Email is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required";
    if (empty($password)) $errors[] = "Password is required";
    if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters";
    if ($password !== $confirm) $errors[] = "Passwords do not match";

    // Check if email or username exists
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->rowCount() > 0) {
            $errors[] = "Email or Username already taken";
        }
    }

    // Register user
    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $username, $email, $hashed]);
            $success = true;
        } catch (Exception $e) {
            $errors[] = "Registration failed. Try again.";
        }
    }
}
?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Create Account</h1>
        <p class="subtitle">Join the RunJuan community</p>

        <?php if ($success): ?>
            <div style="background:#d4edda;color:#155724;padding:20px;border-radius:12px;margin:20px 0;text-align:center;font-weight:bold;">
                Account created successfully! <a href="login.php" style="color:#155724;text-decoration:underline;">Login here</a>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div style="background:#f8d7da;color:#721c24;padding:20px;border-radius:12px;margin:20px 0;">
                <?php foreach ($errors as $error): ?>
                    <p style="margin:10px 0;"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form class="auth-form" method="POST">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Juan Dela Cruz" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="juandelacruz" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" required>
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="juan@example.com" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm" placeholder="••••••••" required>
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