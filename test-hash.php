<?php
$password = "test123"; // Example password
$hashed = password_hash($password, PASSWORD_BCRYPT); // Hash it
echo "Hashed Password: " . $hashed; // Long scrambled string
?>