<?php

include '..\config.php';

/**
 * Update color of activity with given id
 */

$DB->update_color_activity($_POST['color'], $_POST['id']);

echo json_encode(['id' => 'daco']);