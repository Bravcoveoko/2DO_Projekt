<?php
include 'config.php';
include 'Seeds/ActivitiesSeeder.php';
include 'Seeds/UsersSeeder.php';
use Seeds\UsersSeeder;
use Seeds\ActivitiesSeeder;

UsersSeeder::run();
ActivitiesSeeder::run();