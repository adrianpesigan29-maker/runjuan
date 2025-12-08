<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width: 800px; margin: 100px auto 80px; padding: 0 20px;">
    <?php
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "<p style='text-align:center; color:red;'>Invalid post ID!</p>";
    } else {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM micro_posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch();

        if(!$post) {
            echo "<p style='text-align:center; color:red;'>Post not found!</p>";
        } else {
    ?>
            <article class="single-post">
                <h1 style="font-size:2.8rem; color:#2c3e50; margin-bottom:20px;">
                    <?php echo htmlspecialchars($post['title']); ?>
                </h1>
                <p style="color:#888; font-size:1.1rem; margin-bottom:40px;">
                    by <?php echo htmlspecialchars($post['author']); ?> • 
                    <?php echo date('F j, Y \a\t g:i A', strtotime($post['created_at'])); ?>
                </p>
                <div style="font-size:1.2rem; line-height:2; color:#444;">
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </div>
                <div style="margin-top:50px; text-align:center;">
                    <a href="microblog-list.php" style="color:#1abc9c; font-weight:bold; text-decoration:none;">
                        ← Back to all posts
                    </a>
                </div>
            </article>
    <?php
        }
    }
    ?>
</div>

<?php include 'footer.php'; ?>