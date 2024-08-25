<?php
session_start();

// Poistetaan kaikki sessiomuuttujat
session_unset();

// Tuhotaan sessio
session_destroy();

// Uudelleenohjaus index.php-sivulle
header('Location: index.php');
exit;
?>
