<?php
// Database connection settings (change only if needed)
$host = 'localhost';        // usually stays the same
$db   = 'runjuan_db';       // ← this must match the database name you created
$user = 'root';             // default XAMPP/WAMP username
$pass = '';                 // default password is empty (no password)

// Connect to MySQL database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Uncomment the line below to test if it works
    // echo "Database connected successfully!";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>