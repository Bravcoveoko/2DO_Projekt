<?php

include 'config.php';

$id = $_POST['id'];


if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlRemove = "UPDATE activities SET is_trashed = 1 WHERE id = " . mysqli_real_escape_string($conn, $id);

$res = mysqli_query($conn, $sqlRemove);

echo json_encode(['id' => 'Hello']);
