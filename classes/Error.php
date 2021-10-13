<?php


namespace classes;


class Error {
    const ERR_AUTHENTICATION = 'Please, log in';
    const ERR_REGISTER_USERNAME_NUMBER = 'Username must contains at least 1 number';
    const ERR_REGISTER_USERNAME_LENGTH_MIN = 'Username must be at least 6 characters long';
    const ERR_REGISTER_USERNAME_LENGTH_MAX = 'Username must be less then 30 characters long';
    const ERR_REGISTER_USERNAME_FIRST_LETTER = 'First character of user name has to be alpha';
    const ERR_REGISTER_USERNAME_EXISTS = 'Username already exists';
    const ERR_REGISTER_PASS_NUMBER = 'Password must contains at least 1 number';
    const ERR_REGISTER_PASS_LENGTH_MIN = 'Password must be at least 5 characters long';
    const ERR_REGISTER_PASS_LENGTH_MAX = 'Password must be less then 30 characters long';
    const ERR_REGISTER_PASS_MATCH = 'Passwords do not match';
    const ERR_REGISTER_EMAIL_FORM = 'Email is not in right form';
    const ERR_REGISTER_EMAIL_EXISTS = 'Email is already taken';
    const ERR_REGISTER_UNKNOWN = 'Something wrong with registration';

    const ERR_LOGIN_PASS = 'Incorrect password';
    const ERR_DB_ISSUE = 'Something wrong with database';

    public static function clear_error_session() {
        if (isset($_SESSION)) {
            unset($_SESSION['error']);
            $_SESSION['error'] = null;
        }
    }

}