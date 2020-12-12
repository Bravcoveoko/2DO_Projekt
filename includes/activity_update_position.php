<?php

include 'config.php';

/**
 * Update x and y coordinates of activity with given id
 */


$id = $_POST['id'];
$xPos = $_POST['xPos'];
$yPos = $_POST['yPos'];

$sqlActivityUpdate = "UPDATE activities SET x_position = '$xPos', y_position = '$yPos' WHERE id = '$id'";

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$res = mysqli_query($conn, $sqlActivityUpdate);


echo json_encode(['id' => 'Ahoj']);