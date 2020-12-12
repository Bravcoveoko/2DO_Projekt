<?php

require 'config.php';

/**
 * Log in user and set cookies
 */

$username = '';
$password = '';

if (isset($_POST['login_btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($conn)) {
        header("Location: ../login.php?error=Something+wrong+with+database");
        exit();
    }

    $sql = "SELECT * FROM users WHERE userName='". mysqli_real_escape_string($conn, $username) ."'";

    // SQL injection
//    $sql = "SELECT * FROM users WHERE userName=" . $username;


    $result = mysqli_query($conn, $sql);

    // sql injection
//    mysqli_multi_query($conn, $sql);
//
//    echo $sql;
//
//    do {
//        /* store first result set */
//        if ($res = $conn->store_result()) {
//            while ($row = $res->fetch_row()) {
//                printf("%s\n", $row[0]);
//            }
//            $res->free();
//        }
//        /* print divider */
//        if ($conn->more_results()) {
//            printf("-----------------\n");
//        }
//    } while ($conn->next_result());



    // If user is found cookies are set
    if (mysqli_num_rows($result) == 1) {
        $person = mysqli_fetch_assoc($result);

        if ( !password_verify($password, $person['password']) ) {
            header("Location: ../login.php?error=Invalid+password");
            exit();
        }

        // Set cookies
        setcookie('userName', $person['userName'],  time() + 3600, '/');
        setcookie('userID', $person['id'], time() + 3600, '/');

        header("Location: ../activity_board.php");
    }else {
        header("Location: ../login.php?error=Login+failed");
        exit();
    }

}
