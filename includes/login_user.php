<?php

require 'config.php';

/**
 * Log in user and set cookies
 */

$username = '';
$password = '';

if ( isset($_POST['login_btn']) ) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( empty($conn) ) {
        header("Location: ../login.php?error=Something+wrong+with+database");
        exit();
    }

    $sql = 'SELECT * FROM users WHERE userName = :userName';
    $statement = $conn->prepare($sql);
    $statement->execute(['userName' => $username]);
    $result = $statement->fetch();

    // If user is found cookies are set
    if ( $result ) {

        if ( !password_verify($password, $result->password) ) {
            header("Location: ../login.php?error=Invalid+password");
            exit();
        }

        // Set cookies
        setcookie('userName', $result->userName,  time() + 3600, '/');
        setcookie('userID', $result->id, time() + 3600, '/');

        header("Location: ../activity_board.php");
    }else {
        header("Location: ../login.php?error=Login+failed");
        exit();
    }

}
