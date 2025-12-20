<?php
session_start();
include 'config.php';
include 'components/header.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM micro_posts WHERE user_id = ?");
$stmt->execute([$user_id]);
$post_count = $stmt->fetchColumn();
?>

<div class="container" style="max-width:800px;margin:100px auto;padding:40px;background:white;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.1);text-align:center;">
    <h1 style="font-size:3.5rem;margin-bottom:20px;color:#2c3e50;">My Profile</h1>
    
    <div style="background:#f8f9fa;padding:40px;border-radius:24px;margin:40px 0;">
        <p style="font-size:1.8rem;color:#e67e22;font-weight:700;margin:15px 0;">
            <?= htmlspecialchars($user['name'] ?? $user['full_name']) ?>
        </p>
        <p style="font-size:1.4rem;color:#666;margin:15px 0;">
            @<?= htmlspecialchars($user['username'] ?? 'runner') ?>
        </p>
        <p style="font-size:1.4rem;color:#333;margin:15px 0;">
            <?= htmlspecialchars($user['email']) ?>
        </p>
        <p style="font-size:1.6rem;color:#e67e22;font-weight:600;margin:30px 0;">
            <?= $post_count ?> posts shared
        </p>
    </div>

    <a href="microblog-list.php" style="background:#e67e22;color:white;padding:18px 50px;border-radius:60px;font-size:1.4rem;font-weight:700;text-decoration:none;">
        View My Posts
    </a>
</div>

<?php include 'components/footer.php'; ?>