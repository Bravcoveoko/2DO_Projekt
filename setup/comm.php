<?php
include 'config.php';
include 'setup/ActivitiesSeeder.php';
include 'setup/UsersSeeder.php';
use Seeds\UsersSeeder;
use Seeds\ActivitiesSeeder;

echo "\e[0;34mWhat do you want to do ? \e[0m\n";
echo "\e[0;32mType:\nmigrate-fresh:     Deletes and recreates all tables\nmigrate-seed:      Deletes everything and recreates everything\ndb-seed:           Seeds database with data\ndel-seed:          Deletes all data\ndel-tables:        Deletes data and tables \e[0m\n";

echo "Type command: ";
$handle = fopen ("php://stdin","r");
$command = fgets($handle);

switch (strtolower(trim($command))) {
    case 'migrate-fresh':
        $DB->delete_tables();
        echo "\e[0;31mTables successfully deleted\e[0m\n";
        $DB->create_tables();
        echo "\e[0;32mTables successfully created\e[0m\n";
        break;
    case 'migrate-seed':
        $DB->delete_tables();
        echo "\e[0;31mTables successfully deleted\e[0m\n";
        $DB->create_tables();
        echo "\e[0;32mTables successfully created\e[0m\n";
        UsersSeeder::run();
        ActivitiesSeeder::run();
        break;
    case 'db-seed':
        UsersSeeder::run();
        ActivitiesSeeder::run();
        break;
    case 'del-seed':
        $DB->delete_activities();
        echo "\e[0;32mAll activities successfully deleted\e[0m\n";
        $DB->delete_users();
        echo "\e[0;32mAll users successfully deleted\e[0m\n";
        break;
    case 'del-tables':
        $DB->delete_tables();
        echo "\e[0;31mActivities table successfully deleted\e[0m\n";
        echo "\e[0;31mUsers table successfully deleted\e[0m\n";
        break;
    default:
        echo "\e[0;31mČo je veľa to je málo\e[0m\n";
        exit;
}

fclose($handle);
