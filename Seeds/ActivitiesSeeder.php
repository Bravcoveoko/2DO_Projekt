<?php


namespace Seeds;
use classes\DB;

class ActivitiesSeeder {

    public static function run() {
        $DB = new DB();
        $DB->delete_activities();
        $DB->alter_activities();

        $sql = 'INSERT INTO activities (user_id, x_position, y_position, color, content, created_at, is_trashed) VALUES (:userID, :xPos, :yPos, :color, :content, :created_at, :trashed)';

        $content = [
            'Kup mlieko', 'Daj macke zradlo', 'Posli CV', 'Sprav domacu ulohu', 'Kup Chleba', 'Poupratuj', 'Vynes odpadky', 'Odovzdaj ulohu', 'Nachystaj veceru', 'Kup muku', 'Osup zemiaky', 'Oprav sifon', 'Zavolaj stolarovi',
        ];

        $color = ['#ac0770', '#0cdb35', '#51c09a', '#2b91a7', '#078e8e', '#ed620b', '#f9ac5d', '#0961a1', '#05a627'];

        $content_length = count($content);
        $color_length = count($color);
        $stm = $DB->getConn()->prepare($sql);
        for($user_id = 1; $user_id < 7; $user_id++) {
            for($index = 0; $index < 5; $index++) {
                $row = array('userID' => $user_id,
                    'xPos' => rand(50, 1500),
                    'yPos' => rand(25, 400),
                    'color' => $color[rand(0, $color_length - 1)],
                    'content' => $content[rand(0, $content_length - 1)],
                    'created_at' => date('Y-m-d'),
                    'trashed' => 0);

                $stm->execute($row);
            }
        }

        echo "\e[0;32mActivitiesSeeder successfully executed\e[0m\n";

    }
}