<?php

// DONE

require 'config.php';
include(ROOT_PATH . '\classes\Checker.php');
include(ROOT_PATH . '\classes\Authentication.php');

use classes\Checker;
use classes\Routing;
use classes\Error;
use classes\Authentication;


/**
 * Register user. Username and password have to pass all check function. After success cookies are set
 */

if ( isset($_POST['register_btn']) ) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    $checker = new Checker($username, $email, $password, $password2);

    $checker->check_username();
    $checker->check_email_form();
    $checker->check_password();
    $checker->check_passwords_match();

    $DB->is_connected('register');

    // Check if username exists
    if ( $DB->get_user_by_username($username) ) {
        Routing::redirect('register', Error::ERR_REGISTER_USERNAME_EXISTS);
        exit();
    }

    // Check if email exists
    if ( $DB->get_user_by_email($email) ) {
        Routing::redirect('register', Error::ERR_REGISTER_EMAIL_EXISTS);
        exit();
    }

    // Insert user
    if ( !$DB->insert_user($username, $email, $password) ) {
        Routing::redirect('register', Error::ERR_REGISTER_UNKNOWN);
        exit();
    }

    $user = $DB->get_user_by_username($username);
    Authentication::clear_session();
    Authentication::set_session($user->userName, $user->id);
    Routing::redirect('board');

}



