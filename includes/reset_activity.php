<?php

include 'config.php';

$id = $_POST['id'];

if ( empty($conn) ) {
    header("Location: ../index.php");
    return;
}

$sql = "UPDATE activities SET is_trashed = 0 WHERE id = " . mysqli_real_escape_string($conn, $id);

$res = mysqli_query($conn, $sql);