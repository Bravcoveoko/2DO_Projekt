<?php

include 'config.php';

/**
 * Update color of activity with given id
 */

$id = $_POST['id'];
$color = $_POST['color'];

if ( empty($conn) ) {
    header("Location: ../index.php");
    return;
}

$sqlActivityUpdate = "UPDATE activities SET color = :color WHERE id = :actID";
$statement = $conn->prepare($sqlActivityUpdate);
$statement->execute(['color' => $color, 'actID' => $id]);

echo json_encode(['id' => 'daco']);