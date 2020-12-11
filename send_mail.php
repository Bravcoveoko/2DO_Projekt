<?php

require 'includes/config.php';


$currentUser = $_COOKIE['userID'];
$date = date('Y-m-d');


$sql = "SELECT * FROM activities INNER JOIN users ON users.id = activities.user_id WHERE is_important = 1 AND is_trashed = 0 AND created_at = '$date' AND user_id = '$currentUser'";

echo $date . "<br>";
echo $currentUser;

