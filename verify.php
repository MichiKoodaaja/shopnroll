<?php
require_once 'DB.php';

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    $stmt = DB::run("SELECT * FROM users WHERE email = ? AND verification_code = ?", [$email, $code]);

    if ($stmt->rowCount() == 1) {
        DB::run("UPDATE users SET is_verified = 1 WHERE email = ?", [$email]);
        echo "Your email has been verified! You can now log in.";
    } else {
        echo "Invalid verification link or email already verified.";
    }
}
?>
