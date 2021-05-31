<?php

/**
 * Get all activities which have trashed status from chosen date
 */

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$newDate = date("Y-m-d", strtotime($_GET['date']));
$userID = $_COOKIE['userID'];


$sqlGetFromTrash = 'SELECT * FROM activities WHERE user_id = :userID AND is_trashed = 1 AND created_at = :createdAt';
$statement = $conn->prepare($sqlGetFromTrash);
$statement->execute(['userID' => $userID, 'createdAt' => $newDate]);
$activitiesInTrash = $statement->fetchAll(PDO::FETCH_ASSOC);

if ( !$activitiesInTrash ) {
    header("Location: ../index.php");
    return;
}

