<?php include 'components/header.php'; ?>
<?php include 'config.php'; ?>

<div class="container" style="max-width: 800px; margin: 50px auto; padding: 20px;">
    <h2 style="text-align:center; color:#2c3e50;">Share Your Run Story</h2>

    <?php
    if($_POST) {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if($title && $content) {
            $stmt = $pdo->prepare("INSERT INTO micro_posts (title, content) VALUES (?, ?)");
            $stmt->execute([$title, $content]);
            echo "<p style='color:green; text-align:center;'>Post published!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Please fill all fields!</p>";
        }
    }
    ?>

    <form method="POST" style="background:white; padding:40px; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.1);">
        <input type="text" name="title" placeholder="Post Title (e.g. My First 10K!)" required 
               style="width:100%; padding:15px; margin-bottom:20px; border:2px solid #ddd; border-radius:10px; font-size:1.1rem;">
        
        <textarea name="content" rows="8" placeholder="Share your running story..." required
                  style="width:100%; padding:15px; margin-bottom:20px; border:2px solid #ddd; border-radius:10px; font-size:1.1rem; font-family:Inter;"></textarea>
        
        <button type="submit" class="btn-primary" style="width:100%; padding:18px; font-size:1.3rem;">
            Publish Post
        </button>
    </form>

    <div style="text-align:center; margin-top:30px;">
        <a href="microblog-list.php" style="color:#1abc9c; font-weight:bold;">← View All Posts</a>
    </div>
</div>

<?php include 'components/.php'; ?>