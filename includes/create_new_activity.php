<?php

include '..\config.php';
use classes\Routing;
include_once(ROOT_PATH . '\classes\Error.php');
use classes\Error;
use classes\Authentication;


/**
 * Create new activity to DB and return ID
 */

$new_activity= $DB->insert_activity($_POST['date']);
if ( !$new_activity ) {
    Authentication::clear_session();
    Routing::redirect('login', Error::ERR_DB_ISSUE);
    exit();
}

$new_activity_id = $DB->getConn()->lastInsertId();

echo json_encode(['id' => $new_activity_id]);



