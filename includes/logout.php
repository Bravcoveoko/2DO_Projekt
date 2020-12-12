<?php

include 'config.php';

/**
 * Log out user and set cookies to null
 */

setcookie('userName', null, -1, '/');


if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

// Remove all notes which are in trash
$sql = "DELETE FROM activities WHERE is_trashed=1";

$res = mysqli_query($conn, $sql);

header("Location: ../index.php");