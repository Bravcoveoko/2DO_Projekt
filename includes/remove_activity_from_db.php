<?php

include '..\config.php';

/**
 * Remove activity from DB with given id
 */

$DB->remove_activity($_POST['id']);

echo json_encode(['id' => 'Hello']);
