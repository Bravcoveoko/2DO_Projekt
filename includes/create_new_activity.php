<?php

include 'config.php';

/**
 * Create new activity to DB and return ID
 */

$user_id = $_COOKIE['userID'];

$getDate = $_POST['date'];

$newDate = date("Y-m-d", strtotime($getDate));

if ( empty($conn) ) {
    header("Location: ../index.php");
    exit();
}

//$sqlInsert = "INSERT INTO activities ( user_id, x_position, y_position, color, content, created_at, is_trashed, is_important)
//                VALUES ('$user_id', 100, 100, '#bec32f', 'New note', '$newDate', 0, 0)";

$sqlInsertActivity = 'INSERT INTO activities (user_id, x_position, y_position, color, content, created_at, is_trashed, is_important) VALUES (:userID, :xPos, :yPos, :color, :content, :created_at, :trashed, :important)';

$statement = $conn->prepare($sqlInsertActivity);
$statement->execute(['userID' => $user_id, 'xPod' => 100, 'yPos' => 100, 'color' => 'bec32f', 'content' => 'New note', 'created_at' => $newDate, 'trashed' => 0, 'important' => 0]);
$result = $statement->fetch();

if ( !$result ) {
    header("Location: ../index.php");
    exit();
}

//$sqlGetLatestAct = "SELECT * FROM activities WHERE user_id = " . $_COOKIE['userID'] . " ORDER BY id DESC LIMIT 1";

$sqlGetLatestAct = 'SELECT * FROM activities WHERE user_id = :userID ORDER BY id DESC LIMIT 1';
$statement = $conn->prepare($sqlGetLatestAct);
$statement->execute(['user_id' => $user_id]);
$result = $statement->fetch();

echo $result;



//$res = mysqli_query($conn, $sqlInsert);
//
//$actResult = mysqli_query($conn, $sqlGetLatestAct);
//
//$activity = mysqli_fetch_assoc($actResult);

echo json_encode(['id' => $result->id]);



