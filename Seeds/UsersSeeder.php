<?php


namespace Seeds;
use classes\DB;


class UsersSeeder {

    public static function run() {

        $DB = new DB();
        $DB->delete_users();
        $DB->alter_users();


        $sql = 'INSERT INTO users ( userName, email, password, created_at) VALUES ( :userName, :email, :password, :created_at)';

        $names = [
            'Kristina12', 'JohnDoe12', 'Lukas21', 'Magdalena45', 'Helena1', 'Dobroslab78'
        ];

        $stm = $DB->getConn()->prepare($sql);
        foreach($names as $name) {
            $row = array('userName' => $name,
                'email' => strtolower($name) . '@gmail.com',
                'password' => password_hash('test123', PASSWORD_ARGON2I),
                'created_at' => date('Y-m-d'));

            $stm->execute($row);
        }

        echo "\e[0;32mUsersSeeder successfully executed\e[0m\n";
    }
}