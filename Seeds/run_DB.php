<?php
include 'config.php';
include 'Seeds/ActivitiesSeeder.php';
include 'Seeds/UsersSeeder.php';

$DB->create_tables();
echo "\e[0;32mTables successfully created\e[0m\n";