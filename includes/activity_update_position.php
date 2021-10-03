<?php

include '..\config.php';

/**
 * Update x and y coordinates of activity with given id
 */

$DB->update_position_activity($_POST['xPos'], $_POST['yPos'], $_POST['id']);

echo json_encode(['id' => 'Ahoj']);