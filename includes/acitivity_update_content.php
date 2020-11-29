<?php

include 'config.php';

$id = $_POST['id'];
$content = $_POST['content'];

//echo $id . " : " . $color;

$sqlActivityUpdate = "UPDATE activities SET content = '$content' WHERE id = '$id'";

if (empty($conn)) {
    echo 'nieco';
    return;
}

$res = mysqli_query($conn, $sqlActivityUpdate);

echo json_encode(['id' => 'Hello']);
