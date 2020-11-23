<?php

session_start();

$conn = new mysqli("localhost", "root", "", "2do_projekt");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo 'done';
