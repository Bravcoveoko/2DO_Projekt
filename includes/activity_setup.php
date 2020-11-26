<?php

include 'config.php';

$id = $_COOKIE['userID'];

$sqlGetAllAct = "SELECT * FROM activities WHERE user_id = '$id'";

if (empty($conn)) {
    echo 'nieco';
    return;
}

$res = mysqli_query($conn, $sqlGetAllAct);


//while($activity = mysqli_fetch_assoc($res));

$rows = array();
while($row = $res->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);