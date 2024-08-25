<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$confirmationMessage = ""; // Alustetaan muuttuja

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        require_once 'DB.php';

        // Tarkista, onko sähköpostiosoite jo olemassa
        $stmt = DB::run("SELECT COUNT(*) FROM subscribers WHERE email = ?", [$email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // Jos sähköpostiosoite on jo olemassa
            $confirmationMessage = "There was an issue with your subscription: Duplicate entry.";
        } else {
            // Lisää sähköpostiosoite tietokantaan
            $stmt = DB::run("INSERT INTO subscribers (name, email) VALUES (?, ?)", [$name, $email]);

            // Luo peruutuslinkki
            $unsubscribe_link = "https://neutroni.hayo.fi/~mhopkins/newsletter/unsubscribe.php?email=" . urlencode($email);

            // Lähetä sähköpostiviesti monirivisen merkkijonon avulla
            $to = $email;
            $subject = "Thank You for Subscribing!";

            // Monirivinen merkkijono sähköpostiviestiä varten
$message = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Subscribing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #f4f4f4;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
        .unsubscribe {
            margin-top: 20px;
            padding: 10px;
            background: #e74c3c;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Subscribing!</h1>
        </div>
        <div class="content">
            <p>Thank you for subscribing to our weekly newsletter. Expect fun and easy DIY every week on Mondays!</p>

            <h2>About Us</h2>
            <p>Hello, I'm Michelle, a mother who loves crafting and being goofy with my 5-year-old son. My son is my inspiration, and through him, I've rediscovered the joy of creativity and imagination. Together, we’ve spent countless hours laughing, crafting, and exploring new ideas, which led to the creation of Roll the Toilet Paper.</p>

            <p>It all started with a simple roll of toilet paper and a desire to make people smile. My son and I began making funny characters out of toilet paper rolls, sparking a world of creativity that we couldn’t keep to ourselves. From there, Roll has grown into a lovable character and a creative force, inspiring our followers to embrace their silly side while exploring their creative potential.</p>

            <h2>What We Offer</h2>
            <ul>
                <li><strong>Funny & Silly Quotes:</strong> Follow us on Instagram for your daily dose of laughter and light-hearted humor. Our quotes are designed to tickle your funny bone and brighten your day.</li>
                <li><strong>DIY Projects on YouTube:</strong> Join Roll and friends on YouTube as we dive into a world of DIY projects. Whether you’re a seasoned crafter or just getting started, our tutorials are easy to follow and fun to do. From DIY stickers and sticky notes to creative daily planners, we’ve got something for everyone.</li>
                <li><strong>Printables for All:</strong> Explore our collection of printables right here on our website. Whether you need a daily planner to keep your life organized, a mini-book featuring Roll and friends, or some fun coloring pages to unwind, we’ve got you covered.</li>
            </ul>

            <h2>Why Choose Us?</h2>
            <p>At Roll the Toilet Paper, we are more than just a brand; we are a community. We aim to inspire creativity, spread joy, and bring people together through our content. Whether it’s through a silly quote, a fun DIY project, or a helpful printable, we want to make every day a little brighter for you.</p>

            <p>So, roll with us on this journey of laughter and creativity, and let’s make the world a more fun and colorful place, one roll at a time!</p>

            <h2>Stay Connected</h2>
            <p>Don’t forget to follow us on Instagram and subscribe to our YouTube channel for the latest updates, tutorials, and exclusive content. Join the Roll family today, and let’s create something amazing together!</p>

            <div class="unsubscribe">
                <p>If you wish to cancel your subscription, click here: <a href="$unsubscribe_link" style="color: #fff; text-decoration: underline;">Unsubscribe</a></p>
            </div>
        </div>
    </div>
</body>
</html>
EOD;


            $headers = "From: noreply@yourwebsite.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8";

            // Lähetä sähköpostiviesti
            if (mail($to, $subject, $message, $headers)) {
                $confirmationMessage = "Subscription successful! A confirmation email has been sent to your email address.";
            } else {
                $confirmationMessage = "There was an issue sending the confirmation email.";
            }
        }
    } catch (Exception $e) {
        $confirmationMessage = "There was an issue with your subscription: " . htmlspecialchars($e->getMessage());
    }
} else {
    $confirmationMessage = "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

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
        <h1><?= htmlspecialchars($confirmationMessage); ?></h1>
        <p><a href="index.php" class="button">Back to Home</a></p>
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
