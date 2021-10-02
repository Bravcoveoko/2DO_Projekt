<?php

// DONE

include 'config.php';
include(ROOT_PATH . '\classes\Authentication.php');
include(ROOT_PATH . '\classes\Routing.php');

use classes\Authentication;
use classes\Routing;

Authentication::clear_session();
Routing::redirect('login');
