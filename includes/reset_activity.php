<?php

include 'config.php';

/**
 * Activity with given id is no more in status trashed.
 */

$id = $_POST['id'];

if ( empty($conn) ) {
    header("Location: ../index.php");
    return;
}

$sqlResetActivity = "UPDATE activities SET is_trashed = 0 WHERE id = :actID";

$statement = $conn->prepare($sqlResetActivity);
$statement->execute(['actID' => $id]);