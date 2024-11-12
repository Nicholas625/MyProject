<?php
// Include the database connection
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Send the email (you may also need to validate and sanitize input)
    $email_sent = mail($recipient, $subject, $message);

    // Prepare email status
    $status = $email_sent ? 'Sent' : 'Failed';

    // Insert email details into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO emails (recipient, subject, message, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$recipient, $subject, $message, $status]);

        // Redirect back to the form with a success or error status
        header("Location: index.php?status=" . ($email_sent ? 'success' : 'error'));
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

