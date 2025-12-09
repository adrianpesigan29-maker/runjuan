<?php include 'components/header.php'; ?>
<?php include 'config.php'; ?>

<div style="max-width:800px;margin:120px auto 50px;padding:20px;">
    <?php
    $id = $_GET['id'] ?? 0;
    $stmt = $pdo->prepare("SELECT * FROM micro_posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    if(!$post) {
        echo "<p style='text-align:center;color:red;'>Post not found</p>";
    } else {
    ?>
        <h1 style="text-align:center;color:#2c3e50;margin-bottom:20px;"><?=htmlspecialchars($post['title'])?></h1>
        <p style="text-align:center;color:#888;margin-bottom:50px;">
            <?=date('F j, Y \a\t g:i A', strtotime($post['created_at']))?>
        </p>
        <div style="background:white;padding:60px;border-radius:20px;line-height:2;font-size:1.2rem;">
            <?=nl2br(htmlspecialchars($post['content']))?>
        </div>
        <p style="text-align:center;margin-top:50px;">
            <a href="microblog-list.php" style="color:#1abc9c;font-weight:bold;">← Back to posts</a>
        </p>
    <?php } ?>
</div>

<?php include 'components/footer.php'; ?>