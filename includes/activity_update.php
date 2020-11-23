<?php
$object = new stdClass();
$object->message = 'Ahoj ' . $_REQUEST['userName'];
$json = json_encode($object);
//header('Content-type: application/json');
echo json_encode(['id' => 'ahoj']);
