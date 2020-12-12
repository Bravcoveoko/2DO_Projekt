<?php

include 'config.php';

/**
 * Update content of activity with given id.
 */


$id = $_POST['id'];
$content = $_POST['content'];

$sqlActivityUpdate = "UPDATE activities SET content = '$content' WHERE id = '$id'";

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$res = mysqli_query($conn, $sqlActivityUpdate);

echo json_encode(['id' => 'Hello']);
