<?php

include '..\config.php';

/**
 * Get all activities from DB for given date a user
 */


$res = $DB->setup_activities($_POST['date']);

$rows = array();
foreach ($res as $item) {
    $rows[] = $item;
}

echo json_encode($rows);