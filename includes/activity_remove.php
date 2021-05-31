<?php

include 'config.php';


/**
 * Set activity with given id to trashed state
 */


$id = $_POST['id'];

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlRemove = "UPDATE activities SET is_trashed = 1 WHERE id = :actID";
$statement = $conn->prepare($sqlRemove);
$statement->execute(['actID' => $id]);

echo json_encode(['id' => 'Hello']);
