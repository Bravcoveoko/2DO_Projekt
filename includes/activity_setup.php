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

$sqlGetAllAct = "SELECT * FROM activities WHERE user_id='" . mysqli_real_escape_string($conn, $id) ."'
                    AND created_at='" . mysqli_real_escape_string($conn, $newDate) ."'AND is_trashed=0";

$res = mysqli_query($conn, $sqlGetAllAct);

// Fetch them together and send back

$rows = array();
while($row = $res->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);