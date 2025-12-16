<?php session_start();
include 'components/header.php'; ?>
<?php include 'includes/messages.php'; ?>
<?= getMessage() ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width:800px;margin:100px auto;padding:40px;background:white;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.1);">
    <h2 style="text-align:center;margin-bottom:40px;color:#2c3e50;font-size:2.5rem;">Edit Post</h2>

    <?php
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("Invalid post ID");
    }
    $id = $_GET['id'];

    // Get post
    $stmt = $pdo->prepare("SELECT * FROM micro_posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    if (!$post) {
        die("Post not found");
    }

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $author = trim($_POST['author']);

        if (empty($title)) $errors[] = "Title required";
        if (empty($content)) $errors[] = "Content required";
        if (empty($author)) $errors[] = "Author required";

        if (empty($errors)) {
            try {
                // SAFE UPDATE with prepared statement
                $sql = "UPDATE micro_posts SET title = ?, content = ?, author = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$title, $content, $author, $id]);

                setMessage('success', 'Post updated successfully!');
                header("Location: microblog-post.php?id=$id");
                exit;
            } catch (Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
            }
        }

        if (!empty($errors)) {
            echo '<div style="background:#f8d7da;color:#721c24;padding:20px;border-radius:12px;margin:20px 0;">';
            foreach ($errors as $error) echo "<p>$error</p>";
            echo '</div>';
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="title" value="<?=htmlspecialchars($post['title'])?>" required 
               style="width:100%;padding:20px;margin-bottom:25px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;">
        <textarea name="content" rows="10" required 
                  style="width:100%;padding:20px;margin-bottom:25px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;"><?=htmlspecialchars($post['content'])?></textarea>
        <input type="text" name="author" value="<?=htmlspecialchars($post['author'])?>" required 
               style="width:100%;padding:20px;margin-bottom:40px;border:2px solid #ddd;border-radius:18px;font-size:1.2rem;">
        <button type="submit" style="width:100%;background:#e67e22;color:white;padding:22px;border:none;border-radius:18px;font-size:1.5rem;font-weight:bold;">
            Update Post
        </button>
    </form>

    <p style="text-align:center;margin-top:40px;">
        <a href="microblog-list.php">← Back to posts</a>
    </p>
</div>

<?php include 'components/footer.php'; ?>