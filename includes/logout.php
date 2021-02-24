<?php

// DONE

include 'config.php';

/**
 * Log out user and set cookies to null
 */

setcookie('userName', null, -1, '/');


if ( empty($conn) ) {
    header("Location: ../index.php");
    return;
}

$sql = 'DELETE FROM activities WHERE is_trashed = 1';
$statement = $conn->prepare($sql);
$statement->execute();

header("Location: ../index.php");