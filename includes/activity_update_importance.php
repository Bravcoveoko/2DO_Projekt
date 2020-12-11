<?php

include 'config.php';

$id = $_POST['id'];
$value = ($_POST['value'] == 'true') ? 1 : 0;


if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlRemove = "UPDATE activities SET is_important = '$value' WHERE id = " . mysqli_real_escape_string($conn, $id);

$res = mysqli_query($conn, $sqlRemove);

echo json_encode(['id' => 'Hello']);
