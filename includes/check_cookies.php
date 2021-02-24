<?php
// Redirect to main page
if( !isset($_COOKIE['userName']) || !isset($_COOKIE['userID']) ) {
    header("Location: index.php?error=noUser");
    exit;
}
