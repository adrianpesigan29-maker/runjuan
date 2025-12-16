<?php
session_start(); // Start session first
include 'config.php';
include 'includes/messages.php'; // ← THIS LINE WAS MISSING!

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    setMessage('error', 'Invalid post ID');
    header("Location: microblog-list.php");
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM micro_posts WHERE id = ?");
    $stmt->execute([$id]);
    
    setMessage('success', 'Post deleted successfully!');
} catch (Exception $e) {
    setMessage('error', 'Error deleting post: ' . $e->getMessage());
}

header("Location: microblog-list.php");
exit;
?>