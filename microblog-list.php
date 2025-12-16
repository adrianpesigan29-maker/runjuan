<?php
session_start();
include 'components/header.php';
include 'includes/messages.php';
include 'config.php';
?>

<?= getMessage() ?>

<div class="container" style="max-width:1000px;margin:100px auto;padding:20px;">
    <h2 style="text-align:center;margin-bottom:60px;color:#2c3e50;font-size:3rem;">RunJuan Microblog</h2>

    <div style="text-align:center;margin-bottom:50px;">
        <a href="microblog-create.php" style="display:inline-block;background:#e67e22;color:white;padding:18px 50px;border-radius:60px;font-size:1.3rem;font-weight:700;text-decoration:none;box-shadow:0 15px 40px rgba(230,126,34,0.3);">
            + Write New Post
        </a>
    </div>

    <div style="display:grid;gap:40px;">
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM micro_posts ORDER BY created_at DESC");
            $postCount = $stmt->rowCount();

            // Show post count if there are posts
            if ($postCount > 0) {
                echo '<h3 style="text-align:center;color:#888;margin-bottom:40px;font-size:1.2rem;">
                        ' . $postCount . ' post' . ($postCount == 1 ? '' : 's') . ' in total
                      </h3>';
            }

            // Empty state
            if ($postCount == 0) {
                echo '<div style="text-align:center;padding:80px 20px;color:#888;">
                        <p style="font-size:2rem;margin-bottom:20px;">📭 No posts yet</p>
                        <p style="font-size:1.4rem;">Be the first to share your running story!</p>
                      </div>';
            }

            // Show posts
            while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $short = substr($post['content'], 0, 200) . (strlen($post['content']) > 200 ? '...' : '');
        ?>
                <article style="background:white;padding:40px;border-radius:24px;box-shadow:0 15px 40px rgba(0,0,0,0.08);border-left:6px solid #e67e22;">
                    <h3 style="margin:0 0 15px;font-size:2rem;">
                        <a href="microblog-post.php?id=<?=$post['id']?>" style="color:#2c3e50;text-decoration:none;">
                            <?=htmlspecialchars($post['title'])?>
                        </a>
                    </h3>
                    <p style="color:#888;margin:0 0 20px;font-size:1rem;">
                        by <?=htmlspecialchars($post['author'])?> • 
                        <?=date('F j, Y', strtotime($post['created_at']))?>
                    </p>
                    <p style="color:#555;line-height:1.8;font-size:1.1rem;">
                        <?=nl2br(htmlspecialchars($short))?>
                    </p>
                    <a href="microblog-post.php?id=<?=$post['id']?>" style="color:#e67e22;font-weight:700;text-decoration:none;font-size:1.1rem;">
                        Read full story →
                    </a>

                    <div style="margin-top:25px;display:flex;gap:20px;justify-content:flex-end;">
                        <a href="microblog-edit.php?id=<?=$post['id']?>" 
                           style="color:#e67e22;font-weight:700;text-decoration:none;font-size:1.1rem;">
                            Edit Post
                        </a>
                        <a href="microblog-delete.php?id=<?=$post['id']?>" 
                           onclick="return confirm('Are you sure you want to delete this post? It cannot be undone.')"
                           style="color:#e74c3c;font-weight:700;text-decoration:none;font-size:1.1rem;">
                            Delete Post
                        </a>
                    </div>
                </article>
        <?php
            }
        } catch (Exception $e) {
            echo '<p style="color:red;text-align:center;">Error loading posts: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
        ?>
    </div>
</div>

<?php include 'components/footer.php'; ?>