<?php

include 'config.php';

/**
 * Get all activities from DB for given date a user
 */

$id = $_COOKIE['userID'];
$getDate = $_POST['date'];

$newDate = date("Y-m-d", strtotime($getDate));

if (empty($conn)) {
    header("Location: ../index.php?error=setup");
    return;
}

$sqlGetAllAct = "SELECT * FROM activities WHERE user_id = :userID
                    AND created_at = :createdAt AND is_trashed = 0";

$statement = $conn->prepare($sqlGetAllAct);
$statement->execute(['userID' => $id, 'createdAt' => $newDate]);
$res = $statement->fetchAll(PDO::FETCH_ASSOC);

// Put all activities in array
$rows = array();
foreach ($res as $item) {
    $rows[] = $item;
}

echo json_encode($rows);