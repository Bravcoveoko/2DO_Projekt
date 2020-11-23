<?php

require 'config.php';

if (isset($_POST['register_btn'])) {
    echo 'SUAHSASHUAHSUHAUSHUAH';
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    // Check password
    if (strcmp($password, $password2) != 0)  {
        echo 'passwod';
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bad email';
        return;
    }


    // Check duplicate users

    $sql = "SELECT * FROM users WHERE userName='$username'";

    if (empty($conn)) {
        echo 'nieco';
        return;
    }

    $result = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($result);

    // Duplicate username
    if ($row > 0) {
        echo 'duplicate user';
        return;
    }

    $date = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO users ( userName, email, password, created_at)
                VALUES ('".$_POST["username"]."', '".$_POST['email']." ', '".$_POST["password1"]."', '$date')";

    $res = mysqli_query($conn, $sqlInsert);

    $sqlGetPerson = "SELECT * FROM users WHERE userName ='$username'";



    if ($res) {

        $result = mysqli_query($conn, $sqlGetPerson);
        $person = mysqli_fetch_assoc($result);

        setcookie('userName', null, -1, '/');
        setcookie('userName', $username,  time() + 3600, '/');
        setcookie('userID', $person['id'], time() + 3600, '/');
        header("Location: ../index.php");
    }else {
        echo 'ee';
    }

}



