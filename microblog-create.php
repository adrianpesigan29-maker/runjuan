<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width:800px; margin:80px auto; padding:20px;">
    <h2 style="text-align:center; color:#2c3e50; margin-bottom:40px;">Share Your Run Story</h2>

    <?php
    if($_POST) {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if($title && $content) {
            $stmt = $pdo->prepare("INSERT INTO micro_posts (title, content) VALUES (?, ?)");
            $stmt->execute([$title, $content]);
            echo "<p style='color:green; text-align:center; font-weight:bold;'>Post published!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Please fill both fields!</p>";
        }
    }
    ?>

    <form method="POST" style="background:white; padding:40px; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.1);">
        <input type="text" name="title" placeholder="Post Title (e.g. My First 10K!)" required 
               style="width:100%; padding:18px; margin-bottom:20px; border:2px solid #ddd; border-radius:12px; font-size:1.1rem;">
        
        <textarea name="content" rows="8" placeholder="Tell us about your run..." required
                  style="width:100%; padding:18px; margin-bottom:25px; border:2px solid #ddd; border-radius:12px; font-size:1.1rem; resize:vertical;"></textarea>
        
        <button type="submit" class="btn-primary" style="width:100%; padding:18px; font-size:1.3rem; border:none; cursor:pointer;">
            Publish Post
        </button>
    </form>

    <p style="text-align:center; margin-top:30px;">
        <a href="microblog-list.php" style="color:#1abc9c; font-weight:bold; text-decoration:none;">View All Posts →</a>
    </p>
</div>

<?php include 'footer.php'; ?>