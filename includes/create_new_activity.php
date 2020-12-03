<?php

include 'config.php';

//echo json_encode(['id' => 'nieco']);
$user_id = $_COOKIE['userID'];

$date = date('Y-m-d H:i:s');



$sqlInsert = "INSERT INTO activities ( user_id, x_position, y_position, color, content, created_at, is_important)
                VALUES ('$user_id', 100, 100, '#bec32f', 'New note', '$date', 0)";

if (empty($conn)) {
    echo 'nieco';
    return;
}

$sqlGetLatestAct = "SELECT * FROM activities WHERE user_id = " . $_COOKIE['userID'] . " ORDER BY created_at DESC LIMIT 1";


$res = mysqli_query($conn, $sqlInsert);



//if ($res) {
//    echo 'novy zaznam v aktivity';
//}else {
//    echo 'ee';
//}

$actResult = mysqli_query($conn, $sqlGetLatestAct);

$activity = mysqli_fetch_assoc($actResult);

//echo $activity['id'];

echo json_encode(['id' => $activity['id']]);



