<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width:900px; margin:80px auto; padding:20px;">
    <h2 style="text-align:center; color:#2c3e50; margin-bottom:20px;">RunJuan Microblog</h2>
    <p style="text-align:center; margin-bottom:40px;">
        <a href="microblog-create.php" class="btn-primary">+ Write New Post</a>
    </p>

    <?php
    $stmt = $pdo->query("SELECT * FROM micro_posts ORDER BY created_at DESC");
    while($post = $stmt->fetch()) {
    ?>
        <div style="background:white; padding:35px; margin-bottom:30px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.08);">
            <h3 style="color:#e67e22; margin:0 0 10px 0; font-size:1.6rem;"><?php echo htmlspecialchars($post['title']); ?></h3>
            <p style="color:#888; font-size:0.95rem; margin-bottom:15px;">
                Posted <?php echo date('F j, Y \a\t g:i A', strtotime($post['created_at'])); ?>
            </p>
            <p style="line-height:1.8; color:#444;"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>