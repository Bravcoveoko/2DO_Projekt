<?php

include 'config.php';

/**
 * Update x and y coordinates of activity with given id
 */


$id = $_POST['id'];
$xPos = $_POST['xPos'];
$yPos = $_POST['yPos'];

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlActivityUpdate = "UPDATE activities SET x_position = :xPos, y_position = :yPos WHERE id = :ActID";
$statement = $conn->prepare($sqlActivityUpdate);
$statement->execute(['xPos' => $xPos, 'yPos' => $yPos, 'ActID' => $id]);

echo json_encode(['id' => 'Ahoj']);