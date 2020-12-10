<?php

include 'config.php';

$id = $_COOKIE['userID'];

$getDate = $_POST['date'];

// Regex to get date, month and year
$re = "/([0-9]{2}).([0-9]{2}).([0-9]{4})/";

preg_match_all($re, $getDate, $info);

$newDate = "" . $info[3][0] . "-". $info[2][0] . "-" . $info[1][0];

$_GET['trashDate'] = $newDate;


if (empty($conn)) {
    echo 'nieco';
    return;
}

$sqlGetAllAct = "SELECT * FROM activities WHERE user_id='" . mysqli_real_escape_string($conn, $id) ."' 
                    AND created_at='" . mysqli_real_escape_string($conn, $newDate) ."'AND is_trashed=0";

$res = mysqli_query($conn, $sqlGetAllAct);

$rows = array();
while($row = $res->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);