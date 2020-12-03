<?php

function checkLengthLess($data) {
    return (strlen($data) >= 6);
}

function checkLengthMore($data) {
    return (strlen($data) <= 32);
}

function checkFirstLetter($data) {
    return preg_match('/\b[A-Za-z]/', $data);
}

function checkNumbers($data) {
    return preg_match('/[0-9]/', $data);
}
