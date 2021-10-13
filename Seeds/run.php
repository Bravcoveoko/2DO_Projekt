<?php
include 'config.php';
include 'Seeds/ActivitiesSeeder.php';
include 'Seeds/UsersSeeder.php';
use Seeds\UsersSeeder;
use Seeds\ActivitiesSeeder;


$DB->delete_activities();
$DB->delete_users();
$DB->alter_users();
$DB->alter_activities();

echo "\e[0;32mData successfully deleted\e[0m\n";
echo "==========================================\n";
echo "done\n";
UsersSeeder::run();
ActivitiesSeeder::run();