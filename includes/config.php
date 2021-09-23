<?php

/**
 * Connection to DB
 *
 * !!! DONT FORGET TO RENAME DB, USERNAME AND PASSWORD !!!!
 * Using PDO for safer work and avoid SQL injection
 */

$conn = null;
try {

    $conn = new PDO('mysql:host=localhost;dbname=2do_projekt', "root", "");
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

session_start();

