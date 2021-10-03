<?php


namespace classes;

class Authentication {

    public static function is_Authed(): bool {
        return isset($_SESSION['user_name']) && isset($_SESSION['user_id']);
    }

    public static function clear_session() {
        session_unset();
    }

    public static function set_session(string $user_name, string $user_id) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_id'] = $user_id;
    }

    public static function get_current_user_id(): ?int {
        return $_SESSION['user_id'];
    }

    public static function get_current_user_username(): ?string {
        return $_SESSION['user_name'];
    }

    public static function noAuth_redirect(): void {
        if ( !self::is_Authed() ) Routing::redirect('login', Error::ERR_AUTHENTICATION);
    }

    public static function Auth_redirect() {
        if ( self::is_Authed() ) Routing::redirect('board');
    }

}