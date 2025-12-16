<?php session_start();
include 'components/header.php'; ?>
<?php include 'includes/messages.php'; ?>
<?= getMessage() ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width:800px;margin:100px auto;padding:40px;background:white;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;margin-bottom:40px;color:#2c3e50;font-size:2.5rem;">Write New Post</h2>

    <?php
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $author = trim($_POST['author'] ?? '');

        // Validation
        if (empty($title)) $errors[] = "Title is required";
        if (empty($content)) $errors[] = "Content is required";
        if (empty($author)) $errors[] = "Author name is required";

        if (empty($errors)) {
            try {
                // PREPARED STATEMENT — SAFE FROM SQL INJECTION!
                $sql = "INSERT INTO micro_posts (title, content, author) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$title, $content, $author]);

                setMessage('success', 'Post created successfully!');
                header("Location: microblog-list.php");
                exit;
            } catch (Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
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

    <form method="POST">
        <div style="margin-bottom:30px;">
            <input type="text" name="title" placeholder="Post Title" value="<?=isset($title) ? htmlspecialchars($title) : ''?>" required 
                   style="width:100%;padding:20px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;transition:all 0.3s;">
        </div>
        <div style="margin-bottom:30px;">
            <textarea name="content" placeholder="Share your run story..." rows="10" required 
                      style="width:100%;padding:20px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;resize:vertical;transition:all 0.3s;"><?=isset($content) ? htmlspecialchars($content) : ''?></textarea>
        </div>
        <div style="margin-bottom:40px;">
            <input type="text" name="author" placeholder="Your Name" value="<?=isset($author) ? htmlspecialchars($author) : ''?>" required 
                   style="width:100%;padding:20px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;transition:all 0.3s;">
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