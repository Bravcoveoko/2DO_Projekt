<?php

/**
 * Get all activities which have trashed status
 */

if (empty($conn)) {
    header("Location: ../index.php");
    return;
}

$newDate = date("Y-m-d", strtotime($_GET['date']));


$sql = "SELECT * FROM activities WHERE user_id=" . $_COOKIE['userID'] . " AND is_trashed=1 AND created_at='$newDate'";

$result = mysqli_query($conn, $sql);

$activitiesInTrash = mysqli_fetch_all($result, MYSQLI_ASSOC);
