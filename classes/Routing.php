<?php


namespace classes;


class Routing {

    const routes = [
        'board' => 'activity_board.php',
        'login' => 'login.php',
        'index' => '..\index.php',
        'register' => 'registration.php',
        'trash' => 'trash.php'
    ];

    public static function redirect(string $path, string $err = null) {
        $_SESSION['error'] = $err;
        header("Location: " . self::routes[$path]);
    }
}