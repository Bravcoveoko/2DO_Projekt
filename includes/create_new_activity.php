<?php

// DONE

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


$sqlInsertActivity = 'INSERT INTO activities (user_id, x_position, y_position, color, content, created_at, is_trashed, is_important) VALUES (:userID, :xPos, :yPos, :color, :content, :created_at, :trashed, :important)';

$statement = $conn->prepare($sqlInsertActivity);
$check = $statement->execute(['userID' => $user_id, 'xPos' => 100, 'yPos' => 100, 'color' => '#bec32f', 'content' => 'New note', 'created_at' => $newDate, 'trashed' => 0, 'important' => 0]);

if ( !$check ) {
    header("Location: ../index.php");
    exit();
}

$sqlGetLatestAct = 'SELECT * FROM activities WHERE user_id = :userID ORDER BY id DESC LIMIT 1';
$statement = $conn->prepare($sqlGetLatestAct);
$statement->execute(['userID' => $user_id]);
$result = $statement->fetch();


echo json_encode(['id' => $result->id]);



