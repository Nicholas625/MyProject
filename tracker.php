<?php
// Include the database connection
include('db.php');

// Fetch tracked emails from the database
try {
    $stmt = $pdo->query("SELECT * FROM emails ORDER BY sent_at DESC");
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Email Tracker - Tracked Emails</title>
</head>
<body>
    <h1>Email Tracker System</h1>
    <h2>Tracked Emails</h2>
    <table class="table">
        <tr>
            <th>Recipient</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Sent At</th>
        </tr>
        <?php foreach ($emails as $email): ?>
        <tr>
            <td><?php echo htmlspecialchars($email['recipient']); ?></td>
            <td><?php echo htmlspecialchars($email['subject']); ?></td>
            <td><?php echo htmlspecialchars($email['status']); ?></td>
            <td><?php echo htmlspecialchars($email['sent_at']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Send Another Email</a>
</body>
</html>

