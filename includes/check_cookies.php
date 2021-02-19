<?php

if( !isset($_COOKIE['userName']) || !isset($_COOKIE['userID'])) {
    echo 'No user is loged in';
    header("Location: index.php?");
    exit;
}
