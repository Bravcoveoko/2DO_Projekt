<?php

include 'config.php';

/**
 * Update content of activity with given id.
 */


$id = $_POST['id'];
$content = $_POST['content'];

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlActivityUpdate = "UPDATE activities SET content = :content WHERE id = :actID";
$statement = $conn->prepare($sqlActivityUpdate);
$statement->execute(['actID' => $id, 'content' => $content]);

echo json_encode(['id' => 'Hello']);
