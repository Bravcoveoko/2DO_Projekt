<?php

include 'config.php';

$query = file_get_contents("2do_projekt.sql");

$stmt = $DB->getConn()->prepare($query);

if ($stmt->execute()){
    echo "Success";
}else{
    echo "Fail";
}

echo "\e[0;31;42mMerry Christmas!\e[0m\n";
