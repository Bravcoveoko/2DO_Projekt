<?php

include '..\config.php';

/**
 * Update content of activity with given id.
 */


$DB->update_content_activity( $_POST['content'], $_POST['id']);

echo json_encode(['success' => 1]);
