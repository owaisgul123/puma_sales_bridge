<?php
// session_start();
?>

<?php

session_start();

// Check if the session variable is set (change 'user' to your session variable name)
if (isset($_SESSION['user_id'])) {
    // Session is set, display the page
    // echo "Welcome to the secure page!";
} else {
    // Session is not set, redirect to index.php or another page
    header("Location: index.php");
    exit(); // Ensure script execution stops after the redirect
}

?>