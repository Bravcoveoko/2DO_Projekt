<?php

include '..\config.php';


/**
 * Set activity with given id to trashed state
 */

$DB->trash_activity($_POST['id']);

echo json_encode(['id' => 'Hello']);
