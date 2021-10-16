<?php
define('ROOT_PATH', __DIR__);
include(ROOT_PATH . '\classes\DB.php');
include(ROOT_PATH . '\classes\Error.php');
use classes\DB;

$DB = new DB();

$DB->start_session();

$DB->alive();

$DB->is_connected('index');
