<?php
$object = new stdClass();
$object->message = 'Ahoj ' . $_REQUEST['userName'];
$json = json_encode($object);

echo json_encode(['id' => 'ahoj']);
