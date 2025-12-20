<?php
session_start();
include 'components/header.php';
include 'includes/messages.php';
include 'config.php';

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    setMessage('error', 'You must be logged in to create a post.');
    header("Location: login.php");
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    // Validation
    if (empty($title)) $errors[] = "Title is required";
    if (empty($content)) $errors[] = "Content is required";

    if (empty($errors)) {
        try {
            // Save with user_id and username from session
            $user_id = $_SESSION['user_id'];
            $author = $_SESSION['user_name']; // or $_SESSION['username'] if you have it

            $sql = "INSERT INTO micro_posts (title, content, author, user_id) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$title, $content, $author, $user_id]);

            setMessage('success', 'Post created successfully!');
            header("Location: microblog-list.php");
            exit();
        } catch (Exception $e) {
            $errors[] = "Error saving post. Try again.";
        }
    }

    // Show errors
    if (!empty($errors)) {
        echo '<div style="background:#f8d7da;color:#721c24;padding:20px;border-radius:12px;margin:20px 0;">';
        foreach ($errors as $error) {
            echo "<p style='margin:10px 0;font-weight:600;'>$error</p>";
        }
        echo '</div>';
    }
}
?>

<div class="container" style="max-width:800px;margin:100px auto;padding:40px;background:white;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;margin-bottom:40px;color:#2c3e50;font-size:2.5rem;">Write New Post</h2>

    <form method="POST">
        <div style="margin-bottom:30px;">
            <input type="text" name="title" placeholder="Post Title" value="<?= isset($title) ? htmlspecialchars($title) : '' ?>" required 
                   style="width:100%;padding:20px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;transition:all 0.3s;">
        </div>
        <div style="margin-bottom:40px;">
            <textarea name="content" placeholder="Share your run story..." rows="10" required 
                      style="width:100%;padding:20px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;resize:vertical;transition:all 0.3s;"><?= isset($content) ? htmlspecialchars($content) : '' ?></textarea>
        </div>

        <!-- Auto-filled author (from session) — not editable -->
        <div style="margin-bottom:40px;padding:20px;background:#f8f9fa;border-radius:18px;text-align:center;">
            <p style="margin:0;color:#666;font-size:1.1rem;">Posting as:</p>
            <p style="margin:5px 0 0;font-size:1.4rem;font-weight:700;color:#e67e22;">
                <?= htmlspecialchars($_SESSION['user_name']) ?>
            </p>
        </div>

        <button type="submit" style="width:100%;background:linear-gradient(135deg,#e67e22,#f39c12);color:white;padding:22px;border:none;border-radius:18px;font-size:1.5rem;font-weight:bold;cursor:pointer;box-shadow:0 15px 40px rgba(230,126,34,0.4);transition:all 0.4s;">
            Publish Post
        </button>
    </form>

    <p style="text-align:center;margin-top:40px;font-size:1.1rem;">
        <a href="microblog-list.php" style="color:#e67e22;text-decoration:none;font-weight:600;">← Back to Microblog</a>
    </p>
</div>

<?php include 'components/footer.php'; ?>