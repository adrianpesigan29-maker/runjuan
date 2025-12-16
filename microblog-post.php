<?php session_start();
include 'components/header.php'; ?>
<?php include 'includes/messages.php'; ?>
<?= getMessage() ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width:800px;margin:100px auto;padding:40px;background:white;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.1);">
    <?php
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo '<p style="text-align:center;color:red;">Invalid post ID</p>';
        include 'components/footer.php';
        exit;
    }

    $id = $_GET['id'];

    try {
        // Safe prepared statement for single post
        $stmt = $pdo->prepare("SELECT * FROM micro_posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            echo '<p style="text-align:center;color:red;">Post not found</p>';
        } else {
    ?>
            <article>
                <h1 style="font-size:3rem;color:#2c3e50;margin-bottom:20px;">
                    <?=htmlspecialchars($post['title'])?>
                </h1>
                <p style="color:#888;font-size:1.1rem;margin-bottom:40px;">
                    by <?=htmlspecialchars($post['author'])?> • 
                    <?=date('F j, Y \a\t g:i A', strtotime($post['created_at']))?>
                </p>
                <div style="font-size:1.3rem;line-height:1.9;color:#444;">
                    <?=nl2br(htmlspecialchars($post['content']))?>
                </div>
            </article>

            <div style="text-align:center;margin-top:60px;">
                <a href="microblog-list.php" style="color:#e67e22;font-weight:600;font-size:1.2rem;text-decoration:none;">
                    ← Back to all posts
                </a>
<div style="text-align:center;margin-top:60px;padding-top:40px;border-top:1px solid #eee;">
    <a href="microblog-edit.php?id=<?=$post['id']?>" style="color:#e67e22;font-weight:700;margin:0 20px;">Edit Post</a>
    <a href="microblog-delete.php?id=<?=$post['id']?>" 
       onclick="return confirm('Delete this post forever?')"
       style="color:#e74c3c;font-weight:700;margin:0 20px;">Delete Post</a>
</div>
            </div>
    <?php
        }
    } catch (Exception $e) {
        echo '<p style="color:red;text-align:center;">Error loading post</p>';
    }
    ?>
</div>

<?php include 'components/footer.php'; ?>