<?php

include 'config.php';

use classes\Authentication;
use classes\Routing;

Authentication::clear_session();
Routing::redirect('login');
