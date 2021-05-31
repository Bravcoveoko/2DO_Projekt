<?php

include 'config.php';

/**
 * Remove activity from DB with given id
 */

$id = $_POST['id'];


if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlRemove = "DELETE FROM activities WHERE id = :actID";
$statement = $conn->prepare($sqlRemove);
$statement->execute(['actID' => $id]);

echo json_encode(['id' => 'Hello']);
