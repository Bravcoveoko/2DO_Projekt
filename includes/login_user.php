<?php

require 'config.php';

$username = '';
$password = '';

if (isset($_POST['login_btn'])) {
    echo 'V LOGIN SOM';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password) || empty($username)) {
        echo 'Zle nieco s prihlasovacimi udajmi';
        die();
    }

    $sql = "SELECT * FROM users WHERE userName='$username' and password='$password'";

    if (empty($conn)) {
        echo 'daco z;e';
        return;
    }

    $result = mysqli_query($conn, $sql);

    // If no user found no cookies is going to be created
    if (!$result) return;

    $person = mysqli_fetch_assoc($result);

    setcookie('userName', $person['userName'],  time() + 3600, '/');
    setcookie('userID', $person['id'], time() + 3600, '/');

    header("Location: ../index.php");
}
