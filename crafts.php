<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIY PRINTABLES</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .photo-grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px; /* Adjust spacing between images */
        }
        .photo-grid .photo-item {
            flex: 1 0 33.333%; /* Three images per row */
            padding: 10px 10px; /* Adjust spacing between images */
        }
        .photo-grid img {
            width: 60%;
            height: auto; /* Maintain aspect ratio */
            display: block;
        }
        p {
            color: black;
        }
    </style>
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
    <?php include 'welcome-message.php'; ?>

    <h1>GET YOUR CUTE PRINTABLES NOW</h1>
<p>
Love DIY projects and crafting? My adorable collection is made just for you! I'm thrilled to finally share this with you all.</p>
<p>Click the register button and login today! Support small business and enjoy crafting with unique designs.</p>

<h3>To get all this and more register to activate the links and they are all yours</h3>

<!-- Photo Grid -->
<div class="photo-grid">
    <div class="photo-item"><img src="images/pic1.jpg" alt="Pic 1"></div>
    <div class="photo-item"><img src="images/pic2.jpg" alt="Pic 2"></div>
    <div class="photo-item"><img src="images/pic3.jpg" alt="Pic 3"></div>
    <div class="photo-item"><img src="images/kuva1.jpg" alt="Kuva 1"></div>
    <div class="photo-item"><img src="images/kuva2.jpg" alt="Kuva 2"></div>
    <div class="photo-item"><img src="images/kuva3.jpg" alt="Kuva 3"></div>
    <div class="photo-item"><img src="images/book.jpg" alt="Kuva 1"></div>
    <div class="photo-item"><img src="images/stickers.jpg" alt="Kuva 2"></div>
    <div class="photo-item"><img src="images/party.jpg" alt="Kuva 3"></div>
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