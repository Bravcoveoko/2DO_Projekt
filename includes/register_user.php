<?php

require 'config.php';
require 'checkers.php';

if (isset($_POST['register_btn'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    //hhh@gmail.com

    // If username is more than 5 characters
    if ( !checkLengthLess($username) ) {
        header("Location: ../registration.php?error=Username+has+to+be+more+than+5+characters+long");
        exit();
    }

    // Less than 33 characters
    if ( !checkLengthMore($username) ) {
        header("Location: ../registration.php?error=Username+has+to+be+less+than+33+characters+long");
        exit();
    }

    // Check if username starts with letter
    if ( !checkFirstLetter($username) ) {
        header("Location: ../registration.php?error=Username+has+to+start+with+letter");
        exit();
    }

    // Check if username contains number
    if ( !checkNumbers($username )) {
        header("Location: ../registration.php?error=Username+has+to+contains+at+least+one+number");
        exit();
    }

    // Check email
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        header("Location: ../registration.php?error=Email+is+not+in+right+form");
        exit();
    }

    // ************** Password check **********************

    if ( !checkLengthLess($password) ) {
        header("Location: ../registration.php?error=Password+must+be+at+lest+8+characters+long");
        exit();
    }

    if ( !checkLengthMore($password) ) {
        header("Location: ../registration.php?error=Password+must+be+less+than+33+character");
        exit();
    }

    if ( !checkNumbers($password) ) {
        header("Location: ../registration.php?error=Password+must+contains+at+least+one+number");
        exit();
    }

    // Check password
    if ( strcmp($password, $password2) != 0 )  {
        header("Location: ../registration.php?error=Passwords+do+not+match");
        exit();
    }


    // Check duplicate users
    if ( empty($conn) ) {
        header("Location: ../registration.php?error=Something+wrong+with+database");
        exit();
    }

    $sqlUserName = "SELECT * FROM users WHERE userName='" . mysqli_real_escape_string($conn, $username) . "'";


    $result = mysqli_query($conn, $sqlUserName);

    $row = mysqli_num_rows($result);

    // Duplicate username
    if ($row > 0) {
        header("Location: ../registration.php?error=Username+already+exists");
        exit();
    }

    $sqlEmail = "SELECT * FROM users WHERE email='" . mysqli_real_escape_string($conn, $email) . "'";

    $result = mysqli_query($conn, $sqlEmail);

    $row = mysqli_num_rows($result);

    // Email duplicate
    if ($row > 0) {
        header("Location: ../registration.php?error=Email+is+already+taken");
        exit();
    }

    $date = date('Y-m-d H:i:s');

    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

    $sqlInsert = "INSERT INTO users ( userName, email, password, created_at)
                VALUES ('". mysqli_real_escape_string($conn, $username) ."', '". mysqli_real_escape_string($conn, $email) ." ', '". $hashedPassword ."', '$date')";

    $res = mysqli_query($conn, $sqlInsert);

    $sqlGetPerson = "SELECT * FROM users WHERE userName ='$username'";



    if ($res) {

        $result = mysqli_query($conn, $sqlGetPerson);
        $person = mysqli_fetch_assoc($result);

        setcookie('userName', null, -1, '/');
        setcookie('userName', $username,  time() + 3600, '/');
        setcookie('userID', $person['id'], time() + 3600, '/');
        header("Location: ../activity_board.php");
    }else {
        header("Location: ../registration.php?error=No+user+was+inserted");
        exit();
    }

}



