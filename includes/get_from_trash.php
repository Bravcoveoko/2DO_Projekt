<?php

//include 'config.php';

if (empty($conn)) {
    echo 'nieco';
    return;
}

$newDate = date("Y-m-d", strtotime($_GET['date']));


$sql = "SELECT * FROM activities WHERE user_id=" . $_COOKIE['userID'] . " AND is_trashed=1 AND created_at='$newDate'";

$result = mysqli_query($conn, $sql);

$activitiesInTrash = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r($activitiesInTrash);



//echo 'Pocet: ' . count($activitiesInTrash);