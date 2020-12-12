<?php

require 'includes/config.php';

/**
 * Email simulation. This script should be run by CRON job on web
 */

$currentUser = $_COOKIE['userID'];
$date = date('Y-m-d');

if (empty($conn)) {
    header("Location: index.php");
    return;
}

$sql = "SELECT * FROM activities INNER JOIN users ON users.id = activities.user_id WHERE is_important = 1 AND is_trashed =0 AND activities.created_at='$date' AND user_id = '$currentUser'";

$result = mysqli_query($conn, $sql);

$activities = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($activities as $activity) {

    $message = "You have got important note for today: " . $activity['content'];

    $msg = wordwrap($message,70);

    mail("" . $activity['email'],"Important note",$msg);

    sleep(2);

}
// Redirect to activity board page
header("Location: activity_board.php");

