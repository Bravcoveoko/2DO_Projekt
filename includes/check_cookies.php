<?php
// Redirect to main page
if( !isset($_COOKIE['userName']) || !isset($_COOKIE['userID'])) {
    echo 'No user is loged in';
    header("Location: index.php?error=noUser");
    exit;
}
