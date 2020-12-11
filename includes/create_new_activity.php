<?php

include 'config.php';

$user_id = $_COOKIE['userID'];

$getDate = $_POST['date'];

// Regex to get date, month and year
$re = "/([0-9]{2}).([0-9]{2}).([0-9]{4})/";

preg_match_all($re, $getDate, $info);

$newDate = "" . $info[3][0] . $info[2][0] . $info[1][0];


$sqlInsert = "INSERT INTO activities ( user_id, x_position, y_position, color, content, created_at, is_trashed, is_important)
                VALUES ('$user_id', 100, 100, '#bec32f', 'New note', '$newDate', 0, 0)";

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$sqlGetLatestAct = "SELECT * FROM activities WHERE user_id = " . $_COOKIE['userID'] . " ORDER BY id DESC LIMIT 1";


$res = mysqli_query($conn, $sqlInsert);

$actResult = mysqli_query($conn, $sqlGetLatestAct);

$activity = mysqli_fetch_assoc($actResult);

echo json_encode(['id' => $activity['id']]);



