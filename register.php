<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIY Crafts</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
require_once 'DB.php';

// Tarkista, onko käyttäjä kirjautunut sisään
$is_logged_in = isset($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = md5(uniqid(rand(), true));

    $stmt = DB::run("INSERT INTO users (username, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)", [$username, $email, $password, $verification_code]);

    // Sähköpostin lähetys
    $to = $email;
    $subject = "Verify Your Email Address";
    $message = "Please click the link below to verify your email address:\n";
    $message .= "https://neutroni.hayo.fi/~mhopkins/newsletter/verify.php?email=" . $email . "&code=" . $verification_code;
    $headers = "From: noreply@neutroni.hayo.fi";

    mail($to, $subject, $message, $headers);

    echo "Registration successful! A verification email has been sent to your email address.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<?php include 'welcome-message.php'; ?>

    <!-- Navbar -->
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="crafts.php">Crafts</a>
        <a href="subs.php">Subscribe</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
    
    <?php if ($is_logged_in): ?>
        <div class="welcome-message">
            <h4>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p><a href="logout.php" class="button">Logout</a></p>
        </div>
        <?php endif; ?>

    <h2>Register</h2>
    <form action="register.php" method="post">
        <p><input type="text" name="username" placeholder="Username" required></p>
        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <p><button type="submit">Register</button></p>
    </form>
    <!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge"> 
<a href="https://www.youtube.com/@Recentlyhilarious" class="fab fa-youtube w3-hover-opacity" style="text-decoration: none;"></a>
<a href="https://www.instagram.com/recentlyhilarious" class="fab fa-instagram w3-hover-opacity" style="text-decoration: none;"></a>

  <p class="w3-medium">Powered by <a href="https://www.instagram.com/recentlyhilarious" target="_blank" 
  class="w3-hover-text-purple" style="text-decoration: none;">Recentlyhilarious</a></p>
</footer>
</body>
</html>
