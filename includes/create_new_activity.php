<?php

// DONE

use classes\Routing;
include_once(ROOT_PATH . '\classes\Error.php');
use classes\Error;

include 'config.php';

/**
 * Create new activity to DB and return ID
 */

//if ( empty($conn) ) {
//    header("Location: ../index.php");
//    exit();
//}

echo $_SERVER['SERVER_NAME'];
exit();

$DB->is_connected('index');

if ( !$DB->insert_activity($_POST['date']) ) {
    Routing::redirect('login', Error::ERR_DB_ISSUE);
    exit();
}



if ( !$check ) {
    header("Location: ../index.php");
    exit();
}

$sqlGetLatestAct = 'SELECT * FROM activities WHERE user_id = :userID ORDER BY id DESC LIMIT 1';
$statement = $conn->prepare($sqlGetLatestAct);
$statement->execute(['userID' => $user_id]);
$result = $statement->fetch();


echo json_encode(['id' => $result->id]);



