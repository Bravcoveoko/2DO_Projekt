<?php


namespace classes;
include_once 'Routing.php';


use PDO;
use PDOException;

class DB {

    private $conn = null;
    private const SQL_GET_USER_BY_USERNAME = 'SELECT * FROM users WHERE userName = :userName';
    private const SQL_GET_USER_BY_EMAIL = 'SELECT * FROM users WHERE email = :email';
    private const SQL_INSERT_USER = 'INSERT INTO users ( userName, email, password, created_at) VALUES ( :userName, :email, :password, :created_at)';

    /**
     * DB constructor.
     */
    public function __construct() {

        try {

            $this->conn = new PDO('mysql:host=localhost;dbname=2do_projekt', "root", "");
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            $this->start_session();

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die('Something wrong with DB');
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    /**
     * @return PDO|null
     */
    public function getConn(): ?PDO {
        return $this->conn;
    }

    public function is_connected($path) {
        if ( empty($this->conn) ) {
            Routing::redirect($path, Error::ERR_DB_ISSUE);
        }
    }

    private function start_session() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get_user_by_username($userName) {
        $statement = $this->conn->prepare(self::SQL_INSERT_USER);
        $statement->execute(['userName' => $userName]);

        return $statement->fetch();
    }

    public function insert_user($userName, $email, $password) {
        $date = date('Y-m-d H:i:s');
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

        $statement = $this->conn->prepare(self::SQL_INSERT_USER);
        return  $statement->execute(['userName' => $userName, 'email' => $email, 'password' => $hashedPassword, 'created_at' => $date]);
    }

    public function get_user_by_email($email) {
        $statement = $this->conn->prepare(self::SQL_GET_USER_BY_EMAIL);
        $statement->execute(['email' => $email]);
        return $statement->fetch();
    }

    public function insert_activity() {

    }


}