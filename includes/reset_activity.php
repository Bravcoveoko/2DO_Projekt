<?php

include '..\config.php';

/**
 * Activity with given id is no more in status trashed.
 */

$DB->reset_activity($_POST['id']);