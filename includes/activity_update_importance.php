<?php

include 'config.php';

/**
 * Update importance of activity with given id
 */


$id = $_POST['id'];
$value = ($_POST['value'] == 'true') ? 1 : 0;


if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlUpdateImportance = "UPDATE activities SET is_important = :val WHERE id = :actID";
$statement = $conn->prepare($sqlUpdateImportance);
$statement->execute(['val' => $value, 'actID' => $id]);

echo json_encode(['id' => 'Hello']);
