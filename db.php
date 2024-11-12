<?php
$host = 'localhost';  // Database host (e.g., localhost)
$dbname = 'email_tracker';  // Database name
$username = 'root';  // Database username (usually 'root' for local development)
$password = '';  // Database password (set this according to your configuration)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

