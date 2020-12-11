<?php

include 'config.php';

$id = $_POST['id'];
$color = $_POST['color'];

$sqlActivityUpdate = "UPDATE activities SET color = '$color' WHERE id = '$id'";

if ( empty($conn) ) {
    header("Location: ../index.php");
    return;
}

$res = mysqli_query($conn, $sqlActivityUpdate);

echo $id . " : " . $color;