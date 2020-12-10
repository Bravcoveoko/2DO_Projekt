<?php

include 'config.php';

setcookie('userName', null, -1, '/');


if (empty($conn)) {
    echo 'nieco';
    return;
}

// Remove all notes which are in trash
$sql = "DELETE FROM activities WHERE is_trashed=1";

$res = mysqli_query($conn, $sql);

header("Location: ../index.php");