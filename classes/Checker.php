<?php


namespace classes;


class Checker {

    private $userName;
    private $email;
    private $pass1;
    private $pass2;

    /**
     * Checker constructor.
     * @param null $userName
     * @param null $email
     * @param null $pass1
     * @param null $pass2
     */
    public function __construct($userName, $email, $pass1, $pass2) {
        $this->userName = $userName;
        $this->email = $email;
        $this->pass1 = $pass1;
        $this->pass2 = $pass2;
    }

    public function check_username() {
        if ( self::check_length_less($this->userName) ) {
            Routing::redirect('register', Error::ERR_REGISTER_USERNAME_LENGTH_MIN);
            exit();
        }
        if ( self::check_length_more($this->userName) ) {
            Routing::redirect('register', Error::ERR_REGISTER_USERNAME_LENGTH_MAX);
            exit();
        }
        if ( self::check_first_letter($this->userName) ) {
            Routing::redirect('register', Error::ERR_REGISTER_USERNAME_FIRST_LETTER);
            exit();
        }
        if ( self::check_numbers($this->userName) ) {
            Routing::redirect('register', Error::ERR_REGISTER_USERNAME_NUMBER);
            exit();
        }
    }

    public function check_password() {
        if ( self::check_length_less($this->pass1) ) {
            Routing::redirect('register', Error::ERR_REGISTER_PASS_LENGTH_MIN);
            exit();
        }
        if ( self::check_length_more($this->pass1) ) {
            Routing::redirect('register', Error::ERR_REGISTER_PASS_LENGTH_MAX);
            exit();
        }
        if ( self::check_numbers($this->pass1) ) {
            Routing::redirect('register', Error::ERR_REGISTER_PASS_NUMBER);
            exit();
        }
    }

    public function check_email_form() {
        if ( self::check_email() ) {
            Routing::redirect('register', Error::ERR_REGISTER_EMAIL_FORM);
            exit();
        }
    }

    public function check_passwords_match() {
        if ( strcmp($this->pass1, $this->pass2) != 0 ) {
            Routing::redirect('register', Error::ERR_REGISTER_PASS_MATCH);
            exit();
        }
    }

    private function check_length_less($data) {
        return (strlen($data) <= 6);
    }

    private function check_length_more($data) {
        return (strlen($data) >= 32);
    }

    private function check_first_letter($data) {
        return !preg_match('/\b[A-Za-z]/', $data);
    }

    private function check_numbers($data) {
        return !preg_match('/[0-9]/', $data);
    }

    private function check_email() {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}