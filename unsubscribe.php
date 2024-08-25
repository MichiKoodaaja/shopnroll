<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);

    try {
        // Yhdistä tietokantaan
        require_once 'DB.php';
        $stmt = DB::run("DELETE FROM subscribers WHERE email = ?", [$email]);

        if ($stmt->rowCount()) {
            $message = "You have successfully unsubscribed from our newsletter.";
        } else {
            $message = "Error unsubscribing or email not found.";
        }
    } catch (Exception $e) {
        $message = "Database error: " . htmlspecialchars($e->getMessage());
    }
} else {
    $message = "Error: email address not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="images/rollbarbs.jpg" alt="Header Image">
        <div class="title">
            <h1>DIY Crafts</h1>
        </div>
    </header>

    <!-- Page content -->
    <div class="content">
        <h1><?= htmlspecialchars($message); ?></h1>
        <p><a href="index.php" class="button">Back to Home</a></p>
    </div>
</body>
</html>
