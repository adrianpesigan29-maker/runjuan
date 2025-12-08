<?php include 'components/header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width: 900px; margin: 100px auto 50px; padding: 0 20px;">
    <h2 style="text-align:center; color:#2c3e50; margin-bottom:20px; font-size:2.5rem;">RunJuan Microblog</h2>
    <p style="text-align:center; color:#777; margin-bottom:50px; font-size:1.1rem;">
        Stories from our runners
    </p>

    <div style="text-align:center; margin-bottom:60px;">
        <a href="microblog-create.php" class="btn-primary" style="padding:14px 40px; font-size:1.2rem;">
            Write New Post
        </a>
    </div>

    <div class="posts-grid">
        <?php
        $stmt = $pdo->query("SELECT * FROM micro_posts ORDER BY created_at DESC");
        while($post = $stmt->fetch()) {
            // Create short excerpt (first 120 characters)
            $excerpt = substr(htmlspecialchars($post['content']), 0, 120);
            if(strlen($post['content']) > 120) $excerpt .= '...';
        ?>
            <article class="post-card">
                <div class="post-header">
                    <h3>
                        <a href="microblog-post.php?id=<?php echo $post['id']; ?>">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </a>
                    </h3>
                </div>
                <p class="post-meta">
                    by <?php echo htmlspecialchars($post['author']); ?> • 
                    <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                </p>
                <p class="post-excerpt"><?php echo $excerpt; ?></p>
                <a href="microblog-post.php?id=<?php echo $post['id']; ?>" class="read-more">
                    Read more →
                </a>
            </article>
        <?php } ?>
    </div>
</div>

<?php include 'components/footer.php'; ?>