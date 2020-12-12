<?php

/*
 * Check length of given password or username.
 * More than 5 characters
 */

function checkLengthLess($data) {
    return (strlen($data) >= 6);
}

/*
 * Less than 33 characters
 */

function checkLengthMore($data) {
    return (strlen($data) <= 32);
}

/*
 * If given username or password start with letter
 */

function checkFirstLetter($data) {
    return preg_match('/\b[A-Za-z]/', $data);
}

/*
 * If given username or password contain at least one number
 */

function checkNumbers($data) {
    return preg_match('/[0-9]/', $data);
}
