<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
$is_logged_in = isset($_SESSION['user_id']);

// Kovakoodatut DIY-käsityöt
$crafts = [
    ['id' => 1, 'title' => 'Handmade Sticky Notes', 'file' => 'craft1.php'],
    ['id' => 2, 'title' => 'DIY Stickers', 'file' => 'craft2.php'],
    ['id' => 3, 'title' => 'Daily Planner', 'file' => 'craft3.php'],
    ['id' => 4, 'title' => 'Coloring Pages', 'file' => 'craft4.php'],
];
?>

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
<body>
    <!-- Header -->
    <header class="header">
        <img src="images/rollbarbs.jpg" alt="Description of the image" style="width: 50%;">
        <div class="title">
            <h1>SHOPnROLL</h1>
        </div>

        <?php if ($is_logged_in): ?>
        <div class="welcome-message">
            <h4>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p><a href="logout.php" class="button">Logout</a></p>
        </div>
        <?php endif; ?>
    </header>

    <!-- Navbar -->
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="crafts.php">Crafts</a>
        <a href="subs.php">Subscribe</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <div class="left-column">
            <h1>Welcome to Our DIY Crafts Site!</h1>

            <div class="right-column">
                <h2>PRINTABLES</h2>
                <ul>
                    <?php foreach ($crafts as $craft): ?>
                        <li>
                            <?php if ($is_logged_in): ?>
                                <a href="<?= htmlspecialchars($craft['file']) ?>"><?= htmlspecialchars($craft['title']) ?></a>
                            <?php else: ?>
                                <?= htmlspecialchars($craft['title']) ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php if (!$is_logged_in): ?>
            <p><a href="login.php" class="button">Login</a> <a href="register.php" class="button">Register</a> <a href="subs.php" class="button">Subscribe to our Newsletter</a> to access exclusive content listed above!</p>
        <?php endif; ?>
    </div><br>

    <!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge"> 
<a href="https://www.youtube.com/@Recentlyhilarious" class="fab fa-youtube w3-hover-opacity" style="text-decoration: none;"></a>
<a href="https://www.instagram.com/recentlyhilarious" class="fab fa-instagram w3-hover-opacity" style="text-decoration: none;"></a>

  <p class="w3-medium">Powered by <a href="https://www.instagram.com/recentlyhilarious" target="_blank" 
  class="w3-hover-text-purple" style="text-decoration: none;">Recentlyhilarious</a></p>
</footer>

</body>
</html>
