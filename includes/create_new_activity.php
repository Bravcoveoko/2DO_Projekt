<?php

include 'includes/config.php';

$user_id = $_COOKIE['userID'];

$date = date('Y-m-d H:i:s');



$sqlInsert = "INSERT INTO activities ( user_id, x_position, y_position, color, content, created_at, is_important)
                VALUES ('$user_id', 100, 100, 'ffffff', 'New note', '$date', 0)";

if (empty($conn)) {
    echo 'nieco';
    return;
}


$res = mysqli_query($conn, $sqlInsert);

if ($res) {
    echo 'novy zaznam v aktivity';
}else {
    echo 'ee';
}



