
<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
$is_logged_in = isset($_SESSION['user_id']);

if ($is_logged_in): ?>
    <div class="welcome-message">
        <h4>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h4>
        <p><a href="logout.php" class="button">Logout</a></p>
    </div>
<?php endif; ?>
