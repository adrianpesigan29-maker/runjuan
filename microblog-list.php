<?php include 'components/header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width: 900px; margin: 50px auto; padding: 20px;">
    <h2 style="text-align:center; color:#2c3e50; margin-bottom:40px;">RunJuan Microblog</h2>

    <div style="text-align:center; margin-bottom:40px;">
        <a href="microblog-create.php" class="btn-primary">+ Write New Post</a>
    </div>

    <?php
    $stmt = $pdo->query("SELECT * FROM micro_posts ORDER BY created_at DESC");
    while($post = $stmt->fetch()) {
    ?>
        <div style="background:white; padding:30px; margin-bottom:30px; border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.1);">
            <h3 style="color:#e67e22; margin-bottom:10px;"><?php echo htmlspecialchars($post['title']); ?></h3>
            <p style="color:#666; font-size:0.9rem; margin-bottom:15px;">
                Posted by <?php echo $post['author']; ?> • 
                <?php echo date('M d, Y - g:i A', strtotime($post['created_at'])); ?>
            </p>
            <p style="line-height:1.8; color:#444;"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        </div>
    <?php } ?>
</div>

<?php include 'components/footer.php'; ?>