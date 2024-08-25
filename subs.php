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
<?php include 'welcome-message.php'; ?>

<div class="navbar">
        <a href="index.php">Home</a>
        <a href="crafts.php">Crafts</a>
        <a href="subs.php">Subscribe</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

<h2>Subscribe to our Newsletter</h2>
<p>To get more personal content about us</p>
<p>Behind the scenes</p>
<p>More items, tips and how to do's</p>
            <form action="subscribe.php" method="post" class="form-container">
                <p><input type="text" name="name" placeholder="Your Name" required></p>
                <p><input type="email" name="email" placeholder="Your Email" required></p>
                <p><button type="submit">Subscribe</button></p>
            </form>
        </div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge"> 
<a href="https://www.youtube.com/@Recentlyhilarious" class="fab fa-youtube w3-hover-opacity" style="text-decoration: none;"></a>
<a href="https://www.instagram.com/recentlyhilarious" class="fab fa-instagram w3-hover-opacity" style="text-decoration: none;"></a>

  <p class="w3-medium">Powered by <a href="https://www.instagram.com/recentlyhilarious" target="_blank" 
  class="w3-hover-text-purple" style="text-decoration: none;">Recentlyhilarious</a></p>
</footer>

        </body>
</html>