<?php

include 'config.php';

$id = $_POST['id'];


if (empty($conn)) {
    echo 'nieco';
    return;
}

//$sqlRemove = "DELETE FROM activities WHERE id='$id'";
$sqlRemove = "DELETE FROM activities WHERE id=" . mysqli_real_escape_string($conn, $id);

$res = mysqli_query($conn, $sqlRemove);

echo json_encode(['id' => 'Hello']);
