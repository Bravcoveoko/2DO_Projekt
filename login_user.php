<?php

include 'config.php';
include_once(ROOT_PATH . "\classes\DB.php");
include_once(ROOT_PATH . "\classes\Routing.php");

use classes\Routing;
use classes\Error;
use classes\Authentication;
/**
 * Log in user and set cookies
 */

if ( isset($_POST['login_btn']) ) {

    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $DB->is_connected('login');
    $result = $DB->get_user_by_username($username);

    if ( $result ) {

        if ( !password_verify($password, $result->password) ) {
            Routing::redirect('login', Error::ERR_LOGIN_PASS);
            exit();
        }

        Authentication::set_session($username, $result->id);
        Routing::redirect('board');

    }else {
        Routing::redirect('login', Error::ERR_LOGIN_PASS);
        exit();
    }

}
