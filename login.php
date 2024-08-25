<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIY Crafts</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
session_start();
require_once 'DB.php';

// Tarkista, onko käyttäjä kirjautunut sisään
$is_logged_in = isset($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = DB::run("SELECT * FROM users WHERE email = ?", [$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['is_verified']) {
            // Käyttäjä on vahvistettu, aseta sessiot ja uudelleenohjaa etusivulle
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            // Käyttäjä ei ole vahvistanut sähköpostiaan
            $error_message = "Please verify your email before logging in.";
        }
    } else {
        // Virheellinen sähköposti tai salasana
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <h2>Login</h2>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <p><button type="submit">Login</button></p>
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
