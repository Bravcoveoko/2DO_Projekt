<?php
include 'config.php';
include 'Seeds/ActivitiesSeeder.php';
include 'Seeds/UsersSeeder.php';

echo "\e[0;32mDatabase successfully created\e[0m\n";
echo "\e[0;34mAll tables will be deleted and recreated again. Do you want to continue ? (Yes / No): \e[0m";

$handle = fopen ("php://stdin","r");
$line = fgets($handle);

if(in_array(trim($line), ['Yes', 'Y', 'y', 'yes'])){
    $DB->delete_tables();
    echo "\e[0;31mTables successfully deleted\e[0m\n";
    $DB->create_tables();
    echo "\e[0;32mTables successfully created\e[0m\n";
} else {
    echo "\e[0;31mČo je veľa to je málo\e[0m\n";
    exit;
}
fclose($handle);
