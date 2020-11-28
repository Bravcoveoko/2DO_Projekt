<?php

include 'config.php';

$id = $_POST['id'];

$sqlRemove = "DELETE FROM activities WHERE id='$id'";

if (empty($conn)) {
    echo 'nieco';
    return;
}

$res = mysqli_query($conn, $sqlRemove);

echo json_encode(['id' => 'Hello']);
